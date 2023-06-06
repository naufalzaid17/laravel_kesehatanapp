<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apotek;

class ApotekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apotek = Apotek::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.apotek.index', compact('apotek'));
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
            'nama' => 'required|string|unique:apoteks',
            'alamat' => 'required|string',
        ]);

        try {
            $apotek = Apotek::firstOrCreate([
                'nama' => $request->nama,
                'alamat' => $request->alamat
            ]);
            return redirect()->back()->with(['success' => 'Data Apotek: ' . $apotek->nama . ' Berhasil Ditambahkan!']);
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
        $apotek = Apotek::findOrFail($id);
        return view('admin.apotek.edit', compact('apotek'));
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
            'nama' => 'required|string|unique:apoteks',
            'alamat' => 'required|string',
        ]);

        try {

            $apotek = Apotek::findOrFail($id);
            $apotek->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat
            ]);
            return redirect(route('apotek.index'))->with(['success' => 'Data Apotek: ' . $apotek->nama . ' Berhasil Diupdate!']);

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
        $apotek = Apotek::findOrFail($id);
        $apotek->delete();
        return redirect()->back()->with(['success' => 'Data Apotek: Berhasil Dihapus!']);
    }
}
