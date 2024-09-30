<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    {{-- bootstrap --}}
    <link rel="stylesheet" href="assets/bootstrap-5.3.3-dist/css/bootstrap.css">
    <script src="assets/bootstrap-5.3.3-dist/js/bootstrap.js"></script>

    {{-- data tables --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="assets/DataTables/datatables.min.css" rel="stylesheet">
    <script src="assets/DataTables/datatables.min.js"></script>    

    {{-- csrf --}}
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    {{-- data table --}}
    {{-- <script src="assets/js/jquery-3.7.1.js"></script> --}}
    {{-- <script src="assets/js/dataTables.js"></script> --}}
    <script src="//cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css">
    {{-- <link rel="stylesheet" href="assets/css/dataTables.dataTables.css"> --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <header>
       
        {{-- <h2>PT ....</h2> --}}
        {{-- <nav>
            <a href="home">HOME</a>
            <a href="about">ABOUT</a>
            <a href="contact">CONTACT</a>
            <a href="karyawan">KARYAWAN</a>
            <a href="datatables">DATA TABLE</a>
            <a href="coba_get_data">COBA GET DATA</a>
        </nav> --}}

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-flex">
                <a class="navbar-brand" href="karyawan">
                    <img src="image/Logo_Master_nobg.png" alt="IR" width="70" height="70">
                  </a>
              </div>
            <div class="container-fluid">
                <a class="navbar-brand" href="karyawan">Karyawan</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
            <div class="container-fluid">
                <a class="navbar-brand" href="datatables">Data Table</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
        </nav>
    </header>
    <br>
    <br>
    <br>

    <h3> @yield('judul_halaman') </h3>

    {{-- yield merupakan parameter dari laravel --}}
    @yield('konten')
    <br>
    <br>
    <br>
    <footer>
        {{-- <p>&copy: <a href="">www.belajar_aja.com</a>. 2018 - 2019</p> --}}
        <p>&copy: Ivan</p>
    </footer>
    
</body>
</html>