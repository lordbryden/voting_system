<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'post_id', 'candidate_id'];

    public static function hasVoted($email, $postId)
    {
        return self::where('email', $email)
                    ->where('post_id', $postId)
                    ->exists();
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

}
