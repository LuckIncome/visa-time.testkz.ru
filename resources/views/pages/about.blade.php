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
  <div class="container flex-start">
    <div class="content">
      <div class="editors">
        {!!$text->content!!}
      </div>
    </div>
    <div class="content">
      <div class="images image-solo">
        <img src="{{Voyager::image($text->image)}}" alt="image">
      </div>
      <div class="info-block-2">
        <div class="icon">
          <img src="{{Voyager::image($text->icon)}}" alt="icon">
        </div>
        <div class="text">
          {{$text->excerpt}}
        </div>
      </div>
      <div class="info-block">
        <div class="editors">
          {!!$text->service!!}
        </div>
      </div>
    </div>
  </div>
</section>

@include('partials.feedback')

<section class="employees">
  <div class="container">
    <h2 class="title-middle">
      {{$text->title}}
    </h2>
    <div class="employees-slider">
      @foreach($peoples as $people)
      <div class="employee-box">
        <div class="employee">
          <div class="image">
            <img src="{{Voyager::image($people->image)}}" alt="{{$people->name}}">
          </div>
          <div class="description-mini">
            {{$people->name}}
          </div>
          <div class="text">
            {{$people->position}}
          </div>
        </div>
      </div>
      @endforeach  
    </div>
  </div>
</section>

<section class="about-contact">
  <img src="{{Voyager::image($text->imageBg)}}" class="bg" alt="bg">
  <div class="container">
    <div class="box">
      <div class="description-big">
        Контакты
      </div>

      <div class="item">
        <div class="icon">
          <img src="{{ asset('assets/images/icons/call.svg') }}" alt="icon">
        </div>
        <div class="info">
          <a class="text-main" href="tel:{{$phone->link}}">{{$phone->value}}</a>
        </div>
      </div>
      <div class="item">
        <div class="icon">
          <img src="{{ asset('assets/images/icons/geo.svg') }}" alt="icon">
        </div>
        <div class="info">
          <div class="text-main">
             {{$adress->value}}
          </div>
        </div>
      </div>
      <div class="item">
        <div class="icon">
          <img src="{{ asset('assets/images/icons/mess.svg') }}" alt="icon">
        </div>
        <div class="info">
          <a class="text-main" href="mailto:{{$email->value}}">{{$email->value}}</a>
        </div>
      </div>

      <button class="btn-orang" data-bs-toggle="modal" data-bs-target="#feedbackModal">Обратный звонок</button>
    </div>
  </div>
</section>

@endsection