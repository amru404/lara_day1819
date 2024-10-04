<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();

        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // $this->validate($request, [
        //     'name'     => 'required|string',
        //     'email'    => 'required|string',
        //     'role'    => 'required|string',
        //     'password' => 'required|string',
        // ]);


        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role'    => $request->role,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('admin.user')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.edit', compact('user'));
    }

    
    
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name'     => 'required|string',
            'email'    => 'required|string',
            'role'    => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::findOrFail($id);

        
            $user->update([
                'name'     => $request->name,
                'email'    => $request->email,
                'role'    => $request->role,
                'password' => Hash::make($request->newPassword)
            ]);

        return redirect()->route('admin.user')->with(['success' => 'Data Berhasil Diubah!']);
    }

    
    
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user')->with(['success' => 'Data Berhasil Dihapus!']);
    
    }
}
