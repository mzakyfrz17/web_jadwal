    @extends('layouts.app')
    <style>
        .ukuran {
            height: 150px;
        }
    </style>
    @section('content')
    <div class="container">
        <div class="form-inline mb-3">
            @php
            $selectedMonth = request()->query('month');
            $selectedYear = request()->query('year');
            @endphp

            <form method="GET" action="{{ route('agenda.index') }}">
                <div class="form-group">
                    <label for="month">Bulan</label>
                    <select class="form-control" name="month" id="month">
                        @for ($i = 1; $i <= 12; $i++) <option value="{{ $i }}" @if ($i==$selectedMonth) selected @endif>{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                            @endfor
                    </select>
                </div>
                <div class="form-group">
                    <label for="year">Tahun</label>
                    <select class="form-control" name="year" id="year">
                        @for ($i = date('Y') - 5; $i <= date('Y') + 5; $i++) <option value="{{ $i }}" @if ($i==$selectedYear) selected @endif>{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Lihat Agenda</button>
            </form>

        </div>

        <a href="{{ route('agenda.create') }}" class="btn btn-primary">Tambah Agenda</a>

        <div class="table-responsive">
            <table class="table table-bordered table-hovered">
                <thead class="table-primary ">
                    <tr>
                        <th>Minggu</th>
                        <th>Senin</th>
                        <th>Selasa</th>
                        <th>Rabu</th>
                        <th>Kamis</th>
                        <th>Jumat</th>
                        <th>Sabtu</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $month = isset($_GET['month']) ? $_GET['month'] : date('m');
                    $year = isset($_GET['year']) ? $_GET['year'] : date('Y');

                    $firstDay = date('Y-m-01', strtotime($year . '-' . $month . '-01'));
                    $lastDay = date('Y-m-t', strtotime($year . '-' . $month . '-01'));
                    $currentDate = $firstDay;
                    $weekDay = date('w', strtotime($firstDay));
                    $daysInMonth = date('t', strtotime($firstDay));
                    $currentWeek = 1;
                    @endphp


                    <h2>Agenda {{ date('F Y', strtotime($year . '-' . $month . '-01')) }}</h2>
                    @for ($week = 1; $week <= 6; $week++) <tr>
                        @for ($day = 0; $day <= 6; $day++) @if ($week==1 && $day < $weekDay) <td>
                            </td>
                            @elseif ($currentDate <= $lastDay) <td class="ukuran col-md-1 @if ($currentDate == date('Y-m-d')) table-danger  bg-primary @endif">
                                <div class="date-circle">
                                    <span class="date-number badge text-bg-primary @if ($currentDate == date('Y-m-d')) table-danger bg-light text-dark @endif">{{ date('d', strtotime($currentDate)) }}</span>
                                </div>
                                @foreach ($agenda as $p)
                                @if ($currentDate == $p->date)
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $p->title }}</h5>
                                        <p class="card-text">{{ $p->description }}</p>
                                        <a href="{{ route('agenda.edit', $p->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('agenda.destroy', $p->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus agenda ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                </td>
                                @php
                                $currentDate = date('Y-m-d', strtotime('+1 day', strtotime($currentDate)));
                                @endphp
                                @else
                                <td></td>
                                @endif
                                @endfor
                                </tr>
                                @endfor
                </tbody>
            </table>
        </div>
    </div>
    @endsection