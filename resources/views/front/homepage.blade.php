       @extends('front.layouts.master')
       @section('title','Blog')
       @section('categories')
       @include('front.widgets.categoryWidget')
       @endsection
       @section('content')
       @include('front.widgets.articleList')
       @endsection
       
       
