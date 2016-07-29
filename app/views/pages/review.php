
    <title>star rating with CSS and font-awesome</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo dir_root_path ; ?>assets/css/review.css">
    <div class="body"></div>
    <div class="cont-b">

      <div class="header">
          <div>Review<span>System</span></div>
      </div>
    
      <div class="right-cont">
        <div class = "rev_dv">
          <div class="rev_tx">
            Rating:
          </div>
          <div class="star-div">
            <div class="star-rating">
              <div class="star-rating__wrap">
                <input class="star-rating__input" id="star-rating-5" type="radio" name="rating" value="5">
                <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-5" title="5 out of 5 stars"></label>
                <input class="star-rating__input" id="star-rating-4" type="radio" name="rating" value="4">
                <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-4" title="4 out of 5 stars"></label>
                <input class="star-rating__input" id="star-rating-3" type="radio" name="rating" value="3">
                <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-3" title="3 out of 5 stars"></label>
                <input class="star-rating__input" id="star-rating-2" type="radio" name="rating" value="2">
                <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-2" title="2 out of 5 stars"></label>
                <input class="star-rating__input" id="star-rating-1" type="radio" name="rating" value="1">
                <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-1" title="1 out of 5 stars"></label>
                <input class="star-rating__input" id="star-rating-0" type="radio" name="rating" value="0" checked="checked">
              </div>
            </div>
          </div>
        </div>
        <div class="title-div">
          <div class="rev_tx">
            Title:
          </div>
          <div class="title-right">
            <input type="text" name="" class="ttl" maxlength="100">
          </div>
        </div>
        <div class="comment-div">
          <div class="rev_tx">
            Comment:
          </div>
          <div class="comment-right">
            <textarea class="comment-textarea" maxlength="150" value=""></textarea>
          </div>
        </div>
        <div class="sub_btn">
          <button type="button" class="btn btn-primary btn-md sb_rv">Submit</button>
        </div>
        <div class="alert  msg_div">
          <span id="mes"></span>
        </div>
      </div>
    </div>


<script src='<?php echo dir_root_path ; ?>assets/js/jquery.js'></script>
<script src='<?php echo dir_root_path ; ?>assets/js/review.js'></script>