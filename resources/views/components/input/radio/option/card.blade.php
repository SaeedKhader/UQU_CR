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
            x-on:input="selected_id = {{ $value }}" type="radio" class="absolute appearance-none">
        <div wire:dirty.class.remove="border-teal-700" wire:target="{{ $target }}"
            :class="{ 'border-gray-500': selected_id == {{ $value }} }"
            class="shadow p-1 rounded-md border-2 border-gray-200 cursor-pointer {{ $value == $name ? 'border-teal-700' : '' }}">
            @if ($withIcon)
            <div class=" mr-auto w-4 h-4 flex justify-center items-center {{ $value == $name ? 'opacity-100' : 'opacity-0' }}">
                <i wire:dirty.class="opacity-0" wire:target="{{ $target }}" class="icon fa fa-check-circle text-teal-700 "></i>
            </div>
            @endif
            {{ $slot }}
        </div>
    </label>
</div>