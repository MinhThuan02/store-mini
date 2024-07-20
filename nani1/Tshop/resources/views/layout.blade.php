<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
   <!-- CSS Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<!-- JS Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('/')}}css/bootstrap.min.css" type="text/css">
    
    <link rel="stylesheet" href="{{asset('/')}}css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('/')}}css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{asset('/')}}css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{asset('/')}}css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('/')}}css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('/')}}css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('/')}}css/style.css" type="text/css">
    
    
    
</head>

<body>
    <header>
        <!-- <h1>@yield('title2') </h1> -->
    </header>
@include('header')

<main>

@yield('home')

</main>
   
@include('footer')
    
</body>

</html>