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
      <label>Download the App Json Configuration Here</label>
    </div>
    <div class="form-group" style="padding:20px" id="contain">
      <a class="btn btn-app" onClick="DownloadJson()">
        <i class="fa fa-download"></i> Download App Configuration
      </a>
    </div>
    <div class="form-group" style="padding:20px" id="list">
    </div>
  </div>
  </div>
  <div class="control-sidebar-bg"></div>
</div>
<?php include "modal.php" ?>
<?php include "footer.php"; ?>
</body>
</html>
