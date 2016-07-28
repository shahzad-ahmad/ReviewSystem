<?php
namespace app\models;

class Order {
	public $order_id;
	public $user_id;
	public $title;
	public $date_creation;
	public $review_page_id;

	function __construct($order_id,$user_id,$title,$date_creation, $review_page_id)
	{
		$this->order_id = $order_id;
		$this->user_id = $user_id;
		$this->title = $title;
		$this->date_creation = $date_creation;
		$this->review_page_id  = $review_page_id;
	}


}