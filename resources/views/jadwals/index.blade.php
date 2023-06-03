@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
            <div class="alert alert-primary" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Jadwal Pelajaran') }}</div>

                <div class="card-body">
                    <a href="{{ route('jadwals.create') }}" class="btn btn-primary mb-3">{{ __('Tambah Jadwal') }}</a>

                    <table class="table">
                        <thead>
                            <th>Mata pelajaran</th>
                            <th>Hari</th>
                            <th>Jam mulai</th>
                            <th>Jam selesai</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($jadwalPelajaran as $jadwal)
                            <tr>
                                <td>{{ $jadwal->mata_pelajaran }}</td>
                                <td>{{ $jadwal->hari }}</td>
                                <td>{{ $jadwal->jam_mulai }}</td>
                                <td>{{ $jadwal->jam_selesai }}</td>
                                <td>
                                    <a href="{{ route('jadwals.show', $jadwal->id) }}" class="btn btn-sm btn-primary">{{ __('View') }}</a>
                                    <a href="{{ route('jadwals.edit', $jadwal->id) }}" class="btn btn-sm btn-success">{{ __('Edit') }}</a>
                                    <form action="{{ route('jadwals.destroy', $jadwal->id) }}" method="POST" class="d-inline">
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