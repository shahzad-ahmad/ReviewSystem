<?php
namespace app\models;

class Order {
	public $order_id;
	public $user_id;
	public $date_creation;
	public $review_page_id;

	function __construct($order_id,$user_id,$date_creation, $review_page_id)
	{
		$this->order_id = $order_id;
		$this->user_id = $user_id;
		$this->date_creation = $date_creation;
		$this->review_page_id  =  dir_root_path."review?ud=".$review_page_id;
	}


}