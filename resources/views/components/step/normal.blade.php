@props([
'stepNumber',
'stepTitle',
'target' => '',
'isCompleted' => '0'
])
<div id="step" class="flex">
    <div class="flex items-center flex-col relative">
        <div wire:dirty.class.remove="border-teal-700" wire:target="{{$target}}"
            class="rounded-full circle border-2 w-8 h-8 flex justify-center items-center text-lg duration-200 ease-in-out {{ $isCompleted == '1' ? 'border-teal-700' : 'border-gray-400 ' }}">
            {{ $stepNumber }}
        </div>
        <x-step.activityIndicator target="{{$target}}"/>
        <div class="flex-grow flex flex-col relative items-center" style="width: 3px;">
            <div class="bg-gray-400 flex-grow" style="width: 2px;"></div>
            <div class="pt-2" style="width: 3px;">
                <div class="w-full h-1 mb-1 bg-gray-400" style="height: 3px;"></div>
                <div class="w-full h-1 mb-1 bg-gray-400" style="height: 3px;"></div>
                <div class="w-full h-1 bg-gray-400" style="height: 3px;"></div>
            </div>
            <div wire:dirty.class.remove="h-full" wire:target="{{$target}}"
            class="absolute top-0 bg-teal-700 box-content duration-300 ease-in-out h-0 {{ $isCompleted == '1' ? 'h-full' : '' }}"
            style="width: 2px; border-left: solid 0.5px #fff; border-right: solid 0.5px #fff"></div>
        </div>
    </div>
    <div class="mb-6 mr-4 w-full">
        <H4 class="text-xl mb-3">{{ $stepTitle }}</H4>
        {{ $slot }}
    </div>
</div>