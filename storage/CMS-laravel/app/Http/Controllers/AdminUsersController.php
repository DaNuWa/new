<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;
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
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role=Role::pluck('name','id')->all();
        return view('admin.users.create',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
       /* User::create($request->all());
        return redirect('admin/users');
        //return view('admin.users.store');*/
      
      
        $input = $request->all();

        if($file = $request->file('photo_id')) {


            $name = time() . $file->getClientOriginalName();


            $file->move('images', $name);

        $photo=Photo::create( ["file"=>$name]);
         $input['photo_id'] = $photo->id;
         
        $input['password']=bcrypt($request->password);
        User::create($input);
        }
        //return $input['photo_id'];
        else
        {
        $input['password']=bcrypt($request->password);
        User::create($request->all());
        }
        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $user=User::findOrFail($id);
        $roles=Role::pluck('name','id')->all();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        $user=User::findOrFail($id);

        if( $request->all('password'))
        {
            $input = $request->all();
             if($file = $request->file('photo_id')) 
             {
                   $name = time() . $file->getClientOriginalName();


                    $file->move('images', $name);

                $photo=Photo::create( ["file"=>$name]);
                $input['photo_id'] = $photo->id;
             }
             $input['password']=bcrypt($request->password);
              $user->update($input);
            
        }
        else
        {
            $input = $request->only(['name','email','role_id','photo_id','is_active']);
            if($file = $request->file('photo_id')) 
            {


                   $name = time() . $file->getClientOriginalName();


                   $file->move('images', $name);

               $photo=Photo::create( ["file"=>$name]);
               $input['photo_id'] = $photo->id;
            }
         
            $user->update($input);
        }    

                Session::flash('created_user','The user has been updated');
                return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        unlink(public_path().$user->photo->file);
        $user->delete();
        Session::flash('deleted_user','The user has been deleted');
        return redirect('admin/users');
    }
}
