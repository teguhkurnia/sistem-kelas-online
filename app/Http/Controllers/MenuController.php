<?php

namespace App\Http\Controllers;

use App\Menu;
use App\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class MenuController extends Controller
{
    public function menu()
    {
        $menu = Menu::oldest('order')->get();
        return view('menu.index', compact('menu'));
    }

    public function menuBuilder($id)
    {
        $menu = Menu::where('id', $id)->first();
        $menuItem = MenuItem::with('child', 'menu')->where(['menu_id' => $id, 'parent_id' => null])->oldest('order')->get();
        return  view('menu.builder', compact('menuItem', 'menu'));
    }

    public function addItem(Request $request)
    {
        $data = $this->itemValidate($request);
        $data['slug'] = \Str::slug($request->title);
        return MenuItem::create($data) ? back()->with('success', 'Data Added') : back()->with('error', 'error');
    }

    public function getItem(Request $request)
    {
        return MenuItem::find($request->id);
    }

    public function editItem(Request $request)
    {
        $data = $this->itemValidate($request);
        return MenuItem::find($request->id)->update($data) ? back()->with('success', 'Data Edited') : back()->with('error', 'error');
    }

    public function addMenu(Request $request)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);
        $data['slug'] = \Str::slug($request->title);
        return Menu::create($data) ? back()->with('success', 'Data Added') : back()->with('error', 'error');
    }

    public function newOrder(Request $request)
    {
        foreach ($request->order as $key => $value) {
            MenuItem::find($value)->update(['order' => $key + 1]);
        }
    }

    public function menuItemDelete($id)
    {
        $mi =  MenuItem::where('id', $id)->first();
        return $mi->delete() ? back()->with('success', 'deleted') : back()->with('error', 'error');
    }

    public function itemValidate($request)
    {
        return $request->validate([
            'menu_id' => 'required',
            'title' => 'required',
            'parent_id' => '',
            'url' => $request->parent_id !== null ? 'required_without:route' : '',
            'route' => $request->parent_id !== null ? 'required_without:url' : '',
            'icon' => '',
            'params' => '',
        ]);
    }
}
