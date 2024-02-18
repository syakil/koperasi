<div class="modal fade" id="areaModal" tabindex="-1" aria-labelledby="areaModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Area</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="create-area">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Area</label>
                    <input type="text" class="form-control" id="area" name="area" placeholder="Jawa Barat" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="submit-area">Simpan</button>
            </div>
        </form>
      </div>
    </div>
</div>
