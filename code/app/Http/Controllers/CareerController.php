<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCareerRequest;
use App\Models\Career;
use App\Models\Course;
use App\Models\Institution;
use Illuminate\Http\Request;

class CareerController extends Controller
{

    protected $institution;

    public function __construct()
    {
        $this->institution = Institution::find(3);
    }

    public function index(){
        $institution = $this->institution;
        $careers = Career::where('institution_id', $institution->id)->get();
        return view ('careers.index', compact('careers', 'institution'));
    }

    public function create(){
        $institution = $this->institution;
        return view ('careers.create', compact('institution'));
    }

    public function store(StoreCareerRequest $request){
        $institution = $this->institution;
        $request->merge(['institution_id' => $institution->id]);

        Career::create($request->all());
        return redirect(route('careers.index'));
    }
    
    public function show(Career $career){
        $courses = Course::where('career_id', $career->id)->get();
        return view ('courses.index', compact('courses'));
    }

    public function edit(Career $career){
        return view ('careers.edit', compact('career'));
    }

    public function update(Request $request ,Career $career){
        $request->validate(['name'=>'required|string|max:255']);
        $career->update($request->all());
        return redirect(route('careers.show', $career));
    }

    public function destroy(career $career){
        $career->delete();
        return redirect(route('careers.index'));

    }
}
