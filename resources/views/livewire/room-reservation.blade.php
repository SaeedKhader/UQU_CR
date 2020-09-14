<form wire:submit.prevent="confirm">

    {{-- Step One --}}
    @component('Components.step.normal',[
        'stepNumber' => '1',
        'stepTitle' => 'اختر المادة',
        'target' => 'confirm',
        'isCompleted' => $step_one_completed
    ]) 
        @component('Components.input.radio.group',[
            'name' => $selected_class_id ,
            'clazz' => 'md:flex',
            'error' => $errors->first('selected_class_id')
        ]) 
            @foreach ($classs as $class)
                @component('Components.input.radio.option.card', [
                    'name' => $selected_class_id,
                    'value' => $class['id'],
                    'target' => 'selected_class_id',
                    'clazz' => 'w-full md:w-1/3 '.($loop->last ? '' : 'mb-2 md:ml-2'),
                    'withIcon' => true
                ])
                    <div class="pb-2 px-2 md:p-2">
                        <p>{{ $class['name'] }}</p>
                        <div class="flex md:flex-col justify-between pt-2 md:pt-0">
                            <p class="text-gray-600 text-sm md:py-2">الشعبة: {{ $class['class'] }}</p>
                            <p class="text-gray-600 text-sm">{{ $class['type'] }}</p>
                        </div>
                    </div>
                @endcomponent
            @endforeach
        @endcomponent
    @endcomponent

    {{-- Step Two --}}
    <div wire:dirty.class="hidden" wire:target="selected_class_id" x-data="{'show': {{ $step_one_completed }} == 1 }" x-show="show">
        @component('Components.step.normal',[
            'stepNumber' => '2',
            'stepTitle' => 'اختر اليوم',
            'target' => 'selected_day',
            'isCompleted' => $step_two_completed
        ]) 
            {{-- change this --}}
            @component('Components.input.radio.group',[
                'name' => $selected_day ,
                'clazz' => 'flex',
                'error' => $errors->first('selected_day')
            ]) 
                @foreach ($days as $day)
                    @component('Components.input.radio.option.card', [
                        'name' => $selected_day,
                        'value' => $day['day'],
                        'target' => 'selected_day',
                        'clazz' => 'mx-1',
                        'withIcon' => false
                    ])
                        <p>{{ $day['day'] }}</p>
                    @endcomponent
                @endforeach
            @endcomponent
        @endcomponent
        
        {{-- Step Three --}}
        <div wire:dirty.class=" hidden" wire:target="selected_day" x-data="{'show': {{ $step_two_completed }} == 1 }" x-show="show">
            @component('Components.step.normal',[
                'stepNumber' => '3',
                'stepTitle' => 'اختر الوقت',
                'target' => 'selected_time_id',
                'isCompleted' => $step_three_completed
            ]) 
                @component('Components.input.radio.group',[
                    'name' => $selected_time_id ,
                    'clazz' => 'w-full px-4 py-1 md:py-4 shadow-sm border flex flex-col md:flex-row justify-around rounded items-start      md:items-center mb-1',
                    'error' => $errors->first('selected_time_id')
                ]) 
                    @foreach ($times as $time)
                        @component('Components.input.radio.option.normal', [
                            'name' => $selected_time_id,
                            'value' => $time['id'],
                            'target' => 'selected_time_id',
                            'clazz' => 'w-full flex flex-row md:flex-col items-center justify-start cursor-pointer py-2'.( $loop->last ? '' : 'border-b md:border-l md:border-b-0'),
                            'disabled' => $time['available'] < 1
                        ])
                            <p class="md:mb-3 mx-4 md:mx-0 w-20 text-right md:text-center {{ $time['available'] > 0 ? '' : 'opacity-50' }}">{{ $time['time'] }}</p>
                            <p class="text-sm mr-auto md:mr-0 {{ $time['available'] > 0 ? 'text-yellow-700 opacity-75' : 'opacity-25' }}">
                                {{ $time['available'] > 0 ? $time['available'].' قاعة ' : ' لا يوجد قاعة'}}
                            </p>
                        @endcomponent
                    @endforeach
                @endcomponent
            @endcomponent

            {{-- Step Four --}}
            <div wire:dirty.class="hidden" wire:target="selected_time_id" x-data="{'show': {{ $step_three_completed }} == 1 }" x-show="show">
                @component('Components.step.normal',[
                    'stepNumber' => '4',
                    'stepTitle' => 'اختر القاعة',
                    'target' => 'selected_rooms_ids',
                    'isCompleted' => $step_four_completed
                ]) 
                    @component('Components.input.checkbox.group',[
                        'name' => json_encode($selected_rooms_ids) ,
                        'clazz' => 'md:flex',
                        'error' => $errors->first('selected_rooms_ids')
                    ]) 
                        @foreach ($rooms as $room)
                            @component('Components.input.checkbox.option.card', [
                                'name' => json_encode($selected_rooms_ids),
                                'value' => $room['id'],
                                'target' => 'selected_rooms_ids',
                                'clazz' => 'w-full md:w-1/3 '.($loop->last ? '' : 'mb-2 md:ml-2'),
                                'withIcon' => true
                            ])
                                <div class=" pb-2 px-2 md:p-2">
                                    <p>{{ $room['number'] }}</p>
                                    <div class="flex md:flex-col justify-between pt-2 md:pt-0">
                                        <p class="text-sm md:py-2 text-gray-800">المبنى: {{ $room['building'] }}</p>
                                        <p class="text-sm text-gray-600">{{ $room['location'] }}</p>
                                    </div>
                                </div>
                            @endcomponent
                        @endforeach
                    @endcomponent
                @endcomponent

            {{-- Step Five --}}
            <div wire:dirty.class="hidden" wire:target="selected_rooms_ids"
                x-data="{'show': {{ $step_four_completed }} == 1 }" x-show="show">
                @component('Components.step.confirmation',[
                    'stepNumber' => '5',
                    'stepTitle' => 'أكد الحجز',
                    'buttonText' => 'تأكيد الحجز',
                    'target' => 'confirm',
                ]) @endcomponent
            </div>
        </div>
    </div>
</div>
</form>