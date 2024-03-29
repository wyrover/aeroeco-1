<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\ConsortiumGlobal;
use App\Models\Contracttopic;
use App\Models\Disassembler;
use App\Models\Project;
use App\Models\ProjectType;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ProjectsController extends ApiController
{
    protected $records;

    public function __construct(Project $records)
    {
        $this->middleware('auth');
        $this->records = $records;
        $this->related = ['company.addresses'];
    }

    public function index()
    {
        // show all
        $records = Project::with($this->related)->get();
        return $records;
    }

    public function destroy($id)
    {
        // delete single
        $record = $this->records->findOrFail($id);
        $record->delete();
        return $this->respondOK('Project was deleted');
    }

    public function show($id)
    {
        //show single
        $record = Project::with($this->related)->findOrFail($id);
        return $record;
    }

    public function create()
    {
        $user = Auth::user();
        $disassemblers = Disassembler::lists('name', 'id');
        $types = ProjectType::lists('type', 'id');
        return view('projects.create', compact('disassemblers', 'types', 'user'));
    }

    public function store()
    {
        // insert new
        $inputted = Input::all();
        $user = Auth::user();
        $ins = array_add($inputted, 'company_id', $user->company_id);
        //dd($ins);
        $record = Project::create($ins);
        return $this->respond($record->id);
    }

    public function update($id)
    {
        // save updated
        $record = $this->records->find($id);
        
        if(! $record){
            Project::create(Input::all());
            return $this->respond($record);
        }
        
        $record->fill(Input::all())->save();
        return $this->respond($record);
    }

    public function contract_gta($id) {
        $conType = "General Terms Agreement";
        $topics = Contracttopic::where('contract_type_id', 1)
            ->orderBy('sort_order')
            ->get();

        $project = Project::with('company.addresses')->where('id', $id)->first();
        $company = $project->company;

        $adc = ConsortiumGlobal::where('id', '1')->first();

        //dd($project);
        return view('contracts.contract', compact('conType', 'topics', 'project', 'company', 'adc'));
    }
}
