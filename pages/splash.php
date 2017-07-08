<!DOCTYPE html>
<html>
<?php include "header.php"; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include "navbar.php"; ?>
  <?php include "sidebar.php"; ?>
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Configure Splash Screen</h3>
            </div>
            <div class="box-body">
              <div class="form-group" id="Error">
              </div>
              <div class="form-group">
                <label>App Logo Url</label>
                <input id="fileUpload" type="file" class="form-control" accept="image/*">
                <image alt="Image Preview" src="" id="image" height="100" width="100" style="border:1px solid"></image>
              </div>
              <div class="form-group">
                <label>Title</label>
                <input id="Splash_title" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Title Size</label>
                <input id="Splash_titleSize" type="number" class="form-control">
              </div>
              <div class="form-group">
                <label>Title Color</label>
                <div class="input-group my-colorpicker2">
                  <input id="Splash_titleColor" type="text" class="form-control" placeholder="Click on right side button to select color">
                  <div class="input-group-addon">
                    <i></i>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Background Color</label>
                <div class="input-group my-colorpicker2">
                  <input id="Splash_bgcolor" type="text" class="form-control" placeholder="Click on right side button to select color">
                  <div class="input-group-addon">
                    <i></i>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Choose Layout</label>
                <div>
                  <label class="radio-inline">
                    <input type="radio" id="r2" name="optradio" value="show">With Description Text at Bottom
                  </label>
                  <label class="radio-inline">
                    <input type="radio" id="r1" name="optradio" value="hide">Without Description Text at Bottom
                  </label>
                </div>
              </div>
              <div class="form-group">
                <a class="btn btn-app" onClick="UploadSplash()">
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
                <label id="list"></label>
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
    if(obj.SplashlogoUrl!==undefined){
    var type = obj.type;
    var url = "https://wp-react.s3.ap-south-1.amazonaws.com/Assets/"+obj.SplashlogoUrl;
    $("#Splash_bgcolor").val(obj.SplashBgColor); $("#Splash_bgcolor").trigger('change');
    $("#Splash_titleColor").val(obj.SplashtitleColor); $("#Splash_titleColor").trigger('change');
    document.getElementById("Splash_titleSize").value=obj.SplashtitleSize;
    document.getElementById("image").src=url;
    document.getElementById("Splash_title").value=obj.Splashtitle;
    if(type==='hide'){
      $('#r1').attr("checked","true");
    }else{
      $('#r2').attr("checked","true");
    }
   }
  });
});
 $("#fileUpload").change(function(){
   var reader = new FileReader();
   reader.onload = function (e) {
      document.getElementById("image").src = e.target.result;
    };
   reader.readAsDataURL(this.files[0]);
 });
</script>
</html>
