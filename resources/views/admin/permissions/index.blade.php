<x-layouts.backend.layout>
    <x-slot:header>
        <div class="row">
            <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Permission</h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Permission</li>
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
                        <h3 class="card-title">Permission Table</h3>
                        <a href="{{ route('admin.permissions.create') }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-plus-lg me-1" aria-hidden="true"></i>
                            Add Permission
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Module</th>
                                <th>Permission</th>
                                <th class="text-end" style="width: 100px;">Option</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($permissions as $per)
                                <tr class="align-middle">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $per->module_name }}</td>
                                    <td>{{ $per->name }}</td>

                                    <td class="text-end">
                                        @can('Permissions Edit')
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('admin.permissions.edit', $per->id) }}"
                                                    class="btn btn-outline-secondary" aria-label="Edit Job">
                                                    <i class="bi bi-pencil" aria-hidden="true"> </i>
                                                </a>
                                            </div>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No permission available</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    {{ $permissions->links() }}

                </div>
            </div>

        </div>

    </div>
</x-layouts.backend.layout>
