@extends('partials.layout')
@section('page_title',(strlen($page->title) > 1 ? $page->title : ''))
@section('seo_title', (strlen($page->seo_title) > 1 ? $page->seo_title : ''))
@section('meta_keywords',(strlen($page->meta_keywords) > 1 ? $page->meta_keywords : ''))
@section('meta_description', (strlen($page->meta_description) > 1 ? $page->meta_description : ''))
@section('image',$page->thumbic)
@section('url',url()->current())
@section('page_class','page')
@section('content')

<section class="banner">
  <img class="bg" src="{{Voyager::image($title_1->image)}}" alt="image">
  <div class="gradient"></div>
  <div class="container">
    <h1 class="title-main">
      {{$title_1->title}}
    </h1>
    <div class="description-main">
      {{$title_1->subtitle}}
    </div>
    <div class="buttons">
      <div class="select-dropdown"> 
        <select @change="setlink($event)">         
          <option value="/">В какую страну нужна виза?</option>
          @foreach($link_countries as $link)
            <option value="/visa/{{$link->slug}}">{{$link->name_country}}</option> 
          @endforeach         
        </select>
      </div>
      <button class="btn-orang" @click="getLink">Узнать условия</button>
    </div>
  </div>
</section>

<section class="advantage"> 
  <div class="container">
    <div class="advantage-slider">
      @foreach($icons as $icon)
      <div class="item">
        <div class="icon">
          @if(isset($icon->image))
            <img src="{{Voyager::image($icon->image)}}" alt="{{$icon->title}}">
          @else
            {{$icon->title}}
          @endif
        </div>
        <div class="text">
          {!!$icon->text!!}
        </div>
      </div>
      @endforeach
      
    </div>

  </div>
</section>

<section class="countries">
  <div class="container">
    <h2 class="title">{{$title_2->title}}</h2>
    <div class="description">{{$title_2->subtitle}}</div>
    <div class="items">
      @foreach($popular_countries as $country)
      <div class="country">
        <div class="info">
          <div class="d-flex flex-center">
            <a href="visa.html" class="d-flex flex-center">
              <div class="icon">
                <img src="{{Voyager::image($country->icon)}}" alt="{{ $country->name_country }}">
              </div>
            </a>
            <a href="/visa/{{ $country->slug }}" class="description-main">{{ $country->name_country }}</a>
          </div>
          <div class="d-flex flex-center flex-between">
            <div class="text">Цена</div>
            <div class="text-main">{{ $country->timing_excerpt_third }}</div>
          </div>
          <div class="d-flex flex-center flex-between">
            <div class="text">Срок оформления</div>
            <div class="text-main">{{ $country->timing_excerpt_second }}</div>
          </div>
          <div class="content">
            <a href="#" class="link" data-bs-toggle="modal" data-bs-target="#feedbackModal">Оставить заявку</a>
          </div>
        </div>
          <a href="/visa/{{ $country->slug }}" class="image">
            <img src="{{Voyager::image($country->first_image)}}" alt="{{ $country->name_country }}">
          </a>
      </div>
      @endforeach
    </div>
    <div class="buttons">
      <a href="/visa" class="btn-orang-out">Смотреть все страны</a>
    </div>
  </div>
</section>

@include('partials.feedback')

<section class="about">
  <div class="container">
    <h2 class="title">{{$title_3->title}}</h2>
    <div class="description">{{$title_3->subtitle}}</div>
    <div class="text">
      {{$title_3->description}}
    </div>
    <a href="{{route('pages.get',$pages['about']->first()->slug)}}" class="link-arrow">Подробнее <i class="bi bi-arrow-right"></i></a>
    <img src="{{Voyager::image($title_3->image)}}" class="bg" alt="bg">
  </div>
</section>

<section class="partners">
  <div class="container">
    <div class="title-mini">
      {{$title_4->title}}
    </div>
    <div class="items">
      @foreach($partners as $partner)
        <img src="{{Voyager::image($partner->image)}}" alt="{{$partner->title}}">
      @endforeach
    </div>
  </div>
</section>

<section class="working">
  <div class="container">
    <h2 class="title">{{$title_5->title}}</h2>
    <div class="description">{{$title_5->subtitle}}</div>
  </div>
  <div class="scroll">
  
    <div class="outer-wrapper">
      <div class="wrapper">

        @foreach($supports as $support)
          <div class="slide ">
            <div class="icon">
              <img src="{{Voyager::image($support->icon)}}" alt="{{$support->title}}">
            </div>
            <div class="line"></div>
            <div class="marker"></div>
            <div class="description-mini">
              {{$support->title}}
            </div>
            <div class="text">
              {{$support->description}}
            </div>
          </div>
        @endforeach
        
      </div>
    </div>	

  </div>
  <div class="container">
    <div class="buttons">
      <button class="btn-orang" data-bs-toggle="modal" data-bs-target="#feedbackModal">Оставить заявку</button>
    </div>
  </div>
</section>

<section class="services">
  <div class="container">
    <h2 class="title">{{$title_6->title}}</h2>
    <div class="description">{{$title_6->subtitle}}</div>

    <div class="services-slider">
      @foreach($services as $service)
      <div class="service">
        <div class="icon">
          <img src="{{Voyager::image($service->icon)}}" alt="{{$service->title}}">
        </div>
        <div class="description-mini">{{$service->title}}</div>
        <div class="text">
          {{$service->description}}
        </div>
      </div>
      @endforeach

    </div>
    
  </div>
</section>


<section class="blogs">
  <div class="container">
    <h2 class="title">{{$title_8->title}}</h2>
    <a href="{{route('pages.get',$pages['blog']->first()->slug)}}" class="link">Смотреть все</a>
    <div class="blogs-slider">

      @foreach($blogs as $blog)
      <div class="blog">
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

  </div>
</section>

<section class="questions">
  <div class="container">
    <h2 class="title">{{$title_9->title}}</h2>
    <div class="content">


      <div class="accordion items" id="accordionExample">
        @foreach($faqs as $faq)
        <div class="accordion-item question">
          <div class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo-{{$faq->sort_id}}" aria-expanded="false">
              <div class="text">
                {{$faq->question}} 
              </div>
            </button>
          </div>
          <div id="collapseTwo-{{$faq->sort_id}}" class="accordion-collapse collapse"  data-bs-parent="#accordionExample">
            <div class="accordion-body">
              {!!$faq->answer!!}
            </div>
          </div>
        </div>
        @endforeach    
        <div class="buttons">
          <a href="{{route('pages.get',$pages['faq']->first()->slug)}}" class="link">Смотреть все вопросы</a>
        </div>

      </div>

      @include('partials.question')
    </div>
  </div>
</section>  

@endsection