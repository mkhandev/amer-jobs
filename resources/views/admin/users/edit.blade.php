<x-layouts.backend.layout>
    <x-slot:header>
        <div class="row">
            <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Users</h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot:header>

    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Edit User</div>
                </div>
                <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <x-inputs.text id="name" type="text" name="name" label="Name" class="form-control"
                            placeholder="Name" :value="old('name', $user->name)" />

                        <x-inputs.text id="name" type="text" name="email" label="Email" class="form-control"
                            placeholder="Email" :value="old('email', $user->email)" />

                        <x-inputs.text id="name" type="password" name="password" label="Password"
                            class="form-control" placeholder="Password" />


                        <div class="mb-4">
                            <label for="roles" class="form-label">Roles</label>
                            @php
                                $selectedRoles = old('roles', $user->roles->pluck('name')->toArray());
                            @endphp
                            <select id="roles" class="form-control @error('roles') border-red-500 @enderror"
                                name="roles[]" aria-label="Multi-select with tags" multiple>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" @selected(in_array($role->name, $selectedRoles))>{{ $role->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('roles')
                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('roles.*')
                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tom-select@2.7.0/dist/css/tom-select.bootstrap5.min.css"
            integrity="sha384-dBBUUG/rOlQcpM3Jp7O/2wgpaufQnBX2k10r4kLhMxxrC0BSdQ3nPe96G5ug24R+" crossorigin="anonymous" />

        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.7.0/dist/js/tom-select.complete.min.js"
            integrity="sha384-6MTvOa3EHHoM7xZpNAMYb7CudHNfwio+DW1LFx1HBz6Udh5eW8hJjh4HKUsg7MoO" crossorigin="anonymous">
        </script>

        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', () => {
                new TomSelect('#roles', {
                    plugins: ['remove_button'],
                    create: true,
                    persist: false,
                });
            });
        </script>
    @endpush
</x-layouts.backend.layout>
