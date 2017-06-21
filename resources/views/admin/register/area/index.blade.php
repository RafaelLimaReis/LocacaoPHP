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
            <div class="row" style="padding-left: 20px">
            @include('admin.register.area.fields')
            </div>
          </div>
        </div>
      </div>
@endsection