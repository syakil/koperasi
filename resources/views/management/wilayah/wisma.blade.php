<div class="modal fade" id="wismaModal" tabindex="-1" aria-labelledby="wismaModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="create-wisma">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Wilayah</label>
                        <select class="form-control" name="wilayahId" id="wilayahId">
                            <option value="" disabled selected>-Pilih Wilayah-</option>
                            @foreach ($area as $a)
                                <optgroup label="{{ $a->nama }}">
                                    @foreach ($a->wilayah as $w)
                                        <option value="{{ $w->id }}">{{ $w->nama }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Wisma</label>
                        <input type="text" class="form-control" id="wisma" name="wisma" placeholder="Kemang"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="submit-wisma">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
