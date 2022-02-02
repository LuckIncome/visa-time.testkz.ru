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

<section class="info-pages">
  <div class="container">
    <div class="content">
      <div class="editors">
      {!!$insurance->content!!}
      </div>
      <div class="info-block">
        <div class="editors">
          {!!$insurance->second_content!!}
        </div>
      </div>

      <div class="text">
        <div class="editors">
          {!!$insurance->third_content!!}
        </div>
      </div>

      <div class="info-block">
        <div class="editors">
          {!!$insurance->fourth_content!!}
        </div>
      </div>

    </div>
    <div class="content">

      <div class="images">
        <img src="{{Voyager::image($insurance->first_image)}}" alt="image">
        <img src="{{Voyager::image($insurance->second_image)}}" alt="image">
      </div>
      
      <div class="editors">
        {!!$insurance->fifth_content!!}
      </div>

    </div>
  </div>
</section>

@include('partials.feedback')

<section class="visa-help">
  <div class="container">
    <div class="editors">
      {!!$insurance->bottom_content!!}
    </div>
  </div>
</section>

@endsection