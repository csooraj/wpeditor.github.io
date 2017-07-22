function UploadCategoryDetails() {
  let appname = $.cookie("appname");
  let database = firebase.database();
  let Menu_textcolor = document.getElementById("Menu_textcolor").value;

  if ((Menu_textcolor !== '')) {
    document.getElementById("Error").innerHTML = "";
      var data = {
        "CategoryTextColor": Menu_textcolor,
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
