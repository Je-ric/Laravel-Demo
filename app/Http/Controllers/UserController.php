<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use  Illuminate\Support\Facades\DB;
// use Hash;
// use DB;

class UserController extends Controller
{
    public function student_index()
    {
        $users = User::where('user_type', 'student')->get();

        return view(
            'student',
            compact('users')
        );
    }

    public function student_create()
    {
        // dd("1"); // dump and die
        return view('add_student');
    }

    public function student_store(Request $request)
    {
        // dd($request);
        //validate

        $this->validateUserStore($request);
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'nullable|min:6|confirmed:confirm_password'
        // ], [
        //     'name.required' => 'Name is required.',
        //     'password.min' => 'Maiksi password mo.',
        //     'password.confirmed' => 'I-coconfirm mo lang PASSWORD mo, hindi mo pa itinama!!!',
        //     'email.email' => 'Sure ka ba kasing email nilagay mo?!?!',
        //     'email.unique' => 'Nakarecord na eh! Lagay ka ng ibang email!'
        // ]);

        // store - insert
        // 1
        // $validated = $request->validated();
        // $user = User::create($validated);
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return redirect()
            ->route('student.index');
    }

    public function show(string $id)
    {
        //
    }

    public function student_edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('edit_student', compact('user'));
    }

    public function student_update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $this->validateUserUpdate($request, $user);

        DB::beginTransaction();
        try {
            $user->name = $request->name;
            $user->email = $request->email;

            // if ($request->password) {
            //     $user->password = Hash::make($request->password);
            // }

            $user->save();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        DB::commit();
        return redirect()->route('student.index');
    }

    public function student_destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('student.index');
    }





    // Faculty Functions
    public function faculty_index()
    {
        $users = User::where('user_type', 'faculty')->get();

        return view(
            'faculty',
            compact('users')
        );
    }

    public function faculty_create()
    {
        return view('add_faculty');
    }

    public function faculty_store(Request $request)
    {

        $this->validateUserStore($request);
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'nullable|min:6|confirmed:confirm_password'
        // ], [
        //     'name.required' => 'Name is required.',
        //     'password.min' => 'Maiksi password mo.',
        //     'password.confirmed' => 'I-coconfirm mo lang PASSWORD mo, hindi mo pa itinama!!!',
        //     'email.email' => 'Sure ka ba kasing email nilagay mo?!?!',
        //     'email.unique' => 'Nakarecord na eh! Lagay ka ng ibang email!'
        // ]);

        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->user_type = 'faculty';
            $user->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('faculty.index');
    }

    public function faculty_destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('faculty.index');
    }

    public function faculty_edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('edit_faculty', compact('user'));
    }

    public function faculty_update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $this->validateUserUpdate($request, $user);

        DB::beginTransaction();
        try {
            $user->name = $request->name;
            $user->email = $request->email;

            // if ($request->password) {
            //     $user->password = Hash::make($request->password);
            // }

            $user->save();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        DB::commit();
        return redirect()->route('faculty.index');
    }

    // DRY kuno

    // validation - validateUser (separate sa store and update)
    // store      - storeUser
    // update     - updateUser

    public function validateUserStore(Request $request)
    {
        return $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'nullable|min:6|confirmed:confirm_password',
        ], [
            'name.required' => 'Name is required.',
            'password.min' => 'Maiksi password mo.',
            'password.confirmed' => 'I-coconfirm mo lang PASSWORD mo, hindi mo pa itinama!!!',
            'email.email' => 'Sure ka ba kasing email nilagay mo?!?!',
            'email.unique' => 'Nakarecord na eh! Lagay ka ng ibang email!'
        ]);
    }
    private function validateUserUpdate(Request $request, User $user)
    {
        return $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed:confirm_password',
        ], [
            'name.required' => 'Name is required.',
            'password.min' => 'Maiksi password mo.',
            'password.confirmed' => 'I-coconfirm mo lang PASSWORD mo, hindi mo pa itinama!!!',
            'email.email' => 'Sure ka ba kasing email nilagay mo?!?!',
            'email.unique' => 'Nakarecord na eh! Lagay ka ng ibang email!'
        ]);
    }

}
