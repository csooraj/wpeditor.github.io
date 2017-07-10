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
                <h3 class="box-title">Configure Forgot Password Screen</h3>
              </div>
              <div class="form-group">
                <label> Background Url</label>
                <input id="fileUpload" type="file" class="form-control" accept="image/*">
                <image alt="Image Preview" src="" id="image" height="100" width="100" style="border:1px solid"></image>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label>Title Size</label>
                  <input id="titlesize" type="number" class="form-control">
                </div>
                <div class="form-group">
                  <label>Title Color</label>
                  <div class="input-group my-colorpicker2">
                    <input id="titlecolor" type="text" class="form-control" placeholder="Click on right side button to select color">
                    <div class="input-group-addon">
                      <i></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Description Text Size</label>
                  <input id="descriptionsize" type="number" class="form-control">
                </div>
                <div class="form-group">
                  <label>Description Text Color</label>
                  <div class="input-group my-colorpicker2">
                    <input id="descriptioncolor" type="text" class="form-control" placeholder="Click on right side button to select color">
                    <div class="input-group-addon">
                      <i></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Email Input Box Color</label>
                  <div class="input-group my-colorpicker2">
                    <input id="emailinputcolor" type="text" class="form-control" placeholder="Click on right side button to select color">
                    <div class="input-group-addon">
                      <i></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Send Email Button Label Size</label>
                  <input id="emailbuttonlabelsize" type="number" class="form-control">
                </div>
                <div class="form-group">
                  <label>Send Email Button Label Color</label>
                  <div class="input-group my-colorpicker2">
                    <input id="emailbuttonlabelcolor" type="text" class="form-control" placeholder="Click on right side button to select color">
                    <div class="input-group-addon">
                      <i></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Send Email Button BackgroundColor</label>
                  <div class="input-group my-colorpicker2">
                    <input id="emailbuttoncolor" type="text" class="form-control" placeholder="Click on right side button to select color">
                    <div class="input-group-addon">
                      <i></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Back Button Text Color</label>
                  <div class="input-group my-colorpicker2">
                    <input id="backbuttoncolor" type="text" class="form-control" placeholder="Click on right side button to select color">
                    <div class="input-group-addon">
                      <i></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Back Button Text Size</label>
                  <input id="backbuttontextsize" type="number" class="form-control">
                </div>
                <div class="form-group">
                  <a class="btn btn-app" onClick="UploadForgetPassword()">
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
        if(obj.ForgetBgUrl!==undefined){
            var backgroundurl = "https://wp-react.s3.ap-south-1.amazonaws.com/Assets/"+obj.ForgetBgUrl;
            document.getElementById("image").src=backgroundurl;
            document.getElementById("titlesize").value=obj.ForgetTitleSize;
            document.getElementById("descriptionsize").value=obj.ForgetDescSize;
            document.getElementById("emailbuttonlabelsize").value=obj.ForgetButtonTextSize;
            document.getElementById("backbuttontextsize").value=obj.ForgetBackLabelSize;
            $("#titlecolor").val(obj.ForgetTitleColor); $("#titlecolor").trigger('change');
            $("#descriptioncolor").val(obj.ForgetDescColor); $("#descriptioncolor").trigger('change');
            $("#emailbuttoncolor").val(obj.ForgetButtonColor); $("#emailbuttoncolor").trigger('change');
            $("#emailbuttonlabelcolor").val(obj.ForgetButtonTextColor); $("#emailbuttonlabelcolor").trigger('change');
            $("#backbuttoncolor").val(obj.ForgetBackLabelColor); $("#backbuttoncolor").trigger('change');
            $("#emailinputcolor").val(obj.ForgetInputColor); $("#emailinputcolor").trigger('change');
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
  <script src="../controller/forgotpassword.js"></script>
</html>
