@isset($categories)
<div class="col-md-12">
	<ul class="list-group active">
		@foreach($categories as $category)
		<li class="list-group-item d-flex justify-content-between align-items-center)">
			<a href="{{route('category',$category->slug)}}">{{$category->name}} </a>
			<span class="badge bg-danger float-rigth">{{$category->articleCount()}}</span>
		</li>
		@endforeach
	</ul>
</div>
@endif
