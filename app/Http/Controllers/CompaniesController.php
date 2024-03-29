<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CompaniesController extends ApiController
{
    protected $records;

    public function __construct(Company $records)
    {
        $this->records = $records;
        $this->related = ['contacts.type'];
    }

    public function index()
    {
        // show all
        $records = Company::with($this->related)->get();
        return $records;
    }

    public function destroy($id)
    {
        // delete single
        $record = $this->records->findOrFail($id);
        $record->delete();
        return $this->respondOK('Company was deleted');
    }

    public function show($id)
    {
        //show single
        $record = $this->records->with($this->related)->findOrFail($id);
        return $record;
    }

    public function create() {
        return view('companies.create');
    }

    public function store()
    {
        dd(Input::all());
        // insert new
        $record = Company::create(Input::all());
        return $this->respond($record->id);
    }

    public function update($id)
    {
        // save updated
        $record = $this->records->find($id);

        if(! $record){
            Company::create(Input::all());
            return $this->respond($record);
        }

        $record->fill(Input::all())->save();
        return $this->respond($record);
    }

    public function newco() {
        return view('companies.tabs');
    }
}
