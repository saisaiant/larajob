<?php

namespace App;

use App\Company;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [];
    
    public function getRouteKeyName() {
        return 'slug';
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
