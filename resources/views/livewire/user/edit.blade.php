@section('title', 'Edit User')

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Form Edit User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('user.index') }}">User</a></div>
                <div class="breadcrumb-item"><a href="#">Tambah User</a></div>
            </div>
        </div>
        <div class="card-wrap">
            <div>
                <form wire:submit.prevent="update">
                    <div class="form-group">
                        <input type="hidden" wire:model="userId">
                        <label for="name">Nama User</label>
                        <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama User">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Role">Role</label>
                        <select wire:model="role" class="form-control @error('role') is-invalid @enderror" id="">
                        <option value="" selected>Pilih Role</option>
                        <option value="superAdmin">Super Admin</option>
                        <option value="admin">Admin</option>
                        </select>
                        @error('Role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" wire:model="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Konfirmasi Password">
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>

            </div>
        </div>
    </div>
</div>



