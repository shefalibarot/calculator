<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intrestrate;
use App\Models\User;
use Auth;
use Redirect;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::id() == '1'){
           return view('home'); 
       }else{
        return view('userdashboard');
       }
    }
    public function store(request $request)
    {
        $data = $request->all();
        $this->validate(request(), [
            'pamount' => 'required|numeric',
            'rate' => 'required|numeric',
            'tperiod' => 'required|numeric',
            'sintrest' => 'required|numeric'
        ]);
        Intrestrate::create([
            'userid' => Auth::id(),
            'amount' => $data['pamount'],
            'rate' => $data['rate'],
            'time' => $data['tperiod'],
            'sintrest' => $data['sintrest'],
        ]);
        return Redirect::back()->with('msg', 'you have successfully saved');
    }
    public function viewcalculation(){
       return view('calculationgrid'); 
    }
    public function getcalculation(Request $request)
    {
        // print_r($request->all()); exit;
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length");
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        // Total records
        $totalRecords = Intrestrate::select('count(*) as allcount')->where('userid', Auth::id())->count();
        $query = DB::table('intrestrate')->select('count(*) as allcount')->where('userid', Auth::id());
        $totalRecordswithFilter = $query->count();
        
        // Fetch records
        $result = DB::table('intrestrate')->orderBy($columnName,$columnSortOrder)->select('intrestrate.*')->where('userid', Auth::id());
        $records = $result->skip($start)->take($rowperpage)->get();
        
        $data_arr = array();
        foreach($records as $record){
            $amount = $record->amount;
            $rate = $record->rate;
            $time = $record->time;
            $intrest = $record->sintrest;
            
            $data_arr[] = array(
              "amount" => $amount,
              "rate" => $rate,
              "time" => $time,
              "intrest" => $intrest,
            );
        }
         $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordswithFilter,
        "aaData" => $data_arr
     );
    echo json_encode($response);
     exit;
    }
    public function getusers(Request $request)
    {
        // print_r($request->all()); exit;
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length");
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        // Total records
        $totalRecords = User::select('count(*) as allcount')->count();
        $query = DB::table('users')->select('count(*) as allcount');
        $totalRecordswithFilter = $query->count();
        
        // Fetch records
        $result = DB::table('users')->orderBy($columnName,$columnSortOrder)->select('users.*');
        $records = $result->skip($start)->take($rowperpage)->get();
        
        $data_arr = array();
        foreach($records as $record){
            $name = $record->name;
            $email = $record->email;
            $total = Intrestrate::select('count(*) as allcount')->where('userid', $record->id)->count();
            $data_arr[] = array(
              "name" => $name,
              "email" => $email,
              "total" => $total,
            );
        }
         $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordswithFilter,
        "aaData" => $data_arr
     );
    echo json_encode($response);
     exit;
    }
}
