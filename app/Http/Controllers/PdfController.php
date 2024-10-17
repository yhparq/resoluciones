<?php

namespace App\Http\Controllers;

use App\Models\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PdfController extends Controller
{
    public function index(){
        $pdfs = Pdf::all();
        return Inertia::render('Dashboard', ['pdfs' => $pdfs]);
    }
    public function publicIndex(){
        $pdfs = Pdf::all();
        return Inertia::render('Resoluciones', ['pdfs' => $pdfs]);
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|string',
            'file' => 'required|mimes:pdf|max:10000',
        ]);

        $filePath = $request->file('file')->store('pdfs', 'public');

        Pdf::create([
            'name' => $validated['name'],
            'file_path' => $filePath,
        ]);

        return redirect()->back();

    }

    public function destroy(Pdf $pdf){
        Storage::disk('public')->delete($pdf->file_path);
        $pdf->delete();
        return redirect()->back();
    }

}
