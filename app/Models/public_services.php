<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class public_services extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
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
public function users()
{
    return $this->belongsToMany(User::class,"bids");
}

public function tag()
{
    return $this->belongsToMany(tag::class,"public_services_tags");
}
}
