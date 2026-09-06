<?php

namespace App\Http\Controllers;

use App\Models\Custom_userModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// এই নিচের ২টি লাইন অবশ্যই যোগ করতে হবে
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Validator;

class UserRegisterController extends Controller
{
    
     public function login(Request $request)
  {
    // ১. ইনপুট ভ্যালিডেশন
    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    // ২. ইউজার খুঁজে বের করা (Email অথবা Phone দিয়েও চেক করতে পারেন)
    $user = Custom_userModel::where('email', $request->email)
                            ->orWhere('phone', $request->email)
                            ->first();

    // ৩. ইউজার এবং পাসওয়ার্ড ভেরিফিকেশন
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid email or password'
        ], 401);
    }

    // ৪. লগইন সাকসেস রেসপন্স
    return response()->json([
        'status' => 'success',
        'message' => 'Login successful',
        'user' => [
            'id' => $user->id,
            'name' => $user->fname,
            'email' => $user->email,
            'balance' => $user->balance,
            'role' => $user->title 
        ]
    ], 200);
  }

  public function index()
    {
        // ডাটাবেস থেকে সব এজেন্ট ডাটা সংগ্রহ করা
        $agents = Custom_userModel::all();

        // রিয়্যাক্টের জন্য JSON রেসপন্স পাঠানো
        return response()->json($agents, 200);
    }

    public function addBalance(Request $request)
  {
    // ১. ডাটা রিসিভ করা (যদি না আসে তবে ডিফল্ট ০)
    $id = $request->input('agent_id');
    $amount = $request->input('amount');

    if (!$id || !$amount) {
        return response()->json(['message' => 'ID and Amount are required'], 400);
    }

    try {
        $agent = Custom_userModel::findOrFail($id);
        
        // ২. সরাসরি আপডেট (নিশ্চিত হোন কলামের নাম 'balance')
        $agent->increment('balance', (float)$amount);

        return response()->json([
            'status' => 'success',
            'message' => 'Balance Updated!',
            'new_balance' => $agent->balance
        ], 200);

    } catch (\Exception $e) {
        return response()->json(['message' => 'Agent not found or Error: ' . $e->getMessage()], 404);
    }
}


 public function customRegister(Request $request)
{
    $request->validate([
        'fname'     => 'required|string|max:255',
        'lname'     => 'required|string|max:255',
        'email'     => 'required|email|unique:custom_user,email',
        'phone'     => 'required|string|max:20',
        'password'  => 'required|min:6|confirmed',
    ]);

    // ইউজার তৈরি
    $user = Custom_userModel::create([
        'fname'     => $request->fname,
        'lname'     => $request->lname,
        'email'     => $request->email,
        'phone'     => $request->phone,
        'password'  => Hash::make($request->password),
        'balance'   => 0, // ডিফল্ট ব্যালেন্স
        'title'     => 'User', // ডিফল্ট রোল
    ]);

    // সাকসেস রেসপন্স (লগইন এর মতো ডাটা স্ট্রাকচার)
    return response()->json([
        'status' => 'success',
        'message' => 'Registration Successful!',
        'user' => [
            'id' => $user->id,
            'name' => $user->fname,
            'email' => $user->email,
            'balance' => $user->balance,
            'role' => $user->title // আপনার ডাটাবেসে কলামের নাম 'title' হলে
        ]
    ], 201);
}


 public function updateStatus(Request $request)
{
    // রিকোয়েস্ট থেকে ডাটা নেওয়া
    $agent_id = $request->agent_id;
    $status = $request->status;

    try {
        // ১. ডাটাবেস আপডেট করা
        // এখানে where ক্লজ ব্যবহার করে নির্দিষ্ট ID খুঁজে বের করতে হবে
        $updated = Custom_userModel::where('id', $agent_id)
            ->update(['acount_satatus' => $status]);

        if ($updated) {
            // ২. সাকসেস রেসপন্স
            return response()->json([
                'status' => 'success',
                'message' => 'Agent status updated to ' . $status
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Agent not found'
        ], 404);

    } catch (\Exception $e) {
        // ৩. এরর হ্যান্ডলিং
        return response()->json([
            'status' => 'error',
            'message' => 'Update failed: ' . $e->getMessage()
        ], 500);
    }
}

}