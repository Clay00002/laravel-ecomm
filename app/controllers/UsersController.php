<?php 
class UsersController extends BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('csrf',['on' => 'post']);
	}

	public function getNewaccount()
	{
		return View::make('users.newaccount');
	} 

	public function postCreate()
	{
		$validation = Validator::make(Input::all(), User::$rules);

		if ($validation->passes()) 
		{
			
			$user = new User;
			$user->firstname = Input::get('firstname');
			$user->lastname  = Input::get('lastname');
			$user->email     = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->telephone = Input::get('telephone');
			$user->save();

			return Redirect::to('users/signin')
				   ->with('message', '註冊成功，請登入網站');
		}

		return Redirect::to('users/newaccount')
		       ->with('message', '註冊失敗')
		       ->withErrors($validation)
		       ->withInput();
	}


	public function getSignin()
	{
		return View::make('users.signin');
	}

	public function postSignin()
	{
		if( Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')]))
		{
			return Redirect::to('/')
				->with('message', '歡迎回來');
		}

		return Redirect::to('users/signin')->with('message', '帳號或密碼錯誤!!');
	}

	public function getSignout()
	{
		Auth::logout();
		return Redirect::to('users/signin')->with('message', '您已經登出');
	}
}

/* End of file UsersController.php */
/* Location: .//C/xampp/htdocs/ecomm/app/controllers/UsersController.php */