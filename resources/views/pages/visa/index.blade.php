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
  'title' => (strlen($page->title) > 1 ? $page->title : ''), 
  'subtitle' => $page->title
])

<section class="countries-visa">
  <div class="container">
    @foreach($visa_c as $v)
      
        @if($v->countries->count() > 0)
        <div class="content">
          <h2 class="title-middle">
            {{$v->name}}
          </h2>
        
         
          <div class="accordion items" id="accordionExample1">     
          @foreach($v->countries as $c)
            <div class="accordion-item item">
              <div class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#shengen-{{$c->sort_id}}" aria-expanded="false">
                  <div class="description-main">
                    <div class="icon">
                      <img src="{{Voyager::image($c->icon)}}" alt="{{$c->name_country}}">
                    </div>
                    {{$c->name_country}}
                  </div>
                </button>
              </div>
              <div id="shengen-{{$c->sort_id}}" class="accordion-collapse collapse"  data-bs-parent="#accordionExample1">
                <div class="accordion-body">
                  <div class="info">
                    <div class="info-item">
                      <div class="text">
                        Срок пребывания
                      </div>
                      <div class="text-main">
                        {{$c->timing_excerpt_first}}
                      </div>
                    </div>
                    <div class="info-item">
                      <div class="text">
                        Срок оформления
                      </div>
                      <div class="text-main">
                        {{$c->timing_excerpt_second}}
                      </div>
                    </div>
                    <div class="info-item">
                      <div class="text">
                        Цена
                      </div>
                      <div class="text-main">
                        {{$c->timing_excerpt_third}}
                      </div>
                    </div>
                  </div>
                  <div class="buttons">
                    <a href="/visa/{{$c->slug}}" class="link">Подробнее</a>
                    <button class="btn-orang" data-bs-toggle="modal" data-bs-target="#feedbackModal">Оставить заявку</button>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
           
        </div>
        @endif
      
    @endforeach
    
  </div>
</section>

@include('partials.feedback')

<!--<section class="visa-help">-->
<!--  <div class="container">-->
<!--    <div class="editors">-->
<!--      {!!$insurance->bottom_content!!}-->
<!--    </div>-->
<!--  </div>-->
<!--</section>-->

@endsection