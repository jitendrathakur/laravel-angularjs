// public/js/services/commentService.js
angular.module('userService', [])

	.factory('User', function($http) {

		return {
			// get all the comments
			get : function() {
				return $http.get('/laravel-angularjs/public/api/users');
			},

			// save a comment (pass in comment data)
			save : function(commentData) {
				return $http({
					method: 'POST',
					url: '/laravel-angularjs/public/api/users',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(commentData)
				});
			},

			// destroy a comment
			destroy : function(id) {
				return $http.delete('/laravel-angularjs/public/api/users/' + id);
			}
		}

	});
	