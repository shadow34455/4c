<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'competitor_id',
        'competitor_username',
        'Subject',
        'description',
        'price',
        'dead_line',
        'Attachments',
        
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}

}
