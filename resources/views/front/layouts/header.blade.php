<!DOCTYPE html>
<html lang="tr">
<head>

  <!-- Meta Tag -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!-- SEO -->
  <meta name="description" content="150 words">
  <meta name="author" content="uipasta">
  <meta name="url" content="http://www.yourdomainname.com">
  <meta name="copyright" content="company name">
  <meta name="robots" content="index,follow">
  
  
  <title>@yield('title') - {{$config->title}} </title>
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/png" href="{{asset($config->favicon)}}">
  <link rel="apple-touch-icon" sizes="144x144" type="image/x-icon" href="{{asset('front/')}}/images/favicon/apple-touch-icon.png">
  <link rel="stylesheet" type="text/css" href="{{asset('front/')}}/css/plugin.css">
  <link rel="stylesheet" type="text/css" href="{{asset('front/')}}/css/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700">

</head>

<body>

 <div id="main">
  <div class="container">
    <div class="row">

      <div class="col-md-3">
       <div class="about">

         <div class="my-pic">
          <img src="{{asset(asset($config->logo))}}" class="img-responsive" alt=""/>
          <ul class="menu-link">
          <li><a href="hakkimda.html">Hakkımda</a></li>
          <li><a href="calismalarim.html">Çalışmalarım</a></li>
          <li><a href="{{route('contact')}}">İletişim</a></li>
          </ul>
          
          </div>

          <div class="my-detail">

          <div class="white-spacing">
          <h1>Ersin Yıldız</h1>
          <span>Web Developer</span>
          </div> 

          <ul class="social-icon">
          <li><a href="#" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
          <li><a href="#" target="_blank" class="github"><i class="fa fa-github"></i></a></li>
          </ul>
          </div>
          @yield('categories')
          </div>
          </div>
          <!-- About Me (Left Sidebar) End -->

          <div class="col-md-9">
          <div class="col-md-12 page-body">
          <div class="row">

          <div class="sub-title">
          <h2>@yield('title')</h2>
          <a href="{{route('contact')}}"><i class="icon-envelope"></i></a>
          </div>
          <div class="col-md-12 content-page">


