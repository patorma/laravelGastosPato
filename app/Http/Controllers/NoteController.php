<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Note;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   //latest trae los ultimos registros
        return Inertia::render('Notes/Index',[
            'notes' => Note::latest()
            ->where('excerpt','LIKE',"%$request->q%")
            ->get()
            // 'notes' => Note::paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //retorna vista de creacion (formulario de creacion)
    public function create()
    {
        return Inertia::render('Notes/Create');
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
            'excerpt' => 'required',
            'content' => 'required',
        ]);
        Note::create($request->all());
        Session::flash('status','Nota creada');
        // return Inertia::location('/notes/'.$note->id.'/edit');
        return Inertia::location('/notes') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        return Inertia::render('Notes/Show',compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        return Inertia::render('Notes/Edit',compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'excerpt' => 'required',
            'content' => 'required',
        ]);
        $note->update($request->all());
        Session::flash('status','Nota actualizada');

        return Inertia::location('/notes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();
        Session::flash('status','Nota eliminada');
        return Inertia::location('/notes');
    }
}
