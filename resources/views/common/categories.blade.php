<div class="col-md-12">
    <div class="row shop-submenu">
        <ul  class="nav navbar-nav navbar-center" >

            @foreach( $shopper->getCategories() as $category )

            <li>
                <a href="{{ route("show-products",[ "slug" => $category->slug ]) }}">
                    <img src="{{ asset('../../thairattan2') }}/assets/products/{{ $category->image }}">
                    <i>{{ $category->name }}</i>
                </a>
            </li>

            @endforeach      


        </ul>

    </div>
</div>