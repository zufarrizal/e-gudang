<?php

namespace App\Livewire\Superadmin\User;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    use \Livewire\WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $search = '';
    public $name, $email, $password, $role, $password_confirmation, $user_id;

    public function render()
    {
        $data = array(
            'title' => 'Data User',
            'user' => User::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orderBy('role', 'ASC')->paginate($this->perPage),
        );
        return view('livewire.superadmin.user.index', $data);
    }

    public function create()
    {
        $this->resetValidation();
        $this->reset(['name']);
        $this->reset(['email']);
        $this->reset(['password']);
        $this->reset(['role']);
        $this->reset(['password_confirmation']);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|min:8|same:password',
            'role' => 'required|string|max:255',
        ],
        [
            'name.required' => 'Nama wajib diisi',
            'name.string' => 'Nama harus berupa string',
            'name.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'email.max' => 'Email maksimal 255 karakter',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sesuai',
            'password_confirmation.required' => 'Konfirmasi password wajib diisi',
            'password_confirmation.same' => 'Konfirmasi password harus sama dengan password',
            'password_confirmation.min' => 'Konfirmasi password minimal 8 karakter',
            'role.required' => 'Role wajib diisi',
            'role.string' => 'Role harus berupa string',
            'role.max' => 'Role maksimal 255 karakter',
        ]);
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = bcrypt($this->password);
        $user->role = $this->role;
        $user->save();
        $this->dispatch('closeCreateModal');
    }

    public function edit($id)
    {
        $this->resetValidation();
        $user = User::findOrFail($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->user_id = $user->id;
        $this->password = null;
        $this->password_confirmation = null;
    }
    public function update($id)
    {
        $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|min:8|same:password',
        ],
        [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'email.max' => 'Email maksimal 255 karakter',
            'email.unique' => 'Email sudah terdaftar',
            'role.required' => 'Role wajib diisi',
            'role.string' => 'Role harus berupa string',
            'role.max' => 'Role maksimal 255 karakter',
        ]);
        $user = User::findOrFail($id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->role = $this->role;
        if (filled($this->password)) {
            $user->password = bcrypt($this->password);
        }
        $user->save();
        $this->dispatch('closeEditModal');
    }

    public function delete($id)
    {
        $this->user_id = $id;
        $user = User::findOrFail($id);
        $this->name = $user->name;
    }
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        $this->dispatch('closeDeleteModal');
    }
}
