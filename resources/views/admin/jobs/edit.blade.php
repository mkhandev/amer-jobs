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
                        <li class="breadcrumb-item active" aria-current="page">Edit Job</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot:header>

    <div class="row">
        <div class="col-lg-12 col-12">
            <form method="POST" action="{{ route('admin.jobs.update', $job->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <x-inputs.text id="title" name="title" label="Job Title" placeholder="Software Engineer"
                        class="form-control" :value="$job->title" />

                    <x-inputs.text-area id="description" name="description" label="Description" class="form-control"
                        placeholder="We are seeking a skilled and motivated Software Developer..." :value="old('description', $job->description)" />

                    <x-inputs.text id="salary" name="salary" label="Salary" type="number" placeholder="90000"
                        class="form-control" :value="old('salary', $job->salary)" />

                    <x-inputs.text-area id="requirements" name="requirements" label="Requirements" class="form-control"
                        placeholder="Bachelor's degree in Computer Science" :value="old('requirements', $job->requirements)" />

                    <x-inputs.text-area id="benefits" name="benefits" label="Benefits" class="form-control"
                        placeholder="Health insurance, 401k, paid time off" :value="old('benefits', $job->benefits)" />


                    <x-inputs.text id="tags" name="tags" label="Tags (comma-separated)" class="form-control"
                        placeholder="development, coding, java, python" :value="old('tags', $job->tags)" />

                    <x-inputs.select id="job_type" name="job_type" label="Job Type" class="form-select"
                        :value="old('job_type', $job->job_type)" :options="[
                            'Full-Time' => 'Full-Time',
                            'Part-Time' => 'Part-Time',
                            'Contract' => 'Contract',
                            'Temporary' => 'Temporary',
                            'Internship' => 'Internship',
                            'Volunteer' => 'Volunteer',
                            'On-Call' => 'On-Call',
                        ]" />

                    <x-inputs.select id="remote" name="remote" label="Remote" class="form-select" :options="[0 => 'No', 1 => 'Yes']"
                        :value="old('remote', $job->remote)" />

                    <x-inputs.text id="address" name="address" label="Address" placeholder="123 Main St"
                        class="form-control" :value="old('address', $job->address)" />

                    <x-inputs.text id="city" name="city" label="City" placeholder="Albany"
                        class="form-control" :value="old('city', $job->city)" />

                    <x-inputs.text id="state" name="state" label="State" placeholder="NY" class="form-control"
                        :value="old('state', $job->state)" />

                    <x-inputs.text id="zipcode" name="zipcode" label="Zipcode" placeholder="02214"
                        class="form-control" :value="old('zipcode', $job->zipcode)" />

                    <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                        Company Info
                    </h2>

                    <x-inputs.text id="company_name" name="company_name" label="Company Name" class="form-control"
                        placeholder="Enter Company Name" :value="old('company_name', $job->company_name)" />

                    <x-inputs.text-area id="company_description" name="company_description" label="Company Description"
                        class="form-control" placeholder="Enter Company Description" :value="old('company_description', $job->company_description)" />

                    <x-inputs.text id="company_website" name="company_website" label="Company Website" type="url"
                        class="form-control" placeholder="Enter Company Website" :value="old('company_website', $job->company_website)" />

                    <x-inputs.text id="contact_phone" name="contact_phone" label="Contact Phone" class="form-control"
                        placeholder="Enter Contact Phone" :value="old('contact_phone', $job->contact_phone)" />

                    <x-inputs.text id="contact_email" name="contact_email" label="Contact Email" class="form-control"
                        placeholder="Enter Contact Email" type="email" :value="old('contact_email', $job->contact_email)" />

                    <x-inputs.file id="company_logo" class="form-control" name="company_logo"
                        label="Company Logo" />
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.backend.layout>
