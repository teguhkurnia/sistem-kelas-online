<?php

use App\Menu;
use App\MenuItem;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use hisorange\BrowserDetect\Parser as Browser;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

Route::get('/', function () {
    return view('welcome');
});

Route::get('coba', function () {
    $r = Route::getRoutes();
    $routes = [];
    foreach ($r as $rr) {
        // dd(strpos($rr->getUrl(), 'ignition'));
        if ($rr->getName() !== null && in_array('GET', $rr->methods()) && $rr->getAction()['prefix'] !== '_ignition') {
            dump($rr);
        }
    }
});

Route::get('/whoisabsent/', 'GuestController@index');
Route::get('/whoisabsent/{kelas}', 'GuestController@index');

Route::middleware('auth')->group(function () {
    Route::get('/home', 'DashboardController@index')->name('dashboard');

    Route::group(['middleware' => 'role:admin|guru'], function () {

        Route::get('/setting/authlog', 'SettingController@authLog')->name('setting.authlog');
        Route::get('/setting/activitylog', 'SettingController@activityLog')->name('setting.actlog');
        Route::get('/setting/activitylog/{id}', 'SettingController@detailActivityLog');
        Route::get('/menu', 'MenuController@menu')->name('admin.menu');
        Route::put('/menu/addmenu', 'MenuController@addMenu');
        Route::post('/menu/neworder', 'MenuController@NewOrder');
        Route::post('/menu/getItem', 'MenuController@getItem');
        Route::put('/menu/addItem', 'MenuController@addItem');
        Route::put('/menu/editItem', 'MenuController@editItem');
        Route::get('/menu/{id}/builder', 'MenuController@menuBuilder');
        Route::get('/menu/builder/{id}/delete', 'MenuController@menuItemDelete');


        Route::group(['prefix' => 'siswa'], function () {
            Route::get('/', 'SiswaController@index')->name('siswa.home');
            Route::get('/exportAll', 'SiswaController@export');
            Route::get('/form', 'SiswaController@form_tambah');
            Route::post('/tambahsiswa', 'SiswaController@tambah')->name('form.add');
            Route::patch('/form/edit', 'SiswaController@edit_siswa');
            Route::get('/form/fetch_wilayah', 'SiswaController@fetch_wilayah');
            Route::get('/form/{nis}', 'SiswaController@form_edit');
            Route::get('/fetch_data', 'SiswaController@fetch_data');
            Route::get('/detailsiswa/{nis}', 'SiswaController@detailSiswa');
            Route::get('/ubahfoto/{nis}', 'SiswaController@ubahFoto');
            Route::get('/export/{nis}', 'SiswaController@exportFromNis');
            Route::put('/upfoto', 'SiswaController@upFoto');
            Route::delete('/delete/{nis}', 'SiswaController@delete')->name('delete.siswa{nis}');
        });

        Route::group(['prefix' => 'kelas'], function () {
            Route::get('/', 'KelasController@index');
            Route::get('/fetch_data', 'KelasController@fetch_data');
        });

        Route::group(['prefix' => 'guru'], function () {
            Route::get('/', 'GuruController@index');
        });

        Route::group(['prefix' => 'kas'], function () {
            Route::get('/', 'KasController@index');
            Route::post('/showkas', 'KasController@showkas');
            Route::post('/submitkas', 'KasController@submitkas');
            Route::post('/submitkas/hapus', 'KasController@hapuskas');
        });

        Route::group(['prefix' => 'absen'], function () {
            Route::get('/', 'AbsenController@index');
            Route::get('/showkelas', 'AbsenController@showKelas');
            Route::get('/showtgl', 'AbsenController@showTgl');
            Route::post('/showabsen', 'AbsenController@showAbsen');
            Route::post('/showabsenbulan', 'AbsenController@showAbsenBulan');
            Route::post('/rekapabsen', 'AbsenController@rekapAbsen');
            Route::post('/saveabsen', 'AbsenController@saveAbsen');
            Route::post('/editabsen', 'AbsenController@editAbsen');
        });
    });

    Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function () {
        Route::get('/role', 'AdminController@role')->name('admin.role');
        Route::get('/user', 'AdminController@user')->name('admin.user');
        Route::post('/addrole', 'AdminController@addRole')->name('add.role');
        Route::post('/user/giveRole', 'AdminController@giveRole')->name('give.role');
        Route::post('/user/giveRoleMenu', 'AdminController@giveRoleMenu')->name('give.role');
        Route::post('/user/getActiveRole', 'AdminController@getActiveRole')->name('active.role');
        Route::post('/role/getActiveMenu', 'AdminController@getActiveMenu');
    });

    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::get('/sidebar', function () {
        return view('sidebar');
    });
    Route::get('/url', function () {
        $r = Route::getRoutes();
        $routes = [];
        foreach ($r as $rr) {
            if ($rr->getName() !== null && in_array('GET', $rr->methods()) && $rr->getAction()['prefix'] !== '_ignition') {
                array_push($routes, $rr->getName());
            }
        }
        return view('menu.url', compact('routes'));
    });
});

Auth::routes();
