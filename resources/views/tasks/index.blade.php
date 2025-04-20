<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>To-Do List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barrio&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
    body {
      background-color: #F0F1C5;
      font-family: "Funnel display", sans-serif;
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

    h2 {
      font-family: 'Barrio', cursive;
      font-size: 2.5rem;
    }

    .todo-container {
      max-width: 650px;
      margin: 50px auto;
    }

    .card {
      transition: transform 0.2s ease-in-out, box-shadow 0.2s ease;
    }

    .card:hover {
      transform: scale(1.01);
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .completed .task-name {
      text-decoration: line-through;
      color: #6c757d;
      transition: all 0.3s;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #86b7fe;
    }

    .btn-check-toggle {
      margin-right: 10px;
      transform: scale(1.3);
    }

    .material-icons.md-18 { font-size: 18px; }
    .material-icons.md-20 { font-size: 20px; }

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


  </style>
</head>
<body>

  <div class="container todo-container">
    <div class="text-center mb-4">
      <h2>📝 My To-Do List</h2>
      <div class="toggle-dark" onclick="toggleDarkMode()">🌙 Toggle Dark Mode</div>
    </div>

    {{-- Form tambah --}}
    <form action="{{ route('tasks.store') }}" method="POST" class="input-group mb-4">
      @csrf
      <input type="text" name="name" class="form-control" placeholder="Tambah task baru..." required>
      <button type="submit" class="btn btn-tambah">Tambah</button>
    </form>

    {{-- List tasks --}}
    @foreach ($tasks as $task)
      <div class="card mb-2 {{ $task->completed ? 'completed' : '' }}">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="me-2">
              @csrf
              @method('PUT')
              <input type="hidden" name="completed" value="{{ $task->completed ? 0 : 1 }}">
              <input type="checkbox" class="btn-check-toggle" onclick="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
            </form>
            <span class="task-name">{{ $task->name }}</span>
          </div>
          <div class="d-flex">
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-edit-putih me-1" title="Edit">
              <span class="material-icons md-18">edit</span>
            </a>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Hapus task ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-tambah" title="Hapus">
                <span class="material-icons md-18">close</span>
              </button>
            </form>
          </div>
        </div>
      </div>
    @endforeach

  </div>

  <script>
    function toggleDarkMode() {
      document.body.classList.toggle('dark-mode');
    }
  </script>

</body>
</html>
