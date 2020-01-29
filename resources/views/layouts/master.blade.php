<!DOCTYPE html>
<html lang="en">
<head>


@include('partials.head')

</head>

<body class="body-wrapper">


@include('partials.nav')

@yield('content')

@include('partials.footer')

@yield('scripts')
</body>
</html>



