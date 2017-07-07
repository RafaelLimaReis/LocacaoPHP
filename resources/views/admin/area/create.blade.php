@extends('admin.layouts.admin')

@section('content')
    <section id="page-title">
        <h1 class="page-header">Cadastro de Areas de Lazer</h1>
      </section>
      <div id="page-content">
        <div class="panel panel-success">
          <div class="panel-body">
            @include('flash::message')
            <div class="row" style="padding-left: 20px">
              {{Form::open(['route' => 'admin.Area.store'])}}
                @include('admin.area.fields')
              {{Form::close()}}
            </div>
          </div>
        </div>
      </div>
@endsection
