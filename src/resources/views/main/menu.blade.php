<div class="container-fluid">
    <div class="row bg-dark w-80 rounded">
        <div class="col-9">
            <nav class="nav">
                <a class="nav-link text-white" href="{{route('orders-list')}}">{{__("main.menu.orders")}}</a>
                <a class="nav-link text-white" href="{{route('products-list')}}">{{__("main.menu.products")}}</a>
                <a class="nav-link text-white" href="{{route('product-categories-list')}}">{{__("main.menu.product_categories")}}</a>
                <a class="nav-link text-white" href="{{route('customers-list')}}">{{__("main.menu.customers")}}</a>
                <a class="nav-link text-white" href=""></a>
            </nav>
        </div>
        <div class="col-3 text-end">          
            <button class="btn dropdown-toggle text-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                @yield('page-name')
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{route('log-activity')}}">{{__("main.menu.log_activity")}}</a></li>
                <li><a class="dropdown-item" href="{{route('users-list')}}">{{__("main.menu.users")}}</a></li>
            </ul>
        </div>        
    </div>
</div>