@extends('admin.layouts.admin')

@section('content')
    <section id="page-title">
        <h1 class="page-header text-overflow">Reserva de area</h1>
    </section>
    <div id="page-content">
        <div class="panel">
            <div class="panel-body">
                @include('admin.users.table_inviteds')
            </div>
        </div>
    </div>
@endsection