<?php

namespace App\Http\Controllers;
use App\Models\Venda;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this ->venda = new Venda();
    }

    public function relatorio()
    {
        $vendas = Venda::with(['cliente', 'user'])->orderByDesc('data')->get();
        return view('vendas.relatorio', compact('vendas'));
    }

    public function marcarComoRecebida($id)
    {
        $venda = Venda::findOrFail($id);
        $venda->recebida = true;
        $venda->save();

        return redirect()->route('vendas.index')->with('message', 'Venda marcada como recebida.');
    }

    public function index(Request $request)
    {
        $clienteId = $request->query('cliente');
    
        $vendas = Venda::with(['cliente', 'user'])
            ->when($clienteId, function ($query, $clienteId) {
                $query->where('cliente_id', $clienteId);
            })
            ->orderByDesc('data')
            ->get();
    
        return view('vendas.index', compact('vendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Cliente $cliente)
    {
        return view('vendas.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'valor' => 'required|numeric',
            'data' => 'required|date',
        ]);    
        
        $created = $this->venda->create([
            'cliente_id' => $validated['cliente_id'],
            'user_id' => Auth::id(),
            'valor' => $validated['valor'],
            'data' => $validated['data'],
        ]);

        if($created){
            return redirect()->route('vendas.index')->with('message', 'Venda created successfully');
        } else{
            return redirect()->back()->with('message', 'Error creating venda');
        }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $venda = Venda::findOrFail($id);
        $clientes = \App\Models\Cliente::all();
        return view('vendas.edit', compact('venda','clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {      
        $updated = $this->venda->where('id', $id) ->update($request->except(['_token', '_method'])); 
        if($updated){
            return redirect()->route('vendas.index')->with('message', 'Venda updated successfully');
        } else {
            return redirect()->back()->with('message', 'Error updating venda');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $venda = Venda::findOrFail($id);
        $venda->delete();

        return redirect()->route('vendas.index')->with('message', 'Venda deleted successfully');
    }
}
