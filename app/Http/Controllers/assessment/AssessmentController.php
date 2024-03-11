<?php

namespace App\Http\Controllers\assessment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function AllAssessment()
    {
        return view('backend.assessment.all_assessment');
    }
    public function AddAssessment()
    {
        return view('backend.assessment.add_assessment');
    }
    public function MoveAssessment()
    {
        return view('backend.assessment.move_assessment');
    }
}
