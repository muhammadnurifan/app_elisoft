<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.list', compact('users'));
    }

    public function getApi()
    {
        $users = User::all();

        return response()->json([
            'status' => (bool) $users,
            'message' => 'Data has been retrieved successfully',
            'data' => $users
        ], 200);
    }

    public function getBankAccount(Request $request)
    {
        $client = new Client();
        $response = $client->request('POST', 'http://149.129.221.143/kanaldata/Webservice/bank_account', [
            'form_params' => [
                'bank_id' => $request->bank_id,
            ]
        ]);
        $data = json_decode($response->getBody());
        return response()->json($data);
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    public function terbilang()
    {
        return view('user.terbilang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|max:255',
            'email'    => 'required|email:dns|unique:users',
            'password' => 'required'
        ]);

        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/users')->with('sukses','Data Inputted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
        ];

        $user = User::find($id);

        if($request->email != $user->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        $validatedData = $request->validate($rules);
        $user->update($validatedData);

        return redirect('/users')->with('sukses','Data Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->id == $id) {
            return back()->with('error', 'Cannot delete data, because you are currently logged in');
        } 

        User::destroy($id);

        return redirect('/users')->with('sukses','Data Successfully Deleted');
    }

    public function ChangePassword()
    {
        return view('user.change_password');
    }

    public function ChangePasswordUpdate(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password'         => 'required',
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->current_password, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect('/')->with('sukses', 'Data updated successfully');
        } else {
            return redirect()->back()->with('error', 'data tidak valid');
        } 
    }

    public function SwappingVariable(Request $request)
    {
        return view('user.swapping_variabel'); 
    }
}
