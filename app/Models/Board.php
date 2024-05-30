<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
    protected $primaryKey = 'board_id';
// 어떤 column을 사용할 지
    protected $fillable=[
        'board_title','board_content',
        'board_author'
    ];
    public $timestamps = false;
    
}
