@extends('front.layouts.master')
@section('title', $article->title)
@section('categories')
@include('front.widgets.categoryWidget')
@endsection
@section('content')
{!!$article->content!!}<hr>
<span class="text-danger">Okunma Sayısı : <b> {{$article->hit}}</b></span>
@endsection



