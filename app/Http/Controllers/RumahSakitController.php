<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RumahSakit;

class RumahSakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rumahSakit = RumahSakit::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.rumahSakit.index', compact('rumahSakit'));
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
        $this->validate($request, [
            'nama' => 'required|string|unique:rumah_sakits',
            'alamat' => 'required|string',
        ]);

        try {
            $rumahSakit = RumahSakit::firstOrCreate([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
            ]);
            return redirect()->back()->with(['success' => 'Data Rumah Sakit: ' . $rumahSakit->nama . ' Berhasil Ditambahkan!']);
        } catch (\Exception $e) {
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
        $rumahSakit = RumahSakit::findOrFail($id);
        return view('admin.rumahSakit.edit', compact('rumahSakit'));
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
            'nama' => 'required|string|unique:rumah_sakits',
            'alamat' => 'required|string',
        ]);

        try {
            $rumahSakit = RumahSakit::findOrFail($id);
            $rumahSakit->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat
            ]);
            return redirect(route('rumahsakit.index'))->with(['success' => 'Data Rumah Sakit: ' . $rumahSakit->nama . ' Berhasil diupdate!']);
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
        $rumahSakit = RumahSakit::findOrFail($id);
        $rumahSakit->delete();
        return redirect()->back()->with(['success' => 'Data Rumah Sakit: Berhasil Dihapus!']);
    }
}
