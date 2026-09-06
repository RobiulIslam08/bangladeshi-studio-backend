<?php

namespace App\Http\Controllers;

use App\Models\Visa;
use Illuminate\Http\Request;

use Carbon\Carbon;

class VisaController extends Controller
{
    /**
     * Show the form to create a new visa record.
     */
public function createVisa()
{
    $today = Carbon::now()->format('d/m/Y');
    $todayPlus90 = Carbon::now()->addDays(90)->format('d/m/Y');
    
    $maxid = Visa::max('id');  
    $nextId = ($maxid ?? 0) + 1;
    $rep_num = "E" . (7905844426 + $nextId);
    $appl_num = 1305068167 + $nextId;
    $visa_num = 6140381902 + $nextId;

    $data = [
        'today'        => $today,
        'todayPlus90'  => $todayPlus90,
        'rep_num'  => $rep_num,
        'appl_num'  => $appl_num,
        'visa_num'  => $visa_num
    ];
    
    

    

    return view('dashboard.visaForm', compact('data'));
}


    /**
     * Store a newly created visa record in storage.
     */
    public function visaStore(Request $request)
{
    // 1) Validate form data
    $validated = $request->validate([
        'header_datetime'  => 'nullable|string|max:255',

        'profile_photo'    => 'nullable|image|mimes:jpeg,png,jpg,gif',

        'visa_no'          => 'nullable|string|max:50',
        'duration_of_stay' => 'nullable|string|max:50',

        // dd/mm/yyyy as string
        'valid_from'       => 'nullable|string|max:20',
        'valid_until'      => 'nullable|string|max:20',

        'f_name'           => 'nullable|string|max:100',
        'l_name'           => 'nullable|string|max:100',

        'visa_type'        => 'nullable|string|max:150',

        // HTML date input => YYYY-MM-DD
        'birth_date'       => 'nullable|date',

        'passport_no'      => 'nullable|string|max:50',
        'ref_no'           => 'nullable|string|max:50',
        'application_no'   => 'nullable|string|max:50',

        'occupation'       => 'nullable|string|max:150',
        'employer_name'    => 'nullable|string|max:255',
        'visafooterTitle'    => 'nullable|string|max:500',
    ]);

    // 2) Handle profile photo upload (optional)
    $profilePath = null;

    if ($request->hasFile('profile_photo')) {
        $file = $request->file('profile_photo');

        // unique file name = time + "_" + 4 digit random + .extension
        $uniqueName = time() . '_' . mt_rand(1000, 9999) . '.' . $file->getClientOriginalExtension();

        // save file into storage/app/public/visa_profiles
        $file->storeAs('visa_profiles', $uniqueName, 'public');

        // path stored in DB
        $profilePath = 'visa_profiles/' . $uniqueName;
    }

    // 3) Create and save visa record
    $visa = new Visa();

    $visa->header_datetime  = $validated['header_datetime'] ?? null;
    $visa->profile_photo    = $profilePath;

    $visa->visa_no          = $validated['visa_no'] ?? null;
    $visa->duration_of_stay = $validated['duration_of_stay'] ?? null;

    $visa->valid_from       = $validated['valid_from'] ?? null;   // dd/mm/yyyy
    $visa->valid_until      = $validated['valid_until'] ?? null;  // dd/mm/yyyy

    $visa->f_name           = $validated['f_name'] ?? null;
    $visa->l_name           = $validated['l_name'] ?? null;

    $visa->visa_type        = $validated['visa_type'] ?? null;

    $visa->birth_date       = $validated['birth_date'] ?? null;   // YYYY-MM-DD

    $visa->passport_no      = $validated['passport_no'] ?? null;
    $visa->ref_no           = $validated['ref_no'] ?? null;
    $visa->application_no   = $validated['application_no'] ?? null;

    $visa->occupation       = $validated['occupation'] ?? null;
    $visa->employer_name    = $validated['employer_name'] ?? null;
    $visa->visafooterTitle    = $validated['visafooterTitle'] ?? null;

    $visa->save();
$visaId = $visa->id;
return response()->json([
    'status' => 'success',
    'message' => "Visa record created successfully! <a href='" . url("/visaCheck?visaId=$visaId") . "' target='_blank' style='color: blue; font-weight: bold;'>View Visa</a>",
], 201);
}

public function visaCheck(Request $request)
{
    $get_visa_id = $request->visaId;   // example: 1

    // Find visa by ID
    $visa = Visa::find($get_visa_id);

    if (!$visa) {
        return "No visa found!";
    }

    return view('dashboard.visa.visa', compact('visa'));
}


}
