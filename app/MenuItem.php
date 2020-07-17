<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Support\Facades\Route;

class MenuItem extends Model
{
    use LogsActivity;

    protected $table = 'menu_items', $guarded = ['id'];

    protected static $logUnguarded = true, $logOnlyDirty = true;

    public function child()
    {
        return $this->hasMany('App\MenuItem', 'parent_id')->oldest('order');
    }

    public function parent()
    {
        return $this->belongsTo('App\MenuItem', 'parent_id')->oldest('order');
    }

    public function menu()
    {
        return $this->belongsTo('App\Menu', 'menu_id')->oldest('order');
    }

    public function link()
    {
        $route =  Route::getRoutes()->getByName($this->route);
        return $this->url ? $this->url : ($route ? route($this->route) : 'Route Not Exist!');
    }
}
