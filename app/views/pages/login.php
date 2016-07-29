  <link rel="stylesheet" type="text/css" href="<?php echo dir_root_path ; ?>assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo dir_root_path ; ?>assets/css/login.css">
  <div class="body"></div>
  
    <div class="header">
        <div>Review<span>System</span></div>
    </div>
    <br>
    <div class="login">
      
      <input id="email" type="text" placeholder="Email" name="user"><br>
      <input id="pdw" type="password" placeholder="Password" name="password"><br>
      <input id="lg_btn" type="button" value="Login">

      <div class="fg_pwd" ><a href= "forgot-password" >Forgot Password </a></div>

      <div class="alert alert-danger fade in err_lg n_ex">
        <a title="close" aria-label="close" data-dismiss="alert" class="close" href="javascript:;">×</a>
        <span id="n_ex_tx"></span>
      </div>
      
    </div>

  <script src='<?php echo dir_root_path ; ?>assets/js/jquery.js'></script>
  <script src='<?php echo dir_root_path ; ?>assets/js/cred.js'></script>