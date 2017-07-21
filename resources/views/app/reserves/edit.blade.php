@extends('app.layouts.app')

@section('content')
    <section id="page-title">
        <h1 class="page-header text-overflow">Reserva</h1>
    </section>
    <div id="page-content">
        <div class="panel panel-default">
            <div class="panel-body">
                @include('app.reserves.show_fields')
                <a href="{{route('app.reserves.index')}}" class="btn btn-default btn-labeled fa fa-undo">Voltar</a>
            </div>
        </div>
    </div>
    <section id="page-title">
        <h1 class="page-header text-overflow">Convidados</h1>
    </section>
    <div id="page-content">
        <div class="panel panel-bordered panel-success">
            {{Form::open(['route' => 'app.sendInvited'])}}
            {!! Form::hidden('id_reserve',$reserve->id) !!}
            <div class="panel-body">
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Pesquisar nome convidado..." data-selectize="findName" name="id_invited">
                </div>
                <button type="submit" class="btn btn-success btn-labeled fa fa-envelope-o">Convidar</button>
            {{Form::close()}}
                <button type="button" class="btn btn-warning pull-right btn-labeled fa fa-plus" data-toggle="modal" data-target="#modal-invited">Adicionar novo</button>
                @include('app.reserves.table_inviteds')
            </div>
        </div>
    </div>

    {{-- MODAL DE CONVIDADO --}}
    <div class="modal fade" id="modal-invited">
        <div class="modal-dialog animated zoomInDown">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Cadastrar convidado</h4>
                </div>
                {{Form::open(['route' => 'app.inviteds.store'])}}
              <div class="modal-body">
                  <div class="form-group col-sm-6">
                      {!! Form::label('name', 'Nome:') !!}
                      {!! Form::text('name', null, ['class' => 'form-control']) !!}
                  </div>
                  <div class="form-group col-sm-6">
                      {!! Form::label('cpf', 'CPF:') !!}
                      {!! Form::text('cpf',null, ['class' => 'form-control']) !!}
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-labeled fa fa-undo" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success btn-labeled fa fa-floppy-o">Salvar</button>
              </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection