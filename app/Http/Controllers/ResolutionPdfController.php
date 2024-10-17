<?php

namespace App\Http\Controllers;

use App\Models\ResolucionPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ResolutionPdfController extends Controller
{
    public function index(){
        $pdfs = ResolucionPdf::all();
        return Inertia::render('Dashboard', ['pdfs' => $pdfs]);
    }


    public function publicIndex(){
        $pdfs = ResolucionPdf::all();
        return Inertia::render('Resoluciones', ['pdfs' => $pdfs]);
    }

    public function storage(Request $request){

        $validated = $request->validate([
            'numero_resolucion' => 'required|string',
            'nombre_resolucion' => 'required|string',
            'anio' => 'required|numeric',
            'file_path' => 'required|file|mimes:pdf|max:2048'
        ]);

        $filePath = $request->file('file')->storage('resolucionespdf', 'public');

        ResolucionPDF::create([
            'numero_resolucion' => $validated['numero_resolucion'],
            'nombre_resolucion' => $validated['nombre_resolucion'],
            'anio' => $validated['anio'],
            'file_path' => $filePath,
        ]);

        return redirect()->back();

    }

    public function destroy(ResolucionPdf $pdf){
        Storage::disk('public')->delete($pdf->file_path);
        $pdf->delete();
        return redirect()->back();
    }


}
