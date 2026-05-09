<?php

namespace App\Http\Controllers;

use App\Models\PublicDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicDocumentController extends Controller
{
    public function index()
    {
        $documents = PublicDocument::forPublic();

        return view('dokumen', compact('documents'));
    }

    public function download(PublicDocument $document)
    {
        if (! Storage::disk('public')->exists($document->file_path)) {
            return back()->with('error', 'File dokumen belum tersedia.');
        }

        $document->increment('download_count');

        return Storage::disk('public')->download($document->file_path, $document->download_label);
    }
}
