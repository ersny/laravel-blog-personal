@extends('front.layouts.master')
@section('title','İletişim')
@section('content')
@if(session('success'))
<div class="alert alert-success"> 
  {{session('success')}}
</div>
@endif
@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}} </li>
    @endforeach
  </ul>
</div>
@endif
<div class="col-md-12 blog-post">
  <div class="row">
   <div class="col-md-4 col-sm-4">
     <div class="contact-us-detail">  
      <i class="icon-screen-smartphone color-6"></i>
      <p><a href="tel:+905428293229">+905428293229</a></p>
    </div>
  </div>

  <div class="col-md-4 col-sm-4">
   <div class="contact-us-detail">
    <i class="icon-envelope-open color-5"></i>
    <p><a href="ersnybusiness@gmail.com">ersnybusiness@gmail.com</a></p>
  </div>
</div>

<div class="col-md-4 col-sm-4">
 <div class="contact-us-detail">
  <i class="icon-clock color-3"></i>
  <p>Dilediğiniz Zaman</p>
</div>
</div>
</div>

<div class="row margin-top-30">
  <div class="col-md-12">   
    <div class="row">
     <form method="post" action="{{route('contact.post')}}">
      @csrf

      <div class="col-sm-6">
        <div class="form-group">
         <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control" placeholder="Adınız">
       </div>
     </div>

     <div class="col-sm-6">
      <div class="form-group">
       <input type="email" id="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
     </div>
   </div>

   <div class="col-sm-6">
    <div class="form-group">
     <input type="text" id="website" name="website" value="{{old('website')}}" class="form-control" placeholder="Varsa Web Siteniz">
   </div>
 </div>

 <div class="col-sm-6">
  <div class="form-group">
   <input type="text" id="subject" name="konu" value="{{old('konu')}}" class="form-control" placeholder="Konu">
 </div>
</div>

<div class="col-sm-12">
  <div class="textarea-message form-group">
    <textarea id="message" class="textarea-message form-control" value="{{old('mesaj')}}" name="mesaj" placeholder="Mesajınız" rows="5"></textarea>
  </div>
</div>


<div class="text-center">      
  <button type="submit" class="load-more-button">Yolla</button>
</div>

</form>
</div>
</div>
</div>
<!-- Contact Me End -->

</div>
</div>
</div>

</div>


@endsection


