<?php

namespace App\Http\Controllers;

use App\Models\Souvenir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SouvenirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $souvenirs = Souvenir::orderBy('id', 'DESC')->get();
        return view('admin.souvenirs.index', compact('souvenirs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.souvenirs.create');
    }

    /**
     * Show the form for editing the specified souvenir.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $souvenir = Souvenir::findOrFail($id);  // Find the souvenir or fail with a 404 error
        return view('admin.souvenirs.edit', compact('souvenir'));  // Return the edit view with the souvenir data
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'pdf' => 'required|file|mimes:pdf|max:10000',
        ]);
        
        if ($request->hasFile('pdf')) {
            $pdfName = time().'.'.$request->pdf->extension();
            $request->pdf->move(public_path('pdf/souvenirs'), $pdfName);
            $data['pdf'] = 'pdf/souvenirs/'.$pdfName;
        }

        Souvenir::create($data);

        return redirect()->route('admin.souvenirs.index')
            ->with('success', 'Record created successfully');
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
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'pdf' => 'file|mimes:pdf|max:10000',
        ]);

        $souvenir = Souvenir::findOrFail($id); // Find the souvenir or fail with a 404 error

        if ($request->hasFile('pdf')) {
            if ($souvenir->pdf) {
                File::delete(public_path($souvenir->pdf));
            }

            $pdfName = time().'.'.$request->pdf->extension();
            $request->pdf->move(public_path('pdf/souvenirs'), $pdfName);
            $data['pdf'] = 'pdf/souvenirs/'.$pdfName;
        }

        $souvenir->update($data);

        return redirect()->route('admin.souvenirs.index')
            ->with('success', 'Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $souvenir = Souvenir::findOrFail($id);  
        
        if ($souvenir->pdf) {
            File::delete(public_path($souvenir->pdf));
        }
        
        $souvenir->delete();

        return redirect()->route('admin.souvenirs.index')
            ->with('success', 'Record deleted successfully');
    }
}