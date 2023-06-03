@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <a href="{{ route('users.index') }}"> User table</a>
                <a href="{{ route('jadwals.index') }}"> jadwal table</a>
                <a href="{{ route('tugas.index') }}"> tugas table</a>
                <a href="{{ route('agenda.index') }}"> agenda table</a>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
