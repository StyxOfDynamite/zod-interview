<?php namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Candidate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use GrahamCampbell\Flysystem\Facades\Flysystem as Flysystem;

class FileController extends Controller {

    public function __construct(File $file) {
        $this->file = $file;
    }

    public function getCandidateFile($id) {
        $file = File::where('candidate_id', '=', $id)->first();
        return response()->download('../storage/app/' . $file->file);
    }
}