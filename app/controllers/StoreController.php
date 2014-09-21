<?php 

class StoreController extends BaseController {

	public function __construct()
	{
		parent::__construct();

		$this->beforeFilter('csrf', ['on'=>'post']);

		$this->beforeFilter('auth', ['only' => ['postAddtocart', 'getCart', 'getRemoveitem'] ]);
	}

	public function getIndex()
	{
		return View::make('store.index')
			   ->with('product', Product::take(4)->orderBy('created_at', 'DESC')->get());
	}

	public function getView($id)
	{
		return View::make('store.view')
			   ->with('product', Product::find($id));
	}

	public function getCategory($cat_id)
	{
		return View::make('store.category')
			->with('product', Product::where('category_id',"=","$cat_id")->paginate(6))
			->with('category', Categories::find($cat_id));

	}

	public function getSearch()
	{
		$keyword = Input::get('keyword');

		return View::make('store.search')
		       ->with('product', Product::where('title', 'Like', '%'.$keyword.'%')->get())
		       ->with('keyword', $keyword);
	}

	public function postAddtocart()
	{
		$product = Product::find(Input::get('id'));

		$quantity = Input::get('quantity');

		Cart::insert([
				'id' => $product->id,
				'name' => $product->title,
				'price' => $product->price,
				'quantity' => $quantity,
				'image' => $product->image
			]);

		return Redirect::to('store/cart');

	}

	public function getCart()
	{
		return View::make('store.cart')
		->with('product', Cart::contents());
	}

	public function getRemoveitem($identifier)
	{
		$item = Cart::item($identifier);
		$item->remove();
		return Redirect::to('store/cart');
	}

	public function getContact()
	{
		return View::make('store.contact');
	}
}

/* End of file StoreController.php */
/* Location: .//C/xampp/htdocs/ecomm/app/controllers/StoreController.php */