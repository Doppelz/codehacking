<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Role;

use App\Photo;

use App\Http\Requests\UsersRequest;

use App\Http\Requests\UserEditRequest;

use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::lists('name','id')->all();
         return view('admin.users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //
        $input = $request->all();
        if($file = $request->file('file')){
            $photo_name = time().$file->getClientOriginalName();

            $file->move('images', $photo_name);

            $photo = Photo::create(['file' => $photo_name]);

            $input['photo_id'] = $photo->id;
        }


        $input['password'] = bcrypt($request->password);

        User::create($input);
        return redirect()->action('AdminUsersController@index');
        // return $request->all();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         return view('admin.users.show');
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
        $user = User::findOrFail($id);
        $roles = Role::lists('name','id')->all();
         return view('admin.users.edit',['user'=>$user, 'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        if(!empty($request->get('password'))) {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        } else {
            $input = $request->except(['password']);
        }
        //
        $user = User::findOrFail($id);

        
        if($file = $request->file('file')){
            $name = time().$file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        

        $user->update($input);
        return redirect()->action('AdminUsersController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Session::flash('info', 'user has been deleted');

        $user = User::findOrFail($id);
        
        unlink(public_path().$user->photo->file);
        $user->photo()->delete();
        $user->delete();

        return redirect()->action('AdminUsersController@index');
    }
}
