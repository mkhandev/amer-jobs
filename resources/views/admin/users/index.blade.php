<x-layouts.backend.layout>
    <x-slot:header>
        <div class="row">
            <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Users</h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Role</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                        <h3 class="card-title">Users Table</h3>
                        <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-plus-lg me-1" aria-hidden="true"></i>
                            Add User
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th class="text-end" style="width: 100px;">Option</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($users as $user)
                                <tr class="align-middle">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        @foreach ($user->getRoleNames() as $role)
                                            <span class="badge text-bg-success">{{ $role }}</span>
                                        @endforeach
                                    </td>

                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                                class="btn btn-outline-secondary" aria-label="Edit Job">
                                                <i class="bi bi-pencil" aria-hidden="true"> </i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No user available</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    {{ $users->links() }}

                </div>
            </div>

        </div>

    </div>
</x-layouts.backend.layout>
