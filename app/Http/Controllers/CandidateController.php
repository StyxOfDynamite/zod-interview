<?php namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Country;
use App\Models\Region;
use App\Models\Salary;
use App\Models\File;
use App\Models\Sector;
use App\Models\Alert;
use App\Models\AlertCountry;
use App\Models\AlertRegion;
use App\Models\AlertSalary;
use App\Models\AlertSector;


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

        foreach ($request->input('skills') as $key => $value) {
            $sector = Sector::create([
                'sector' => $value,
                'candidate_id' => $candidate->id
                ]);
        }

        $salary = Salary::create([
            'currency' => $request->input('currency'),
            'salary' => $request->input('salary'),
            'interval' => $request->input('interval'),
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

        /** create alert */
        if ($request->input('alerts')) {
            $alert = new Alert;
            $alert->candidate_id = $candidate->id;
            $alert->save();

            /* add alert salary expectations */
            $alert_salary = AlertSalary::create([
                'currency' => $request->input('alert-salary-currency'),
                'salary' => $request->input('alert-salary'),
                'interval' => $request->input('alert-salary-interval'),
                'alert_id' => $alert->id
                ]);
            /* add alert country */
            $alert_country = AlertCountry::create([
                'alert_id' => $alert->id,
                'country' => $request->input('alert-country')
                ]);

            /* add regions for alert */
            foreach ($request->input('alert-regions') as $key => $value) {
                $alert_region = AlertRegion::create([
                    'region' => $value,
                    'alert_country_id' => $alert_country->id
                    ]);
            }

            /* add sectors for alert */
            foreach ($request->input('skills') as $key => $value) {
                $alert_sector = AlertSector::create([
                    'sector' => $value,
                    'alert_id' => $alert->id
                    ]);
            }


        }

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
        return view('candidate.candidate', ['candidate' => $candidate]);
    }

}