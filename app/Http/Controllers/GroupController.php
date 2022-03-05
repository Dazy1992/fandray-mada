<?php

namespace App\Http\Controllers;

use App\Events\GroupWizzEvent;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(){
        $groups = Group::all();
        return view('groupe.index', compact('groups'));
    }

    public function notify (int $goup_id){

        $group = Group::find($goup_id);
        broadcast(new GroupWizzEvent($group))->toOthers();

        return redirect()->back();
    }
}
