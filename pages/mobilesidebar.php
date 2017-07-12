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
                  <label>Menu Item Text Color</label>
                  <div class="input-group my-colorpicker2">
                    <input id="Menu_textcolor" type="text" class="form-control" placeholder="Click on right side button to select color">
                    <div class="input-group-addon">
                      <i></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Username Text Color</label>
                  <div class="input-group my-colorpicker2">
                    <input id="Menu_usercolor" type="text" class="form-control" placeholder="Click on right side button to select color">
                    <div class="input-group-addon">
                      <i></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Sidebar Background Color</label>
                  <div class="input-group my-colorpicker2">
                    <input id="Menu_bgcolor" type="text" class="form-control" placeholder="Click on right side button to select color">
                    <div class="input-group-addon">
                      <i></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Sidebar Accordion Color</label>
                  <div class="input-group my-colorpicker2">
                    <input id="Menu_accordioncolor" type="text" class="form-control" placeholder="Click on right side button to select color">
                    <div class="input-group-addon">
                      <i></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Sidebar Border Color</label>
                  <div class="input-group my-colorpicker2">
                    <input id="Menu_bordercolor" type="text" class="form-control" placeholder="Click on right side button to select color">
                    <div class="input-group-addon">
                      <i></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <a class="btn btn-app" onClick="UploadSideBarDetails()">
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
      if(obj.MenuBgColor!==undefined){
          $("#Menu_textcolor").val(obj.MenuTextColor); $("#Menu_textcolor").trigger('change');
          $("#Menu_bgcolor").val(obj.MenuBgColor); $("#Menu_bgcolor").trigger('change');
          $("#Menu_usercolor").val(obj.MenuUserColor); $("#Menu_usercolor").trigger('change');
          $("#Menu_accordioncolor").val(obj.MenuAccordionColor); $("#Menu_accordioncolor").trigger('change');
          $("#Menu_bordercolor").val(obj.MenuBorderColor); $("#Menu_bordercolor").trigger('change');
      }
    });
   });
</script>
<script src="../controller/sidebar.js"></script>
</html>
