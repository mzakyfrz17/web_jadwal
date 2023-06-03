<!-- resources/views/tugas/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit Tugas
                    </div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('tugas.update', $tugas->id) }}" >
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" value="{{ $tugas->judul }}">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $tugas->deskripsi }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="deadline">Deadline</label>
                                <input type="datetime-local" class="form-control" id="deadline" name="deadline" value="{{ $tugas->deadline }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
