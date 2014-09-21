@extends('layouts.main')

@section('search-keyword')
	
	<section id="search-keyword">
		<h1>Search Results for <span>{{ $keyword }}</span></h1>
	</section>

@stop

@section('content')

	<div id="search-results">
		 @foreach($product as $products)
                    <div class="product">
                        <a href="/ecomm/public/store/view/{{ $products->id }}">
                            {{ HTML::image($products->image, $products->title,
                             array('class' => 'feature', 'width' => '240', 'height' => '127')) }}
                        </a>

                        <h3><a href="/ecomm/public/store/view/{{ $products->id }}">{{ $products->title }}</a></h3>

                        <p>{{ $products->description }}</p>

                        <h5>Availability: <span class="{{ Availability::displayClass($products->availability) }}">
                                {{ Availability::display($products->availability) }}
                            </span></h5>

                        <p>
                            {{ Form::open(array('url' => 'store/addtocart')) }}
                            {{ Form::hidden('quantity', 1) }}
                            {{ Form::hidden('id', $products->id) }}
                            <button type="submit" class="cart-btn">
                             <span class="price">{{ $products->price }}</span>
                                {{ HTML::image('img/white-cart.gif', 'Add to cart') }}
                                Add to cart
                            </button>
                            {{ Form::close() }}
                        </p>
                    </div>
                    @endforeach
	</div>

@stop