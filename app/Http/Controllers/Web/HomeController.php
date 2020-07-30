<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\StudentRequests;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $students = Student::query()->get();
        return view("web.index")
            ->with("students",$students);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view("web.create");
    }


    /**
     * @param StudentRequests $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StudentRequests $request)
    {
        $selectedFile = false;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().".".$image->getClientOriginalExtension();

            //Move Uploaded File
            $destinationPath = 'uploads/images/';
            $image->move($destinationPath,$imageName);
            $selectedFile = true;
        }

        $student = new Student();
        $student->fill($request->input());
        if($selectedFile){
            $student->image = $imageName;
        }
        $student->save();

        return redirect()->route("crud.index")
            ->with("success",trans("message.common.success"));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $student = Student::query()->findOrFail($id);

        return view("web.show")
            ->with("student", $student);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $student = Student::query()->findOrFail($id);

        return view("web.edit")
            ->with("student", $student);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $student = Student::query()->findOrFail($id);
        $student->fill($request->input());

        $selectedFile = false;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().".".$image->getClientOriginalExtension();

            //Move Uploaded File
            $destinationPath = 'uploads/images/';
            $image->move($destinationPath,$imageName);
            $selectedFile = true;
        }
        if($selectedFile){
            $student->image = $imageName;
        }
        $student->save();

        return redirect()->route("crud.index")
            ->with("success",trans("message.common.success"));
    }


    /**
     * @param Student $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $student = Student::query()->findOrFail($id);
        $student->delete();

        return redirect()
            ->route("crud.index")
            ->with("success",trans("message.common.success"));
    }
}
