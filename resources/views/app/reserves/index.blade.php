@extends('app.layouts.app')

@section('content')
    <section id="page-title">
        <h1 class="page-header text-overflow">Reserva de Horarios</h1>
      </section>
      <div id="page-content">
        <div class="panel panel-success">
          <div class="panel-body">
            <div class="row" style="padding-left: 20px">
            {{Form::open(['route' => 'app.reserves.store'])}}
            @include('app.reserves.fields')
            {{Form::close()}}
            </div>
          </div>
        </div>
      </div>
@endsection