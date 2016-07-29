<?php
namespace app\models;
use \PDO;
class Review {
	public $comment;
	public $rating;
	public $dateAdded;
	public $order_id;
	public $title;
	
	function __construct($comment, $rating, $dateAdded ,$order_id,$title)
	{
		$this->comment = $comment;
		$this->rating = $rating;
		$this->title = $title;
		$this->dateAdded = $dateAdded;
		$this->order_id = $order_id;
	}
	
	public static function AddReview( $rating,  $title , $comment, $unique_review_id){
		global $db;
		if( isReviewAlreadAdded($unique_review_id) )
			return array("tag"=>0 , "message"=> "Review Already Submitted");
		else{

			$db->query('SELECT id FROM `order` WHERE review_page_id= :review_id AND status = '.ORDER_STATUS_ACTIVE);
			$db->bind(':review_id', $unique_review_id ,PDO::PARAM_INT);
			$result = $db->resultset();
			$count = $db->rowCount() ;
			if($count){
				$order_id  =  $result[0]['id'];
				$db->query("INSERT INTO `review_details` Values (NULL, :comment, :rating, now(), :order_id, :title) ");
				$db->bind(':comment', $comment ,PDO::PARAM_STR);
				$db->bind(':rating', $rating ,PDO::PARAM_INT);
				$db->bind(':order_id', $order_id ,PDO::PARAM_INT);
				$db->bind(':title', $title ,PDO::PARAM_STR);
				$db->execute();
				return array("tag"=>1 , "message"=> "Review Submitted successfully");
			}
			else{
				return array("tag"=>0, "message"=> "Sorry!!! No order found");
			}
		}	
	}

}