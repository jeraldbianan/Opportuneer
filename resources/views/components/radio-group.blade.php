<div class="flex gap-4">
    <label for="{{ $name }}" class="mb-1 flex items-center text-xs">
        <input type="radio" name="{{ $name }}" value="" class="text-dark-blue"
            @checked(!request($name)) />
        <span class="ml-1">All</span>
    </label>

    @foreach ($optionsWithLabels as $label => $option)
        <label for="{{ $name }}" class="mb-1 flex items-center text-xs">
            <input type="radio" name="{{ $name }}" value="{{ $option }}" class="text-dark-blue"
                @checked($option === request($name)) />
            <span class="ml-1">{{ $label }}</span>
        </label>
    @endforeach
</div>
