<div class="row">
      <div class="col-sm-6">
          {!! Form::selectField(
              'id_area','Area:',$areas,null,
              ['placeholder' => 'Selecione a area'])
          !!}
      </div>
</div>
<div class="row">
  <!-- date Field -->
  <div class="col-sm-4">
      {!! Form::dateField(
        'date_reserve',
        'Data início:',
        null,
        ['data-input' => 'datepicker',
        'id' => 'dateFilter'])
      !!}
  </div>

  <div class="hours">

      <div class="col-sm-3">
          {!! Form::selectField(
              'id_inicio','Inicio:',[],null,
              ['placeholder' => 'Selecione a hora inicial',
              'id' => 'startHours'])
          !!}
      </div>
      <div class="col-sm-3">
          {!! Form::selectField(
              'id_fim','Fim:',[],null,
              ['placeholder' => 'Selecione a hora final',
              'id' => 'endHours'])
          !!}
      </div>
  </div>
</div>
<div class="row">
  <button class="btn btn-success btn-labeled fa fa-floppy-o" type="submit">Reservar</button>
</div>