<nav {{ $attributes }}>
    <ul class="flex space-x-2 text-dark-blue items-center text-xs">
        <li>
            <a href="/">Home</a>
        </li>

        @foreach ($links as $label => $link)
            <li>→</li>
            <li>
                <a href="{{ $link }}">{{ $label }}</a>
            </li>
        @endforeach
    </ul>
</nav>
