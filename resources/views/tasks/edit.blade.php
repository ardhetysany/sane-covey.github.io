<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Task</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barrio&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
    body {
      background-color: #F0F1C5;
      font-family: "Funnel display", sans-serif;
    }

    h2 {
      font-family: 'Barrio', cursive;
      font-size: 2.5rem;
    }

    .btn-tambah {
      background-color: #4E1F00;
      color: white;
      border: none;
    }

    .btn-tambah:hover {
      background-color: #3b1700;
    }

    .btn-edit-putih {
      background-color: white;
      color: black;
      border: 1px solid #ccc;
    }

    .btn-edit-putih:hover {
      background-color: #f0f0f0;
    }

    .todo-container {
      max-width: 650px;
      margin: 50px auto;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #86b7fe;
    }

    .dark-mode {
      background-color: #4E1F00;
      color: #ffffff;
    }

    .dark-mode .card {
      background-color: #5a2a09;
      border-color: #2c1404;
      color: #ffffff;
    }

    .dark-mode .form-control,
    .dark-mode .btn {
      background-color: #000000;
      color: #ffffff;
      border-color: #444;
    }

    .dark-mode .form-control::placeholder {
      color: #bbbbbb;
    }

    .dark-mode .btn-kirim {
      background-color: #000000;
      color: #ffffff;
      border: none;
    }

    .dark-mode .btn-kirim:hover {
      background-color: #222;
    }

    .dark-mode .btn-edit-putih {
      background-color: #ffffff;
      color: #000000;
    }

    .dark-mode .btn-edit-putih:hover {
      background-color: #e6e6e6;
    }

    .toggle-dark {
      cursor: pointer;
      margin-bottom: 20px;
    }

  </style>
</head>
<body>

  <div class="container todo-container">
    <div class="text-center mb-4">
      <h2>✏️ Edit Task</h2>
      <div class="toggle-dark" onclick="toggleDarkMode()">🌙 Toggle Dark Mode</div>
    </div>

    <div class="card p-4">
      <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="task-name" class="form-label">Nama Task</label>
          <input type="text" id="task-name" name="name" class="form-control" value="{{ $task->name }}" required>
        </div>

        <div class="d-flex justify-content-between">
          <a href="{{ route('tasks.index') }}" class="btn btn-edit-putih">Kembali</a>
          <button type="submit" class="btn btn-tambah">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    function toggleDarkMode() {
      document.body.classList.toggle('dark-mode');
    }
  </script>

</body>
</html>
