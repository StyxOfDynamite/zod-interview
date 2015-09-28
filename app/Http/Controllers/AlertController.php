<?php namespace App\Http\Controllers;

use App\Models\Alert;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AlertController extends Controller {

    public function __construct(Alert $alert) {
        $this->alert = $alert;
    }

    public function displayCandidateAlerts($id) {
        $alert = Alert::where('candidate_id', '=', $id)->first();
        return view('alert.alert', ['alert' => $alert]);
    }
}