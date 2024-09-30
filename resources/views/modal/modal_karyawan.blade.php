<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('update_datatables') }}" method="post" id="editForm">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp">
                    </div>
                    <div class="mb-3">
                        <label for="jabatan_id" class="form-label">Jabatan</label>
                        <select name="jabatan_id" id="jabatan_id" class="form-select">
                            {{-- @if($j->jabatan_id == $k->jabatan_id)
                                <option value="{{ $j->jabatan_id }} " selected>{{ $j->jabatan }}</option>
                                @else
                                <option value="{{ $j->jabatan_id }} ">{{ $j->jabatan }}</option> --}}
                            <option value="1">Finance</option>
                            <option value="2">IT</option>
                            <option value="3">Accounting</option>
                            <option value="4">Teknisi</option>
                            {{-- @endif5 --}}
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" id="saveBtn">Save Change</button>
                </form>
            </div>
        </div>
    </div>
</div>