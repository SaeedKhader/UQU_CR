@props([
    'name',
    'value',
    'target',
    'clazz' => '',
    'withIcon' => false
])

<div class="{{ $clazz }}">
    <label class="relative">
        <input wire:model="{{ $target }}" value="{{ $value }}"
            x-on:input="selected_ids = {{ $value }}" 
            type="checkbox" class="absolute appearance-none">
        <div :class="{ 'border-gray-500': selected_ids == {{ $value }} }"
            class="shadow p-1 rounded-md border-2 border-gray-200 cursor-pointer {{ in_array($value,json_decode($name))
            ? 'border-teal-700' : '' }}">
            @if ($withIcon)
            <div class=" mr-auto w-4 h-4 flex justify-center items-center {{ in_array($value,json_decode($name))
            ? 'opacity-100' : 'opacity-0' }}">
                <i class="icon fa fa-check-circle text-teal-700 "></i>
            </div>
            @endif
            {{ $slot }}
        </div>
    </label>
</div>