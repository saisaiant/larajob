<?php

namespace App\Http\Controllers;

use App\Company;
use App\Profile;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index($id, Company $company) {
        return view('company.index', compact('company'));
    }

    public function create() {
        return view('company.create');
    }

    public function store() {

        // $this->validate($request, [
        //     'address' => 'required',
        //     'bio' => 'required|min:2',
        //     'experience' => 'required|min:3',
        //     'phone_number' => 'required|regex:/(09)[0-9]{9}/'
        // ]);

        $user_id = auth()->user()->id;
        Company::where('user_id', $user_id)->update([
            'address' => request('address'),
            'phone' => request('phone_number'),
            'website' => request('website'),
            'slogan' => request('slogan'),
            'description' => request('description'),
        ]);
        return redirect()->back()->with('message', 'Company Successfully Update');
    }

    public function coverphoto(Request $request) {
        $user_id = auth()->user()->id;
        if($request->hasfile('cover_photo')) {
            $file = $request->file('cover_photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/coverphoto',$filename);
            Company::where('user_id', $user_id)->update([
                'cover_photo' => $filename
            ]);
        }
        return redirect()->back()->with('message', 'Company Cover Photo Successfully Update');
    }

    public function companyLogo(Request $request) {
        $user_id = auth()->user()->id;
        if($request->hasfile('logo')) {
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/logo',$filename);
            Company::where('user_id', $user_id)->update([
                'logo' => $filename
            ]);
        }
        return redirect()->back()->with('message', 'Company Logo Successfully Update');
    }

}
