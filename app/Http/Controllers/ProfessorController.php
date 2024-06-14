<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Professor;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professor = Professor::all();
        return view("professor.index", compact('professor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('professor.create'); // nome da pasta . nome do arquivo
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Professor::create([
            'nome' => $request->input('nome'),
            'idade' => $request->input('idade'),
            'materia' => $request->input('materia'),
            'email' => $request->input('email')
        ]);

        return redirect()->route('professor.index')->with('success', 'Registro inserido com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $professor = Professor::findOrFail($id);
        return view('professor.edit', compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $professor = Professor::findOrFail($id);
        $professor->update([
            'nome' => $request->input('nome'),
            'idade' => $request->input('idade'),
            'materia' => $request->input('materia'),
            'email' => $request->input('email')
        ]);

        return redirect()->route('professor.index')->with('success', 'Registro alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $professor = Professor::findOrFail($id);
        $professor->delete();
        return redirect()->route('professor.index')->with('success', 'Registro excluído com sucesso!');
    }

    public function delete(string $id) {
        $professor = Professor::findOrFail($id);
        return view('professor.delete', compact('professor'));
    }
}
