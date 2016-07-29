<?php use templates\RenderTemplate; ?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Review System</title>
  <link rel="shortcut icon" type="image/png" href="assets/img/fv.png" />
  <link rel="stylesheet" type="text/css" href="<?php echo dir_root_path ; ?>assets/css/bootstrap.min.css">
  <script src="<?php echo dir_root_path ; ?>assets/js/prefixfree.min.js"></script>

</head>

<body>
  <div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo dir_root_path ; ?>">Review System</a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
                    <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                        class="icon-bar"></span><span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse navbar-menubuilder">
                <ul class="nav navbar-nav navbar-right">
                	<?php 
                  if(isset($_SESSION) && isset($_SESSION['user_id']) ){
                	?>
                    <li><a href="/">Home </a> </li> 
                    <li><a href="<?php echo dir_root_path ; ?>sign-out">Sign out</a> </li> 
                    <li><a href="<?php echo dir_root_path ; ?>change-password">Change Password</a> </li>
                  <?php } 
                  else{
                    ?>
                    <li><a href="<?php echo dir_root_path ; ?>login">Login</a> </li>
                    <?php
                    }?>
                </ul>
            </div>
        </div>
    </div>
    <?php require_once('app/views/pages/'.RenderTemplate::$viewName) ; ?>

    

</body>

</html>	