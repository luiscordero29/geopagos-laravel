<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = Favorite::paginate(5);
        return view('favorites.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['users'] = User::get()->pluck('user', 'id');
        return view('favorites.create', ['data' => $data]);
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
            'user_id.required' => 'El Usuario es un campo requerido',
            'favorite_id.required' => 'La Contraseña es un campo requerido',
            'favorite_id.different' => 'El Usuario y Favorito deben ser diferentes.',
        ];
        $validator = Validator::make($request->all(), [
            'user_id' => ['required'],
            'favorite_id' => ['required', 'different:user_id'],
        ], $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        # Request
        $user_id = $request->input('user_id');
        $favorite_id = $request->input('favorite_id');
        $count = Favorite::where([['user_id', $user_id], ['favorite_id', $favorite_id]])->count();
        if ($count>0) {
            # Error
            return redirect('favorites/create')->with('info', 'Ya tiene este usuario de favorito');
        }else{
            # Insert
            $Favorite = New Favorite;
            $Favorite->user_id = $user_id;
            $Favorite->favorite_id = $favorite_id;
            $Favorite->save();
            return redirect('favorites/create')->with('success', 'Registro Guardado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $count = Favorite::where('id', $id)->count();
        if ($count>0) {
            # Show
            $data['row'] = Favorite::where('id', $id)->first();
            return view('favorites.show', ['data' => $data]);
        }else{
            # Error
            return redirect('/favorites/index')->with('info', 'No se puede Ver el registro');
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
        $count = Favorite::where('id', $id)->count();
        if ($count>0) {
            # Edit
            $data['users'] = User::get()->pluck('user', 'id');
            $data['row'] = Favorite::where('id', $id)->first();
            return view('favorites.edit', ['data' => $data]);
        }else{
            # Error
            return redirect('/favorites/index')->with('info', 'No se puede Editar el registro');
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
            'user_id.required' => 'El Usuario es un campo requerido',
            'favorite_id.required' => 'La Contraseña es un campo requerido',
            'favorite_id.different' => 'El Usuario y Favorito deben ser diferentes.',
        ];
        $validator = Validator::make($request->all(), [
            'user_id' => ['required'],
            'favorite_id' => ['required', 'different:user_id'],
        ], $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        # Request
        $user_id = $request->input('user_id');
        $favorite_id = $request->input('favorite_id');
        $count = Favorite::where([['user_id', $user_id], ['favorite_id', $favorite_id], ['id', '!=', $id]])->count();
        if ($count>0) {
            # Error
            return redirect('favorites/edit/'.$id)->with('info', 'Ya tiene este usuario de favorito');
        }else{
            # Insert
            $Favorite = Favorite::where('id', $id)->first();
            $Favorite->user_id = $user_id;
            $Favorite->favorite_id = $favorite_id;
            $Favorite->save();
            return redirect('favorites/edit/'.$id)->with('success', 'Registro Guardado');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = Favorite::where('id', $id)->count();
        if ($count>0) {
            # Destroy
            Favorite::destroy($id);
            return redirect('/favorites/index')->with('success', 'Registro Eliminado');
        }else{
            # Error
            return redirect('/favorites/index')->with('info', 'No se puede Eliminar el registro');
        }
    }
}
