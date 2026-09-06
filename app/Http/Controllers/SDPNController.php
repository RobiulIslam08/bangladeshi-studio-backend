<?php
namespace App\Http\Controllers;

use App\Models\SDPNModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SDPNController extends Controller
{
    // Store data from the form
    public function store(Request $request)
{
    $validated = $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'iqama_no' => 'nullable|string|max:255',
        'passport_no' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:255',
        'sdpn_no' => 'nullable|string|max:255',
    ]);

    $fileName = null;

    if ($request->hasFile('image')) {
        $fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/images'), $fileName);
    }

    SDPNModel::create([
        'image' => $fileName,
        'iqama_no' => $request->iqama_no,
        'passport_no' => $request->passport_no,
        'phone' => $request->phone,
        'sdpn_no' => $request->sdpn_no,
    ]);

    return response()->json([
    'status' => 'success',
    'message' => 'SDPN data has been added successfully.',
], 201);

}

    // Store old data from the form
  public function oldallstore(Request $request)
{
    // Validate the input
    $request->validate([
        'image' => 'required|array|min:1', // Ensure at least one image is uploaded
        'image.*' => 'image|mimes:jpeg,png,jpg',
    ]);

    $fileDetails = [];

    foreach ($request->file('image') as $image) {
        $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $image->getClientOriginalExtension();

        // Unique filename to prevent overwriting
        $fileName = time() . '_' . uniqid() . '.' . $extension;

        // Move the file to the uploads directory
        $image->move(public_path('uploads/images'), $fileName);

        // Save file details in the database
        SDPNModel::create([
            'image' => $fileName,
            'sdpn_no' => $originalName,
        ]);

        // Store details for response
        $fileDetails[] = [
            'originalName' => $originalName,
            'extension' => $extension,
            'savedFileName' => $fileName
        ];
    }

    return view('testingpage', compact('fileDetails'));
}



    // 
public function search(Request $request)
{
    // ডাটাবেসে সার্চ করা (infoType কলামে info ভ্যালু খুঁজবে)
    $result = SDPNModel::where($request->infoType, $request->info)->first();

    if ($result && $result->image) {
        return response()->json([
            'status' => 'success',
            'message' => 'Data found!',
            'result' => $result
        ], 200);
    }

    // যদি না পাওয়া যায়
    return response()->json([
        'status' => 'error',
        'message' => 'Your data not match'
    ], 404);
}

 public function testStatic()
{
    $table = (new SDPNModel)->getTable();

    // আপনার screenshot অনুযায়ী value (string হিসেবে)
    $column = 'iqama_no';
    $value  = '147852369';

    $q = SDPNModel::where($column, $value);
    $sql = $q->toSql();
    $bindings = $q->getBindings();

    $result = $q->first();

    return response()->json([
        'table'    => $table,
        'sql'      => $sql,
        'bindings' => $bindings,
        'found'    => (bool) $result,
        'result'   => $result,
    ]);
}

 public function searchTest()
{
    $infoType = 'iqama_no';
    $info = '147852369';

    $result = SDPNModel::where($infoType, $info)->first();

    if(!$result){
        return response()->json([
            'status'=>'not_found',
            'message'=>'not found'
        ],404);
    }

    return response()->json([
        'status'=>'success',
        'result'=>$result,
        'image_url'=>asset('uploads/images/'.$result->image)
    ]);
}


}
