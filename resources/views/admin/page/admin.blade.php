<!DOCTYPE html>

<html lang="en">
<head>
    @include('layouts.style')


    <meta name="csrf-token" content="{{ csrf_token() }}"/>

</head>
<body style="background-color:lightblue;">

@yield('content-list')


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>

@yield('scripts')
