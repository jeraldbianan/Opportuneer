<div
    {{ $attributes->class(['relative group flex items-center gap-2 max-w-[600px] w-full border border-white-coffee px-3 py-2 rounded focus-within:border-dark-blue']) }}>

    @if ($icon === 'search')
        <x-icons.search class="w-6 h-6" />
    @elseif($icon === 'location')
        <x-icons.location class="w-6 h-6" />
    @elseif ($icon === 'money')
        <x-icons.money class="w-6 h-6" />
    @elseif ($icon === 'user')
        <x-icons.user class="w-6 h-6" />
    @elseif ($icon === 'key')
        <x-icons.key class="w-6 h-6" />
    @endif

    <input x-ref="input-{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}"
        name="{{ $name }}" id="{{ $name }}" value="{{ $value }}"
        class="outline-none border-none text-xs w-full p-0 pr-8 focus:ring-0 bg-transparent" />


    @if ($formRef === 'filters')
        <button
            @click="$refs['input-{{ $name }}'].value = '';
                    $refs['{{ $formRef }}'].submit();"
            type="button" class="absolute top-0 right-0 flex h-full items-center p-2">
            <x-icons.close
                class="w-6 h-6 text-light-blue hover:scale-105 hover:bg-white-coffee rounded-full p-1 active:text-white transition-all" />
        </button>
    @endif

    @if ($formRef === 'home-filters' || $formRef === 'login-filters' || $formRef === 'job-application-filters')
        <button @click.prevent="$refs['input-{{ $name }}'].value = ''" type="button"
            class="absolute top-0 right-0 flex h-full items-center p-2">
            <x-icons.close
                class="w-6 h-6 text-light-blue hover:scale-105 hover:bg-white-coffee rounded-full p-1 active:text-white transition-all" />
        </button>
    @endif
</div>
