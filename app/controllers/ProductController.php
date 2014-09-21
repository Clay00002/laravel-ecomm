<?php 

class ProductController extends BaseController {

	public function __construct()
	{
		parent::__construct();

		//CSRF protect
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function getIndex()
	{
		$categories = array();

		foreach (Categories::all() as $category ) {
			$categories[$category->id] = $category->name;
		}


		return View::make('product.index')
		       ->with('product', Product::all())
		       ->with('categories', $categories);

	}

	public function postCreate()
	{
		
		$validation = Validator::make(Input::all(), Product::$rules);

		if ($validation->passes()) {
			
			$product = new Product;
			$product->category_id = Input::get('category_id');
			$product->title = Input::get('title');
			$product->description = Input::get('description');
			$product->price = Input::get('price');

			$image = Input::file('image');
			$filename = date('Y-m-d-H:i:s')."-".$image->getClientOriginalName();
			
			//$path =  dirname(dirname(__DIR__))."\public\img\product\\";
			//dd(dirname(dirname(__DIR__))."public/img/product/");
			//Image::make($image->getRealPath())->resize(468, 249)->save(  $path.$filename );
			Input::file('image')->move('test',Input::file('image')->getClientOriginalName());

			$product->image = "	test/".Input::file('image')->getClientOriginalName();

			$product->save();

			return Redirect::to('admin/product/index')
					->with('message', '新增成功');
					
		}

		return Redirect::to('admin/product/index')
					->with('message', '更新失敗')
					->withErrors($validation)
					->withInput();

	}

	public function postDestory()
	{
		$product = Product::find(Input::get('id'));

		if($product)
		{
			//刪除檔案
			File::delete('public/'.$product->image);
			$product->delete();
			return Redirect::to('admin/product/index')
					->with('message', '刪除成功');
		}

		return Redirect::to('admin/product/index')
					->with('message', '刪除失敗,請再試一次');
					
	}

	public function postToggleAvailability()
	{
		$product = Product::find(Input::get('id'));


		if ($product) 
		{
			$product->availability = Input::get('availability');
			$product->save();

			return Redirect::to('admin/product/index')
			       ->with('message', '產品更新成功');  
		}

		return Redirect::to('admin/product/index')
			       ->with('message', '產品更新失敗');
	}

}

/* End of file CategoriesController.php */
/* Location: .//C/xampp/htdocs/ecomm/app/controllers/CategoriesController.php */