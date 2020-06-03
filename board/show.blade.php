<!-- находится views/board/show.blade.php -->
<html>
  <head>
    <link href="{{ URL::asset('css/board/style.css') }}" rel="stylesheet" type="text/css" >
  </head>


  <div class="head">
    <div>head</div>
  </div>

  <div class="container">
    <div class="parent_left">
      <div class="child_left">
        <a href="/boardshow">Глауная</a>
      </div>
      @foreach($headings as $head)
        <div class="child_left">
          <a href="/boardshow/{{$head->id}}">{{$head->name}}</a>
        </div>
      @endforeach

      <!-- добавление объявлений -->
      @include('board.elems.add')
    </div>


    @if(!empty($elems))
    <div class="parent_centr">
      @foreach($elems as $elem)
        <div class="child_centr">
          <a href="/boardshow/single/{{$elem->id}}/{{$name}}">
            @foreach($keys as $key)
              {{$elem->$key}}
            @endforeach
          </a>
        </div>
      @endforeach
    </div>
    @endif
  </div>


</html>
