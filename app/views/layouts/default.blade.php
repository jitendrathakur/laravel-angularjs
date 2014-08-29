<!DOCTYPE html>
<html ng-app="myApp" ng-app lang="en">

<head>
    <meta charset="utf-8">
    
    <link href="{{ URL::asset('assets/css/bootstrap.min.js') }}" rel="stylesheet">
    <style type="text/css">
    ul>li, a{cursor: pointer;}
    </style>
    <title>jitz demo</title>
</head>
<body> 
<div class="navbar navbar-default" id="navbar">
    <div class="container" id="navbar-container">
	    <div class="navbar-header">
	       
	    </div><!-- /.navbar-header -->
   
    </div>
</div>
<script>
    var rootUrl = "{{URL::to('')}}";
</script>

<div class="container">

	@yield('content')
   
</div>
 <script src="{{ URL::asset('assets/js/angular.min.js') }}"></script>
 <script src="{{ URL::asset('assets/js/angular-route.min.js') }}"></script>
 <script src="{{ URL::asset('assets/js/app.js') }}"></script>
<script>

    var customInterpolationApp = angular.module('customInterpolationApp', []);

 

    customInterpolationApp.config(function($interpolateProvider) {

      $interpolateProvider.startSymbol('%%');

      $interpolateProvider.endSymbol('%%');

    });

 </script>	

</body>
</html>
