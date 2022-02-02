@extends('partials.layout')
@section('page_title',(strlen($blog->title) > 1 ? $blog->title : ''))
@section('seo_title', (strlen($blog->seo_title) > 1 ? $blog->seo_title : ''))
@section('meta_keywords',(strlen($blog->meta_keywords) > 1 ? $blog->meta_keywords : ''))
@section('meta_description', (strlen($blog->meta_description) > 1 ? $blog->meta_description : ''))
@section('image',$blog->image)
@section('url',url()->current())
@section('page_class','page')
@section('content')

@include('partials.breadcrumbs', [
  'subTitleLink' => '/blog', 'subtitle_one' => 'Блог',
  'childTitle' => $blog->title,
])

<section class="blog-info">
  <div class="container">
    <div class="blog-box">
      <div class="editors">
        <img src="{{Voyager::image($blog->image)}}" class="image" alt="{{$blog->title}}">
        <h1>{{$blog->title}}</h1>
        {!!$blog->content!!}
      </div> 
      <div class="network">
        <div class="ya-share2" data-curtain data-size="l" data-shape="round" data-color-scheme="blackwhite" data-services="vkontakte,facebook,telegram,twitter,whatsapp"></div>
      </div>

      <div class="avtor">
        <div class="description-main">Эксперт статьи: {{$blog->author}}</div>
        <div class="description-main">{{$blog->position}}</div>
      </div>

    </div>
  </div>
</section>

@include('partials.feedback')

<section class="blogs">
  <div class="container">
    <h2 class="title">Смотрите также</h2>
    <div class="blogs-slider">

      @foreach($blogs as $item)
      <div class="blog">
        <img src="{{Voyager::image($item->image)}}" class="image" alt="{{$item->title}}">
        <div class="info">
          <div class="text">
            {{ \Illuminate\Support\Str::limit(strip_tags(str_replace("&ndash;", "-",$item->title)), 80,'...') }}
          </div>
          <a href="/blog/{{$item->slug}}" class="link-arrow">Читать полностью <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
      @endforeach
      
    </div>
  </div>
</section>

@endsection