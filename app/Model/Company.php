<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'website',
        'logo',
        'user_id',
    ];

    public function workers()
    {
        return $this->hasMany(Worker::class);
    }

     public function user()
     {
        return $this->belongsTo(User::class);
     }
}
