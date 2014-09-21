<?php 

class CategoriesController extends BaseController {

	public function __construct()
	{
		parent::__construct();

		//CSRF protect
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('admin');
	}

	public function getIndex()
	{
		return View::make('categories.index')
		       ->with('categories', Categories::all());
	}

	public function postCreate()
	{
		# code...

		$validation = Validator::make(Input::all(), Categories::$rules);

		if ($validation->passes()) {
			
			$category = new Categories;
			$category->name = Input::get('name');
			$category->save();

			return Redirect::to('admin/categories/index')
					->with('message', '新增成功');
					
		}

		return Redirect::to('admin/categories/index')
					->with('message', '更新失敗')
					->withErrors($validation)
					->withInput();

	}

	public function postDestory()
	{
		$category = Categories::find(Input::get('id'));

		if($category)
		{
			$category->delete();
			return Redirect::to('admin/categories/index')
					->with('message', '刪除成功');
		}

		return Redirect::to('admin/categories/index')
					->with('message', '刪除失敗,請再試一次');
					
	}

}

/* End of file CategoriesController.php */
/* Location: .//C/xampp/htdocs/ecomm/app/controllers/CategoriesController.php */