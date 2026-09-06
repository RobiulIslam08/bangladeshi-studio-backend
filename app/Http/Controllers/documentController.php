<?php

namespace App\Http\Controllers;

use App\Models\documentModel;
use Illuminate\Http\Request;

class documentController extends Controller
{
    // Search documents by iqama number
public function searchData(Request $request)
{
    // ভ্যালিডেশন (নিরাপত্তার জন্য ভালো)
    $request->validate([
        'iqama' => 'required'
    ]);

    $iqama = $request->iqama; // বডি থেকে ডেটা নেওয়া

    $data = documentModel::where('iqamaNumber', $iqama)->get();

    if ($data->isEmpty()) {
        return response()->json([
            'documents' => [],
            'message' => 'No record found'
        ], 200);
    }

    $formattedData = $data->map(function ($item) {
        return [
            'title' => $item->documentTitle,
            'file_url' => asset('storage/' . $item->documentFile),
        ];
    });

    return response()->json(['documents' => $formattedData]);
}

    // Store new documents
    public function storeDocuments(Request $request)
    {
        $iqamaNumber = $request->input('iqamaNumber');
        $titles = $request->input('document_title');
        $files = $request->file('document');

        foreach ($titles as $index => $title) {
            if (isset($files[$index])) {
                // Store file in storage/app/public/uploads/documents
                $path = $files[$index]->store('uploads/documents', 'public');

                // Save to DB using your actual column names
                documentModel::create([
                    'iqamaNumber' => $iqamaNumber,
                    'documentTitle' => $title,
                    'documentFile' => $path,
                ]);
            }
        }

        return response()->json(['message' => 'Documents stored successfully']);
    }
}
