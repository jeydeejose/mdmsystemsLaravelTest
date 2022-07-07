<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    // use SoftDeletes;

    public $table = 'roles';

    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $fillable = [
        'name',
        'guard_name',
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->belongsToMany(App/User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

}
