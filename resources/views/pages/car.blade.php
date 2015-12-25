@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row" id="drivers">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Карточка Автомобиля</div>

                    <div class="panel-body">

                        <!-- List group -->
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Марка Модель</strong> - {{ $car->mark.' '. $car->model }}</li>
                            <li class="list-group-item"><strong>Год Выпуска</strong> - {{ $car->year }}</li>
                            <li class="list-group-item"><strong>Гос. Номер</strong> - {{ $car->register_number }}</li>
                            <li class="list-group-item"><strong>Статус</strong> -
                                @if($car->status == 'free')<span
                                        class="label label-success">Свободна</span>@endif
                                @if($car->status == 'job')<span
                                        class="label label-primary">В работе</span>@endif
                                @if($car->status == 'warning')<span
                                        class="label label-danger">В угоне</span>@endif
                                @if($car->status == 'delete')<span
                                        class="label label-default">В архиве</span>@endif
                            </li>
                            <li class="list-group-item"><strong>Цвет</strong> - {{ $car->color }}</li>
                            <li class="list-group-item"><strong>Серия Номер СТС</strong> - {{ $car->sts }}</li>
                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection