<nav {{ $attributes }}>
    <ul class="flex space-x-2 text-dark-blue items-center text-xs">
        <li class="border-b border-b-transparent hover:border-b-dark-blue">
            <a href="/">Home</a>
        </li>

        @foreach ($links as $label => $link)
            <li>→</li>
            <li class="border-b border-b-transparent hover:border-b-dark-blue">
                <a href="{{ $link }}">{{ $label }}</a>
            </li>
        @endforeach
    </ul>
</nav>
