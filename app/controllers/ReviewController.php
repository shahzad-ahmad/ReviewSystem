<?php
namespace app\controllers;	
use templates\RenderTemplate;
use app\models\Review;

class ReviewController{

	public function __construct(){
		
	}
	public function loadReviewPage(){
		if( isset($_GET['ud'] ) ){
			if( isReviewAlreadAdded($_GET['ud']) )
				echo  "Review Already Submitted";
			else{
				RenderTemplate::$templateName = TEMPLATE_NAME;
				RenderTemplate::$viewName = 'review.php';
				
				RenderTemplate::loadPage();
			}
		}else{
			echo "[404] Page not found ";
			die;
		}
	}
	public function submitReview(){
		$rating = $_POST['st'];
		$title = $_POST['tl'];
		$comment = $_POST['cm'];
		$unique_review_id = $_GET['ud'];

		if(  $rating == 0 && $title == '' && $comment == ''  ){
			echo json_encode(array("tag"=>0, "message" =>"Please fill the form."));
		}
		else {
			$return_val = Review::AddReview( $rating,  $title , $comment, $unique_review_id);
			echo json_encode($return_val);
		}
		die;
	}
}

