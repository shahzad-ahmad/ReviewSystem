<?php
namespace app\models\repository;
use \PDO;
class ApiRepository {


	public function createOrder($order_id, $token){
		$user_id = get_user_id($token);
		if( $user_id ){
			if( ! ($this->isOrderExist($order_id, $user_id)) ){
				global $db;
				$db->query("INSERT INTO `order` VALUES (NULL, :order_id , Now(), '".ORDER_STATUS_ACTIVE."', :user_id,  :review_page_id) ");
				$db->bind(':order_id', $order_id ,PDO::PARAM_INT);
				$db->bind(':user_id', $user_id ,PDO::PARAM_INT);
				$unique_id = createUniqueId($user_id,$order_id,$token);
				$db->bind(':review_page_id', $unique_id ,PDO::PARAM_STR);
				$result = $db->execute();
				
				return json_encode( array("status" => "Success" ,
				 					"review_page_url" => dir_root_path."review?ud=".$unique_id) )	;
			}else{
				return json_encode( array("error"=>"invalid order" ,
				 					"error_description" => "Order is already added" ))	;
			}
		}
		else {
			return json_encode( array("error"=>"invalid_token" ,
				 					"error_description" => "The token is invalid" )	);
		}
	}

	public function updateOrder($order_id, $token){
		die;
		/*$user_id = get_user_id($token);
		if( $user_id ){
			if( $this->isOrderExist($order_id, $user_id)){
				global $db;
				$db->query("UPDATE `order` SET `title` = :title WHERE user_order_id = :order_id And user_id = :user_id AND status = ".ORDER_STATUS_ACTIVE);
				$db->bind(':order_id', $order_id ,PDO::PARAM_INT);
				$db->bind(':title', $title ,PDO::PARAM_STR);
				$db->bind(':user_id', $user_id ,PDO::PARAM_INT);
				$unique_id = createUniqueId($user_id,$order_id,$token);
				$result = $db->execute();
				return json_encode( array("status" => "Success" ,
				 					"review_page_url" => dir_root_path."review?ud=".$unique_id) )	;
			}else{
				return json_encode( array("error"=>"invalid order" ,
				 					"error_description" => "No order found" ))	;
			}
		}
		else {
			return json_encode( array("error"=>"invalid_token" ,
				 					"error_description" => "The token is invalid" )	);
		}*/
	}

	public function isOrderExist($order_id, $user_id){
		global $db;
		$db->query("SELECT id FROM `order` WHERE user_order_id = :order_id And user_id = :user_id AND status = ".ORDER_STATUS_ACTIVE);
		$db->bind(':order_id', $order_id ,PDO::PARAM_INT);
		$db->bind(':user_id', $user_id ,PDO::PARAM_INT);
		$result = $db->resultset();
		$count = $db->rowCount() ;
		if($count == 0 )
			return false;
		return true;
	}

	public function deleteOrder($order_id, $token){
		//donot delete order but change the status to deleted
		$user_id = get_user_id($token);
		if( $user_id ){
			if($this->isOrderExist($order_id, $user_id)){
				global $db;
				$db->query("UPDATE `order` SET `status` = :status WHERE user_order_id = :order_id And user_id = :user_id");
				$db->bind(':order_id', $order_id ,PDO::PARAM_INT);
				$db->bind(':status', ORDER_STATUS_DELETED ,PDO::PARAM_STR);
				$db->bind(':user_id', $user_id ,PDO::PARAM_INT);
				$result = $db->execute();
				return json_encode(array(
								'status' => 'Order deleted successfully'));
			}else{
				return json_encode( array("error"=>"invalid order" ,
				 					"error_description" => "No order found" ))	;
			}
		}else {
			return json_encode( array("error"=>"invalid_token" ,
				 					"error_description" => "The token is invalid" )	);
		}	
	}

	public function getOrder($token ,$order_id){
		global $db;
		$user_id = get_user_id($token);
		if($order_id){
			$db->query("SELECT user_order_id,date_creation,review_page_id FROM `order` WHERE user_order_id = :order_id AND user_id = :user_id AND status=".ORDER_STATUS_ACTIVE);
			$db->bind(':order_id', $order_id ,PDO::PARAM_INT);
			$db->bind(':user_id', $user_id, PDO::PARAM_INT);
			
		}else{
			$db->query("SELECT user_order_id,date_creation,review_page_id FROM `order` WHERE user_id = :user_id AND status=".ORDER_STATUS_ACTIVE);
			$db->bind(':user_id', $user_id, PDO::PARAM_INT);
		}

		$result = $db->resultset();
		$count = $db->rowCount() ;
		$order_array = array();
		if($count > 0 ){
			$class = "app\\models\\Order";
			foreach($result as $row){
				$obj = new $class($row['user_order_id'],$user_id,$row['date_creation'], $row['review_page_id']);
				array_push($order_array, $obj);
			}
			
			
		}
		return json_encode($order_array);
	}

	public function getReview($token ,$order_id){
		global $db;
		$user_id = get_user_id($token);
		if($order_id){

			$db->query("SELECT comment, rating, dateAdded ,user_order_id,title FROM `review_details` as rev
				JOIN `order`as ord ON ord.`id` = rev.`order_id`
			 WHERE ord.`user_order_id` = :order_id AND ord.`user_id` = :user_id AND status=".ORDER_STATUS_ACTIVE);

			$db->bind(':order_id', $order_id ,PDO::PARAM_INT);
			$db->bind(':user_id', $user_id, PDO::PARAM_INT);
			
		}else{
			$db->query("SELECT comment, rating, dateAdded ,user_order_id,title FROM `review_details` as rev
				JOIN `order`as ord ON ord.`id` = rev.`order_id`
			 WHERE ord.`user_order_id` = :user_id AND status=".ORDER_STATUS_ACTIVE);
			
			$db->bind(':user_id', $user_id, PDO::PARAM_INT);
		}

		$result = $db->resultset();
		$count = $db->rowCount() ;
		
		$order_array = array();
		if($count > 0 ){
			$class = "app\\models\\Review";
			foreach($result as $row){
				$obj = new $class($row['comment'],$row['rating'],$row['dateAdded'], $row['user_order_id'] , $row['title']);
				array_push($order_array, $obj);
			}
			
			
		}
		return json_encode($order_array);
	}
}

