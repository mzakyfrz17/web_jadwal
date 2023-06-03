<!-- resources/views/jadwals/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Edit Jadwal
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('jadwals.update', $jadwal->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="mata_pelajaran">Mata Pelajaran</label>
                                <input type="text" name="mata_pelajaran" id="mata_pelajaran" class="form-control" value="{{ $jadwal->mata_pelajaran }}" required>
                            </div>

                            <div class="form-group">
                                <label for="hari">Hari</label>
                                <select name="hari" id="hari" class="form-control" required>
                                    <option value="Senin" {{ $jadwal->hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                                    <option value="Selasa" {{ $jadwal->hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                    <option value="Rabu" {{ $jadwal->hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                                    <option value="Kamis" {{ $jadwal->hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                    <option value="Jumat" {{ $jadwal->hari == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                                    <option value="Sabtu" {{ $jadwal->hari == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                                    <option value="Minggu" {{ $jadwal->hari == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="jam_mulai">Jam Mulai</label>
                                <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" value="{{ $jadwal->jam_mulai }}" required>
                            </div>

                            <div class="form-group">
                                <label for="jam_selesai">Jam Selesai</label>
                                <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" value="{{ $jadwal->jam_selesai }}" required>
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
