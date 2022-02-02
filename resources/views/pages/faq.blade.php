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

<section class="questions questions-page">
  <div class="container">
    <div class="content">

      <div class="accordion items" id="accordionExample">
        @foreach($faqs as $faq)
        <div class="accordion-item question">
          <h2 class="accordion-header">
            <button data-bs-target="#collapseTwo-{{$faq->sort_id}}" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" aria-expanded="false">
              <div class="text">
                {{$faq->question}}              
              </div>
            </button>
          </h2>
          <div id="collapseTwo-{{$faq->sort_id}}" class="accordion-collapse collapse"  data-bs-parent="#accordionExample">
            <div class="accordion-body">
              {!!$faq->answer!!}
            </div>
          </div>
        </div>
        @endforeach       
      </div>

      @include('partials.question')
    </div>
  </div>
</section>  

@endsection