@extends('layouts.main')

@section('content')
	<div id = "admin">
		
		<h1>商品分類</h1><hr>
		<p>商品分類管理</p>
		<h2>分類</h2>
		<ul>
			@foreach ($categories as $category)
				<li>
					{{ $category->name }} -
					{{ Form::open(['url' => 'admin/categories/destory', 'class' => 'form-inline'])}}
					{{ Form::hidden('id', $category->id)}}
					{{ Form::submit('刪除')}}
					{{ Form::close()}}
				</li>
			@endforeach
		</ul>


		<h2>新增分類</h2>
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

		{{ Form::open([ 'url'=>'admin/categories/create']) }}
		<p>
			{{ Form::label('分類名稱')}}
			{{Form::text('name', null,['placeholder' => '請輸入商品'])}}
		</p>
		{{Form::submit('新增分類',  [ 'class' => 'secondary-cart-btn' ])}}
		{{ Form::close() }}

	</div><!-- end admin -->



@stop