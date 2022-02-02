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
    
<section class="contact-page">
  <div class="container">
    <div class="box">
      <div class="item">
        <div class="icon">
          <img src="{{ asset('assets/images/icons/call.svg') }}" alt="call">
        </div>
        <div class="info">
          <a class="text-main" href="tel:{{$phone->link}}">
          	{{$phone->value}}
          </a>
        </div>
      </div>
      <div class="item">
        <div class="icon">
          <img src="{{ asset('assets/images/icons/geo.svg') }}" alt="geo">
        </div>
        <div class="info">
          <div class="text-main">
            {{$adress->value}}
          </div>
        </div>
      </div>
      <div class="item">
        <div class="icon">
          <img src="{{ asset('assets/images/icons/mess.svg') }}" alt="mess">
        </div>
        <div class="info">
          <a class="text-main" href="mailto:{{$email->value}}">
          	{{$email->value}}
          </a>
        </div>
      </div>
    </div>
    <div class="calendar">
      <div class="item">
        <div class="icon">
          <img src="{{ asset('assets/images/icons/calendar.svg') }}" alt="calendar">
        </div>
        <div class="info">
          <div class="description">
            График работы:
          </div>
          <div class="text-main">
            {!!$graph->value!!}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="maps" class="maps">
  {!!$map->value!!}
</section>

@endsection