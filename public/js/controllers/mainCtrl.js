// public/js/controllers/mainCtrl.js
angular.module('mainCtrl', [])

	// inject the Comment service into our controller
	.controller('mainController', function($scope, $http, User) {
		// object to hold all the data for the new comment form
		$scope.userData = {};

		// loading variable to show the spinning loading icon
		$scope.loading = true;

		// get all the comments first and bind it to the $scope.comments object
		// use the function we created in our service
		// GET ALL COMMENTS ====================================================
		User.get()
			.success(function(data) {
				$scope.users = data;
				$scope.loading = false;
			});

		// function to handle submitting the form
		// SAVE A COMMENT ======================================================
		$scope.submitUser = function() {
			$scope.loading = true;

			// save the comment. pass in comment data from the form
			// use the function we created in our service
			User.save($scope.userData)
				.success(function(data) {
					if (data.success) {
						// if successful, we'll need to refresh the comment list
						User.get()
							.success(function(getData) {
								$scope.users = getData;
								$scope.loading = false;
							});
					} else {						
						$.each(data.error, function(x, y) {						
			              $('.'+x).text(y[0]);    
			              //$('.'+x).closest('div').addClass('error');			            
			            });
			            $scope.loading = false;
					}					

				})
				.error(function(data) {					
					console.log(data);
				});
		};

		// function to handle deleting a comment
		// DELETE A COMMENT ====================================================
		$scope.deleteUser = function(id) {
			$scope.loading = true; 

			// use the function we created in our service
			User.destroy(id)
				.success(function(data) {

					// if successful, we'll need to refresh the comment list
					User.get()
						.success(function(getData) {
							$scope.users = getData;
							$scope.loading = false;
						});

				});
		};

	});
	