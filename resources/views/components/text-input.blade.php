<div
    {{ $attributes->class(['relative group flex items-center gap-2 max-w-[600px] w-full border border-white-coffee px-3 py-2 rounded focus-within:border-dark-blue']) }}>

    @if ('textarea' !== $type)
        @if ($icon === 'search')
            <x-icons.search class="w-6 h-6" aria-label="Search" />
        @elseif($icon === 'location')
            <x-icons.location class="w-6 h-6" aria-label="Location" />
        @elseif ($icon === 'money')
            <x-icons.money class="w-6 h-6" aria-label="Salary" />
        @elseif ($icon === 'user')
            <x-icons.user class="w-6 h-6" aria-label="User" />
        @elseif ($icon === 'key')
            <x-icons.key class="w-6 h-6" aria-label="Password" />
        @elseif ($icon === 'folder')
            <x-icons.folder class="w-6 h-6" aria-label="File" />
        @endif

        <input x-ref="input-{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}"
            name="{{ $name }}" id="{{ $name }}" value="{{ $value }}"
            class="outline-none border-none text-xs w-full p-0 pr-8 focus:ring-0 bg-transparent"
            aria-describedby="{{ $name }}-help" />

        @if ($formRef === 'filters')
            <button
                @click="$refs['input-{{ $name }}'].value = '';
                $refs['{{ $formRef }}'].submit();"
                type="button" class="absolute top-0 right-0 flex h-full items-center p-2"
                aria-label="Clear Input Button">
                <x-icons.close
                    class="w-6 h-6 text-light-blue hover:scale-105 hover:bg-white-coffee rounded-full p-1 active:text-white transition-all" />
            </button>
        @endif

        @if (
            $formRef === 'home-filters' ||
                $formRef === 'login-filters' ||
                $formRef === 'job-application-filters' ||
                $formRef === 'create-employer-filters')
            <button @click.prevent="$refs['input-{{ $name }}'].value = ''" type="button"
                class="absolute top-0 right-0 flex h-full items-center p-2" aria-label="Clear Input Button">
                <x-icons.close
                    class="w-6 h-6 text-light-blue hover:scale-105 hover:bg-white-coffee rounded-full p-1 active:text-white transition-all" />
            </button>
        @endif
    @else
        <textarea id="{{ $name }}" name="{{ $name }}" cols="{{ $cols }}" rows="{{ $row }}"
            class="outline-none border-none text-xs w-full p-0 pr-8 focus:ring-0 bg-transparent">{{ old($name, $value) }}</textarea>
    @endif
</div>

@error($name)
    <div id="{{ $name }}-help" class="text-red-600 text-xs">{{ $message }}</div>
@enderror
