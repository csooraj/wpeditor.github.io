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
                <h3 class="box-title">Configure Home Screen</h3>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label>Header Background Color</label>
                  <div class="input-group my-colorpicker2">
                    <input id="Home_headercolor" type="text" class="form-control" placeholder="Click on right side button to select color">
                    <div class="input-group-addon">
                      <i></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Header Icon Color</label>
                  <div class="input-group my-colorpicker2">
                    <input id="Home_iconcolor" type="text" class="form-control" placeholder="Click on right side button to select color">
                    <div class="input-group-addon">
                      <i></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Slider Text Color</label>
                  <div class="input-group my-colorpicker2">
                    <input id="Home_slidertextcolor" type="text" class="form-control" placeholder="Click on right side button to select color">
                    <div class="input-group-addon">
                      <i></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Slider Sub Title Color</label>
                  <div class="input-group my-colorpicker2">
                    <input id="Home_slidersubcolor" type="text" class="form-control" placeholder="Click on right side button to select color">
                    <div class="input-group-addon">
                      <i></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Post Title Color</label>
                  <div class="input-group my-colorpicker2">
                    <input id="Home_posttitlecolor" type="text" class="form-control" placeholder="Click on right side button to select color">
                    <div class="input-group-addon">
                      <i></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Category Text Color</label>
                  <div class="input-group my-colorpicker2">
                    <input id="Home_categorytextcolor" type="text" class="form-control" placeholder="Click on right side button to select color">
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
      if(obj.HomeHeaderColor!==undefined){
          $("#Home_headercolor").val(obj.HomeHeaderColor); $("#Home_headercolor").trigger('change');
          $("#Home_iconcolor").val(obj.HomeIconColor); $("#Home_iconcolor").trigger('change');
          $("#Home_slidertextcolor").val(obj.HomeSliderTextColor); $("#Home_slidertextcolor").trigger('change');
          $("#Home_posttitlecolor").val(obj.HomePostTitleColor); $("#Home_posttitlecolor").trigger('change');
          $("#Home_categorytextcolor").val(obj.HomeCategoryTextColor); $("#Home_categorytextcolor").trigger('change');
          $("#Home_slidersubcolor").val(obj.HomeSliderSubTitleColor); $("#Home_slidersubcolor").trigger('change');
      }
    });
   });
</script>
<script src="../controller/homepage.js"></script>
</html>
