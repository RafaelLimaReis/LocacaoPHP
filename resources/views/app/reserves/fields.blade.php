<div class="row">
      <div class="col-sm-6">
          {!! Form::selectField(
              'id_area','Area:',$areas,null,
              ['placeholder' => 'Selecione a area',
              'id'=>'reserve_area'])
          !!}
      </div>
</div>
<div class="row">
  <!-- date Field -->
  <div class="col-sm-4">
      {!! Form::dateField(
        'date',
        'Data início:',
        null,
        ['data-input' => 'datepicker',
        'id' => 'dateFilter'])
      !!}
  </div>

  <div class="hours">

      <div class="col-sm-3">
          {!! Form::selectField(
              'hour_start','Inicio:',[],null,
              ['placeholder' => 'Selecione a hora inicial',
              'id' => 'startHours'])
          !!}
      </div>
      <div class="col-sm-3">
          {!! Form::selectField(
              'hour_end','Fim:',[],null,
              ['placeholder' => 'Selecione a hora final',
              'id' => 'endHours'])
          !!}
      </div>
  </div>
</div>
<div class="row">
  <button class="btn btn-success btn-labeled fa fa-floppy-o" type="submit">Reservar</button>
  <a href="{{route('app.reserves.index')}}" class="btn btn-default btn-labeled fa fa-undo">Voltar</a>
</div>