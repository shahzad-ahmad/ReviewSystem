<?php use templates\RenderTemplate; ?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Review System</title>
  <link rel="shortcut icon" type="image/png" href="assets/img/fv.png" />
  <link rel="stylesheet" type="text/css" href="<?php echo dir_root_path ; ?>assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo dir_root_path ; ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo dir_root_path ; ?>assetsviews/css/login.css">

    <script src="<?php echo dir_root_path ; ?>assets/js/prefixfree.min.js"></script>

</head>

<body>
  <div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Review System</a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
                    <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                        class="icon-bar"></span><span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse navbar-menubuilder">
                <ul class="nav navbar-nav navbar-right">
                	<?php 
                	if(isset($_SESSION)){
                	?>
                    <li><a href="/">Home</a> </li>
                    <?php } ?>
                    <li><a href="<?php echo dir_root_path ; ?>login">Login</a> </li>
                </ul>
            </div>
        </div>
    </div>
    <?php require_once('app/views/pages/'.RenderTemplate::$viewName) ; ?>

  

</body>

</html>	