<link href="{{ URL::asset('css/board/style-single.css') }}" rel="stylesheet" type="text/css" >

<html>
<body>
  <div class="blog-post">
    <div class="blog-post__img">
      <img src="{{ asset($patch)}}" alt="">
    </div>
    <div class="blog-post__info">
      <h1 class="blog-post__title">
        Описание
      </h1>
      <p class="blog-post__text">
        @foreach($elems as $elem)
          <div>{{$elem}}</div>
        @endforeach
      </p>
    </div>
  </div>

</body>

</html>
