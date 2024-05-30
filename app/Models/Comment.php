<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $primaryKey = 'comment_id';

    protected $fillable = [
        'board_id', 'comment_content', 'comment_author'
    ];

    public $timestamps = false; 

    public function board()
    {
        return $this->belongsTo(Board::class, 'board_id');
    }
}
