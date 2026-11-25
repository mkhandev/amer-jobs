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
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Quick Example</div>
                </div>
                <form method="POST" action="{{ route('admin.jobs.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <x-inputs.text id="name" type="text" name="title" label="Job Title"
                            class="form-control" placeholder="Software Engineer" />

                        <x-inputs.text-area id="description" name="description" label="Description" class="form-control"
                            placeholder="We are seeking a skilled and motivated Software Developer..." />

                        <x-inputs.text id="salary" name="salary" label="Salary" type="number" class="form-control"
                            placeholder="90000" />

                        <x-inputs.text-area id="requirements" name="requirements" label="Requirements"
                            class="form-control" placeholder="Bachelor's degree in Computer Science" />

                        <x-inputs.text-area id="benefits" name="benefits" label="Benefits" class="form-control"
                            placeholder="Health insurance, 401k, paid time off" />


                        <x-inputs.text id="tags" name="tags" label="Tags (comma-separated)" class="form-control"
                            placeholder="development, coding, java, python" />




                        <x-inputs.select id="job_type" class="form-select" name="job_type" label="Job Type"
                            value="{{ old('job_type') }}" :options="[
                                'Full-Time' => 'Full-Time',
                                'Part-Time' => 'Part-Time',
                                'Contract' => 'Contract',
                                'Temporary' => 'Temporary',
                                'Internship' => 'Internship',
                                'Volunteer' => 'Volunteer',
                                'On-Call' => 'On-Call',
                            ]" />

                        <x-inputs.select id="remote" class="form-select" name="remote" label="Remote"
                            :options="[0 => 'No', 1 => 'Yes']" />

                        <x-inputs.text id="address" name="address" label="Address" placeholder="123 Main St"
                            class="form-control" />

                        <x-inputs.text id="city" name="city" label="City" placeholder="Albany"
                            class="form-control" />

                        <x-inputs.text id="state" name="state" label="State" placeholder="NY"
                            class="form-control" />

                        <x-inputs.text id="zipcode" name="zipcode" label="Zipcode" placeholder="02214"
                            class="form-control" />

                        <h5 class="text-center">Company Info</h5>
                        <hr class="my-4" />

                        <x-inputs.text id="company_name" name="company_name" label="Company Name" class="form-control"
                            placeholder="Enter Company Name" />

                        <x-inputs.text-area id="company_description" name="company_description" class="form-control"
                            label="Company Description" placeholder="Enter Company Description" />

                        <x-inputs.text id="company_website" name="company_website" label="Company Website"
                            class="form-control" type="url" placeholder="Enter Company Website" />

                        <x-inputs.text id="contact_phone" name="contact_phone" label="Contact Phone"
                            class="form-control" placeholder="Enter Contact Phone" />

                        <x-inputs.text id="contact_email" name="contact_email" label="Contact Email"
                            class="form-control" placeholder="Enter Contact Email" type="email" />

                        <x-inputs.file id="company_logo" class="form-control" name="company_logo"
                            label="Company Logo" />




                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.backend.layout>
