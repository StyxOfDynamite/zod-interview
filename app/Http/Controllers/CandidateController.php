<?php namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Country;
use App\Models\Region;
use App\Models\Salary;
use App\Models\File;

use GrahamCampbell\Flysystem\Facades\Flysystem as Flysystem;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Validator;
use DB;
use Log;

class CandidateController extends Controller {

    public function __construct(Candidate $candidate) {
        $this->candidate = $candidate;
    }

    public function index() {
        $candidates = $this->candidate->query()->get();
        return view('candidate.index', ['candidates' => $candidates]);
    }

    public function create() {
        return view('candidate.create', ['countries' => Country::all()]);
    }

    public function store(Request $request) {
        
        Log::info('storing candidate profile for candidate:' . $request->input('forename'));

        $validator = Validator::make($request->all(), [
            'forename' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'file' => 'required',
            'country' => 'required',

        ]);
        if ($validator->fails()) {
            Log::warning('validator failed, redirecting to entry form');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $candidate = new Candidate;
        $candidate->forename = $request->input('forename');
        $candidate->surname = $request->input('surname');
        $candidate->email = $request->input('email');
        $candidate->password = Hash::make($request->input('password'));
        $candidate->contact_number = $request->input('contact_number');
        $candidate->right_to_work = $request->input('right_to_work') ? true : false;
        $candidate->alerts = $request->input('alerts') ? true : false;
        $candidate->save();

        $country = Country::create([
            'candidate_id' => $candidate->id,
            'country' => $request->input('country')
            ]);
        
        foreach ($request->input('regions') as $key => $value) {
            $region = Region::create([
                'region' => $value,
                'country_id' => $country->id
                ]);
        }

        $salary = Salary::create([
            'currency' => 'USD',
            'salary' => 26000,
            'interval' => 'per month',
            'candidate_id' => $candidate->id,
        ]);

        $file = File::create([
            'file' => $request->file('file')->getClientOriginalName(),
            'candidate_id' => $candidate->id,
        ]);

        Flysystem::put(
            'app/'.$file->file,
            file_get_contents($request->file('file'))
        );

        return redirect()->route('candidate.index');
    }

    public function edit($id) {
        $candidate = $this->candidate->query()->find($id);
        return view('candidate.edit', ['candidate' => $candidate]);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $candidate = $this->candidate->query()->find($id);
        $candidate->name = $request->input('name');
        $candidate->phone = $request->input('phone');
        $candidate->address = $request->input('address');
        $candidate->save();
        return redirect()->route('candidate.index');
    }

    public function delete($id) {
        $candidate = $this->candidate->query()->findOrFail($id);
        return view('candidate.delete', ['candidate' => $candidate]);
    }

    public function destroy($id) {
        $this->candidate->query()->findOrFail($id)->delete();
        return redirect()->route('candidate.index');
    }

    public function display($id) {
        $candidate = Candidate::find($id);
        $candidate_country = Candidate::find($id)->candidate_country;
        return view('candidate.candidate', ['candidate' => $candidate, 'candidate_country' => $candidate_country]);
    }

}