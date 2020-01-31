<?php

namespace App;

use App\Job;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    public function getRouteKeyName() {
        return 'slug';
    }
    
    public function jobs() {
        return $this->hasMany(Job::class);
    }
}
