// public/js/services/commentService.js
angular.module('userService', [])

	.factory('User', function($http) {

		return {
			// get all the comments
			get : function() {
				return $http.get(rootUrl + '/api/users');
			},

			// save a comment (pass in user data)
			save : function(userData) {
				return $http({
					method: 'POST',
					url: rootUrl+'/api/users',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(userData)
				});
			},

			// destroy a comment
			destroy : function(id) {
				return $http.delete(rootUrl+'/api/users/' + id);
			}
		}

	});
	