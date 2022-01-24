<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DepartmentTrait\departmentTrait;
use App\Models\department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    use departmentTrait;

    private $departmentModel;

    public function __construct(department $department)
    {
        $this->departmentModel = $department;
    }

    public function index() {
        $data = $this->departmentModel::get();
        return view('Department.all',compact('data'));
    }

    public function insert() {
        return view('Department.insert');
    }

    /**
     * @param Request $request
     * 1- create validation
     * 2- insert data in table
     * 3- make session
     * 4- return redirect
     */
    public function create(Request $request) {

        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $this->departmentModel::create([
            'title' => $request->title,
            'content' => $request->description
        ]);

        session()->flash('done','department was created !');

        return redirect(route('department.index'));

    }

    public function delete(Request $request) {

        $request->validate([
            'id' => 'required|exists:departments,id'
        ]);

        department::where('id',$request->id)->delete();

        session()->flash('done','department was deleted !');

        return redirect(route('department.index'));

    }

    public function edit(Request $request) {
//        $depart = department::where('id',$request->id)->first();
//        $depart = department::find($request->id);
        $depart = $this->getDepartment($request->id);
        return view('Department.edit',compact('depart'));
    }

    public function update(Request $request) {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'id' => 'required|exists:departments,id',
        ]);

//        $row = department::where('id',$request->id)->first();
//        $row = department::find($request->id);
        $row = $this->getDepartment($request->id);

        $row->update([
            'title' => $request->title,
            'content' => $request->description
        ]);

        session()->flash('done','department was updated !');

        return redirect(route('department.index'));

    }

}
