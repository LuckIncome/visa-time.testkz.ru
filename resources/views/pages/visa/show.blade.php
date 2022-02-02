@extends('partials.layout')
@section('page_title',(strlen($country_name->name_country) > 1 ? $country_name->name_country : ''))
@section('seo_title', (strlen($seo->seo_title) > 1 ? $seo->seo_title : ''))
@section('meta_keywords',(strlen($seo->meta_keywords) > 1 ? $seo->meta_keywords : ''))
@section('meta_description', (strlen($seo->meta_description) > 1 ? $seo->meta_description : ''))
@section('image',$page->thumbic)
@section('url',url()->current())
@section('page_class','page')
@section('content')

<section class="visa-banner">
  <img class="bg" src="{{Voyager::image($country_bg->image_bg)}}" alt="image">
  <div class="gradient"></div>
  <div class="container">
    <div class="navigation-visa">
      <a href="/">Главная</a> <i class="bi bi-chevron-right"></i>
      <a href="/visa">Визы</a> <i class="bi bi-chevron-right"></i>
      <span>{{$country_name->name_country}}</span>
    </div>
    <h1 class="title-main">
      {!!$country_title->title_main!!}
    </h1>
    <button class="btn-orang" data-bs-toggle="modal" data-bs-target="#feedbackModal">Получить консультацию</button>
  </div>
</section>

<section class="visa-timing">
  <div class="container">

    <div class="item">
      <div class="text-main">{{$timing->timing_title_first}}</div>
      <div class="title-mini">{{$timing->timing_excerpt_first}}</div>
    </div>
    <div class="item">
      <div class="text-main">{{$timing->timing_title_second}}</div>
      <div class="title-mini">{{$timing->timing_excerpt_second}}</div>
    </div>
    <div class="item">
      <div class="text-main">{{$timing->timing_title_third}}</div>
      <div class="title-mini">{{$timing->timing_excerpt_third}}</div>
    </div>

  </div>
</section>

<section class="visa-advantage">
  <div class="container">

    <div class="item">
      <div class="icon">
        @if($icon->icon_first)
        <img src="{{Voyager::image($icon->icon_first)}}" alt="{{$icon->icon_title_first}}">
        @else
        <img src="{{asset('assets/images/icons/file-check.svg')}}" alt="{{$icon->icon_title_first}}">
        @endif
      </div>
      <div class="text-main">{{$icon->icon_title_first}}</div>
    </div>
    <div class="item">
      <div class="icon">
      @if($icon->icon_second) 
        <img src="{{Voyager::image($icon->icon_second)}}" alt="{{$icon->icon_title_second}}">
      @else
        <img src="{{asset('assets/images/icons/mes-msg.svg')}}" alt="{{$icon->icon_title_first}}">
      @endif
      </div>
      <div class="text-main">{{$icon->icon_title_second}}</div>
    </div>
    <div class="item">
      <div class="icon">
      @if($icon->icon_third)  
        <img src="{{Voyager::image($icon->icon_third)}}" alt="{{$icon->icon_title_third}}">
      @else
        <img src="{{asset('assets/images/icons/file.svg')}}" alt="{{$icon->icon_title_first}}">
      @endif
      </div>
      <div class="text-main">{{$icon->icon_title_third}}</div>
    </div>

  </div>
</section>

<section class="visa-get">
  <div class="container">
    <div class="content">
      <h2 class="title-middle">       
          {{$title->title_how}}        
      </h2>
      <div class="editors">
        {!!$content->content_how!!}
      </div>
    </div>
    <div class="content">
        <div class="title-middle">
          <div>
            <div class="icon">
              <img src="{{ asset('assets/images/icons/file-2.svg') }}" alt="icon">
            </div>
          </div>
          <h2>
            {{$title->title_document}}
          </h2>
        </div>
      <div class="accordion" id="accordionExample">
        <div class="description-big">
          {{$title->subtitle_document_first}}
        </div>
        <div class="pading visa-get__accordion"> 
            @if($document_necessary)
              {!!$document_necessary->content!!}  
            @else
              Документ отсутствует! 
            @endif       
        </div>
        <div class="description-big">
          {{$title->subtitle_document_second}}
        </div> 

          @forelse($documents as $document)
          <div class="accordion-item visa-get__accordion">
            <div class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo-{{$document->sort_id}}" aria-expanded="false">
                <div class="description">
                  {{$document->title}}
                </div>
              </button>
            </div>
            <div id="collapseTwo-{{$document->sort_id}}" class="accordion-collapse collapse"  data-bs-parent="#accordionExample">
              <div class="accordion-body">
                {!!$document->content!!}
              </div>
            </div>         
          </div>
          @empty
            <div class="accordion-item visa-get__accordion">
            <div class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo-1" aria-expanded="false">
                <div class="description">
                  Документы отсутствуют! 
                </div>
              </button>
            </div>
            <div id="collapseTwo-1" class="accordion-collapse collapse"  data-bs-parent="#accordionExample">
              <div class="accordion-body">
                пусто...
              </div>
            </div>         
          </div> 
          @endforelse
      </div>

    </div>
  </div>
