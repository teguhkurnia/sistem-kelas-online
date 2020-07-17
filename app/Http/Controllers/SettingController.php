<?php

namespace App\Http\Controllers;

use App\AuthLog;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class SettingController extends Controller
{
    public function authLog()
    {
        $log = AuthLog::with('role')->latest('time')->get();
        $log->map(function ($log) {
            $log->iconos = Str::lower(explode(' ', $log->os)[0]);
            $log->iconbrow = Str::lower(explode(' ', $log->browser)[0]);
        });
        return view('setting.authlog', compact('log'));
    }

    public function activityLog()
    {
        $log = Activity::with('causer')->latest()->get();
        return view('setting.activitylog', compact('log'));
    }

    public function detailActivityLog($id)
    {
        $act = Activity::with(['causer', 'subject'])->where('id', $id)->first();
        return view('setting.detailact', compact('act'));
    }

    public function test(AuthLog $act, Request $request)
    {
        return $act->log('login', $request);
    }
}
