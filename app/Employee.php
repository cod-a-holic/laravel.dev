<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    use Searchable;


    //fields you want to make searchable
    public function toSearchableArray()
    {
        $array = $this->toArray();

        return $array;
    }

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
        'avatar',
    ];


    public function subordinates()
    {
        return $this->hasMany(Employee::class, 'director_id');
    }

    public function director()
    {

        return $this->hasOne(Employee::class, 'director_id');
    }

}
