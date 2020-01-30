<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index() {
        return view('profile.index');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'address' => 'required',
            'bio' => 'required|min:2',
            'experience' => 'required|min:3',
            'phone_number' => 'required|regex:/(09)[0-9]{9}/'
        ]);

        $user_id = auth()->user()->id;
        Profile::where('user_id', $user_id)->update([
            'address' => request('address'),
            'phone_number' => request('phone_number'),
            'experience' => request('experience'),
            'bio' => request('bio')
        ]);
        return redirect()->back()->with('message', 'Profile Successfully Update');
    }

    public function coverletter(Request $request) {
        $this->validate($request, [
            'cover_letter' => 'required|mimes:pdf,doc,docx|max:20000'
        ]);
        $user_id = auth()->user()->id;
        $cover = $request->file('cover_letter')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'cover_letter' => $cover
        ]);
        return redirect()->back()->with('message', 'Cover Letter Successfully Update');
    }

    public function resume(Request $request) {
        $this->validate($request, [
            'resume' => 'required|mimes:pdf,doc,docx|max:20000'
        ]);        
        $user_id = auth()->user()->id;
        $resume = $request->file('resume')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'resume' => $resume
        ]);
        return redirect()->back()->with('message', 'Resume Successfully Update');
    }

    public function avatar(Request $request) {
        $this->validate($request, [
            'avatar' => 'required|mimes:png,jpeg,jpg|max:20000'
        ]);
        $user_id = auth()->user()->id;
        if($request->hasfile('avatar')) {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/avatar', $filename);
            Profile::where('user_id', $user_id)->update([
                'avator' => $filename
            ]);
            return redirect()->back()->with('message', 'Profile Pic Successfully Update');
        }
    }
}
