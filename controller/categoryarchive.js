function UploadCategoryArchiveDetails() {
  let appname = $.cookie("appname");
  let database = firebase.database();
  let CatArchive_titlecolor = document.getElementById("CatArchive_titlecolor").value;
  let CatArchive_bordercolor = document.getElementById("CatArchive_bordercolor").value;


  if ((CatArchive_titlecolor !== '') && ( CatArchive_bordercolor!== '')) {
    document.getElementById("Error").innerHTML = "";
      var data = {
        "CategoryArchiveTitleColor": CatArchive_titlecolor,
        "CategoryArchiveBorderColor": CatArchive_bordercolor,
      };
    firebase.database().ref("Test").update(data, function(error) {
      if (error !== null) {
        alert("Some Error Occured Try Again");
      } else {
        document.getElementById("loading").innerHTML = 'Loading Preview...';
        var iframe = document.getElementById('mine');
        iframe.src = iframe.src;
      }
    });
    firebase.database().ref(appname).update(data, function(error) {
      if (error !== null) {
        alert("Some Error Occured Try Again");
      }
    });
  } else {
    document.getElementById("Error").innerHTML = "<p class=" + "bg-danger" + ">Error!! Fill Empty Fields</p>";
  }
}
