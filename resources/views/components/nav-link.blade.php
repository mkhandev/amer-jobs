@props(['url', 'active' => false, 'icon' => null, 'mobile' => false, 'block' => false])

@if ($mobile)
    <a href="{{ $url }}"
        class="block px-4 py-2 hover:bg-blue-700 {{ $active ? 'text-yellow-500 font-bold' : '' }}">
        @if ($icon)
            <i class="fa fa-{{ $icon }}" mr-1"></i>
        @endif
        {{ $slot }}
    </a>
@else
    <a href="{{ $url }}"
        class="py-2 text-white hover:underline {{ $active ? 'text-yellow-500 font-bold' : '' }}">

        @if ($icon)
            <i class="fa fa-{{ $icon }} mr-1"></i>
        @endif

        {{ $slot }}

    </a>
@endif
