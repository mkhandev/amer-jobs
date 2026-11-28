<x-layouts.backend.layout>
    <x-slot:header>
        <div class="row">
            <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Roles</h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.permissions.index') }}">Roles</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot:header>

    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Add Role</div>
                </div>
                <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <x-inputs.text id="name" type="text" name="name" label="Role" class="form-control"
                            placeholder="Role" :value="old('name', $role->name)" />

                        <h5 class="text-center">Permission</h5>
                        <hr class="my-4">

                        @error('permission')
                            <div class="text-danger mb-2">
                                <p>{{ $message }}</p>
                            </div>
                        @enderror

                        <div class="row">
                            @foreach ($rolePermission as $key => $permission)
                                <div class="col-md-3">
                                    <div class="card mb-2">
                                        <div class="card-header">
                                            {{ $key }}
                                        </div>

                                        <div class="card-body">
                                            @foreach ($permission as $item)
                                                <div class="form-check mb-1">
                                                    <input class="form-check-input" type="checkbox" name="permission[]"
                                                        value="{{ $item->name }}"
                                                        id="check-default_{{ $item->id }}"
                                                        {{ in_array($item->name, old('permission', $role->permissions->pluck('name')->toArray())) ? 'checked' : '' }} />
                                                    <label class="form-check-label"
                                                        for="check-default_{{ $item->id }}">{{ $item->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.backend.layout>
