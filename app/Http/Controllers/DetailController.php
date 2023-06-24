<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        return view('adminArea.detailUser', [
        'user' => $user,
        ]);
    }
}
