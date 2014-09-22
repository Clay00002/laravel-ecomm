@extends('layouts.main')

@section('promo')
    <section id="promo">
        <div id="promo-details">
            <h1>Today's Deals</h1>
            <p>Checkout this section of<br />
            products at a discounted price.</p>
            <a href="#" class="default-btn">Shop Now</a>
        </div><!-- end promo-details -->
        {{ HTML::image('img/promo.png', 'Promotional Ad') }}
     </section><!-- promo -->
@stop

@section('content')
<h2>New Products</h2>
                <hr>
                <div id="products">
                    @foreach($product as $product)
                    <div class="product">
                        <a href="/laravel-ecomm/public/store/view/{{ $product->id }}">
                            {{ HTML::image($product->image, $product->title,
                             array('class' => 'feature', 'width' => '240', 'height' => '127')) }}
                        </a>

                        <h3><a href="/laravel-ecomm/public/store/view/{{ $product->id }}">{{ $product->title }}</a></h3>

                        <p>{{ $product->description }}</p>

                        
                        <h5>
                            Availability:
                            <span class="{{ Availability::displayClass($product->availability) }}">
                                {{ Availability::display($product->availability) }}
                            </span>
                        </h5>
                        @if( $product->availability == "1" )
                        <p>
                            {{ Form::open(array('url' => 'store/addtocart')) }}
                            {{ Form::hidden('quantity', 1) }}
                            {{ Form::hidden('id', $product->id) }}
                            <button type="submit" class="cart-btn">
                             <span class="price">{{ $product->price }}</span>
                                {{ HTML::image('img/white-cart.gif', 'Add to cart') }}
                                Add to cart
                            </button>
                            {{ Form::close() }}
                        </p>
                        @endif
                    </div>
                    @endforeach
                </div><!-- end product -->
@stop 