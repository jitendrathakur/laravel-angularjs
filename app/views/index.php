<!-- app/views/index.php -->
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>jitz demo</title>

	<!-- CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
	<style>
		body 		{ padding-top:30px; }
		form 		{ padding-bottom:20px; }
		.user 	{ padding-bottom:20px; }
		.error { color :red;}
	</style>

	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> <!-- load angular -->

	<!-- ANGULAR -->
	<!-- all angular resources will be loaded from the /public folder -->
		<script src="js/controllers/mainCtrl.js"></script> <!-- load our controller -->
		<script src="js/services/userService.js"></script> <!-- load our service -->
		<script src="js/app.js"></script> <!-- load our application -->

</head>
<!-- declare our angular app and controller -->
<body class="container" ng-app="userApp" ng-controller="mainController">
	<script>
	    var rootUrl = "<?php echo URL::to('') ?>";
	</script>
<div class="col-md-8 col-md-offset-2">

	<!-- PAGE TITLE =============================================== -->
	<div class="page-header">		
		<h4>User log</h4>
	</div>

	<!-- NEW USER FORM =============================================== -->
	<form ng-submit="submitUser()"> <!-- ng-submit will disable the default form action and use our function -->

		<!-- AUTHOR -->
		<div class="form-group">
			<input type="text" class="form-control input-lg" name="name" ng-model="userData.name" placeholder="Name">
			<span class="error name"></span>
		</div>

		<!-- USER TEXT -->
		<div class="form-group">
			<input type="text" class="form-control input-lg" name="email" ng-model="userData.email" placeholder="email">
			<span class="error email"></span>
		</div>

		<!-- USER TEXT -->
		<div class="form-group">
			<input type="text" class="form-control input-lg" name="mobile" ng-model="userData.mobile" placeholder="mobile">
			<span class="error mobile"></span>
		</div>
		
		<!-- SUBMIT BUTTON -->
		<div class="form-group text-right">	
			<button type="submit" class="btn btn-primary btn-lg">Submit</button>
		</div>
	</form>

	<!-- LOADING ICON =============================================== -->
	<!-- show loading icon if the loading variable is set to true -->
	<p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

	<!-- THE USERS =============================================== -->
	<!-- hide these USERs if the loading variable is true -->
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<tr ng-hide="loading" ng-repeat="user in users">
				<td>{{ user.name }}</td>
				<td>{{ user.email }}</td>
				<td>{{ user.mobile }}</td>
				<td><a href="#" ng-click="deleteUser(user.id)" class="text-muted">Delete</a></td>
			</tr>
		</tbody>
	</table>

</div>
</body>
</html>	