<?php

namespace Database\Seeders;

use App\Models\loaiTB as ModelsLoaiTB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class loaiTB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $loai = [
            ['tenTB'=> 'Máy chạy bộ (Treadmill)'],
            ['tenTB'=> 'Xe đạp tập thể dục (Stationary Bike)'],
            ['tenTB'=> 'Máy ép ngực (Chest Press Machine)'],
            ['tenTB'=> 'Máy tập cơ lưng (Lat Pulldown Machine)'],
            ['tenTB'=> 'Máy tập đùi (Leg Press Machine)'],
            ['tenTB'=> 'Tạ tay (Dumbbells)'],
            ['tenTB'=> 'Tạ đòn (Barbell)'], 
            ['tenTB'=> 'Máy tập cơ bụng (Ab Crunch Machine)'],
            ['tenTB'=> 'Máy kéo cáp (Cable Machine)'],
            ['tenTB'=> 'Bục nhảy (Plyometric Box)']
        ];
        foreach ($loai as $loai){
            ModelsLoaiTB::create($loai)  ;      
        }
    }
}
