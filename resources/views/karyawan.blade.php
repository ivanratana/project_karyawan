@extends('master')
@section('judul_halaman', $data['judul'])

@section('konten')

    <div class="container mt-5">
        <h1>Data Karyawan</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Jabatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            {{-- <tbody>
                @foreach($karyawans as $karyawan)
                    <tr>
                        <td>{{ $karyawan->id }}</td>
                        <td>{{ $karyawan->nama }}</td>
                        <td>{{ $karyawan->alamat }}</td>
                        <td>{{ $karyawan->no_telp }}</td>
                        <td>{{ $karyawan->jabatan->jabatan }}</td>
                    </tr>
                @endforeach
            </tbody> --}}
            @foreach ($data['karyawan'] as $k)
        <tr>
            <td>{{ $k->id }}</td>
            <td>{{ $k->nama }}</td>
            <td>{{ $k->alamat }}</td>
            <td>{{ $k->no_telp }}</td> 
            <td>{{ $k->jabatan }}</td>
            <td>
                <a href="edit_karyawan-{{ $k->id }}">Edit</a>
                <a href="hapus_karyawan-{{ $k->id }}">Hapus</a>
            </td>   
        </tr>       
        @endforeach
        </table>

        <h2>Tambah Karyawan</h2>
        <form action="tambah_karyawan" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" name="id" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="no_telp">No Telp</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" required>
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <select class="form-control" id="jabatan" name="jabatan_id" required>
                    @foreach($data['jabatan'] as $j)
                        <option value="{{ $j->jabatan_id }}">{{ $j->jabatan }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <div class="container">
        <div class="row justify-content-center">
        </div>
    </div>

    <div class="card p-4 m-4">
        <h5>IMPORT</h5>
        <button type="button" id="btn_export_template" class="btn btn-info btn-sm m-2" style="width: 150px;">Export Template</button>
        <form action="{{ url('upload_karyawan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 d-flex align-items-center">
                    <input type="file" name="file" id="file" class="form-control me-2" autocomplete="off" style="flex: 1;">
                    <button class="btn btn-success btn-sm" id="btn-import"><i class="fa fa-upload">Import Data</i></button>
                </div>
            </div>
        </form>
    </div>

    <div class="row card p-4 m-4">
        <h5>Export</h5>
        <button type="button" id="btn_export" class="btn btn-warning btn-sm" style="width: 150px;">Export Excel</button>
        <br>
        <button type="button" id="btn_export_pdf" class="btn btn-warning btn-sm" style="width: 150px;">Export PDF</button>
        <br>
        <button type="button" id="btn_export_csv" class="btn btn-warning btn-sm" style="width: 150px;">Export CSV</button>
    </div>

    <script type="text/javascript">
        $(function(){
            $.ajaxSetup({
                headers: {
                    'x-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                
            });
    
            // :: search data ::
            $('#btn_search').click(function(){
                var nama = $('#cari_data').val();
                // alert(nama);
                window.location.href = 'cari_karyawan-'+nama;
            });
    
            // :: refresh data ::
            $('#btn_refresh').click(function(){
                window.location.href = 'karyawan';
            });
            //download template
            $('#btn_export_template').click(function(){
                window.location.href = 'download_template';
            });
            //export file excel
            $('#btn_export').click(function(){
                window.location.href = 'export_file_excel';
            });
            //export file pdf
            $('#btn_export_pdf').click(function(){
                window.location.href = 'export_file_pdf';
            });
            //export file csv
            $('#btn_export_csv').click(function(){
                window.location.href = 'export_file_csv';
            });
    
        });
    
    </script>

@endsection