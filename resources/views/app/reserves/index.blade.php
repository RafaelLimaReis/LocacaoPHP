@extends('app.layouts.app')

@section('content')
  <section id="page-title">
    <h1 class="page-header text-overflow">Reservas vencidas</h1>
    <a href="{{route('app.reserves.create')}}" class="btn btn-info btn-labeled fa fa-plus pull-right" style="margin-top: -35px;margin-right: 30px;">Nova Reserva</a>
  </section>
  <div id="page-content">
    <div class="panel panel-default">
      <div class="panel-body">
      </div>
    </div>
  </div>

  <section id="page-title">
  <h1 class="page-header text-overflow">Proximas reservas</h1>
  </section>
  <div id="page-content">
    <div class="panel panel-default">
      <div class="panel-body">
      </div>
    </div>
  </div>
@endsection