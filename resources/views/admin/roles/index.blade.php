<x-layouts.backend.layout>
    <x-slot:header>
        <div class="row">
            <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Roles</h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Roles</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot:header>

    <div class="row">
        <!--begin::Col-->
        <div class="col-lg-12 col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Roles Table</h3>
                        @can('Roles Add')
                            <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-primary">
                                <i class="bi bi-plus-lg me-1" aria-hidden="true"></i>
                                Add Roles
                            </a>
                        @endcan
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Permission</th>
                                <th class="text-end" style="width: 100px;">Option</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($roles as $role)
                                <tr class="align-middle">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach ($role->permissions->pluck('name') as $per)
                                            <span class="badge text-bg-success">{{ $per }}</span>
                                        @endforeach
                                    </td>

                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm">
                                            @can('Roles Edit')
                                                <a href="{{ route('admin.roles.edit', $role->id) }}"
                                                    class="btn btn-outline-secondary" aria-label="Edit Job">
                                                    <i class="bi bi-pencil" aria-hidden="true"> </i>
                                                </a>
                                            @endcan

                                            @can('Roles Delete')
                                                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                                    class="d-inline btn btn-outline-danger"
                                                    onsubmit="return confirm('Are you sure?')">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No roles available</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    {{ $roles->links() }}

                </div>
            </div>

        </div>

    </div>
</x-layouts.backend.layout>
