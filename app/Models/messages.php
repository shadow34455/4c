<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    public $timestamps = false;

    
    use HasFactory;
    protected $fillable = [
        'to',
        'user_id',
        'Subject',
        'body',
        
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}
}
