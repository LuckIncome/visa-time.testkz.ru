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
        {!!$agency->content!!}
      </div>
    </div>
    <div class="content">
      <div class="info-block info-block__number">
        <div class="editors">
          {!!$agency->right_content!!}
        </div>
      </div>
      <div class="editors">
        {!!$agency->excerpt!!}
      </div>
    </div>
  </div>
</section>

@include('partials.feedback')

@endsection