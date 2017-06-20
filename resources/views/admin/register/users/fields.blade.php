{{Form::open(['route' => 'admin.registerUser.store'])}}
    <div class="row">
        <div class="form-group col-md-4 has-feedback {{ $errors->has('type') ? 'has-error' : ''}}">
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
            @if ($errors->has('type'))
                <span class="help-block">
                    <strong>{{ $errors->first('type') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-8 has-feedback {{ $errors->has('name') ? 'has-error' : ''}}">
            {{Form::label('name','Nome:')}}
            {{Form::text('name',null,
                [
                'class'=>'form-control',
                'placeholder' => 'Insira o nome do Usuario'
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
        <div class="form-group col-md-8 has-feedback {{ $errors->has('email') ? 'has-error' : ''}}">
            {{Form::label('email', 'Email:')}}
            {{Form::text('email',null,
                [
                'class'=>'form-control',
                'placeholder' => 'Insira o email do Usuario'
                ]
            )}}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
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
        <div class="form-group col-md-4 has-feedback {{ $errors->has('phone') ? 'has-error' : ''}}">
            {{Form::label('phone','Telefone:')}}
            {{Form::text('phone',null,
                [
                'class'=>'form-control',
                'placeholder' => 'Insira o telefone do Usuario'
                ]
            )}}
        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6 has-feedback {{ $errors->has('password') ? 'has-error' : ''}}">
            {{Form::label('password','Senha:')}}
            {{Form::password('password',
                [
                'class'=>'form-control'
                ]
            )}}
             @if ($errors->has('password'))
                <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="#" class="btn btn-default">Cancelar</a>
    </div>
{{Form::close()}}