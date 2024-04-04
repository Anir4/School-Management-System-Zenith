<?php

namespace App\Http\Controllers\admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Http\Controllers\Controller;

class admincontroller extends Controller{
    public function index()
    {
        $users = Admin::all();
        return view('admin.admin', compact('users'));
    }
    public function store (Request $request ){
        $admin = new Admin;
        $admin->nom = $request->nom;
        $admin->prenom = $request->prenom;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->save();

    $user = new User;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->type = 'admin'; 
    $user->userable_type = 'App\Models\Admin';
    $user->userable_id = $admin->id;
    $user->save();

    return redirect()->route('users.index');

    }



    public function update(Request $request)
    {
        if ($request->ajax()) {
            $admin = Admin::find($request->pk);
            if ($admin) {
                $column = $request->column;
                if ($column && in_array($column, $admin->getFillable())) {
                    $admin->update([$column => $request->value]);
                    if ($admin->user) {
                        $admin->user->update([$column => $request->value]);
                    }
                    return response()->json(['success' => true]);
                }
                return response()->json(['error' => 'Invalid column'], 400);
            }
            return response()->json(['error' => 'Admin not found'], 404);
        }
        return response()->json(['error' => 'Invalid request'], 400);
    }
    

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
    
        // Delete associated user
        if ($admin->user) {
            $admin->user->delete();
        }
    
        // Delete admin
        $admin->delete();
    
        return redirect()->route('users.index');
    }
}
