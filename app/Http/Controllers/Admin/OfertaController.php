<?php

namespace App\Http\Controllers\Admin;

use App\Models\Oferta;
use App\Models\Empresa;
use App\Models\Supervisor;
use App\Models\EstadoOferta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return view('admin/oferta/index');
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
        //
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

    public function get_all()
    {
        $ofertas = Oferta::orderBy('id', 'desc')->orderBy('nombre_oferta', 'asc')->get();

        $ofertas->transform(function($oferta) {
            $empresa = Empresa::findOrFail($oferta->empresa_id);
            $estado_oferta = EstadoOferta::findOrFail($oferta->estado_oferta_id);
            $supervisor = Supervisor::findOrFail($oferta->supervisor_id);

            $oferta->empresa_nombre = $empresa->nombre_ficticio;
            $oferta->estado_oferta_nombre = $estado_oferta->nombre;
            $oferta->supervisor_nombre = $supervisor->nombre_completo;

            $oferta->carreras = $oferta->carreras;

            return $oferta;
        });

        return response()->json([
            'ofertas' => $ofertas
        ], 200);
    }

    public function get_all_by_empresa($id)
    {
        //$ofertas = Oferta::where('empresa_id', $id)->orderBy('id', 'desc')->orderBy('nombre', 'asc')->get();
        $ofertas = DB::table('ofertas')
            ->join('empresas', 'ofertas.empresa_id', '=', 'empresas.id')
            ->where('ofertas.empresa_id', '=', $id)
            ->select('ofertas.*')
            ->get();

        $ofertas->transform(function ($oferta) {
            $empresa = Empresa::findOrFail($oferta->empresa_id);
            $estado_oferta = EstadoOferta::findOrFail($oferta->estado_oferta_id);
            $supervisor = Supervisor::findOrFail($oferta->supervisor_id);

            $oferta->estado_oferta_nombre = $estado_oferta->nombre;
            $oferta->supervisor_nombre = $supervisor->nombre_completo;
            $oferta->empresa_nombre = $empresa->nombre_ficticio;

            return $oferta;
        });

        return response()->json([
            'ofertas' => $ofertas
        ], 200);
    }
}
