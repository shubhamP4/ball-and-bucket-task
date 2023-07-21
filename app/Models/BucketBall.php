<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BucketBall extends Model
{
    use HasFactory;
    protected $table = 'bucket_ball';

    protected $fillable = ['bucket_id', 'ball_id', 'quantity'];

    // Relationships with Bucket and Ball models
    public function bucket()
    {
        return $this->belongsTo(Bucket::class);
    }

    public function ball()
    {
        return $this->belongsTo(Ball::class);
    }
}
