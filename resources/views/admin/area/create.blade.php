@extends('admin.layouts.admin')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Cadastro de Areas de Lazer</h1>
      </section>
      <div class="content">
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="box box-success">
          <div class="box-body">
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
