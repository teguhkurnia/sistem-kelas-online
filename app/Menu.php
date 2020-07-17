<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Menu extends Model
{
    use LogsActivity;

    protected $fillable = ['name', 'slug'];

    protected static $logFillable = true, $logOnlyDirty = true;

    public function items()
    {
        return $this->hasMany('App\MenuItem', 'menu_id', 'id')->where('parent_id', null)->oldest('order');
    }

    public function roles()
    {
        $this->belongsToMany('App\Role', 'role_has_menu', 'menu_id', 'role_id');
    }
}
