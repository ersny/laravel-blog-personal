@extends('front.layouts.master')
@section('title',$category->name)
@section('categories')
@include('front.widgets.categoryWidget')
@endsection
@section('content')
<!-- Blog Post (Right Sidebar) Start -->
@include('front..widgets.articleList')
@endsection

