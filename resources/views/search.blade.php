@include('header')



@if(count($parts) !== 0  AND !empty($_REQUEST['search'])  AND $parts[0]['availability'] >= 1 ))
<div class="m-5">
<div class="m-2  bg-success text-white container text-center text-uppercase fs-4">Результаты поиска по коду <p class="text-info bg-dark fst-italic text-uppercase">{{$_REQUEST['search']}}</p></div>


<table class="table table-success  table-striped text-center">
<thead>
    <tr>
      <th scope="col">Производитель</th>
      <th scope="col">Код Запчасть</th>
      <th scope="col">Название</th>
      <th scope="col">Склад</th>
      <th scope="col">Наличие</th>
      <th scope="col">Цена</th>
    </tr>
  </thead>
  <tbody>
    @foreach($parts as $part)
    <tr>
      <th scope="row" class="text-uppercase">{{$part->manufacturer}}</th>
      <td class="text-capitalize">{{$part->auto_spare}}</td>
      <td>{{$part->commentary}}</td>
      <td>{{$part->deposit}}</td>
      <td>{{$part->availability}}</td>
      <td class="fs-5 ">{{$part->price}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@elseif (empty($_REQUEST['search']) )
<div class="m-2  bg-danger text-white container text-center text-capitalize fs-4">
Не Указан Код Детали Для Поиска
</div>

@include ('form_search')


@else

<div class="m-2  bg-danger text-white container text-center text-capitalize fs-4">
 По запросу <p class="text-info fst-italic text-uppercase">{{$_REQUEST['search']}}</p> ничего не найдено
</div>
@include ('form_search')
@endif


@include('footer')