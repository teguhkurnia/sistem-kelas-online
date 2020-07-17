<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use hisorange\BrowserDetect\Parser as Browser;

class AuthLog extends Model
{
    protected $table = 'user_log', $guarded = ['id'], $dates = ['time'];

    public function log($tipe, Request $request)
    {
        return $this->insert([
            'username' => auth()->user()->name,
            'role_id' => auth()->user()->roles()->first()->id,
            'tipe' => $tipe,
            'time' => now(),
            'ip_address' => $request->ip(),
            'os' => Browser::platformName(),
            'browser' => Browser::browserName()
        ]);
    }

    public function role()
    {
        return $this->hasOne('App\Role', 'id', 'role_id');
    }
}
