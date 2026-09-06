<?php

namespace App\Http\Controllers;

use App\Models\MuqeemUserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MuqeemModel;
use App\Models\MuqeemEnglishModel;
use App\Models\MuqeemArabic;
use Spatie\Browsershot\Browsershot;

use Illuminate\Support\Facades\DB;



class MuqeemUserController extends Controller
{
    
    // auth check
    public function check(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Direct match without hash (NOT recommended for production)
        $user = MuqeemUserModel::where('email', $email)
                          ->where('password', $password)
                          ->first();

        if ($user) {
    // Login successful
    Auth::login($user);
    
    return redirect('/muqeemUser'); // This will redirect to that route/page
} else {
    // Invalid credentials
    return response()->json(['message' => 'Invalid email or password'], 401);
}

    }
    
    // muqeemPDFuserSubmit data insert
    public function muqeemPDFuserSubmit(Request $request){
        
       
       
        // Validate the uploaded files
    $validated = $request->validate([
        'personImg' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        'detailsImg' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf',
        'iqamaNumber' => 'required|digits:10',
        'name' => 'required|string',
    ]);

    $iqama = $validated['iqamaNumber'];

    // Store the person image in the "public/uploads/person" directory
    $personImgPath = $request->file('personImg')->storeAs(
        'person',
        $iqama . '.' . $request->file('personImg')->getClientOriginalExtension(),
        'public'
    );

    $input_file = $request->file('detailsImg');
    $detailsImgPath = null;

    if (strtolower($input_file->getClientOriginalExtension()) === 'pdf') {
        $input_path = $input_file->getPathname();
        $output_jpg = storage_path("app/public/details/{$iqama}.jpg");

        if (!file_exists(storage_path('app/public/details/'))) {
            mkdir(storage_path('app/public/details/'), 0777, true);
        }

        $convert_path = "/usr/bin/convert"; // Make sure ImageMagick installed
        $command = "$convert_path -density 300 \"$input_path\" -background white -alpha remove -flatten -quality 100 \"$output_jpg\"";

        exec($command, $output, $return_var);

        if ($return_var === 0 && file_exists($output_jpg)) {
            $detailsImgPath = "details/{$iqama}.jpg";
        }
    } else {
        $detailsImgPath = $input_file->storeAs(
            'details',
            $iqama . '.' . $input_file->getClientOriginalExtension(),
            'public'
        );
    }

    $successData = MuqeemModel::create([
        'personImg' => $personImgPath,
        'detailsImg' => $detailsImgPath,
        'iqamaNumber' => $iqama,
        'name' => $validated['name'],
    ]);
    
    $user = Auth::user();
       $user->limit = $user->limit - 1;
    $user->save();
    
    return redirect()->route('check-muqeem', ['id' => $successData->id]);
    }
    
    // 
    public function muqeemEnglishUserSubmit(Request $request)
    {
        $validated = $request->validate([
            'reportDate' => 'required|string',
            'operatorId' => 'required|string',
            'location' => 'required|string',
            'iqamaNumber' => 'required|string',
            'versionNumber' => 'required|string',
            'gender' => 'required|string',
            'name' => 'required|string',
            'translatedName' => 'required|string',
            'birthDate' => 'required|string',
            'birthCountry' => 'required|string',
            'maritalStatus' => 'required|string',
            'religion' => 'required|string',
            'occupation' => 'required|string',
            'status' => 'required|string',
            'entryDate' => 'required|string',
            'entryLocation' => 'required|string',
            'passportNumber' => 'required|string',
            'nationality' => 'required|string',
            'passportIssueDate' => 'required|string',
            'passportExpiryDate' => 'required|string',
            'passportIssueLocation' => 'required|string',
            'iqamaIssueDate' => 'required|string',
            'iqamaExpiryDate' => 'required|string',
            'iqamaIssueLocation' => 'required|string',
            'employerNumber' => 'required|string',
            'employerName' => 'required|string',
        ]);

        // Store data
        $record = MuqeemEnglishModel::create($validated);
        
        $user = Auth::user();
       $user->limit = $user->limit - 1;
       $user->save();
        
        return redirect("https://bangladeshistudeo.com/muqeemEnglishCheck?id=" . $record->id);
        
    }
    
