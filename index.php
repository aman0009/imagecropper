<!doctype html>
<html ng-app="myApp">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>WhitePanda</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.11/angular.min.js"></script>
  <link rel="stylesheet" href="image-crop-styles.css">
  <link type="js" href="image-crop.js">
  <script>
    var myApp = null;
    (function() {

      angular.module('myApp', [])
        .controller('MainController', function($scope) {
          console.log('MainController');

          $scope.imageCropResult = null;
          $scope.showImageCropper = false;

          $scope.$watch('imageCropResult', function(newVal) {
            if (newVal) {
              console.log('imageCropResult', newVal);
            }
            
          });
          
        });

    })();
  </script>  
  <script src="image-crop.js"></script>
  <style>
    body {
      font-size: 12px;
      font-family: Helvetica, Arial;
      background: #213;
      margin: 0;
      padding: 0;
      text-align: center;
    }
    a {
      text-decoration: underline;
      color: white;
      cursor: pointer;
    }
    hr {
      border: none;
      height: 1px;
      width: 80%;
      background: white;
      margin: 40px auto;
    }
    .result-datauri {
      width: 300px;
      height: 100px;
      font-size: 11px;
      line-height: 15px;
      padding: 5px;
      border: 1px solid white;
      clear: both;
      display: block;
      margin: 20px auto;
    }
  </style>
  <body>
     <div ng-controller="MainController">
      <h2 style="color: white;">Angular Image Cropper</h2>
      <hr>
      <p ng-hide="imageCropResult||imageCropStep!=1" style="color: white;">Let's get started &rarr; <a ng-click="showImageCropper=true;imageCropStep=1" style="color: white;">Crop Image</a></p>
      <p ng-show="imageCropResult" style="color: white;">Wanna start over? &rarr; <a ng-click="imageCropResult=null;imageCropStep=1" style="color: white;">Reset</a></p>
       <image-crop
         data-width="300"
         data-height="300"
         data-shape="circle"
         data-step="imageCropStep"
         data-result="imageCropResult"
         ng-show="showImageCropper"
       ></image-crop>
       <hr>
       <h2 style="color: white;">Result</h2>
       <div ng-show="imageCropResult">
         <img ng-src="{{ imageCropResult }}" alt="The Cropped Image">
         <p style="color: white;">And this is the actual data uri which represents the cropped image, which you'll then upload to your server:</p>
         <textarea class="result-datauri">{{ imageCropResult }}</textarea>
       </div>
       
       <p ng-hide="imageCropResult" style="color: white;">Not cropped yet</p>
     </div>
  </body>
</html>