@extends('admin.layouts.admin')

@section('content')
    <section id="page-title">
        <h1 class="page-header text-overflow">Cadastro de Usuarios</h1>
      </section>
      <div id="page-content">
        <div class="panel panel-success">
          <div class="panel-body">
            @include('flash::message')
            <div class="row" style="padding-left: 20px">
              {{Form::open(['route' => 'admin.User.store'])}}
                @include('admin.users.fields')
              {{Form::close()}}
            </div>
          </div>
        </div>
      </div>
@endsection
