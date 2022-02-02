@extends('partials.layout')
@section('page_title',(strlen($page->title) > 1 ? $page->title : ''))
@section('seo_title', (strlen($page->seo_title) > 1 ? $page->seo_title : ''))
@section('meta_keywords',(strlen($page->meta_keywords) > 1 ? $page->meta_keywords : ''))
@section('meta_description', (strlen($page->meta_description) > 1 ? $page->meta_description : ''))
@section('image',$page->thumbic)
@section('url',url()->current())
@section('page_class','page')
@section('content')

@include('partials.breadcrumbs', [
  'title' => (strlen($page->seo_title) > 1 ? $page->seo_title : ''), 
  'subtitle' => $page->title
])

<section class="blog-items">
  <div class="container">
    
    <div class="city">
      @foreach($countries as $country)
      <a href="/blog/cat/{{$country->slug}}" class="description-main">
        <div class="icon">
          <img src="{{Voyager::image($country->icon)}}" alt="{{$country->name_country}}">
        </div>
       {{$country->name_country}}
      </a>
      @endforeach
    </div>

    <button class="btn-orang-out" id="see-more">Еще 4 страны</button>

    <div class="items">

      @foreach($blogs as $blog)
      <div class="blog filterDiv">
        <img src="{{Voyager::image($blog->image)}}" class="image" alt="{{$blog->title}}">
        <div class="info">
          <div class="text">
              {{\Illuminate\Support\Str::limit($blog->title, 80,'...')}}
            {{-- \Illuminate\Support\Str::limit(strip_tags(str_replace("&ndash;", "-",$blog->content)), 80,'...') --}}
          </div>
          <a href="/blog/{{$blog->slug}}" class="link-arrow">Читать полностью <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>         
      @endforeach

    </div>
      {{$blogs->links('partials.paginate')}}  
  </div>
</section>

@endsection