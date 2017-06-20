{{Form::open(['route' => 'admin.registerUser.store'])}}
    <div class="row">
        <div class="form-group col-md-4">
            {{Form::label('type','Tipo:')}}
            {{Form::select('type',
                [
                    '1' => 'Administrador',
                    '0' => 'Usuario'
                ],null,
                [
                'placeholder' => '-- Selecione o tipo de usuario --',
                'class' => 'form-control'
                ]
            )}}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-8">
            {{Form::label('name','Nome:')}}
            {{Form::text('name',null,
                [
                'class'=>'form-control',
                'placeholder' => 'Insira o nome do Usuario'
                ]
            )}}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-8">
            {{Form::label('email', 'Email:')}}
            {{Form::text('email',null,
                [
                'class'=>'form-control',
                'placeholder' => 'Insira o email do Usuario'
                ]
            )}}
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6  has-feedback {{ $errors->has('username') ? ' has-error' : '' }}">
            {{Form::label('username','Nome de Usuario:')}}
            {{Form::text('username',null,
                [
                'class'=>'form-control',
                'placeholder' => 'Insira o nome de usuario'
                ]
            )}}
                @if ($errors->has('username'))
                    <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
                @endif
        </div>
        <div class="form-group col-md-4">
            {{Form::label('phone','Telefone:')}}
            {{Form::text('phone',null,
                [
                'class'=>'form-control',
                'placeholder' => 'Insira o telefone do Usuario'
                ]
            )}}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6">
            {{Form::label('password','Senha:')}}
            {{Form::password('password',
                [
                'class'=>'form-control'
                ]
            )}}
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="#" class="btn btn-default">Cancelar</a>
    </div>
{{Form::close()}}