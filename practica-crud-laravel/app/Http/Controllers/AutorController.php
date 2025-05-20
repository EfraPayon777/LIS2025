<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autores = Autor::all();
        return view('autor.index', compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('autor/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $codigos = Autor::pluck('codigo_autor')->map(function ($codigo) {
            return (int) substr($codigo, 3); 
        })->sort()->values();

        $nuevoNumero = 1;
        foreach ($codigos as $codigo) {
            if ($codigo == $nuevoNumero) {
                $nuevoNumero++;
            } else {
                break;
            }
        }

        $nuevoCodigo = 'AUT' . str_pad($nuevoNumero, 3, '0', STR_PAD_LEFT);

        $autor = new Autor();
        $autor->codigo_autor = $nuevoCodigo;
        $autor->nombre_autor = $request->input('nombre_autor');
        $autor->nacionalidad = $request->input('nacionalidad');
        $autor->save();

        return redirect()->route('autores.index')->with('success', 'Autor agregado con código ' . $nuevoCodigo);
    }


    /**
     * Display the specified resource.
     */
    public function show($codigo_autor)
    {
        $autor = Autor::where('codigo_autor', $codigo_autor)->firstOrFail();
        return view('autor.show', ['item' => $autor]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $codigo_autor)
    {
        $item = Autor::find($codigo_autor);
        return view('autor/edit', compact('item'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $codigo_autor)
    {
        $item = Autor::find($codigo_autor);
        $item->nombre_autor = $request->nombre_autor;
        $item->nacionalidad = $request->nacionalidad;
        $item->save();
        return to_route('autores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $codigo_autor)
    {
        $item = Autor::where('codigo_autor', $codigo_autor)->firstOrFail();
        $item->delete();
        return to_route('autores.index');
    }

}
