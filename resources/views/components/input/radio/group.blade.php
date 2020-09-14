<div x-data="{ 'selected_id': '{{ $name }}' }">
    <div class="{{ $clazz }}">
    {{ $slot }}
    </div>
    @if ($error)
        <p class="pr-2 text-red-600 mt-2">{{ $error }}</p>
    @endif
</div>