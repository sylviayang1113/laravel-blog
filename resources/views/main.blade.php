@include('partials._head')


<body>
    @include('partials._nav')
    <div class="row">
        <div class="container">
            @yield('content')
            @include('partials._footer')
        </div>
    </div>  
    @include('partials._scripts')
</body>
</html>