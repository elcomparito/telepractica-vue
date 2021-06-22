<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rol;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use App\Models\EstadoUsuario;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return view('admin/empresa/index');
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
            'rol_id' => ['required'],

            'area_id' => ['required'],
        ]);

        // Creación del usuario

        $user = new User();

        $user->run = $request['run'];
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->estado_usuario_id = $request['estado_usuario_id'];
        $user->rol_id = $request['rol_id'];

        $user->save();

        // Creación del perfil (empresa)

        $empresa = new Empresa();

        $empresa->id = $user->id;
        $empresa->run = $user->run;
        $empresa->nombre_ficticio = $user->name;
        $empresa->email = $user->email;
        $empresa->area_id = $request['area_id'];

        $empresa->user_id = $user->id;
        $empresa->save();

        return response()->json('Empresa creada', 200);
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
        $this->validate($request, [
            'run' => ['required', 'string', 'max:255', 'unique:users,run,' .$id],
            'name' => ['required', 'string', 'max:255', 'unique:users,name,' .$id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' .$id],
            'password' => ['string', 'min:8', 'confirmed'],
            'estado_usuario_id' => ['required'],
            'rol_id' => ['required'],

            'area_id' => ['required'],
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        Empresa::where('id', $user->id)->update(['run' => $request->run]);
        Empresa::where('id', $user->id)->update(['nombre_ficticio' => $request->name]);
        Empresa::where('id', $user->id)->update(['email' => $request->email]);
        Empresa::where('id', $user->id)->update(['area_id' => $request->area_id]);

        return response()->json('Empresa actualizada', 200);
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

    public function get_all()
    {
        $empresas = Empresa::orderBy('id', 'desc')->orderBy('nombre_ficticio', 'asc')->get();

        $empresas->transform(function($empresa) {
            $empresa->area_nombre = $empresa->area->nombre;

            $user = User::findOrFail($empresa->id);
            $estado_usuario = EstadoUsuario::findOrFail($user->estado_usuario_id);
            $rol = Rol::findOrFail($user->rol_id);
            $empresa->supervisors;

            $empresa->user = $empresa->user;
            $empresa->estado_usuario_nombre = $estado_usuario->nombre;
            $empresa->rol_nombre = $rol->nombre;
            
            $empresa->estado_usuario_id = $estado_usuario->id;
            $empresa->rol_id = $rol->id;
            
            return $empresa;
        });

        return response()->json([
            'empresas' => $empresas
        ], 200);
    }

    public function get_empresa($id)
    {
        $empresa = Empresa::where('id', $id)->get();

        $empresa->transform(function($empresa_) {
            $empresa_->area_nombre = $empresa_->area->nombre;

            $user = User::findOrFail($empresa_->id);
            $estado_usuario = EstadoUsuario::findOrFail($user->estado_usuario_id);
            $rol = Rol::findOrFail($user->rol_id);

            $empresa_->user = $empresa_->user;
            $empresa_->estado_usuario_nombre = $estado_usuario->nombre;
            $empresa_->rol_nombre = $rol->nombre;
            
            $empresa_->estado_usuario_id = $estado_usuario->id;
            $empresa_->rol_id = $rol->id;

            return $empresa_;
        });

        return response()->json([
            'empresa' => $empresa
        ], 200);
    }
}
