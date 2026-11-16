<header class="p-4 text-white bg-blue-900">
    <div class="container flex items-center justify-between mx-auto">
        <h1 class="text-3xl font-semibold">
            <a href="{{ url('/') }}">Workopia</a>
        </h1>
        <nav class="items-center hidden space-x-4 md:flex">
            <x-nav-link url="{{ url('/') }}" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link url="{{ url('/jobs') }}" :active="request()->is('jobs')">All Jobs</x-nav-link>
            <x-nav-link url="{{ url('/jobs') }}" :active="request()->is('jobs/saved')">Saved Jobs</x-nav-link>
            <x-nav-link url="{{ url('/jobs') }}" :active="request()->is('login')">Login</x-nav-link>
            <x-nav-link url="{{ url('/jobs') }}" :active="request()->is('register')">Register</x-nav-link>
            <x-nav-link url="{{ url('/jobs') }}" :active="request()->is('dashboard')" icon="gauge">Dashboard</x-nav-link>

            <x-button-link url="/jobs/create" icon="edit">Create Job</x-button-link>
        </nav>


        <button id="hamburger" class="text-white md:hidden flex items-center cursor-pointer">
            <i class="fa fa-bars text-2xl"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <nav id="mobile-menu" class="hidden md:hidden bg-blue-900 text-white mt-5 pb-4 space-y-2">
        <x-nav-link url="/jobs" :active="request()->is('jobs')" :mobile="true">All Jobs</x-nav-link>
        <x-nav-link url="/jobs" :active="request()->is('jobs')" :mobile="true">Saved Jobs</x-nav-link>
        <x-nav-link url="/jobs" :active="request()->is('jobs')" :mobile="true">Login</x-nav-link>
        <x-nav-link url="/jobs" :active="request()->is('jobs')" :mobile="true">Register</x-nav-link>
        <x-nav-link url="/jobs" :active="request()->is('jobs')" :mobile="true">Dashboard</x-nav-link>

        <x-button-link url="/jobs/create" icon="edit" :block="true">Create Job</x-button-link>

    </nav>
</header>
