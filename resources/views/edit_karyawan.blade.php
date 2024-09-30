@extends('master')
@section('judul_halaman', $data['judul'])

@section('konten')

<div class="p-4">
   <p>{{ $data ['content']}}</p> 
    <h5>edit karyawan</h5>
    @foreach ($data['karyawan'] as $k)
    <form action="update_karyawan" method="post">
        {{ csrf_field() }}
        ID : <input type="text" name="id" value="{{ $k->id }}"> <br>
        Nama: <input type="text" name="nama" value="{{ $k->nama }}" required="required"> <br>
        Alamat: <textarea name="alamat" required="required" autocomplete="off">{{ $k->alamat }}</textarea><br>
        No. Telp: <textarea name="no_telp" required="required" autocomplete="off">{{ $k->no_telp }}</textarea> <br>
        <label for="jabatan">Jabatan:</label>
        <select id="jabatan" name="jabatan_id" required>
            @foreach($data['jabatan'] as $j)
               @if($j->jabatan_id == $k->jabatan_id)
               <option value="{{ $j->jabatan_id }} " selected>{{ $j->jabatan }}</option>
                @else
               {{-- yang dikirim idnya dan yang tampil adalah jabatan --}}
                <option value="{{ $j->jabatan_id }} ">{{ $j->jabatan }}</option>
                @endif
            @endforeach
        </select><br>
        <input type="submit" value="simpan Data" class="btn btn-primary">
    </form>
    @endforeach
    
</div>

@endsection