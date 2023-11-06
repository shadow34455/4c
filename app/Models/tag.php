<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];

    public function question()
    {
        return $this->belongsToMany(question::class);
    }

    public function services()
{
    return $this->belongsToMany(services::class,"services_tags");
}
}
