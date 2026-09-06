<?php

namespace App\Http\Controllers;


use App\Models\Custom_userModel;

use Illuminate\Http\Request;


class UserController extends Controller
{
   public function index()
    {
        // ১. ডাটাবেস থেকে সব এজেন্ট ডাটা সংগ্রহ করা
        $agents = Custom_userModel::all();

        // ২. রিয়্যাক্টের জন্য JSON রেসপন্স পাঠানো
        return response()->json($agents, 200);
    }
}
