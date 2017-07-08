<!DOCTYPE html>
<html>
<?php include "header.php"; ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include "navbar.php"; ?>
    <?php include "sidebar.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <div class="col-md-6">
            <div class="box box-info">
              <div class="box-header">
                <h3 class="box-title">Configure Sidebar</h3>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label>Menu Item Text Size</label>
                  <input id="Login_labelSize" type="number" class="form-control">
                </div>
                <div class="form-group">
                  <label>UserName Text Size</label>
                  <input id="Login_labelSize" type="number" class="form-control">
                </div>
                <div class="form-group">
                  <label>Logout Text Size</label>
                  <input id="Login_labelSize" type="number" class="form-control">
                </div>
                <div class="form-group">
                  <label>Menu Item Text Color</label>
                  <div class="input-group my-colorpicker2">
                    <input id="Login_textColor" type="text" class="form-control" placeholder="Click on right side button to select color">
                    <div class="input-group-addon">
                      <i></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Sidebar Background Color</label>
                  <div class="input-group my-colorpicker2">
                    <input id="Login_buttonColor" type="text" class="form-control" placeholder="Click on right side button to select color">
                    <div class="input-group-addon">
                      <i></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <a class="btn btn-app" onClick="UploadLogin()">
                    <i class="fa fa-save"></i> Save
                  </a>
                  <a class="btn btn-app" onClick="ReloadPreview(1)">
                    <i class="fa fa-android"></i>Preview
                  </a>
                  <a class="btn btn-app" onClick="ReloadPreview(2)">
                    <i class="fa fa-apple"></i>Preview
                  </a>
                </div>
                <div class="form-group">
                  <label id="loading"></label>
                </div>
                <div class="form-group" id="Error">
                </div>
              </div>
            </div>
          </div>
          <?php include "emulator.php"; ?>
        </div>
      </section>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>