@extends('admin.layouts.admin')

@section('content')
    <section id="page-title">
        <h1 class="page-header text-overflow">Alteração de Area</h1>
    </section>
    <div id="page-content">
        <div class="panel panel-defaul">
            <div class="panel-body">
                @include('flash::message')
                <div class="row" style="padding-left: 20px">
                    {{Form::model($user,['route' => ['admin.User.update', $user->id], 'method' => 'patch'])}}
                        @include('admin.users.fields')
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endsection
