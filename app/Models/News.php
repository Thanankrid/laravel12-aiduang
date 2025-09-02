<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // อนุญาตฟิลด์ที่เราจะกรอกผ่าน create()/update()
    protected $fillable = [
        'title',
        'content',
        'source',
        'image',
        'summary',
    ];

    // (ไม่จำเป็น) ใส่เมื่อชื่อตารางไม่ใช่ 'news'
    // protected $table = 'news';
}
