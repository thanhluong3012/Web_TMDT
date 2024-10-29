<?php

namespace App\Models;

use App\Models\loaiTB ;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'devices';
    protected $fillable=[
        'tenTB',
        'id_loaiTB',
        'trangthai',
        'hinh'
    ];
    public function loaiTB(){
        return $this->belongsTo(loaiTB::class, 'id_loaiTB');
    }
}
