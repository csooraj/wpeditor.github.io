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
                <h3 class="box-title">Configure Login Screen</h3>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label>Login Background Url</label>
                  <input id="fileUpload" type="file" class="form-control" accept="image/*">
                  <image alt="Image Preview" src="" id="image1" height="100" width="100" style="border:1px solid"></image>
                </div>
                <div class="form-group">
                  <label>Login Logo Url</label>
                  <input id="fileUpload1" type="file" class="form-control" accept="image/*">
                  <image alt="Image Preview" src="" id="image2" height="100" width="100" style="border:1px solid"></image>
                </div>
                <div class="form-group">
                  <label>Label Size</label>
                  <input id="Login_labelSize" type="number" class="form-control">
                </div>
                <div class="form-group">
                  <label>Label Color</label>
                  <div class="input-group my-colorpicker2">
                    <input id="Login_textColor" type="text" class="form-control" placeholder="Click on right side button to select color">
                    <div class="input-group-addon">
                      <i></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Input Box Background Color</label>
                  <div class="input-group my-colorpicker2">
                    <input id="Login_inputColor" type="text" class="form-control" placeholder="Click on right side button to select color">
                    <div class="input-group-addon">
                      <i></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Button Color</label>
                  <div class="input-group my-colorpicker2">
                    <input id="Login_buttonColor" type="text" class="form-control" placeholder="Click on right side button to select color">
                    <div class="input-group-addon">
                      <i></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Button Label Size</label>
                  <input id="Login_buttonTextSize" type="number" class="form-control">
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
<script>
$(document).ready(function(){
  var appname = $.cookie("appname");
  document.getElementById("nameapp").innerHTML = appname;
  $.getJSON("https://wp-react.firebaseio.com/"+appname+".json", function(result){
    var obj = result;
    if(obj.LoginBgUrl!==undefined){
      var logourl = "https://wp-react.s3.ap-south-1.amazonaws.com/Assets/"+obj.LoginBgUrl;
      var backgroundurl = "https://wp-react.s3.ap-south-1.amazonaws.com/Assets/"+obj.LoginLogo;
      $("#Login_textColor").val(obj.LoginLabelColor); $("#Login_textColor").trigger('change');
      $("#Login_buttonColor").val(obj.LoginButtonColor); $("#Login_buttonColor").trigger('change');
      $("#Login_inputColor").val(obj.LoginButtonColor); $("#Login_inputColor").trigger('change');
      document.getElementById("Login_labelSize").value=obj.LoginLabelSize;
      document.getElementById("image1").src=logourl;
      document.getElementById("image2").src=backgroundurl;
      document.getElementById("Login_buttonTextSize").value=obj.LoginButtonTextSize;
    }
  });
 });
 $("#fileUpload").change(function(){
   var reader = new FileReader();
   reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image1").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
 });
 $("#fileUpload1").change(function(){
   var reader = new FileReader();
   reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image2").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
 });
</script>
</html>
