<?php

namespace App\Http\Controllers;

use App\Models\tb_m_project;
use App\Models\tb_m_client;
use Illuminate\Http\Request;

class ProjectController extends Controller
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
        //menampilkan semua data dari model Project
        $Project = tb_m_project::all();
        return view('project.index', compact('Project'));
    }

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tb_m_clients = tb_m_client::all();
        return view('project.create', compact('tb_m_clients'));
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
            'client_id' => 'required',
            'start' => 'required',
            'end' => 'required',
            'status' => 'required',
            
        ]);

        $Project = new tb_m_project();
        $Project->name = $request->name;
        $Project->client_id = $request->client_id;
        $Project->start = $request->start;
        $Project->end = $request->end;
        $Project->status = $request->status;
        $Project->save();
        return redirect()->route('project.index')
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
        $Project = tb_m_project::findOrFail($id);
        return view('project.show', compact('Project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Project = tb_m_project::findOrFail($id);
        $tb_m_clients = tb_m_client::all();
        return view('project.edit', compact('Project','tb_m_clients'));

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
            'client_id' => 'required',
            'start' => 'required',
            'end' => 'required',
            'status' => 'required',
        
        ]);

        $Project = tb_m_project::findOrFail($id);
        $Project->name = $request->name;
        $Project->client_id = $request->client_id;
        $Project->start = $request->start;
        $Project->end = $request->end;
        $Project->status = $request->status;
        $Project->save();
        return redirect()->route('project.index')
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
        $Project = tb_m_project::findOrFail($id);
        $Project->delete();
        return redirect()->route('project.index')
            ->with('success', 'Data berhasil dihapus!');
    }

    public function deleteAll(Request $request){

        $ids = $request->ids;
        tb_m_project::whereIn('id', $ids)->delete();
        return response()->json(["success"=> "Data Berhasil Di Hapus!'"]);

    }
    
}