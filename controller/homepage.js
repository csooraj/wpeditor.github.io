function UploadSideBarDetails() {
  let appname = $.cookie("appname");
  let database = firebase.database();
  let Home_headercolor = document.getElementById("Home_headercolor").value;
  let Home_iconcolor = document.getElementById("Home_iconcolor").value;
  let Home_slidertextcolor = document.getElementById("Home_slidertextcolor").value;
  let Home_posttitlecolor = document.getElementById("Home_posttitlecolor").value;
  let Home_categorytextcolor = document.getElementById("Home_categorytextcolor").value;
  let Home_slidersubcolor = document.getElementById("Home_slidersubcolor").value;
  if ((Home_headercolor !== '') && (Home_slidersubcolor !== '') && (Home_iconcolor !== '') && (Home_slidertextcolor !== '') && (Home_posttitlecolor !== '') && (Home_categorytextcolor !== '')) {
    document.getElementById("Error").innerHTML = "";
      var data = {
        "HomeHeaderColor": Home_headercolor,
        "HomeIconColor": Home_iconcolor,
        "HomeSliderTextColor": Home_slidertextcolor,
        "HomePostTitleColor": Home_posttitlecolor,
        "HomeCategoryTextColor": Home_categorytextcolor,
        "HomeSliderSubTitleColor": Home_slidersubcolor,
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
