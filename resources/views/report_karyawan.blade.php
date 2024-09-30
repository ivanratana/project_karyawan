<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.css">
    {{-- <script src="assets/bootstrap-5.3.3-dist/js/bootstrap.js"></script> --}}
</head>
<body>
    
     <style type="text/css">
        @page{
            margin: 10px;
        }

        body{
            margin: 5px;
        }
    </style>

    <div style="padding: 15px;">
        <h5>Report Karyawan</h5>

    
     <table border="1" class="table table-sm table-striped">
         <tr>
             <th class="bg-primary text-white">ID</th>
             <th class="bg-primary text-white">Nama</th>
             <th class="bg-primary text-white">Alamat</th>
             <th class="bg-primary text-white">No. telp</th>
             <th class="bg-primary text-white">jabatan</th>
         </tr>
 
         @foreach ($karyawan as $k)
         <tr>
             <td>{{ $k->id }}</td>
             <td>{{ $k->nama }}</td>
             <td>{{ $k->alamat }}</td>
             <td>{{ $k->no_telp }}</td> 
             <td>{{ $k->jabatan }}</td>  
         </tr>       
         @endforeach
     </table>
     </div>
 
 </div>
</body>
</html>