@props([
'stepNumber',
'stepTitle',
'buttonText' => '',
'target' => '',
])
<div id="step" class="flex">
    <div class="flex items-center flex-col relative">
        <div
            class="rounded-full circle border-2 w-8 h-8 flex justify-center items-center text-lg duration-200 ease-in-out border-teal-700">
            {{ $stepNumber }}
        </div>
    </div>
    <div class="mb-6 mr-4 w-full overflow-x-hidden">
        <H4 class="text-xl mb-3">{{ $stepTitle }}</H4>
        <div class="w-full flex justify-center items-center">
            <button class="flex justify-center items-center bg-teal-800 hover:bg-teal-700 px-10 py-2 rounded text-white">
                <span class="mr-5 px-1">{{ $buttonText }}</span>
                <div class="h-6 w-6 flex justify-center items-center">
                    <svg wire:loading wire:target="{{ $target }}" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </button>
        <div>
        <p class=" errorEl pr-2 text-red-600 my-3 opacity-0">خطأ</p>
        </div>
    </div>
</div>