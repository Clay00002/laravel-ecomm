<?php 

class Product extends Eloquent {

		protected $table = 'product';

		protected $fillable = [ 'category_id', 'title', 'description', 'price', 'availability', 'image' ];

		public static $rules = [
									'category_id'=>'required|integer',
									'title' 	 =>'required|min:2',
									'description'=>'required|min:20',
									'price'		 =>'required|numeric',
									'availability'=>'integer',
									'image'      =>'required|image'
								];

		public function category()
		{
			return $this->belongsTo("Categories");
		}

}

/* End of file Product.php */
/* Location: .//C/xampp/htdocs/ecomm/app/models/Product.php */