@extends('layouts.main')

@section('content')
	<div id = "admin">
		
		<h1>商品管理</h1><hr>
		<p>商品管理</p>
		<h2>商品</h2>
		<ul>
			@foreach ($product as $product)
				<li>
					{{ HTML::image($product->image, $product->title, ['width' => '50'])}}
					{{ $product->name }} -
					{{ Form::open(['url' => 'admin/product/destory', 'class' => 'form-inline'])}}
					{{ Form::hidden('id', $product->id)}}
					{{ Form::submit('刪除')}}
					{{ Form::close()}} -

					{{ Form::open(['url' => 'admin/product/toggle-availability', 'class' => 'form-inline'])}}

					{{ Form::hidden('id', $product->id)}}
					{{ Form::select('availability', [ '1'=>'上架', '0'=>'下架'], $product->availability)}}

					{{ Form::submit('商品更新')}}
					{{ Form::close() }}
				</li>
			@endforeach
		</ul>


		<h2>新增商品</h2>
		@if( $errors->has() )
		<div id="form-errors">
			<p>您有個系統錯訊息:</p>
			<ul>
				@foreach($errors->all() as $error)
					<li>
						{{ $error }}
					</li>
				@endforeach
			</ul>
		</div><!-- end form-errors -->
		@endif

		 {{ Form::open(array('url' => 'admin/product/create', 'files' => true)) }}
		<p>
			{{ Form::label("分類")}}
			{{Form::select('category_id', $categories)}}
		</p>
		<p>
			{{ Form::label("標題")}}
			{{Form::text('title')}}
		</p>
		<p>
			{{ Form::label("描述")}}
			{{Form::textarea('description')}}
		</p>
		<p>
			{{ Form::label("金額")}}
			{{Form::text('price', null, [ 'class' => 'form-price'])}}
		</p>
		<p>
			{{ Form::label("照片","選擇照片")}}
			{{Form::file('image')}}
		</p>
		{{Form::submit('新增商品',  [ 'class' => 'secondary-cart-btn' ])}}
		{{ Form::close() }}

	</div><!-- end admin -->



@stop