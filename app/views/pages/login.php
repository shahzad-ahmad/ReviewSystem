  <div class="body"></div>
  
    <div class="header">
        <div>Review<span>System</span></div>
    </div>
    <br>
    <div class="login">
      
      <input id="un" type="text" placeholder="Username" name="user"><br>
      <input id="pdw" type="password" placeholder="Password" name="password"><br>
      <input id="lg_btn" type="button" value="Login">

      <div class="alert alert-danger err_lg" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        <span class=" tx_inv"> Invalid Username or password </span>
      </div>
      
    </div>

  <script src='<?php echo dir_root_path ; ?>assets/js/jquery.js'></script>
  <script src='<?php echo dir_root_path ; ?>assets/js/cred.js'></script>