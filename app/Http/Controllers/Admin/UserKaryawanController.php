<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\StatusKaryawan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserKaryawanController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_karyawan = User::where('role', '2')->get();
        return view('admin.user.karyawan.index', compact('user_karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $this->validate(request(), [
        'name' => 'required',
        'email' => 'required',
        'password' => 'nullable',
        'role' => 'nullable'
    ], [
        'name.required' => 'Nama tidak boleh kosong',
        'email.required' => 'Email tidak boleh kosong',
        // 'password.required' => 'Password tidak boleh kosong',
        // 'role.required' => 'Role tidak boleh kosong'
    ]);

    try {
        DB::beginTransaction();

        $usersAdmin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 2,
            'password' => bcrypt('karyawan')
        ]);

        $statusKaryawan = StatusKaryawan::create([
            'karyawan_id' => $usersAdmin->id,
            'status' => 'INACTIVE',
        ]);

        DB::commit();

        return back()->with(['success' => 'Data Berhasil Disimpan!']);
    } catch (\Exception $e) {
        DB::rollback();
        return back()->with(['error' => 'Data Gagal Disimpan!']);
    }
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
        //
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
            $usersAdmin = User::findOrFail($id);

            if($request->password == ''){
                $usersAdmin->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    // 'role' => $request->role
                ]);
            }else{
                $usersAdmin->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    // 'role' => $request->role,
                    // 'password' => bcrypt($request->password)
                ]);
            }

            if($usersAdmin){
                return back()->with(['success' => 'Data Berhasil Diupdate!']);
            }else{
                return back()->with(['error' => 'Data Gagal Diupdate!']);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            User::findOrFail($id)->delete();
            return back()->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
