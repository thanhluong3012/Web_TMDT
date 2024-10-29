<?php

namespace Database\Seeders;

use App\Models\Device;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $device = [
            [
                'tenTB' => 'Thiết bị 1',
                'id_loaiTB' => 1,
                'trangthai' => 'Bao tri',
                'hinh' => 'image1.png',
            ],
            [
                'tenTB' => 'Thiết bị 2',
                'id_loaiTB' => 2,
                'trangthai' => 'Bao tri',
                'hinh' => 'image2.png',
            ],
            [
                'tenTB' => 'Thiết bị 3',
                'id_loaiTB' => 3,
                'trangthai' => 'Bao tri',
                'hinh' => 'image3.png',
            ],
            [
                'tenTB' => 'Thiết bị 4',
                'id_loaiTB' => 4,
                'trangthai' => 'Bao tri',
                'hinh' => 'image4.png',
            ],
            [
                'tenTB' => 'Thiết bị 5',
                'id_loaiTB' => 5,
                'trangthai' => 'Bao tri',
                'hinh' => 'image5.png',
            ],
            [
                'tenTB' => 'Thiết bị 6',
                'id_loaiTB' => 6,
                'trangthai' => 'Bao tri',
                'hinh' => 'image6.png',
            ]
        ];
        foreach ($device as $device){
            Device::create($device);  ;      
        }
    }
}
