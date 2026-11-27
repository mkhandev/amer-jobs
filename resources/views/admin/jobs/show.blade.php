<x-layouts.backend.layout>
    <x-slot:header>
        <div class="row">
            <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Jobs</h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.jobs.index') }}">Jobs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Job</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot:header>

    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered ">
                        <tr>
                            <th style="width: 100px;">Title</th>
                            <td> {{ $job->title }}</td>
                        </tr>

                        <tr>
                            <th>Description</th>
                            <td> {{ $job->description }}</td>
                        </tr>

                        <tr>
                            <th>Salary</th>
                            <td> {{ $job->salary }}</td>
                        </tr>

                        <tr>
                            <th>Requirements</th>
                            <td> {{ $job->requirements }}</td>
                        </tr>

                        <tr>
                            <th>benefits</th>
                            <td> {{ $job->benefits }}</td>
                        </tr>

                        <tr>
                            <th>Tags</th>
                            <td>
                                @if ($job->tags)
                                    {{ ucwords(str_replace(',', ', ', $job->tags)) }}
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Type</th>
                            <td> {{ $job->job_type }}</td>
                        </tr>

                        <tr>
                            <th>Remote</th>
                            <td>
                                {!! $job->remote
                                    ? '<span class="badge text-bg-primary">Remote</span>'
                                    : '<span class="badge text-bg-success">On-site</span>' !!}
                            </td>
                        </tr>

                        <tr>
                            <th>Address</th>
                            <td> {{ $job->address }}</td>
                        </tr>

                        <tr>
                            <th>City</th>
                            <td> {{ $job->city }}</td>
                        </tr>

                        <tr>
                            <th>State</th>
                            <td> {{ $job->state }}</td>
                        </tr>

                        <tr>
                            <th>Zipcode</th>
                            <td> {{ $job->zipcode }}</td>
                        </tr>

                    </table>
                </div>

                <div class="card-footer">
                    <a href="{{ route('admin.jobs.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>

</x-layouts.backend.layout>