   public function muqeemArabicUserSubmit(Request $request)
 {
     
    $validated = $request->validate([
        'reportDate' => 'required|string',
        'operatorId' => 'required|string',
        'location' => 'required|string',
        'iqamaNumber' => 'required|string',
        'versionNumber' => 'required|string',
        'gender' => 'required|string',
        'name' => 'required|string',
        'translatedName' => 'required|string',
        'birthDate' => 'required|string',
        'birthCountry' => 'required|string',
        'maritalStatus' => 'required|string',
        'religion' => 'required|string',
        'occupation' => 'required|string',
        'status' => 'required|string',
        'entryDate' => 'required|string',
         'entryLocation' => 'required|string',
         'passportNumber' => 'required|string',
         'nationality' => 'required|string',
         'passportIssueDate' => 'required|string',
         'passportExpiryDate' => 'required|string',
         'passportIssueLocation' => 'required|string',
         'iqamaIssueDate' => 'required|string',
         'iqamaExpiryDate' => 'required|string',
         'iqamaIssueLocation' => 'required|string',
         'employerNumber' => 'required|string',
         'employerName' => 'required|string',
     ]);
     
      $user = Auth::user();
       $user->limit = $user->limit - 1;
       $user->save();

     // Insert the record
     $insertRecord = MuqeemArabic::create($validated);

   
     // Redirect after success
     return redirect("https://bangladeshistudeo.com/muqeemArabic?id=" . $insertRecord->id);
 }


    


public function selectAllMuqeemUser(){
    $Alluser = MuqeemUserModel::all();


    return view('dashboard.muqeem.muqeemAllUser', compact('Alluser'));
}

 
 public function MuqeemUserStore(Request $request)
{
    $Name = $request->input('Name');
    $email = $request->input('email');
    $phone = $request->input('phone');
    $status = $request->input('status');
    $limit = $request->input('limit');

    $newUser = MuqeemUserModel::create([
        'Name' => $Name,
        'email' => $email,
        'phone' => $phone,
        'status' => $status,
        'limit' => $limit,
        'password' => "Reset",
    ]);

    return redirect()->back()->with('success', 'Muqeem New User Create Successfull')->with('login_link','https://bangladeshistudeo.com/passwordReset?id='.$newUser->id);
}
public function muqeemUserStatusChangeFun(Request $request)
{
    $admin_id = $request->input('admin_id');
    $status = $request->input('status');

    $muqeemUser = MuqeemUserModel::find($admin_id); // just pass the ID only

    if ($muqeemUser) {
        $muqeemUser->status = $status; // or $muqeemUser->admin_status if your DB field is admin_status
        $muqeemUser->save();

        return response()->json(['message' => 'Status updated successfully.']);
    } else {
        return response()->json(['message' => 'User not found.'], 404);
    }
}

  function updatelimitmuqeem(Request $request){
  
      $limit = $request->input('limit');
        $user = Auth::user();
       $user->limit = $user->limit + $limit;
       $user->save();
      
  }
  
  function passwordReset(Request $request){
      $id = $request->query('id');
      $muqeemUser = MuqeemUserModel::find($id);
      if($muqeemUser->password=="Reset"){
          return view('muqeem.resetPassword', ['id' => $id]);
      }else{
          return view('muqeem.login');
      }
      
  }
  
  public function setPassword(Request $request)
{
    $id = $request->input('id'); // ✅ Changed from query() to input()
    $email = $request->input('email');
    $name = $request->input('full_name');
    $newPassword = $request->input('newPassword');
    $confirmPassword = $request->input('confirmPassword');

    $muqeemUser = MuqeemUserModel::find($id);

    if (!$muqeemUser) {
        return "User not found.";
    }

    if ($muqeemUser->email == $email) {
        if ($newPassword === $confirmPassword) {
            $muqeemUser->password = $newPassword; // 🚨 Use hashing in production
            $muqeemUser->save();
            return 'Password updated successfully. <a href="https://bangladeshistudeo.com/muqeem/login">Click here to login</a>';

        } else {
            return "Your Password and Confirm Password do not match.";
        }
    } else {
        return "Your Email does not match our records.";
    }
}


 public function updateLimit(Request $request)
    {
        $adminId = $request->input('admin_id');
        $totalLimit = $request->input('total_limit');

        $admin = MuqeemUserModel::find($adminId);
        if ($admin) {
            $admin->limit = $totalLimit;
            $admin->save();
            return response()->json('Updated successfully');
        } else {
            return response()->json('Admin not found', 404);
        }
    }
  
}
