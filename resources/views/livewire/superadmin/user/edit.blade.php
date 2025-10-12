<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4 mb-2">
                        <label for="name" class="form-label">Name</label><span class="text-danger">*</span>
                    </div>
                    <div class="col-8 mb-2">
                        <input wire:model="name" type="text" class="form-control" placeholder="Full Name">
                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-4 mb-2">
                        <label for="email" class="form-label">Email</label><span class="text-danger">*</span>
                    </div>
                    <div class="col-8 mb-2">
                        <input wire:model="email" type="email" class="form-control" placeholder="Email">
                        @error('email')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-4 mb-2">
                        <label for="password" class="form-label">Password</label><span class="text-danger">*</span>
                    </div>
                    <div class="col-8 mb-2">
                        <input wire:model="password" type="password" class="form-control" placeholder="Password">
                        @error('password')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="password_confirmation" class="form-label">Confirm Password</label><span class="text-danger">*</span>
                    </div>
                    <div class="col-8 mb-2">
                        <input wire:model="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
                        @error('password_confirmation')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-4 mb-2">
                        <label for="role" class="form-label">Role</label><span class="text-danger">*</span>
                    </div>
                    <div class="col-8 mb-2">
                        <select wire:model="role" class="form-control">
                            <option value="">-- Select Role --</option>
                            <option value="Super Admin">Super Admin</option>
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                        </select>
                        @error('role')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i
                            class="fas fa-times"></i> Close</button>
                    <button wire:click="update({{ $user_id }})" type="button" class="btn btn-sm btn-success"><i class="fas fa-save"></i>
                        Update</button>
                </div>
            </div>
        </div>
    </div>
</div>
