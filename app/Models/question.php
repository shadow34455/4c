<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class question extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','field_id','approved','body','slug','title'];
    public function fields()
    {
        return $this->belongsTo(fields::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function posts(){
        return $this->hasMany(posts::class);
    }
    public function tag()
    {
        return $this->belongsToMany(tag::class,"questions_tags");
    }
    protected static function boot()
    {
        parent::boot();
        static::created(function ($question) {
            $question->slug = $question->generateSlug($question->title);
            $question->save();
        });
    }
    private function generateSlug($title)
    {
        if (static::whereSlug($slug = Str::slug($title))->exists()) {
            $max = static::wheretitle($title)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }    
}
