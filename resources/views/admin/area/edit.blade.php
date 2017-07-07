@extends('admin.layouts.admin')

@section('content')
    <section id="page-title">
        <h1 class="page-header text-overflow">Alteração de Area</h1>
    </section>
    <div id="page-content">
        <div class="panel panel-defaul">
            <div class="panel-body">
                @include('flash::message')
                <div class="row" style="padding-left: 20px">
                    {{Form::model($area,['route' => ['admin.Area.update', $area->id], 'method' => 'patch'])}}
                        @include('admin.area.fields')
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endsection