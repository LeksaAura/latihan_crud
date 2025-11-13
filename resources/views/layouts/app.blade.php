<!DOCTYPE html>
<html>
<head>
  <title>Anaga Cafe</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      background-color: #1c1c1c;
      color: #eaeaea;
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .container {
      flex: 1;
    }

    /* Header title */
    h2.text-center {
      font-weight: 700;
      font-size: 2rem;
      letter-spacing: 1px;
      background: linear-gradient(90deg, #f1c40f, #b8860b, #f9e79f);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-shadow: 0 0 8px rgba(255, 215, 0, 0.5);
      animation: glow 3s infinite alternate;
    }

    @keyframes glow {
      from { text-shadow: 0 0 8px rgba(255, 215, 0, 0.5); }
      to { text-shadow: 0 0 15px rgba(255, 223, 100, 0.9); }
    }

    /* Alert box */
    .alert {
      border: 1px solid #d4af37;
      background-color: rgba(212, 175, 55, 0.1);
      color: #f1c40f;
      font-weight: 500;
    }

    /* Footer */
    footer {
      text-align: center;
      padding: 20px 0;
      font-size: 0.9rem;
      color: #b5b5b5;
      border-top: 1px solid rgba(255, 215, 0, 0.1);
      background: linear-gradient(180deg, #1c1c1c, #181818);
      margin-top: 50px;
      letter-spacing: 0.5px;
    }

    footer span {
      color: #f7d794;
      font-weight: 600;
    }

    footer small {
      font-size: 0.85rem;
      color: #888;
    }

    /* Glow line effect (divider) */
    .gold-divider {
      height: 2px;
      width: 120px;
      background: linear-gradient(90deg, transparent, #f1c40f, transparent);
      margin: 10px auto 25px;
      border-radius: 50%;
      box-shadow: 0 0 10px rgba(255, 215, 0, 0.4);
    }
  </style>
</head>

<body>
  <div class="container mt-4">
    <h2 class="text-center mb-1">☕ ANAGA CAFE MENU LIST</h2>
    <div class="gold-divider"></div>

    @if(session('success'))
    <div id="alertMessage" class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
    </div>
    <script>
      setTimeout(() => {
        const alertBox = document.getElementById('alertMessage');
        if (alertBox) {
          alertBox.classList.remove('show');
          alertBox.classList.add('fade');
          setTimeout(() => alertBox.remove(), 500);
        }
      }, 3000);
    </script>
    @endif

    @yield('content')
  </div>

  </footer>
</body>
</html>
