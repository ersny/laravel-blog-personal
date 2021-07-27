 @if(count($articles)>0)
 @foreach($articles as $article)
 <!-- Blog Post Start -->
 <div class="col-md-12 blog-post">
 	<div class="post-title">
 		<img class="img-thumbnail" alt="" src="{{$article->image}}"/>
 		<h2>
 			<a href="{{route('single',[$article->getCategory->slug,$article->slug])}}">{{$article->title}}</a> 
 		</h2>
 	</div>  
 	<div class="post-info">
 		<span class="float-right">{{$article->created_at->diffForHumans()}}</span>
 		<span><a href="{{route('category',$article->getCategory->slug)}}" target="_blank">{{$article->getCategory->name}}</a></span>
 	</div>  
 	{!!str_limit($article->content,125)!!} @if(!$loop->last)                     			
 	<hr>
 	@endif
 </div>
 @endforeach
 {{$articles->links('pagination::bootstrap-4')}}
</div>
@else
<div class="alert alert-danger">
	<h1>Bu kategoriye ait yazı bulunamadı </h1>
</div>
@endif
