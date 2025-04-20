<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kegiatan</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="#">To Do App</a>
    </div>
</nav>

<div class="container py-4">
    <div class="card p-4">
        <h2 class="text-center mb-4">Tambah Kegiatan Baru</h2>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Nama Kegiatan" required>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-custom">Tambah</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
