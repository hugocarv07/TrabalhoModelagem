@props(['icon', 'href'])

<a href="{{ $href }}" class="text-gray-300 hover:text-white transition-colors duration-200">
    <i class="fab fa-{{ $icon }} fa-lg"></i>
</a>