<div>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-user"></i> {{ $title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#"><i class="fas fa-home"></i> Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <i class="fas fa-user"></i> {{ $title }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <button wire:click="create" class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#createModal">
                            <i class="fas fa-plus"></i> Tambah User
                        </button>
                        <div class="btn-group dropleft">
                            <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fas fa-print"></i> Cetak
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-success" href="#"><i class="fas fa-file-excel"></i>
                                    Excel</a>
                                <a class="dropdown-item text-danger" href="#"><i class="fas fa-file-pdf"></i>
                                    PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <select wire:model.live="perPage" class="form-control form-control-sm w-auto">
                                <option>10</option>
                                <option>25</option>
                                <option>50</option>
                                <option>100</option>
                                <option>250</option>
                                <option>500</option>
                                <option>1000</option>
                            </select>
                        </div>
                        <div>
                            <input type="text" placeholder="Search..." wire:model.live="search"
                                class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped" id="example1">
                            <thead>
                                <tr class="text-center">
                                    <th width="5%">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th width="12%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->role }}</td>
                                        <td class="text-center">
                                            <button wire:click="edit({{ $item->id }})" class="btn btn-xs btn-info" data-toggle="modal"
                                                data-target="#editModal"><i class="fas fa-edit"></i></button>
                                            <button wire:click="delete({{ $item->id }})" class="btn btn-xs btn-danger" data-toggle="modal"
                                                data-target="#deleteModal"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $user->links() }}
                    </div>
                </div>
        </section>
        <div class="content-wrapper">
            <!-- Modal Create -->
            @include('livewire.superadmin.user.create')
            @script
            <script>
                $wire.on('closeCreateModal', () => {
                    $('#createModal').modal('hide');
                    Swal.fire({
                        icon: "success",
                        title: "User created successfully!",
                        showConfirmButton: false,
                        timer: 1000
                    });
                });
                </script>
            @endscript
            <!-- Modal Edit -->
            @include('livewire.superadmin.user.edit')
            @script
            <script>
                $wire.on('closeEditModal', () => {
                    $('#editModal').modal('hide');
                    Swal.fire({
                        icon: "success",
                        title: "User updated successfully!",
                        showConfirmButton: false,
                        timer: 1000
                    });
                });
            </script>
            @endscript
            <!-- Delete Modal -->
            @include('livewire.superadmin.user.delete')
            @script
            <script>
                $wire.on('closeDeleteModal', () => {
                    $('#deleteModal').modal('hide');
                    Swal.fire({
                        icon: "success",
                        title: "User deleted successfully!",
                        showConfirmButton: false,
                        timer: 1000
                    });
                });
            </script>
            @endscript
        </div>
    </div>
</div>
