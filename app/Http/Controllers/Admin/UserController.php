<?php

namespace App\Http\Controllers\Admin;

use Hash;
use Str;
use Storage;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\District;
use App\Models\Admin\Province;
use App\Models\Admin\Department;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['getProvinces', 'getDistricts']);
        $this->middleware('isadmin')->except(['getProvinces', 'getDistricts']);
        $this->middleware('permissions')->except(['store', 'update', 'destroy', 'permissions', 'updatePermission', 'getProvinces', 'getDistricts']);
    }

    public function permissions($id)
    {
        $user = User::find($id);
        return view('admin.users.permission', compact('user'));
    }

    public function updatePermission(Request $request, $id)
    {
        $rules=[
            //
        ];

        $messages=[
            //
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            if(!$request->permissions):
                $request->merge(['permissions' => []]);
            endif;

            $updated = User::find($id);
            $updated->fill($request->all())->save();
            return redirect()->route('users.index')->with('message', 'Permisos actualizados con éxito.')->with('typealert', 'success');
        endif;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getProvinces(Request $request)
    {
        $provinces = Province::where('department_id', $request->id)->get();
        return $provinces;
    }

    public function getDistricts(Request $request)
    {
        $districts = District::where('province_id', $request->id)->orderBy('name', 'Asc')->get();
        return $districts;
    }
    
    public function index()
    {
        $users = User::orderBy('id', 'Desc')->paginate();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'unique:users,email',
            'newpassword' => 'nullable|min:6',
            'renewpassword' => 'nullable|min:6|same:newpassword',
        ];

        $messages=[
            'newpassword.min' => 'Las contraseñas debe tener al menos 6 carácteres',
            'renewpassword.min' => 'Las contraseñas debe tener al menos 6 carácteres',
            'renewpassword.same' => 'Las contraseñas deben ser iguales',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            if($request->newpassword && $request->renewpassword):
                if($request->newpassword === $request->renewpassword):
                    $request->merge(['password' => Hash::make($request->newpassword)]);
                else:
                    return back()->withErrors($validator)->with('message', 'La contraseñas no coinciden')->with('typealert', 'danger')->withInput();
                endif;
            endif;

            if($request->hasFile('avatar_front')):
                if($request->file('avatar_front')->isValid()):
                    $image = $request->file('avatar_front');
                    $fileExt = trim($image->getClientOriginalExtension());
                    $name_user = Str::slug($request->name).'-'.Str::slug($request->lastname);
                    $name = $name_user.'.'.$fileExt;
                    Storage::disk('profiles')->put($name, file_get_contents($image));
                    $request->merge(['avatar' => $name]);
                endif;
            endif;

            if(!$request->permissions):
                $request->merge(['permissions' => []]);
            endif;

            $recorded = User::create($request->all());
            return redirect()->route('users.index')->with('message', 'Creado con éxito.')->with('typealert', 'success');
        endif;
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illum   inate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ];

        $messages=[
            'newpassword.min' => 'Las contraseñas debe tener al menos 6 carácteres',
            'renewpassword.min' => 'Las contraseñas debe tener al menos 6 carácteres',
            'renewpassword.same' => 'Las contraseñas deben ser iguales',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            if($request->newpassword && $request->renewpassword):
                if($request->newpassword === $request->renewpassword):
                    $request->merge(['password' => Hash::make($request->newpassword)]);
                else:
                    return back()->withErrors($validator)->with('message','La contraseñas no coinciden')->with('typealert','danger')->withInput();
                endif;
            endif;

            if($request->hasFile('avatar_front')):
                if($request->file('avatar_front')->isValid()):
                    $image = $request->file('avatar_front');
                    $fileExt = trim($image->getClientOriginalExtension());
                    $name_user = Str::slug($request->name).'-'.Str::slug($request->lastname);
                    $name = $id.'-'.$name_user.'.'.$fileExt;
                    //Storage::disk('profiles')->delete($updated->avatar);
                    Storage::disk('profiles')->put($name, file_get_contents($image));
                    $request->merge(['avatar' => $name]);
                endif;
            endif;

            $updated = User::find($id);
            $updated->fill($request->all())->save();
            return redirect()->route('users.index')->with('message', 'Actualizado con éxito.')->with('typealert', 'success');
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyed = User::find($id)->delete();
        return back()->with('message', 'Eliminado correctamente')->with('typealert', 'success');
    }
}
