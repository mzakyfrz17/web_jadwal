<!-- resources/views/tugas/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah Tugas Baru
                </div>
                <div class="card-body">
                    <form action="{{ route('tugas.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="deadline">Deadline</label>
                            <input type="text" class="form-control datepicker" id="datepicker" name="deadline">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('tugas.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection