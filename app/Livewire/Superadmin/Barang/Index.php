<?php

namespace App\Livewire\Superadmin\Barang;

use App\Models\Barang;
use App\Models\Kategori;
use Livewire\Component;

class Index extends Component
{
    use \Livewire\WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $search = '';
    public $barang_id, $nama_barang, $kategori_id, $harga, $satuan, $stok;

    public function render()
    {
        $data = array(
            'title' => 'Data Barang',
            'barang' => Barang::where('nama_barang', 'like', '%' . $this->search . '%')
                ->orderBy('nama_barang', 'ASC')->paginate($this->perPage),
            'kategori' => Kategori::orderBy('nama_kategori', 'ASC')->get(),
        );
        return view('livewire.superadmin.barang.index', $data);
    }

    public function create()
    {
        $this->resetValidation();
        $this->reset(['nama_barang', 'kategori_id', 'harga', 'satuan', 'stok']);
    }

    public function store()
    {
        $this->validate(
            [
                'nama_barang' => 'required|string|max:255|unique:barangs,nama_barang',
                'kategori_id' => 'required',
                'harga' => 'required|numeric|min:0',
                'satuan' => 'required|string|max:50',
                'stok' => 'required|integer|min:0',
            ],
            [
                'nama_barang.required' => 'Nama wajib diisi',
                'nama_barang.string' => 'Nama harus berupa string',
                'nama_barang.max' => 'Nama maksimal 255 karakter',
                'nama_barang.unique' => 'Nama sudah ada',
                'kategori_id.required' => 'Kategori wajib diisi',
                'harga.required' => 'Harga wajib diisi',
                'harga.numeric' => 'Harga harus berupa angka',
                'harga.min' => 'Harga minimal 0',
                'satuan.required' => 'Satuan wajib diisi',
                'satuan.string' => 'Satuan harus berupa string',
                'satuan.max' => 'Satuan maksimal 50 karakter',
                'stok.required' => 'Stok wajib diisi',
                'stok.integer' => 'Stok harus berupa angka',
                'stok.min' => 'Stok minimal 0',
            ]
        );
        $barang = new Barang();
        $barang->nama_barang = $this->nama_barang;
        $barang->kategori_id = $this->kategori_id;
        $barang->harga = $this->harga;
        $barang->satuan = $this->satuan;
        $barang->stok = $this->stok;
        $barang->save();
        $this->dispatch('closeCreateModal');
    }

    public function edit($id)
    {
        $this->resetValidation();
        $barang = Barang::findOrFail($id);
        $this->nama_barang = $barang->nama_barang;
        $this->kategori_id = $barang->kategori_id;
        $this->harga = $barang->harga;
        $this->satuan = $barang->satuan;
        $this->stok = $barang->stok;
        $this->barang_id = $id;
    }
    public function update($id)
    {
        $this->validate(
            [
                'nama_barang' => 'required|max:255|unique:barangs,nama_barang,' . $id,
                'kategori_id' => 'required',
                'harga' => 'required|numeric|min:0',
                'satuan' => 'required|string|max:50',
                'stok' => 'required|integer|min:0',

            ],
            [
                'nama_barang.required' => 'Nama wajib diisi',
                'nama_barang.max' => 'Nama maksimal 255 karakter',
                'nama_barang.unique' => 'Nama sudah ada',
                'kategori_id.required' => 'Kategori wajib diisi',
                'harga.required' => 'Harga wajib diisi',
                'harga.numeric' => 'Harga harus berupa angka',
                'harga.min' => 'Harga minimal 0',
                'satuan.required' => 'Satuan wajib diisi',
                'satuan.string' => 'Satuan harus berupa string',
                'satuan.max' => 'Satuan maksimal 50 karakter',
                'stok.required' => 'Stok wajib diisi',
                'stok.integer' => 'Stok harus berupa angka',
                'stok.min' => 'Stok minimal 0',
            ]
        );
        $barang = Barang::findOrFail($id);
        $barang->nama_barang = $this->nama_barang;
        $barang->kategori_id = $this->kategori_id;
        $barang->harga = $this->harga;
        $barang->satuan = $this->satuan;
        $barang->stok = $this->stok;
        $barang->save();
        $this->dispatch('closeEditModal');
    }

    public function delete($id)
    {
        $this->barang_id = $id;
        $barang = Barang::findOrFail($id);
        $this->nama_barang = $barang->nama_barang;
    }
    public function destroy($id)
    {
        Barang::findOrFail($id)->delete();
        $this->dispatch('closeDeleteModal');
    }
}
