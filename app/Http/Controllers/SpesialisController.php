<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spesialis;

class SpesialisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spesialis = Spesialis::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.spesialis.index', compact('spesialis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.spesialis.create');
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
            'nama' => 'required|string',
        ]);

        try{
            $spesialis = Spesialis::firstOrCreate([
                'nama' => $request->nama
            ]);
            return redirect()->back()->with(['success' => 'Data Spesialis: ' . $spesialis->nama . ' Berhasil Ditambahkan!']);
        }catch(\Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
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
        $spesialis = Spesialis::findOrFail($id);
        return view('admin.spesialis.edit', compact('spesialis'));
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
            'nama' => 'required|string',
        ]);
        try {
            $spesialis = Spesialis::findOrFail($id);
            $spesialis->update([
                'nama' => $request->nama,
            ]);
            return redirect(route('spesialis.index'))->with(['success' => 'Data Spesialis: ' . $spesialis->nama . ' Berhasil Diupdate!']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $speisalis = Spesialis::findOrFail($id);
        $speisalis->delete();
        return redirect()->back()->with(['success' => 'Data Spesialis: Berhasil Dihapus!']);
    }
}
