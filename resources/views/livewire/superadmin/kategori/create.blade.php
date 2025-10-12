<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4 mb-2">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label><span class="text-danger">*</span>
                    </div>
                    <div class="col-8 mb-2">
                        <input wire:model="nama_kategori" type="text" class="form-control" placeholder="Nama Kategori">
                        @error('nama_kategori')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i
                            class="fas fa-times"></i> Close</button>
                    <button wire:click="store" type="button" class="btn btn-sm btn-primary"><i class="fas fa-save"></i>
                        Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
