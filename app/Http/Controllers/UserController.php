<?php namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use DB;
use Log;

class UserController extends Controller {

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function index() {
        $users = $this->user->query()->get();
        return view('user.index', ['users' => $users]);
    }

    public function create() {
        return view('user.create');
    }

    public function store(Request $request) {
        
        Log::info('storing user profile for user:' . $request->input('forename'));

        $validator = Validator::make($request->all(), [
            'forename' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            Log::warning('validator failed, redirecting to entry form');
            Log::info('errors : ' . var_dump($validator->errors()));
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = new $this->user;
        $user->forename = $request->input('forename');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->contact_number = $request->input('contact_number');
        $user->right_to_work = $request->input('right_to_work') ? true : false;
        $user->country = $request->input('country');
        $user->alerts = $request->input('alerts') ? true : false;

        $user->save();
        return redirect()->route('user.index');
    }

    public function edit($id) {
        $user = $this->user->query()->find($id);
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = $this->user->query()->find($id);
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->save();
        return redirect()->route('user.index');
    }

    public function delete($id) {
        $user = $this->user->query()->findOrFail($id);
        return view('user.delete', ['user' => $user]);
    }

    public function destroy($id) {
        $this->user->query()->findOrFail($id)->delete();
        return redirect()->route('user.index');
    }

    public function display($id) {
        $candidate = $this->user->query()->find($id);
        return view('user.candidate', ['candidate' => $candidate]);
    }

}