</section>

<section class="visa-price">
  <div class="container">
    <div class="title-mini">
      <div>
        <div class="icon">
          <img src="{{ asset('assets/images/icons/money.svg') }}" alt="icon">
        </div>
      </div>
      <h2>
        {{$title->title_price}}
      </h2>
    </div>
    
    {!!$content->content_price!!}

  </div>
</section>

@include('partials.feedback')

<section class="visa-info">
  <div class="container">
    <div class="content">
      <div class="title-mini">
        @if($title->title_nation)
        <div>
          <div class="icon">
            <img src="{{ asset('assets/images/icons/visa-icon.svg') }}" alt="">
          </div>
        </div>
        <h2>
            {{$title->title_nation}}
        </h2>
        @endif
      </div>
      <div class="text-main">
         {!!$content->description_nation!!}
      </div>
      <div class="editors">
        {!!$content->content_nation!!}
      </div>

      <div class="title-mini">
        <div>
          <div class="icon">
            <img src="{{asset('assets/images/icons/deadline.svg')}}" alt="deadline">
          </div>
        </div>
        <h2>
            {{$title->second_title_nation}}
        </h2>
      </div>
      <div class="editors">
        {!!$content->second_content_nation!!}
      </div>
      <div class="title-mini">
        <div>
          <div class="icon">
            <img src="{{asset('assets/images/icons/question-icon.svg')}}" alt="question">
          </div>
        </div>
        <h2>
            {{$title->third_title_nation}}
        </h2>
      </div>
      <div class="editors">
        {!!$content->third_content_nation!!}
      </div>

    </div>
    <div class="images images-fance">
      @if($images->first_image)
        <img src="{{Voyager::image($images->first_image)}}" alt="{{$images->first_image}}">
      @endif
      @if($images->second_image)
        <img src="{{Voyager::image($images->second_image)}}" alt="{{$images->second_image_alt}}">
      @endif
      @if($images->third_image)
        <img src="{{Voyager::image($images->third_image)}}" alt="{{$images->third_image_alt}}">
      @endif
    </div>
  </div>
</section>

<!--<section class="reviews">-->
<!--  <div class="container">-->
<!--    <h2 class="title">{{$title->title_review}}</h2>-->
<!--    <a href="/reviews" class="link">Смотреть все</a>-->

<!--    <div class="reviews-slider">-->
<!--      @foreach($reviews as $review) -->
<!--      <div class="review">-->
<!--        <div class="images-slider">-->
<!--          {{--@foreach(json_decode($review->images) as $img_big)-->
<!--          <img src="{{Voyager::image($img_big)}}" alt="{{$review->name}}">-->
<!--          @endforeach     -->
<!--          <iframe src="https://www.youtube.com/embed/{{$review->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}-->
<!--          <img src="{{Voyager::image($review->images)}}" alt="{{$review->name}}">-->
<!--        </div>-->
<!--        <div class="description-mini">{{$review->name}}</div>-->
<!--        <div class="data">{{$review->city}}</div>-->
<!--        <div class="text">-->
<!--          {!!$review->review!!}-->
<!--        </div>-->
<!--        <div class="data">{{date('d / m / Y', strtotime($review->created_at))}} в {{date('H:i', strtotime($review->created_at))}}</div>-->
<!--      </div>-->
<!--      @endforeach-->

<!--    </div>-->
<!--  </div>-->
<!--</section>-->

<section class="visa-help">
  <div class="container">
    <div class="hr"></div>
    <div class="editors">
      {!!$content->bottom_content!!}
    </div>
  </div>
</section>

@endsection