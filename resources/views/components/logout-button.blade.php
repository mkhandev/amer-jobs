<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="text-white cursor-pointer hover:underline">
        <i class="fa fa-sign-out text-white"></i> Logout
    </button>
</form>
