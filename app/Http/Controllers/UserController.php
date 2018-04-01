<?php

namespace App\Http\Controllers;

use App\User;
use App\Rules\Age;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = User::paginate(5);
        return view('users.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'user.alpha' => 'El usuario solo puede contener letras',
            'user.required' => 'El Usuario es un campo requerido',
            'user.unique' => 'Este Usuario ya esta siendo usado por otro usuario',
            'user.max' => 'El Usuario es muy largo máx 60 digitos',
            'password.required' => 'La Contraseña es un campo requerido',
            'age.required' => 'La Edad es un campo requerido',
            'age.integer' => 'La Edad debes ingresar un número entero',
        ];
        $validator = Validator::make($request->all(), [
            'user' => 'required|unique:users,user|max:60|alpha',
            'password' => 'required',
            'age' => ['required', 'integer', new Age],
        ], $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        # Request
        $user = $request->input('user');
        $password = Hash::make($request->input('password'));
        $age = $request->input('age');
        # Insert
        $User = New User;
        $User->user = $user;
        $User->password = $password;
        $User->age = $age;
        $User->save();
        return redirect('users/create')->with('success', 'Registro Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $count = User::where('id', $id)->count();
        if ($count>0) {
            # Show
            $data['row'] = User::where('id', $id)->first();
            return view('users.show', ['data' => $data]);
        }else{
            # Error
            return redirect('/users/index')->with('info', 'No se puede Ver el registro');
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
        $count = User::where('id', $id)->count();
        if ($count>0) {
            # Edit
            $data['row'] = User::where('id', $id)->first();
            return view('users.edit', ['data' => $data]);
        }else{
            # Error
            return redirect('/users/index')->with('info', 'No se puede Editar el registro');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'user.alpha' => 'El usuario solo puede contener letras',
            'user.required' => 'El Usuario es un campo requerido',
            'user.unique' => 'Este Usuario ya esta siendo usado por otro usuario',
            'user.max' => 'El Usuario es muy largo máx 60 digitos',
            'password.required' => 'La Contraseña es un campo requerido',
            'age.required' => 'La Edad es un campo requerido',
            'age.integer' => 'La Edad debes ingresar un número entero',
        ];
        $validator = Validator::make($request->all(), [
            'user' => 'required|unique:users,user,'.$id.',id|max:60|alpha',
            'password' => 'required',
            'age' => ['required', 'integer', new Age],
        ], $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        # Request
        $user = $request->input('user');
        $password = Hash::make($request->input('password'));
        $age = $request->input('age');
        # Insert
        $User = User::where('id', $id)->first();
        $User->user = $user;
        $User->password = $password;
        $User->age = $age;
        $User->save();
        return redirect('users/edit/'.$id)->with('success', 'Registro Guardado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = User::where('id', $id)->count();
        if ($count>0) {
            # Destroy
            User::destroy($id);
            return redirect('/users/index')->with('success', 'Registro Eliminado');
        }else{
            # Error
            return redirect('/users/index')->with('info', 'No se puede Eliminar el registro');
        }
    }
}
