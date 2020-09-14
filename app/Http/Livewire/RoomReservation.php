<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RoomReservation extends Component
{
    // first step data
    public $classes = [
        [
            'id' => '1',
            'name' => 'تحليل عددي',
            'class' => '113',
            'type' => 'نظري'
        ],
        [
            'id' => '2',
            'name' => 'برمجة خطية',
            'class' => '223',
            'type' => 'عملي'
        ],
        [
            'id' => '3',
            'name' => 'تركيب المترجمات المتقدمة',
            'class' => '3',
            'type' => 'نظري'
        ],
    ];

    // varibiabls

    public $days = [];
    public $times = [];
    public $rooms = [];

    public $selected_class_id = '';
    public $step_one_completed = '0';

    public $selected_day = '';
    public $step_two_completed = '0';

    public $selected_time_id = '';
    public $step_three_completed = '0';

    public $selected_rooms_ids = [];
    public $step_four_completed = '0';



    // step one
    public function updatedSelectedclassId()
    {
        // sleep(1);

        // when success
        $this->step_one_completed = '1';
        $this->days = [
            ['day' => 11],
            ['day' => 12],
            ['day' => 13],
        ];
        $this->selected_day = '';
        $this->step_two_completed = '0';
    }

    public function updatedSelectedDay()
    {
        // sleep(1);

        // when success
        $this->step_two_completed = '1';
        $this->times = [
            ['id' => 1, 'time' => "10-8 ص", 'available' => 11],
            ['id' => 2, 'time' => "12-10 ص", 'available' => 8],
            ['id' => 3, 'time' => "3-1 م", 'available' => 5],
            ['id' => 4, 'time' => "6-4 م", 'available' => 0],
            ['id' => 5, 'time' => "8-6 م", 'available' => 7],
            ['id' => 6, 'time' => "10-8 م", 'available' => 3]
        ];
        $this->selected_time_id = '';
        $this->step_three_completed = '0';
    }

    // step three

    public function updatedSelectedTimeId()
    {
        // sleep(1);

        // when success
        $this->step_three_completed = '1';
        $this->rooms = [
            ['id' => 3847, 'number' => 113, 'building' => "ح", 'location' => "المقر"],
            ['id' => 1233, 'number' => 201, 'building' => "و", 'location' => "المقر"],
            ['id' => 7364, 'number' => 5, 'building' => "كلية الشريعة", 'location' => "المقر"]
        ];
        $this->selected_rooms_ids = [];
        $this->step_four_completed = '0';
    }

    // step four

    public function updatedSelectedRoomsIds()
    {
        // sleep(1);

        // when success
        if (!empty($this->selected_rooms_ids)) {
            $this->step_four_completed = '1';
        } else {
            $this->step_four_completed = '0';
        }
    }

    // confirmation step 

    public function confirm()
    {
        // sleep(1);
        // when success
        dd([
            'classId' => $this->selected_class_id, 
            'day' => $this->selected_day, 
            'timeID' => $this->selected_time_id, 
            'roomId' => $this->selected_rooms_ids]);
    }

    public function render()
    {
        return view('livewire.room-reservation', [
            'classs' => $this->classes,
        ]);
    }
}
