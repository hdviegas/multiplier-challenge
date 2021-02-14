<div class="h-full grid-cols-3">
    <div class="col-span-2 grid-cols-5">
        <div><a href="{{route('orders-list')}}">{{__("main.menu.orders")}}</a></div>
        <div><a href="{{route('products-list')}}">{{__("main.menu.products")}}</a></div>
        <div><a href="{{route('product-categories-list')}}">{{__("main.menu.product_categories")}}</a></div>
        <div><a href="{{route('customers-list')}}">{{__("main.menu.customers")}}</a></div>
        <div><a href="{{route('users-list')}}">{{__("main.menu.users")}}</a></div>
    </div>
    <div>@yield('page-name')</div>
</div>