{{Form::open(['route' => 'admin.registerArea.store'])}}
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
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{route('admin.home')}}" class="btn btn-default">Cancelar</a>
    </div>
{{Form::close()}}