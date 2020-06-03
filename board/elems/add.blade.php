 <div class="add">
    <p>добавить обьявление</p>
    <form action="" method="get">
      <select name="select" id="">
      <option disabled selected>выбирете категорию</option>
      @foreach($headings as $head)
      @if(isset($catName) && $head->name == $catName)
      <option value="{{$head->name}}" selected>
        {{$head->name}}
      </option>
      @continue
      @endif
      <option value="{{$head->name}}">{{$head->name}}</option>
      @endforeach
      </select>

<!-- если будет выбрана категория кнопка отправить будет скрыта -->
      @if(empty($elemsAdd))
      <input type="submit">
      @endif

      @if(isset($elemsAdd) )
        @foreach($elemsAdd as $key => $elem)
        <br>
          @if($key == 'heading_id')
          <input name="{{$key}}" value="{{$elem}}" hidden>
          <!-- без continue создаёт ещё один инпут с heading_id -->
          @continue
          @endif
        <input name="{{$key}}" type="text" placeholder="{{$key}}">
        @endforeach
        <input type="submit" name="add">
      @endif
    </form>
 </div>
