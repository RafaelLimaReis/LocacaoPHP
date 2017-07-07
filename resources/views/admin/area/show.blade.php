@extends('admin.layouts.admin')

@section('content')
    <section id="page-title">
        <h1 class="page-header text-overflow">Área</h1>
    </section>
    <div id="page-content">
        <div class="panel panel-default">
            <div class="panel-body">
                @include('flash::message')
                <div class="row" style="padding-left: 20px">
                    @include('admin.area.show_fields')
                    <a href="{{ route('admin.Area.index') }}" class="btn btn-default btn-labeled fa fa-undo">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection