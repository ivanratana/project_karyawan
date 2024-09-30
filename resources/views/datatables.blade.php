@extends('master')
@section('judul_halaman', $data['judul'])

@section('konten')
@if (\Session::has('success'))
<script>
    $(document).ready(function(){
        $('#info-alert-success').show();
        window.setTimeout(function() {
            $(".alert").fadeTo(250, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 1500);
    });
</script>
<div class="alert alert-success alert-dismissible fade show" role="alert" id="info-alert-success">
    <i class="fa fa-thumbs-up me-2" style="padding-left:10px;"></i> {{ \Session::get('success') }}
</div>
@endif

@if (\Session::has('error'))
<script>
    $(document).ready(function(){
        $('#info-alert-error').show();
        window.setTimeout(function(){
            $(".alert").fadeTo(250, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 1500);
    });
</script>
<div class="alert alert-danger alert-dismissible fade show" role="alert" id="info-alert-error">
    <i class="fa fa-exclamation-circle me-2" style="padding-left: 10px;"></i> {{ \Session::get('error') }}
</div>
    
@endif

<div class="card m-2 p-2">
    {{ $data['content'] }}
</div>

<div class="card m-2 p-2">
    <table id="dataTable" class="display" style="width: 100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. telp</th>
                <th>Jabatan</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
        </thead>
    </table>
</div>


<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        

    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax:{
            url: "{{ route('data') }}",
            type: 'POST',
            data: function(d){
                d._token = "{{ csrf_token() }}"
            }
        },
        columns: [{
            data: 'id',
            name: 'id'
        },
        {
            data: 'nama',
            name: 'nama'
        },
        {
            data: 'alamat',
            name: 'alamat'
        },
        {
            data: 'no_telp',
            name: 'no_telp'
        },
        {
            data: 'jabatan',
            name: 'jabatan'
        },
        {
            data: 'edit',
            name: 'edit',
            orderable: false,
            searchable: false
        },
        {
            data: 'delete',
            name: 'delete',
            orderable: false,
            searchable: false
        }
            
        ]  
    });

    //edit data
    $('#dataTable').on('click', '.btn-edit', function(){
        $('#editModal').modal('show');
        $('#id').val($(this).data('id'));
        $('#nama').val($(this).data('nama'));
        $('#alamat').val($(this).data('alamat'));
        $('#no_telp').val($(this).data('no_telp'));
    });

    

    $('#editForm').submit(function(e) {
        Swal.fire({
            title: 'kamu yakin mau edit?',
            html: '<center>' + $(this).data('id') + '</center>',
            customClass:{
                popup: 'format-pre'
            },
            icon: 'warning',
            showCancelButton: true,
        }).then((result)=> 
        {
            if(result.value){
                $.ajax({
                data: $(this).serialize(),
                type: "POST",
                dataType: 'json',
                url: "{{ url('update_datatables') }}",
                cache: false,
                success: function(data){
                    console.log('success:', data.success);
                    $('#dataTable').DataTable().draw('page');
                    // alert('Data berhasil dihapus.');
                    Swal.fire('Deleted !', 'Data berhasil diedit.', 'success')
                },
                error: function(data){
                    console.log('Error:', data.error);
                    // alert('Data gagal dihapus.')
                    Swal.fire('Failed !', 'Data gagal diedit', 'warning')
                }
                });
            }
        })
   
  });

    //delete data
    $('#dataTable').on('click', '.btn-delete', function(){
        Swal.fire({
            title: 'kamu yakin mau apus?',
            html: '<center>' + $(this).data('id') + '</center>',
            customClass:{
                popup: 'format-pre'
            },
            icon: 'warning',
            showCancelButton: true,
        }).then((result)=> 
        {
            if(result.value){
                $.ajax({
                data: {
                    id: $(this).data('id')
                },
                type: "POST",
                dataType: 'json',
                url: "{{ url('delete_datatables') }}",
                cache: false,
                success: function(data){
                    console.log('success:', data.success);
                    $('#dataTable').DataTable().draw('page');
                    // alert('Data berhasil dihapus.');
                    Swal.fire('Deleted !', 'Data berhasil dihapus.', 'success')
                },
                error: function(data){
                    console.log('Error:', data.error);
                    // alert('Data gagal dihapus.')
                    Swal.fire('Failed !', 'Data gagal dihapus', 'warning')
                }
                });
            }
        })
        
    });
});

</script>

@include('modal.modal_karyawan')

@endsection