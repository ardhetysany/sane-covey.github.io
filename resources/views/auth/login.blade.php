<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - ToDo List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barrio&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #F0F1C5;
      font-family: "Funnel display", sans-serif;
    }

    h2 {
      font-family: 'Barrio', cursive;
    }

    .btn-tambah {
      background-color: #4E1F00;
      color: white;
      border: none;
    }

    .btn-tambah:hover {
      background-color: #3b1700;
    }

    .dark-mode {
      background-color: #4E1F00;
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

    .toggle-dark {
      cursor: pointer;
      margin-bottom: 20px;
    }

    .form-box {
      max-width: 400px;
      margin: 100px auto;
      padding: 30px;
      background-color: white;
      border-radius: 10px;
    }

    .dark-mode .form-box {
      background-color: #5a2a09;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="form-box shadow">
      <h2 class="text-center">🔐 Login</h2>
      <div class="text-center toggle-dark" onclick="toggleDarkMode()">🌙 Dark Mode</div>

      @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif

      <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <div class="mb-3">
          <label for="name">Nama</label>
          <input type="text" name="name" class="form-control" required placeholder="Nama pengguna">
        </div>
        <div class="mb-3">
          <label for="password">Kata Sandi</label>
          <input type="password" name="password" class="form-control" required placeholder="Kata sandi">
        </div>
        <button type="submit" class="btn btn-tambah w-100">Login</button>
      </form>

      <div class="text-center mt-3">
        Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
      </div>
    </div>
  </div>

  <script>
    function toggleDarkMode() {
      document.body.classList.toggle('dark-mode');
    }
  </script>

</body>
</html>
