<div class="flex gap-4 flex-wrap">
    @if ($allOption)
        <label for="{{ $name }}" class="mb-1 flex items-center text-xs">
            <input type="radio" name="{{ $name }}" value="" class="text-dark-blue cursor-pointer"
                @checked(!request($name)) />
            <span class="ml-1">All</span>
        </label>
    @endif

    @foreach ($optionsWithLabels as $label => $option)
        <label for="{{ $name }}" class="mb-1 flex items-center text-xs">
            <input type="radio" name="{{ $name }}" value="{{ $option }}"
                class="text-dark-blue cursor-pointer" @checked($option === ($value ?? request($name))) />
            <span class="ml-1">{{ $label }}</span>
        </label>
    @endforeach
</div>

@error($name)
    <div id="{{ $name }}-help" class="text-red-600 text-xs">{{ $message }}</div>
@enderror
