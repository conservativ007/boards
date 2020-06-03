<?php
  namespace App\Http\Controllers;
  use App\Http\Controllers\Controller;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\DB;

  use App\Heading;
  use App\Processor;
  use App\Motherboard;
  use App\Hdd;

  class BoardController extends Controller{

    public function show($id = '', Request $request){
      // форма добавления
       if(!empty($request->input('select'))){

         // добавление товара
         if(!empty( $request->input('add') )){

           $elems = $request->except(['add', 'select']);

           // этот метод кажется мне грамоздким и жудко костыльным я уверен есть способ получше узнать класс
           switch ($request->input('select')) {
             case 'processors':
               $className = new Processor;
               break;

             case 'motherboards':
               $className = new Motherboard;
               break;

             case 'hdds':
               $className = new Hdd;
               break;

             default:
               echo 'Класс не найден!';
               break;
           }

           foreach($elems as $key => $elem){
             $className->$key = $elem;
           }
           $className->save();
         }

        $name = $request->input('select');
        $elems = DB::table($name)->find(1);
        $elems = get_object_vars($elems);

        unset(
            $elems['id'], $elems['created_at'], $elems['updated_at']
          );


         return view('board.show', [
          'headings' => Heading::get(),
          'elemsAdd' => $elems,
          'catName'  => $name,
         ]);
       }

      // получем таблицу и массив (имён) столбцов
      if($id != ''){
        // записываем имя соответствующей таблицы
        $name = Heading::find($id)->name;

        // получаем объект stdClass со свойствами (требуется доработать)
        $object = DB::table($name)->where('id', '1')->first();

        // выбираем все свойства объекта в массив
        $keys = get_object_vars($object);

        // удаляем ненужные ключи
        unset(
           $keys['id'], $keys['created_at'], $keys['updated_at'], $keys['heading_id']
         );

        // оставляем только ключи
        // итого: мы имеем все названия столбцов из выбранной нами таблицы за исключением тех которые мы удалили
        $keys = array_keys($keys);

        $elems = DB::table($name)->get();

        return view('board.show', [
          'headings' => Heading::get(),
          'elems'    => $elems,
          'keys'     => $keys,
          'name'     => $name,
        ]);
      }


// отобоажение категорий на главной странице
      return view('board.show', [
        'headings' => Heading::get(),
      ]);
    }


// страница товара
    public function single($id, $name){

      $elems = DB::table($name)->find($id);
      $elems = get_object_vars($elems);

      unset(
         $elems['id'], $elems['created_at'], $elems['updated_at'], $elems['heading_id']
       );

      return view('board.single', [
        'elems' => $elems,
        'patch' => "img/pc/$name.png",
      ]);
    }

  }
