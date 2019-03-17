<?php

namespace App\Http\Controllers;
use App\Attendance;
use App\Visitor;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:visitors,name',
            'address' => 'required|max:255',
            'phone_number_one' => 'required|numeric|digits:10|unique:visitors,phone_number_one',
            'phone_number_two' => 'nullable|digits:10',
            'occupation' => 'required|string'
        ]);

        // dd($request->all());
        $visitor = new Visitor;
        $visitor->name = $request->name;
        $visitor->address = $request->address;
        $visitor->phone_number_one = $request->phone_number_one;
        $visitor->phone_number_two = $request->phone_number_two;
        $visitor->occupation = $request->occupation;
        $visitor->save();

        $this->checkAttendanceOnReg($visitor->id);
        $attendances = Attendance::select('date')->distinct()->get();
        session()->flash('success', 'Visitor Registered and Checked Successfully!');

        return view('home', ['attendances' => $attendances]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(Visitor $visitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitor $visitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitor $visitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        //
    }

    public function getVisitors () {
        $visitors = Visitor::all();
        return view('pages.searchview')->withVisitors($visitors);
    }

    public function checkAttendanceOnReg($id) {
        $attendance = new Attendance;
        $attendance->visitor_id = $id;
        $attendance->date = date('Y-m-d');
        $attendance->save();
    }

    public function checkAttendance(Request $request) {
        $date = date('Y-m-d');
        if(Attendance::where('visitor_id', $request->id)->where('date', $date)->count() > 0){
            return response()->json(['status' => 'error', 'message' => 'Visitor has Already been checked for today!']);
        }
        $attendance = new Attendance;
        $attendance->visitor_id = $request->id;
        $attendance->date = date('Y-m-d');
        if($attendance->save()) {
            return response()->json(['status' => 'success', 'message' => Visitor::find($request->id)->name.' has been checked successfully!']);
        }
        else{
            return response()->json(['status' => 'error', 'message' => 'An Error Occurred!']);

        }
    }

    public function search(Request $request){
    	$term = $request->term;

       
    	   $visitor = Visitor::where('name', 'LIKE', '%' . $term . '%')
                        ->get();

            if(count($visitor) == 0)
            {
                 $searchResult[] =  "No Visitor Found";
            }
            else
            {
                foreach ($visitor as $key => $value)
                {

                $searchResult[] = $value->name;
                }
            }

        
        
    	return $searchResult;
    }

    /*this function displays search page with possible hits*/
    public function searchHits(Request $request){

        $value = $request->searchTerm;

         $visitor = Visitor::where('name','LIKE', '%'. $value .'%')->get();
        
         $message = 'Search Result of Visitor(s) with name '.$value;
        return view('pages.searchview')->withVisitors($visitor)->withMessage($message);

    }

    public function displayByDate(Request $request) {
        $attendances = Attendance::where('date', $request->date)->get();
   
        foreach ($attendances as $attendance) {
           $visitors[] = $attendance->visitor;
        }
        $message = 'Search Result of Visitors on '.date('l, jS M, Y',strtotime($request->date));
        return view('pages.searchview')->withVisitors($visitors)->withMessage($message);
    }
}
