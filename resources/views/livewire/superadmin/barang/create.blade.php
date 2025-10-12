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
                        <label for="nama_barang" class="form-label">Nama Barang</label><span class="text-danger">*</span>
                    </div>
                    <div class="col-8 mb-2">
                        <input wire:model="nama_barang" type="text" class="form-control" placeholder="Nama Barang">
                        @error('nama_barang')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-4 mb-2">
                        <label for="kategori_id" class="form-label">Kategori</label><span class="text-danger">*</span>
                    </div>
                    <div class="col-8 mb-2">
                        <select wire:model="kategori_id" class="form-control">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-4 mb-2">
                        <label for="harga" class="form-label">Harga</label><span class="text-danger">*</span>
                    </div>
                    <div class="col-8 mb-2">
                        <input wire:model="harga" type="number" class="form-control" placeholder="Harga">
                        @error('harga')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-4 mb-2">
                        <label for="satuan" class="form-label">Satuan</label><span class="text-danger">*</span>
                    </div>
                    <div class="col-8 mb-2">
                        <input wire:model="satuan" type="text" class="form-control" placeholder="Satuan">
                        @error('satuan')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-4 mb-2">
                        <label for="stok" class="form-label">Stok</label><span class="text-danger">*</span>
                    </div>
                    <div class="col-8 mb-2">
                        <input wire:model="stok" type="number" class="form-control" placeholder="Stok">
                        @error('stok')
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
