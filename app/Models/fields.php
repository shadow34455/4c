<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fields extends Model
{
    use HasFactory;
    protected $fillable = ['Description','slug','title','user_id','imge_path'];
    public function tasks()
    {
        return $this->hasMany(tasks::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function public_services(){
        return $this->hasMany(public_services::class);
    }
}
