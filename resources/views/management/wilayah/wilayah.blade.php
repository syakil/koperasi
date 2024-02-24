<div class="modal fade" id="wilayahModal" tabindex="-1" aria-labelledby="wilayahModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Area</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="create-wilayah">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Area</label>
                    <select class="form-control" name="areaId" id="areaId">
                        <option value="" disabled selected>-Pilih Area-</option>
                        @foreach($area as $list)
                        <option value="{{$list->id}}">{{$list->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Wilayah</label>
                    <input type="text" class="form-control" id="wilayah" name="wilayah" placeholder="Bogor" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="submit-wilayah">Simpan</button>
            </div>
        </form>
      </div>
    </div>
</div>
