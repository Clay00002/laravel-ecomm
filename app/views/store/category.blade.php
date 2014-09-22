@extends('layouts.main')

@section('promo')
            <section id="promo-alt">
                <div id="promo1">
                    <h1>The brand new MacBook Pro</h1>
                    <p>With a special price, <span class="bold">today only!</span></p>
                    <a href="#" class="secondary-btn">READ MORE</a>
                    {{ HTML::image('img/macbook.png', 'MacBook Pro') }}
                </div><!-- end promo1 -->
                <div id="promo2">
                    <h2>The iPhone 5 is now<br>available in our store!</h2>
                    <a href="">Read more {{ HTML::image('img/right-arrow.gif', 'Read more') }}</a>
                    {{ HTML::image('img/iphone.png', 'iPhone') }}
                </div><!-- end promo2 -->
                <div id="promo3">
                    {{ HTML::image('img/thunderbolt.png', 'Thunderbolt') }}
                    <h2>The 27"<br>Thunderbolt Display.<br>Simply Stunning.</h2>
                    <a href="#">Read more {{ HTML::image('img/right-arrow.gif', 'Read more') }}</a>
                </div><!-- end promo3 -->
            </section><!-- promo-alt -->
@stop

@section('content')
<h2>{{ $category->name }}</h2>
                <hr>

                <aside id="categories-menu">
                    <h3>CATEGORIES</h3>
                    <ul>
                        @foreach($catnav as $cat)
                            <li>{{ HTML::link('/store/category/' . $cat->id, $cat->name) }}</li>
                        @endforeach 
                    </ul>
                </aside><!-- end categories-menu -->

                <div id="listings">
                    @foreach($product as $products)
                    <div class="product">
                        <a href="/laravel-ecomm/public/store/view/{{ $products->id }}">
                            {{ HTML::image($products->image, $products->title,
                             array('class' => 'feature', 'width' => '240', 'height' => '127')) }}
                        </a>

                        <h3><a href="/laravel-ecomm/public/store/view/{{ $products->id }}">{{ $products->title }}</a></h3>

                        <p>{{ $products->description }}</p>

                        <h5>Availability: <span class="{{ Availability::displayClass($products->availability) }}">
                                {{ Availability::display($products->availability) }}
                            </span></h5>
                        @if ($products->availability == "1" )
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
                        @endif
                    </div>
                    @endforeach
                </div>
@stop

@section('pagination')
    <section id="pagination">
        {{ $product->links() }}
    </section>
@stop