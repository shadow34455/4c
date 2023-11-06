<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class answer extends Model
{
    use HasFactory;
    protected $fillable = ['body', 'question_id','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likedByUsers()
    {
        return $this->belongsToMany(User::class , 'likes');
    }
    public function like(User $user)
    { 
    return $this->likedByUsers()->save($user);
    }
    
    public function dislike(User $user){
    
     return $this->likedByUsers()->detach($user);
    }
    public function likedByUser(User $user)
    {   
        return (bool)DB::table('likes')
        ->where('user_id',$user->id)
        ->where('posts_id',$this->id)
        ->count();
    }

    public function likes(User $user)
    {   
        return (bool)DB::table('likes')
        ->where('user_id',$user->id)
        ->count();
    }
 function likeSystem(User $user){
if($this->likedByUser($user))
{
return $this->dislike($user);
}
else{
return $this->like($user);
}
}
}
