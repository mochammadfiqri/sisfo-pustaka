<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function userApprove($id)
    {
        $user = User::where('id', $id)->first();
        $user->status = 'active';
        $user->save();
        return redirect('/users')->with('toast_success', 'Yeayy, Approval Berhasil !');
    }
    
    public function index($id)
    {
        $user = User::find($id);
        $rentLogs = RentLogs::with(['user', 'book'])->where('user_id', $user->id)->get();

        return view('adminArea.detailUser', [
            'user' => $user,
            'rentLogs' => $rentLogs
        ]);
    }
}
