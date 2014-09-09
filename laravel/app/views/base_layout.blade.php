<!doctype html>
<html lang="pt-br">
<head>
	@include('includes.head')
        
           
        @yield('javascript')
        
        
</head>
<body>
    <header>
        @include('includes.header')
    </header>
    
    <!-- content -->
    <article>
        @yield('content')
    </article>
</body>
</html>