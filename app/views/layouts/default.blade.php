<!DOCTYPE html>
<html data-ng-app="listApp">
    
    <head>
<script src="{{ URL::asset('assets/js/angular.min.js') }}"></script>
</head>
<body>
<script>
    var rootUrl = "{{URL::to('')}}";
</script>

	

		

				@yield('content')
			

	

</body>
</html>
