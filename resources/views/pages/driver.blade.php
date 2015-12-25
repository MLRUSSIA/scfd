@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row" id="drivers">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Личные данные водителя</div>

                    <div class="panel-body">

                        <!-- List group -->
                        <ul class="list-group">
                            <li class="list-group-item"><strong>ФИО</strong> - {{ $driver->fio }}</li>
                            <li class="list-group-item"><strong>Дата рождения</strong> - {{ $driver->birthday }}</li>
                            <li class="list-group-item"><strong>Паспорт (серия номер)</strong> - {{ $driver->passport_number }}</li>
                            <li class="list-group-item"><strong>Водительское удостоверение (серия номер)</strong> - {{ $driver->drivers_license_number }}</li>
                            <li class="list-group-item"><strong>Водительское удостоверение (дата выдачи)</strong> - {{ $driver->drivers_license_date }}</li>
                            <li class="list-group-item">
                                <strong>Опубликованно компанией</strong> - <a href="{{ url('company/'.$driver->user->id) }}">{{ $driver->user->name }}</a>
                            </li>
                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection