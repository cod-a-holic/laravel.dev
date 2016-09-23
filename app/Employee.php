<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{

    use Searchable;

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
        return $this->hasMany(User::class, 'director_id');
    }

    public function director()
    {

        return $this->hasOne(User::class, 'director_id');
    }

    public function getSubordinates()
    {
        return Db::table('employees')->where('director_id', $this->id)->get();
    }

    public function getDirectors()
    {
        return DB::table('employees')->select('position')->where('id', $this->director_id)->get();
    }


}
