<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('group.index');
    }

    public function datatable()
    {

        $superAdmin = User::role('SuperAdmin')->where("id",Auth::id())->count();
        $groupAdmin = User::role('GroupAdmin')->where("id",Auth::id())->count();
        if($superAdmin)
        {
            $data = Group::get();
            return $data;
        }
        else if($groupAdmin)
        {
            $data = Group::where("admin_user_id", Auth::id())->get();
            return $data;
        
        }




    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $query = Group::create(['name'=>$request->name, 'admin_user_id'=>$request->admin_user_id]);
        return $query;
    }

    public function addUser($id, $userid)
    {
        $query = User::where('id', $userid)
        ->update(['group_id' => $id]);

        return redirect('/groups/'.$id);
    }

    public function removeUser($id, $userid)
    {
        $query = User::where('id', $userid)
        ->update(['group_id' => 0]);

        return redirect('/groups/'.$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $superAdmin = User::role('SuperAdmin')->where("id",Auth::id())->count();
        $groupAdmin = User::role('GroupAdmin')->where("id",Auth::id())->count();

        if($superAdmin)
        {
            $query = User::where("id", "!=", Auth::id())->where("group_id", $id)->paginate(5);
            $unGroupusers = User::where("id", "!=", Auth::id())->where("group_id", 0)->get();
            return view('group.group_users', compact(["id", "query", "unGroupusers"]));
        }
        else if($groupAdmin)
        {
            $checkGroup = Group::where("id", $id)->where("admin_user_id", Auth::id())->count();

            if($checkGroup)
            {
                $query = User::where("id", "!=", Auth::id())->where("group_id", $id)->paginate(5);
                $unGroupusers = User::where("id", "!=", Auth::id())->where("group_id", 0)->get();
                return view('group.group_users', compact(["id", "query", "unGroupusers"])); 
            } 
            else
            {
                return abort(403, 'Unauthorized action.');
            }          
        }




        

        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $query = Group::where('id', $request->id)
        ->update(['name' => $request->name, 'admin_user_id' => $request->admin_user_id]);
        return $query;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $query = Group::where('id', $request->id)->delete();
        return $query;
    }
}
