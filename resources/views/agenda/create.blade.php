<!DOCTYPE html>
<html>
<head>
    <title>Tambah Agenda</title>
</head>
<body>
    <h2>Tambah Agenda</h2>
    <form method="POST" action="{{ route('agenda.store') }}">
        @csrf
        <label for="title">Judul:</label>
        <input type="text" name="title" id="title" required>
        <br><br>
        <label for="date">Tanggal:</label>
        <input type="date" name="date" id="date" required>
        <br><br>
        <label for="description">Deskripsi:</label>
        <textarea name="description" id="description" required></textarea>
        <br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
