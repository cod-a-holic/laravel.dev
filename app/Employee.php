<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'salary',
        'position',
        'director_id',
    ];


    public function subordinates()
    {

        return $this->hasMany(User::class, 'director_id');
    }

    public function director()
    {

        return $this->hasOne(User::class, 'director_id');
    }
}
