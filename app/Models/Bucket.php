<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bucket extends Model
{
    use HasFactory;
    protected $fillable = ['bucket_name','capacity', 'empty_volume'];

    // Relationship with balls placed in the bucket
    public function balls()
    {
        return $this->belongsToMany(Ball::class, 'bucket_ball')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}
