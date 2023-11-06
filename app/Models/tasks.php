<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
   
    use HasFactory;
    protected $fillable = ['user_id','field_id','approved','body','slug','title'];
    // public function admin()
    // {
    //     return $this->belongsTo(admin::class);
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function fields()
    {
        return $this->belongsTo(fields::class);
    }

    public function posts()
    {
        return $this->hasMany(posts::class);
    }
}
