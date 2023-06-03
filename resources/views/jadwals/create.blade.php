@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Tambah Jadwal
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('jadwals.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="mata_pelajaran">Mata Pelajaran</label>
                            <input type="text" name="mata_pelajaran" id="mata_pelajaran" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="hari">Hari</label>
                            <select name="hari" id="hari" class="form-control" required>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="jam_mulai">Jam Mulai</label>
                            <input type="text" id="datepicker" name="jam_mulai" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="jam_selesai">Jam Selesai</label>
                            <input type="time" name="jam_selesai" id="datepicker" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('jadwals.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection