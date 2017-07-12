<?php

use App\Models\Schedule;
use Illuminate\Database\Seeder;

class SchedulesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->tableHours();
    }

    public function tableHours(){
        $max = 30;
        $dt = DateTime::createFromFormat('H:i', '07:00');
        for($i = 0; $i < $max; $i++){
            $this->addHour($dt);
            $dt->add(new DateInterval('PT30M'));
        }
    }

    public function addHour($data){
        return Schedule::create([
            'hour' => $data
        ]);
    }
}
