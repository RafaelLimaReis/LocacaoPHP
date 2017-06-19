@extends('admin.layouts.admin')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Cadastro de Usuarios</h1>
      </section>
      <div class="content">
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="box box-success">
          <div class="box-body">
            <div class="row" style="padding-left: 20px">
            @include('admin.register.users.fields')
            </div>
          </div>
        </div>
      </div>
@endsection