<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends Model
{
    use LogsActivity;
    protected $fillable = ['name'], $attributes = ['guard_name' => 'web'];

    protected static $logAttributes = ['name'], $logOnlyDirty = true;

    public function activity()
    {
        return $this->belongsTo('App\Activity', 'id');
    }

    public function menus()
    {
        return $this->belongsToMany('App\Menu', 'role_has_menu', 'role_id', 'menu_id')->oldest('order');
    }

    public function showMenu($id)
    {
        return $this->with('menus', 'menus.items', 'menus.items.child')->where('id', $id)->first()->menus;
    }
}
