<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index', ['users' => User::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|unique:user|max:255',
            'no_tlp' => 'required|max:255',
            'alamat' => 'required',
            'password' => 'required',
            'level' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        if ($request->has('gambar')) {
            $imagePath = $request->file('gambar')->store('user', 'public');
            $validated['gambar'] = $imagePath;

        }
        User::create($validated);
        Alert::success('Hore!', 'User baru berhasil ditambahkan!');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(User::find($id));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', ['detail_user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|max:255',
            'no_tlp' => 'required|max:255',
            'alamat' => 'required',
            'password' => 'required',
            'level' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->has('gambar')) {
            $imagePath = $request->file('gambar')->store('user', 'public');
            $validated['gambar'] = $imagePath;
            if (!is_null($user->gambar)) {
                Storage::disk('public')->delete($user->gambar);
                //delete gambar
            }
        }

        $user->update($validated);
        Alert::success('Hore!', 'User berhasil diubah!');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        Alert::success('Hore!', 'User berhasil dihapus!');
        return redirect()->back();

    }
}
