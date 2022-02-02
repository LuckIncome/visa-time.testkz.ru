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

<section class="reviews-items">
  <div class="container">
    <div class="items">
      @foreach($reviews as $item)
      <div class="review">
        @if(isset($item->images) && isset($item->link))
        <div class="images-slider">
          {{--@foreach(json_decode($item->images) as $img_big)
            <img src="{{Voyager::image($img_big)}}" alt="{{$item->name}}">
          @endforeach--}}
          <img src="{{Voyager::image($item->images)}}" alt="{{$item->name}}">
          {{--<iframe src="https://www.youtube.com/embed/{{$item->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}       
        </div>
        @endif
        <div class="description-mini">{{$item->name}}</div>
        <div class="data">{{$item->city}}</div>
        <div class="text">
          {!!$item->review!!}
        </div>
        <div class="data">{{date('d / m / Y', strtotime($item->created_at))}} в {{date('H:i', strtotime($item->created_at))}}</div>
      </div>
      @endforeach
    </div>
    {{$reviews->links('partials.paginate')}}   
  </div>
</section>

@endsection