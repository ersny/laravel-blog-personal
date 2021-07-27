@extends('back.layouts.master')
@section('title',$page->title.' sayfasını Güncelle')
@section('content')

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary float-right">@yield('title')
		</h6>
	</div>
	<div class="card-body">

		@if($errors->any()) {{--Bir tane bile hata var döndür--}}
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</div>
		@endif

		<form method="post" action="{{route('admin.page.edit.post',$page->id)}}" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label>Makale Başlığı </label>
				<input type="text" name="title" class="form-control" value="{{$page->title}}" required>
			</div>

			<div class="form-group">
				<label>Makale Fotoğrafı </label> <br>
				<img src="{{asset($page->image)}}" class="rounded img-thumbnail" width="300" />
				<input type="file" name="image" class="form-control">
			</div>

			<div class="form-group">
				<label>Makale İçeriği </label>
				<textarea id="editor" name="content" class="form-control" rows="4">{{!! $page->content !!}}</textarea>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block">Makaleyi Güncelle</button>
			</div>


		</form>




	</div>
</div>

@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> 
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>

	$(document).ready(function() {
		$('#editor').summernote({
			'height':300

		});

	});	

</script>
@endsection