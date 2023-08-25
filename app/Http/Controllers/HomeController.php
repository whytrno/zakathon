<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $check = false;
        $user = User::where('id', Auth::user()->id)->with('muzakki')->first();
        $getJenis = $user->muzakki->jenis;

        $exceptAttributeForPerorangan = [
            'nama_pimpinan',
            'nik_pimpinan',
            'nama_cp',
            'telp_cp'
        ];

        $tesTrue = [];
        $tesFalse = [];

        if($getJenis == 'perorangan'){
            foreach($user->getAttributes() as $index => $atribute){
                // jika atribute kecuali yang ada di array $exceptAttributeForPerorangan itu ada yang null, maka $check = false
                if(in_array($index, $exceptAttributeForPerorangan)){
                    if($user->$atribute === null){
                        $check = false;
                        array_push($tesTrue, $index);
                    }else{
                        $check = true;
                        array_push($tesFalse, $index);
                    }
                }
            }
        }
        // dd($tesTrue, $tesFalse);

        // $requiredAttributes = [
        //     'nama_pimpinan',
        //     'nik_pimpinan',
        //     'nama_cp',
        //     'telp_cp'
        // ];

        // if ($getJenis != 'perorangan') {
        //     foreach ($requiredAttributes as $attribute) {
        //         if ($user->$attribute === null) {
        //             $check = false;
        //             break;
        //         } else {
        //             $check = true;
        //         }
        //     }
        // } else {
        //     $check = false;
        // }

        // dd($check);


        return view('home.index', compact('check'));
    }

    public function profile()
    {
        return view('home.profile');
    }

    public function history()
    {
        return view('home.history');
    }
    public function editProfile()
    {
        return view('home.edit-profile');
    }

    public function updateProfile(Request $request){
        // dd($request->all());


        $auth = Auth::user();
        $user = User::findOrFail($auth->id);

        $request->validate([
            'nama' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,'.$auth->id,
            'nik' => 'nullable|string|min:16|unique:users,nik,'.$auth->id,
            'jenis_kelamin' => 'nullable|in:laki-laki,perempuan',
            'telepon' => 'nullable|string|min:10',
            'password' => 'nullable|string',
        ]);
        if($request->password == '' | $request->password == null){
            $user->update($request->only('nama','email','nik','jenis_kelamin','telepon'));
        }else{
            $user->update($request->only('nama','email','nik','jenis_kelamin','telepon','password'));

        }

        $user->muzakki->update([
            'jenis' => $request->jenis,
        ]);
        return redirect()->back()->with('success','Berhasil mengubah data');

    }
}
