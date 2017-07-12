function UploadSideBarDetails() {
  let appname = $.cookie("appname");
  let database = firebase.database();
  let Menu_textcolor = document.getElementById("Menu_textcolor").value;
  let Menu_usercolor = document.getElementById("Menu_usercolor").value;
  let Menu_bgcolor = document.getElementById("Menu_bgcolor").value;
  let Menu_accordioncolor = document.getElementById("Menu_accordioncolor").value;
  let Menu_bordercolor = document.getElementById("Menu_bordercolor").value;

  if ((Menu_textcolor !== '') && (Menu_usercolor !== '') && (Menu_bgcolor !== '') && (Menu_accordioncolor !== '') && (Menu_bordercolor !== '')) {
    document.getElementById("Error").innerHTML = "";
      var data = {
        "MenuTextColor": Menu_textcolor,
        "MenuUserColor": Menu_usercolor,
        "MenuBgColor": Menu_bgcolor,
        "MenuAccordionColor": Menu_accordioncolor,
        "MenuBorderColor": Menu_bordercolor,
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
