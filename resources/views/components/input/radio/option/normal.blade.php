<label class="{{ $clazz }} {{ $disabled ? 'cursor-not-allowed' : '' }}">
    <div class="w-5 h-5 md:mb-3 flex justify-center items-center bg-gray-100 border border-gray-400 rounded-full {{ $disabled ? 'opacity-0' : '' }}">
        <input wire:model="{{ $target }}" value="{{ $value }}"
        x-on:input="selected_id = {{ $value }}"
        wire:dirty.class.remove="checked:bg-teal-700" wire:target="{{ $target }}"
        type="radio" class="appearance-none w-3 h-3 checked:bg-teal-700 flex rounded-full" {{ $disabled ? 'disabled' : '' }}
        :class="{ 'bg-gray-500': selected_id == {{ $value }} }" style="padding: 3px;">
    </div>
    {{ $slot }}
</label>