<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use App\Models\Practicante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PracticanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [
            'run' => ['required', 'string', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'estado_usuario_id' => ['required'],

            'carrera_id' => ['required'],
            'comuna_id' => ['required'],
            'institucion_id' => ['required'],
            'nivel_educacional_id' => ['required'],
            'region_id' => ['required'],
            'tipo_practica_id' => ['required'],
        ]);

        // Creación del usuario

        $user = new User();

        $user->run = $request['run'];
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->estado_usuario_id = $request['estado_usuario_id'];
        $user->rol_id = 1;

        $user->save();

        // Creación del perfil (practicante)

        $practicante = new Practicante();

        $practicante->id = $user->id;
        $practicante->run = $user->run;
        $practicante->nombre_completo = $user->name;
        $practicante->email = $user->email;
        $practicante->carrera_id = $request['carrera_id'];
        $practicante->comuna_id = $request['comuna_id'];
        $practicante->institucion_id = $request['institucion_id'];
        $practicante->nivel_educacional_id = $request['nivel_educacional_id'];
        $practicante->region_id = $request['region_id'];
        $practicante->tipo_practica_id = $request['tipo_practica_id'];

        $practicante->user_id = $user->id;
        $practicante->save();

        return response()->json('Practicante creado', 200);
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
        //
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
        //
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
    }
    
}
