<div class="row">
    <div class="form-group col-md-8 has-feedback {{$errors->has('name') ? 'has-error' : ''}}">
        {{Form::label('name', 'Nome:')}}
        {{Form::text('name', null,
            [
                'class' => 'form-control',
                'placeholder' => 'Insira o nome da area de lazer'
            ]
        )}}
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-md-8">
        {{Form::label('description', 'Descrição:')}}
        {{Form::textarea('description',null,
            [
                'class' => 'form-control',
                'placeholder' => 'Insira a descrição da area'
            ]
        )}}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4 has-feedback {{$errors->has('number') ? 'has-error' : ''}}">
        {{Form::label('number', 'Numero:')}}
        {{Form::number('number',NULL,
            ['class' => 'form-control']
        )}}
        @if ($errors->has('number'))
            <span class="help-block">
                <strong>{{ $errors->first('number') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-md-4 has-feedback {{$errors->has('responsible') ? 'has-error' : ''}}">
        {{Form::label('responsible', 'Responsavel:')}}
         {{Form::select('id_responsible',$responsibles,null,
            [
            'placeholder' => '-- Selecione o responsavel --',
            'class' => 'form-control'
            ]
        )}}
        @if ($errors->has('responsible'))
            <span class="help-block">
                <strong>{{ $errors->first('responsible') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="box-footer">
    <button type="submit" class="btn btn-success btn-labeled fa fa-floppy-o">Salvar</button>
    <a href="{{route('admin.Area.index')}}" class="btn btn-default btn-labeled fa fa-undo">Cancelar</a>
</div>
