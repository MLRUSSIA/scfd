@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row" id="drivers">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Водители</div>

                    <div class="panel-body">
                        <!-- Добавить водителя -->
                        <button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal"
                                data-target="#myModal">
                            Добавить водителя
                        </button>

                        <hr>

                            <div class="form-group">
                                <div class="form-group">
                                    <div class="col-md-11">
                                        <input type="text" class="form-control" name="fio" placeholder="ФИО или Серия и номер паспорта" v-on:keyup="search" v-model="input">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary">Поиск</button>

                        <hr>
                        <p></p>
                        <h3 v-if="ok">Обнаруженно водителей <span class="label label-default">@{{ drivers.total }}</span></h3>
                        <hr>

                        <div class="list-group" v-if="ok">
                            <a href="{{ url('driver') }}/@{{ driver.id }}" class="list-group-item" v-for="driver in drivers.data">
                                <h4 class="list-group-item-heading">@{{ driver.fio }}</h4>
                                <p class="list-group-item-text"><span class="strong">Дата рождения</span> @{{ driver.birthday }}</p>
                            </a>
                        </div>

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
                    <h4 class="modal-title" id="myModalLabel">Добавить водителя </h4>
                </div>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/drivers') }}">
                    <div class="modal-body">

                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">ФИО</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="fio">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Дата рождения</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="birthday">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Паспорт серия номер</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="passport_number">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Права серия номер</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="drivers_license_number">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Права дата выдачи</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="drivers_license_date">
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