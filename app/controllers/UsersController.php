<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(User::get());
		//return View::make('users.index');
	}


	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function customers()
	{
		$users = User::all();
		$user = $users->toArray();
	
		return View::make('users.customers', compact('user'));			
	}

	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$input = Input::all();	

		// create a new model instance
		$user = new User();
		

		if ($user->validate($input)) {

			User::create(array(
				'name' => Input::get('name'),
				'email' => Input::get('email'),
				'mobile' => Input::get('mobile'),
			));

			$response = array('success' => true);

		} else {
			$errors = $user->errors();
			$response = array('success' => false, 'error' => $errors);	
		}

		return Response::json($response);
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		return View::make('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);

		return View::make('users.edit', compact('user'));
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::findOrFail($id);

		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user->update($data);

		return Redirect::route('users.index');
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		return Response::json(array('success' => true));
	}

}
