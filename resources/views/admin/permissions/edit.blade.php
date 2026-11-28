<x-layouts.backend.layout>
    <x-slot:header>
        <div class="row">
            <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Permissions</h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.permissions.index') }}">Permissions</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Permission</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot:header>

    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Edit Permission</div>
                </div>
                <form method="POST" action="{{ route('admin.permissions.update', $permission->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <x-inputs.select id="module_name" class="form-select" name="module_name" label="Module"
                            :value="old('module_name', $permission->module_name)" :options="[
                                '' => 'Select Permission',
                                'Dashboard' => 'Dashboard',
                                'Jobs' => 'Jobs',
                                'Permissions' => 'Permissions',
                                'Roles' => 'Roles',
                                'Users' => 'Users',
                            ]" />


                        <x-inputs.text id="name" type="text" name="name" label="Permission" :value="old('name', $permission->name)"
                            class="form-control" placeholder="Permission" />

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.backend.layout>
