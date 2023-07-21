<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ball extends Model
{
    use HasFactory;
    protected $fillable = ['color', 'size'];

    // Relationship with buckets where the ball is placed
    public function buckets()
    {
        return $this->belongsToMany(Bucket::class, 'bucket_ball')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}
