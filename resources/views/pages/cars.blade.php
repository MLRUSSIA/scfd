@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row" id="drivers">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Автомобили</div>

                    <div class="panel-body">
                        <!-- Добавить водителя -->
                        <button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal"
                                data-target="#myModal">
                            Добавить автомобиль
                        </button>

                        <hr>
                        <div class="text-center">
                            <a href="{{ url('cars/all') }}" class="btn btn-primary btn-lg" role="button">Все</a>
                            <a href="{{ url('cars/free') }}" class="btn btn-primary btn-lg" role="button">Свободные</a>
                            <a href="{{ url('cars/job') }}" class="btn btn-primary btn-lg" role="button">В работе</a>
                            <a href="{{ url('cars/warning') }}" class="btn btn-primary btn-lg" role="button">В угоне</a>
                            <a href="{{ url('cars/delete') }}" class="btn btn-primary btn-lg" role="button">Архив</a>
                        </div>
                        <hr>

                        <table class="table table-bordered">

                            <tr>
                                <th class="info">Марка Модель</th>
                                <th class="info">Год Выпуска</th>
                                <th class="info">Гос. Номер</th>
                                <th class="info">Статус</th>
                                <th class="info">Цвет</th>
                                <th class="info">Серия Номер СТС</th>
                                <th class="info">Действия</th>
                            </tr>

                            @foreach($cars as $car)
                                <tr>
                                    <td class="active">{{ $car->mark.' '.$car->model }}</td>
                                    <td class="active">{{ $car->year }}</td>
                                    <td class="active">{{ $car->register_number }}</td>
                                    <td class="active text-center">
                                        @if($car->status == 'free')<span
                                                class="label label-success">Свободна</span>@endif
                                        @if($car->status == 'job')<span
                                                class="label label-primary">В работе</span>@endif
                                        @if($car->status == 'warning')<span
                                                class="label label-danger">В угоне</span>@endif
                                        @if($car->status == 'delete')<span
                                                class="label label-default">В архиве</span>@endif
                                    </td>
                                    <td class="active">{{ $car->color }}</td>
                                    <td class="active">{{ $car->sts }}</td>
                                    <td class="active text-center">
                                        <a href="{{ url('car/'.$car->id) }}" class="btn btn-primary btn-block btn-xs"
                                           role="button">Открыть</a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Добавить водителя -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Добавить автомобиль </h4>
                </div>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/cars') }}">
                    <div class="modal-body">

                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">Марка</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="mark">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Модель</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="model">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Год Выпуска</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="year">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Гос. Номер</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="register_number">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Цвет</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="color">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Серия Номер СТС</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sts">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection