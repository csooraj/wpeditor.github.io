function UploadForgetPassword() {
  UploadToAws();
  UploadTestAsset();
  let appname = $.cookie("appname");
  let database = firebase.database();
  let forget_bg = document.getElementById('fileUpload');
  let file1 = forget_bg.files[0];
  let forget_titleColor = document.getElementById("titlecolor").value;
  let forget_titleSize = document.getElementById("titlesize").value;
  let forget_descriptionColor = document.getElementById("descriptioncolor").value;
  let forget_descriptionSize = document.getElementById("descriptionsize").value;
  let forget_buttonColor = document.getElementById("emailbuttoncolor").value;
  let forget_buttonTextSize = document.getElementById("emailbuttonlabelsize").value;
  let forget_buttonTextColor = document.getElementById("emailbuttonlabelcolor").value;
  let forget_inputBgColor = document.getElementById("emailinputcolor").value;
  let forget_backLabelColor = document.getElementById("backbuttoncolor").value;
  let forget_backLabelSize = document.getElementById("backbuttontextsize").value;
  if ((forget_backLabelSize !== '') && (forget_backLabelColor !== '') && (forget_buttonTextColor !== '') && (forget_inputBgColor !== '') && (forget_buttonTextSize !== '') && (forget_buttonTextColor !== '') && (forget_titleColor !== '') && (forget_titleSize !== '') && (forget_descriptionColor !== '') && (forget_descriptionSize !== '') && (forget_buttonColor !== '')) {
    document.getElementById("Error").innerHTML = "";
    if ((file1 === undefined)) {
      var data = {
        "ForgetInputColor": forget_inputBgColor,
        "ForgetBackLabelColor": forget_backLabelColor,
        "ForgetBackLabelSize": forget_backLabelSize,
        "ForgetButtonColor": forget_buttonColor,
        "ForgetButtonTextSize": forget_buttonTextSize,
        "ForgetButtonTextColor": forget_buttonTextColor,
        "ForgetTitleColor": forget_titleColor,
        "ForgetTitleSize": forget_titleSize,
        "ForgetDescColor": forget_descriptionColor,
        "ForgetDescSize": forget_descriptionSize
      };
    } else {
      var data = {
        "ForgetBgUrl": file1.name,
        "ForgetInputColor": forget_inputBgColor,
        "ForgetBackLabelColor": forget_backLabelColor,
        "ForgetBackLabelSize": forget_backLabelSize,
        "ForgetButtonColor": forget_buttonColor,
        "ForgetButtonTextSize": forget_buttonTextSize,
        "ForgetButtonTextColor": forget_buttonTextColor,
        "ForgetTitleColor": forget_titleColor,
        "ForgetTitleSize": forget_titleSize,
        "ForgetDescColor": forget_descriptionColor,
        "ForgetDescSize": forget_descriptionSize
      };
    }
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

function UploadToAws(type) {
  var appname = $.cookie("appname");
  var bucket = new AWS.S3({
    params: {
      Bucket: 'wp-react'
    }
  });
  var fileChooser = document.getElementById('fileUpload');
  var file = fileChooser.files[0];
  if (file) {
    var name = file.name;
    var key = appname + "/" + name;
    var params = {
      Key: key,
      ContentType: file.type,
      Body: file
    };
    bucket.upload(params).on('httpUploadProgress', function(evt) {
      console.log("Uploaded :: " + parseInt((evt.loaded * 100) / evt.total) + '%');
    }).send(function(err, data) {
      console.log(err);
      console.log(data);
    });
  }
}

function UploadTestAsset() {
  var bucket = new AWS.S3({
    params: {
      Bucket: 'wp-react'
    }
  });
  var fileChooser = document.getElementById('fileUpload');
  var file = fileChooser.files[0];
  if (file) {
    var name = file.name;
    var params = {
      Key: "Assets/" + name,
      ContentType: file.type,
      Body: file
    };
    bucket.upload(params).on('httpUploadProgress', function(evt) {
      console.log("Uploaded :: " + parseInt((evt.loaded * 100) / evt.total) + '%');
    }).send(function(err, data) {
      console.log(err);
      console.log(data);
    });
  }
}
