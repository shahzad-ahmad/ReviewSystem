<?php use app\controllers\AdminDashboardController; ?>

<link rel="stylesheet" type="text/css" href="<?php echo dir_root_path ; ?>assets/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo dir_root_path ; ?>assets/css/admin.css">

<span class="head_adm">
<h1><?php echo TEXT_HEADING; ?></h1> <button type="button" class="btn btn-primary"><?php echo TEXT_ADD_CUSTOMER ; ?></button>
</span>
<table>
  <thead>
    <tr>
      <th><?php echo TEXT_USER_ID; ?></th>
      <th><?php echo TEXT_USER_EMAIL; ?></th>
      <th><?php echo TEXT_DATE_CREATION; ?></th>
      <th><?php echo TEXT_ACTION; ?></th>
      
    </tr>
  </thead>
  <tbody>
  <?php echo $list_customer_html;?>
    
  </tbody>
</table>