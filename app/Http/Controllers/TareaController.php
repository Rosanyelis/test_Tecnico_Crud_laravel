<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = Tarea::all();
        return view('tareas.index', compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tareas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:50'],
        ],[
            'title.required' => 'El valor del campo Tarea es obligatorio.',
        ]);

        $title = $request->input('title');
        $tarea = New Tarea;
        $tarea->title = $title;
        $tarea->save();

        return redirect('/')->with('success', 'Nueva Tarea Guardada Exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $count = Tarea::where('id', $id)->count();
        if($count>0){

            $tarea = Tarea::where('id', $id)->first();

            return view('tareas.show', compact('tarea'));
        }else{
            return redirect('/')->with('Error', 'Problemas para visualizar el registro');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $count = Tarea::where('id', $id)->count();
        if($count>0){

            $tarea = Tarea::where('id', $id)->first();

            return view('tareas.edit', compact('tarea'));
        }else{
            return redirect('/')->with('Error', 'Problemas para visualizar el registro');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $count = Tarea::where('id', $id)->count();
        if($count>0){
            $request->validate([
                'title' => ['required', 'max:50'],
            ],[
                'title.required' => 'El valor del campo Tarea es obligatorio.',
            ]);

            $title = $request->input('title');
            
            # Editar tarea
            $tareas = Tarea::where('id', $id)->first();;
            $tareas->title = $title;
            $tareas->save();

            return redirect('/')->with('success', 'Tarea Actualizada Exitosamente!');

        }else{
            return redirect('/')->with('Error', 'Problemas para visualizar el registro');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = Tarea::where('id', $id)->count();
        if($count>0){
            
            Tarea::where('id', $id)->delete();

            return redirect('/')->with('success', 'Tarea Eliminada Exitosamente!');
        }else{
            return redirect('/')->with('Error', 'Problemas para visualizar el registro');
        }
    }
}
