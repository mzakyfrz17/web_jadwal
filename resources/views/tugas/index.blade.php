<!-- resources/views/tugas/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
            <div class="alert alert-primary" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Daftar Tugas
                </div>
                <div class="card-body">
                    <a href="{{ route('tugas.create') }}" class="btn btn-primary mb-3">Tambah Tugas</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Deadline</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tugas as $t)
                            <tr>
                                <td>{{ $t->judul }}</td>
                                <td>{{ $t->deskripsi }}</td>
                                <td>{{ \Carbon\Carbon::parse($t->deadline)->format('d F Y H:i') }}</td>

                                <td>

                                    <a href="{{ route('tugas.edit', $t->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('tugas.destroy', $t->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">{{ __('Delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection