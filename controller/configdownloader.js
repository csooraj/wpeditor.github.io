function DownloadJson(){
  document.getElementById("contain").innerHTML = "";
  var appname = $.cookie("appname");
  $.getJSON("https://wp-react.firebaseio.com/"+appname+".json", function(result){
    var obj = result;
    console.log("The Result is", result);
    var data = "text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(obj));
    $('<a href="data:' + data + '" download="config.json"><button type="button"  class="btn btn-primary btn-block btn-flat">Click here To Download</button></a>').appendTo('#contain');
      });
}


function DownloadImage(){
  var bucket = new AWS.S3({params: {Bucket: 'wp-react'}});
  var params = {Bucket: 'wp-react'};
  bucket.listObjects(params, function(err, data){
  var bucketContents = data.Contents;
    for (var i = 0; i < bucketContents.length; i++){
      console.log("testing 123", bucketContents[i].Key);
      var urlParams = {Bucket: 'wp-react', Key: bucketContents[i].Key};
        bucket.getSignedUrl('getObject',urlParams, function(err, url){
          $("#list").append("<a download="+"test"+" href="+url+"><image height=50 width=50 src="+url+" /></a>");
          console.log('the url of the image is', url);
        });
    }
 });
}


function CreateApp(){
  var name2 = document.getElementById("newappname").value;
  CreateFolderS3(name2);
  $.cookie("appname", name2);
  var data = {"AppName":name2}
  firebase.database().ref(name2).update(data, function(error) {
       if (error !== null) {
          document.getElementById("loader").innerHTML = "Some Error Occured Try Again!!";
       }else{
          document.getElementById("loader").innerHTML = "App Configuration Created Successfully!!";
          document.getElementById("newappname").value='';
            $('#login-modal').modal('hide');
          LoadApp();
       }
  });
}

function CreateFolderS3(name){
  document.getElementById("loader").innerHTML = "Creating App Configuration!!.......";
  var foldername = name+'/';
  var bucket = new AWS.S3({params: {Bucket: 'wp-react'}});
  var params = { Key: foldername, Body:'body does not matter'};
  bucket.upload(params, function (err, data) {
  if (err) {
      console.log("Error creating the folder: ", err);
      } else {
      console.log("Successfully created a folder on S3");
      }
  });
}


function LoadApp66(name){
  //var name = document.getElementById("loadapp").value;
  $.cookie("appname", name);
  $('#modal').modal('show');
}



function LoadApp(){
  document.getElementById("applist").innerHTML = "";
  $.getJSON("https://wp-react.firebaseio.com/.json", function(result){
    var obj = result;
    console.log("The Result is", result);
    for (var key in obj) {
      var name = obj[key]["AppName"];
      var app = String(name);
      var test = '<a  style="background-color:#00a65a;color:white" class="btn btn-app" onClick="LoadApp66(\''+app+'\')"><i class="fa fa-mobile"></i>\''+app+'\'</a>';
      $("#applist").append(test);
    }
  });
 }
