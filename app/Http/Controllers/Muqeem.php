<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MuqeemModel;
use Illuminate\Support\Facades\File;

class Muqeem extends Controller
{

public function store(Request $request)
{
    // Validation
    $request->validate([
        'name'        => 'required|string',
        'iqamaNumber' => 'required',
        'personImg'   => 'required|image|mimes:jpeg,png,jpg',
        'detailsImg'  => 'required|mimes:pdf,jpeg,png,jpg',
    ]);

    try {
        $filenameUnique = time() . '_' . mt_rand(1000, 9999);

        // Directories
        $personDir  = public_path('person');
        $detailsDir = public_path('details');

        if (!File::exists($personDir)) {
            File::makeDirectory($personDir, 0755, true);
        }

        if (!File::exists($detailsDir)) {
            File::makeDirectory($detailsDir, 0755, true);
        }

        // ============================
        // 1) Person Image Save
        // ============================
        $personImgPath = "";

        if ($request->hasFile('personImg')) {
            $personFile = $request->file('personImg');
            $personName = $filenameUnique . '_person.' . $personFile->getClientOriginalExtension();

            $personFile->move($personDir, $personName);

            $personImgPath = "person/" . $personName;
        }

        // ============================
        // 2) Details Image / PDF
        // ============================

        $detailsFile = $request->file('detailsImg');

        $isPdf =
            $detailsFile->getMimeType() === 'application/pdf' ||
            strtolower($detailsFile->getClientOriginalExtension()) === 'pdf';

        if ($isPdf) {

            // Save PDF
            $pdfName = $filenameUnique . "_details.pdf";
            $savedPdfPath = $detailsDir . DIRECTORY_SEPARATOR . $pdfName;

            $detailsFile->move($detailsDir, $pdfName);

            // JPG Output
            $outputJpgName = $filenameUnique . "_details.jpg";
            $outputPath = $detailsDir . DIRECTORY_SEPARATOR . $outputJpgName;

            // Detect OS
            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {

                // Windows
                $command = "magick";

            } else {

                // Linux (AlmaLinux / Ubuntu / CentOS)
                $command = "/usr/bin/convert";

            }

            // Build command
            $cmd = $command
                . " -density 150 "
                . escapeshellarg($savedPdfPath . "[0]")
                . " -quality 90 "
                . escapeshellarg($outputPath);

            $output = [];
            $status = 0;

            exec($cmd . " 2>&1", $output, $status);

            if ($status !== 0 || !file_exists($outputPath)) {

                throw new \Exception(
                    "PDF to JPG convert failed.\n\nCommand:\n"
                    . $cmd
                    . "\n\nOutput:\n"
                    . implode("\n", $output)
                );
            }

            // Delete PDF after conversion (optional)
            // @unlink($savedPdfPath);

            $detailsImgPath = "details/" . $outputJpgName;

        } else {

            // Already image
            $detailsName = $filenameUnique . "_details." . $detailsFile->getClientOriginalExtension();

            $detailsFile->move($detailsDir, $detailsName);

            $detailsImgPath = "details/" . $detailsName;
        }

        // ============================
        // 3) Save Database
        // ============================

        $data = MuqeemModel::create([
            'name'        => $request->name,
            'iqamaNumber' => $request->iqamaNumber,
            'personImg'   => $personImgPath,
            'detailsImg'  => $detailsImgPath,
            'user_id'     => $request->user_id ?? 1,
            'user_roll'   => $request->user_roll ?? 'Admin',
        ]);

        $viewUrl = url("/checkMuqeem/{$data->id}");

        return response()->json([
            'status'  => 'success',
            'message' => "Muqeem created successfully! <a href='{$viewUrl}' target='_blank'>View Muqeem</a>",
            'data'    => $data
        ], 200);

    } catch (\Exception $e) {

        return response()->json([
            'status'  => 'error',
            'message' => 'Something went wrong: ' . $e->getMessage()
        ], 500);

    }
}


    public function checkMuqeem(Request $request)
    {
        $muqeemInfo = MuqeemModel::findOrFail($request->id);
        return view('dashboard.muqeem.view-muqeem', compact('muqeemInfo'));
    }
}