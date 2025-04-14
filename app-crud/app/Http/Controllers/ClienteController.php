<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public readonly Cliente $cliente;

    public function __construct()
    {
        $this ->cliente = new Cliente();
    }

    public function index()
    {
        $clientes = $this->cliente->all();
        return view('clientes', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nome' => 'required|string|max:255',
        //     'cpf_cnpj' => 'required|string|unique:clientes',
        //     'telefone' => 'nullable|string',
        //     'email' => 'required|email|unique:clientes',
        // ]); 

        $created = $this->cliente->create([
            'nome' => $request->input('nome'),
            'cpf_cnpj' => $request->input('cpf_cnpj'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email'),
        ]);
        if ($created){
            return redirect()->back()->with('message', 'Cliente created successfully');
        }
        else{
            return redirect()->back()->with('message', 'Error created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('cliente_show',['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente_edit',['cliente' => $cliente]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->cliente->where('id', $id) ->update($request->except(['_token', '_method']));
        // var_dump($request->except(['_token', '_method']));
        if ($updated){
            return redirect()->back()->with('message', 'Cliente updated successfully');
        }
        else{
            return redirect()->back()->with('message', 'Error updating cliente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $deleted = $this->cliente->where('id', $id)->delete();

        if($deleted){
            return redirect()->route('clientes.index');
        }
    }
}
