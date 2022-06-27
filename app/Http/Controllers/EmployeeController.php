<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\Constraint;
use Intervention\Image\Facades\Image;




class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
            $employee = Employee::all();
            return view('employee.index', compact('employee'));
        
      
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employee();

        if($request->hasFile('image')){
           
            $fileName = $request->image;
            $newName = time() .'.'. $fileName->getClientOriginalExtension();
            $image_resize = Image::make($fileName->getRealPath());
            $image_resize->resize(600,600,
                function($constraint){
                    $constraint->aspectRatio();
                    $constraint->upsize();
                }
            );
            $image_resize->save(public_path('auction/' .$newName));
            $employee->image = 'auction/' .$newName; 
        }
     
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->dob = $request->dob;
       
      
        $employee->save();
        return redirect()->back();
    }

    // public function downloadPDF($id)
    // {
    //     $employee = Employee::findOrFail($id);
    //     $pdf = PDF::loadView('employee.view' , compact('employee'));
    //     $pdf->download('mypdf.pdf');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
       
        $employee = Employee::findOrFail($id);
       return view('employee.view', compact('employee'));
        
    }


      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadPDF($id)
    {
        
           $employee = Employee::findOrFail($id);

            $pdf = PDF::loadView('employee.view' , compact('employee'));
            return $pdf->download('mypdf.pdf');  
      
    }

 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
