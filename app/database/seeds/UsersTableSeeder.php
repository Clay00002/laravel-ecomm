<?php
	/**
	 * 
	 */
	 class UsersTableSeeder extends Seeder
	 {
	 	public function run()
	 	{
	 		$user = new User;
	 		$user->firstname = 'Jon';
	 		$user->lastname = 'Doe';
	 		$user->email    = 'ntcuadt097119@hotmail.com';
	 		$user->password = Hash::make('q1w2e3r4');
	 		$user->telephone = '12345678';
	 		$user->admin = 1;
	 		$user->save();
	 	}
	 } 
 ?>