@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Agenda</h2>
    <form action="{{ route('agenda.update', $agenda->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Judul:</label>
            <input type="text" class="form-control" name="title" value="{{ $agenda->title }}">
        </div>
        <div class="form-group">
            <label for="date">Tanggal:</label>
            <input type="date" class="form-control" name="date" value="{{ $agenda->date }}">
        </div>
        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <textarea class="form-control" name="description">{{ $agenda->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection