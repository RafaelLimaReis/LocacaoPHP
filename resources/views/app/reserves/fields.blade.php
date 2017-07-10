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
            'startHours','Inicio:',[],null,
            ['placeholder' => 'Selecione a hora inicial',
            'id' => 'startHours'])
        !!}
    </div>
    <div class="col-sm-3">
        {!! Form::selectField(
            'endHours','Fim:',[],null,
            ['placeholder' => 'Selecione a hora final',
            'id' => 'endHours'])
        !!}
    </div>
    <button class="btn btn-success btn-labeled fa fa-floppy-o" type="submit">Reservar</button>
</div>