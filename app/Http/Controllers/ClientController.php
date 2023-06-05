<?php

namespace App\Http\Controllers;

use App\Models\tb_m_client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan semua data dari model Client
        $Client = tb_m_client::all();
        return view('client.index', compact('Client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            
        ]);

        $Client = new tb_m_client();
        $Client->name = $request->name;
        $Client->address = $request->address;
        $Client->save();
        return redirect()->route('client.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Client = tb_m_client::findOrFail($id);
        return view('client.show', compact('Client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Client = tb_m_client::findOrFail($id);
        return view('client.edit', compact('Client'));

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
        // Validasi
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
        
        ]);

        $Client = tb_m_client::findOrFail($id);
        $Client->name = $request->name;
        $Client->address = $request->address;
        $Client->save();
        return redirect()->route('client.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Client = tb_m_client::findOrFail($id);
        $Client->delete();
        return redirect()->route('client.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}