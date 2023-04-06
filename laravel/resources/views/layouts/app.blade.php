<!DOCTYPE html>
<html lang="sk">

	<head>
		{{-- Header --}}
		@include('layouts.header')

	</head>
	<body>
		
		{{-- Header --}}
		@include('layouts.navbar')

		
		@yield('content')
	

		{{-- Footer --}}
		@include('layouts.footer')

	</body>

	{{-- Scripts --}}
    
    @include('layouts.scripts.scripts')
    
    @yield('additional_scripts')
    
</html>