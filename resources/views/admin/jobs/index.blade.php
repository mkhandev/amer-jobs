<x-layouts.backend.layout>
    <x-slot:header>
        <div class="row">
            <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Jobs</h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Jobs</li>
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
                        <h3 class="card-title">Jobs Table</h3>
                        <a href="{{ route('admin.jobs.create') }}" class="btn btn-sm btn-primary">Add Job</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th class="text-center">Remote</th>
                                <th>Address</th>
                                <th style="width: 40px" class="text-center">Applicant</th>
                                <th class="text-center" style="width: 150px;">Option</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($jobs as $job)
                                <tr class="align-middle">
                                    <td>{{ $job->id }}</td>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->job_type }}</td>
                                    <td class="text-center">
                                        {!! $job->remote
                                            ? '<span class="badge text-bg-primary">Remote</span>'
                                            : '<span class="badge text-bg-success">On-site</span>' !!}
                                    </td>
                                    <td>{{ $job->address }}</td>
                                    <td class="text-center">
                                        <span class="badge text-bg-info">
                                            {{ $job->applicants_count }}
                                        </span>
                                    </td>

                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.jobs.show', $job->id) }}"
                                                class="btn btn-outline-secondary" aria-label="View Job">
                                                <i class="bi bi-eye" aria-hidden="true"> </i>
                                            </a>

                                            <a href="{{ route('admin.jobs.edit', $job->id) }}"
                                                class="btn btn-outline-secondary" aria-label="Edit Job">
                                                <i class="bi bi-pencil" aria-hidden="true"> </i>
                                            </a>

                                            <form action="{{ route('admin.jobs.destroy', $job) }}" method="POST"
                                                class="d-inline btn btn-outline-danger"
                                                onsubmit="return confirm('Are you sure?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="border-0 bg-transparent">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>


                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No jobs available</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    {{ $jobs->links() }}
                    {{-- <ul class="pagination pagination-sm m-0 float-end">
                        <li class="page-item">
                            <a class="page-link" href="#">&laquo;</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">&raquo;</a>
                        </li>
                    </ul> --}}
                </div>
            </div>

        </div>

    </div>
</x-layouts.backend.layout>
