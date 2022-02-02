<section class="navigation">
  <div class="container">
    <div class="navigation-link">
      <a href="/">Главная</a> <i class="bi bi-chevron-right"></i>
      @if(isset($subtitle))     
          <span>{{$subtitle}}</span>              
      @endif
      @if(isset($childTitle))
        <a href="{{$subTitleLink}}">{{$subtitle_one}}</a> <i class="bi bi-chevron-right"></i>       
        <span>{{$childTitle}}</span>     
      @endif
    </div>
    @if(isset($title))
      <h1 class="title">{{$title}}</h1>
    @endif
  </div>
</section>


