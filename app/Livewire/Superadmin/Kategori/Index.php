<?php

namespace App\Livewire\Superadmin\Kategori;

use App\Models\Kategori;
use Livewire\Component;

class Index extends Component
{
    use \Livewire\WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $search = '';
    public $nama_kategori, $kategori_id;

    public function render()
    {
        $data = array(
            'title' => 'Data Kategori',
            'kategori' => Kategori::where('nama_kategori', 'like', '%' . $this->search . '%')
                ->orderBy('nama_kategori', 'ASC')->paginate($this->perPage),
        );
        return view('livewire.superadmin.kategori.index', $data);
    }

    public function create()
    {
        $this->resetValidation();
        $this->reset(['nama_kategori']);
    }

    public function store()
    {
        $this->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoris,nama_kategori',
        ],
        [
            'nama_kategori.required' => 'Nama wajib diisi',
            'nama_kategori.string' => 'Nama harus berupa string',
            'nama_kategori.max' => 'Nama maksimal 255 karakter',
            'nama_kategori.unique' => 'Nama sudah terdaftar',
        ]);
        $kategori = new Kategori();
        $kategori->nama_kategori = $this->nama_kategori;
        $kategori->save();
        $this->dispatch('closeCreateModal');
    }

    public function edit($id)
    {
        $this->resetValidation();
        $kategori = Kategori::findOrFail($id);
        $this->nama_kategori = $kategori->nama_kategori;
        $this->kategori_id = $kategori->id;
    }  
    public function update($id)
    {
        $this->validate([
            'nama_kategori' => 'required|max:255|unique:kategoris,nama_kategori,'.$id,
        ],
        [
            'nama_kategori.required' => 'Nama wajib diisi',
            'nama_kategori.max' => 'Nama maksimal 255 karakter',
            'nama_kategori.unique' => 'Nama sudah terdaftar',
        ]);
        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $this->nama_kategori;
        $kategori->save();
        $this->dispatch('closeEditModal');
    }

    public function delete($id)
    {
        $this->kategori_id = $id;
        $kategori = Kategori::findOrFail($id);
        $this->nama_kategori = $kategori->nama_kategori;
    }
    public function destroy($id)
    {
        Kategori::findOrFail($id)->delete();
        $this->dispatch('closeDeleteModal');
    }
}
