<!DOCTYPE html>
<html>
<?php include "header.php"; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include "navbar.php"; ?>
  <?php include "sidebar.php"; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="form-group" style="padding:20px">
      <a class="btn btn-app" role="button" data-toggle="modal" data-target="#login-modal">
        <i class="fa fa-plus"></i> Create New App Configuration
      </a>
    </div>
    <div class="form-group" style="padding:20px">
      <a class="btn btn-app" role="button" onClick="LoadApp()">
        <i class="fa fa fa-list"></i> Edit Exisitng App Configuration
      </a>
    </div>
    <div class="form-group" style="padding:20px" id="applist">
    </div>
  </div>
  </div>
  <div class="control-sidebar-bg"></div>
</div>
<?php include "modal.php" ?>
<?php include "footer.php"; ?>
</body>
<script>
$(document).ready(function(){
    $("#mymenu").hide();
    $("#downloads").hide();
});
</script>
</html>
