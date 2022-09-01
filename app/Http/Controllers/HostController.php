<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HostModel;
use DB;
use Carbon\Carbon;
use DataTables;
use App\Imports\HostImport;
use Maatwebsite\Excel\Facades\Excel;
use Validator;



class HostController extends Controller
{
private $temp;
   public function index(Request $request){
   
    
  $data = [
            'title' => 'Host'
        ];
           if ($request->ajax()) {

           $data = DB::table('router_details')
                   ->select('id','Sapid', 'Hostname', 'MacAddress','created_at', DB::raw('INET_NTOA(Loopback) as Loopback'))
                  ->get();

            return Datatables::of($data)

                    ->addIndexColumn()
                    ->setRowClass(function ($data) {
                        if(empty($this->temp)){
                          $this->temp = $data->Sapid;  
                        }else{
                            if($data->Sapid==$this->temp){
                            return 'text-danger';
                            }
                             $this->temp = $data->Sapid;
                            
                        }
                        
                        
                    })
                    ->editColumn('created_at', function($data){ $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d-m-Y'); return $formatedDate; })
                    ->addColumn('action', function($row){

                    return   "<button type='button' class='btn btn-primary btn-sm editrow' data-toggle='modal' data-target='#myModal'  data-delete=" .'hosts/'. $row->id .">Edit</button> <button class='btn btn-danger btn-sm del' data-remote=" .'hosts/'. $row->id .">Delete</button>";
                    })
                    

                    ->rawColumns(['action'])

                    ->make(true);

        }
    return view('host.index',['hosts'=>$data]);

   }

   public function create() {
        $data = [
            'title' => 'Create Host'
        ];
        return view('host.create', $data);
    }

    public function store(Request $request) {
        $validator = $request->validate([
            'Sapid' => 'required|alpha_num|max:18|unique:router_details,Sapid',
            'Hostname' => 'required|alpha_num|max:14|unique:router_details,Hostname',
            'Loopback' => 'required|ip',
            'MacAddress' => 'required|max:17',

        ]);

        $model = new HostModel();
        $date = Carbon::createFromDate(date('Y-m-d H:i:s'));
        $model->Sapid = $request->Sapid;
        $model->Hostname = $request->Hostname;
        $model->Loopback= DB::raw('INET_ATON(\''.$request->Loopback.'\')');
        $model->MacAddress = $request->MacAddress;
        $model->ResponseTime =  $date->timestamp;

        $model->save();
        return redirect('/hosts')->with('success', 'Data has been save successfully!');

       
    }

    public function edit($id = NULL) {

        $host = HostModel::find($id);
        $host = DB::table('router_details')
                   ->select('id','Sapid', 'Hostname', 'MacAddress', DB::raw('INET_NTOA(Loopback) as Loopback'))
                   ->where('id', $id)->get()->first();

        //dd($host);
         $data = [
            'title' => 'Edit Host',
            'result' => $host
        ];
        return view('host.create', $data);
    
    }

     public function updateOld(Request $request, $id) {
        $model = HostModel::find($id);
         $validator = $request->validate([
            'Sapid' =>'required|alpha_num|max:18|unique:router_details,Sapid,' . $id,
            'Hostname' => 'required|alpha_num|max:14|unique:router_details,Hostname,' . $id,
            'Loopback' => 'required|ip',
            'MacAddress' => 'required|max:17',

        ]);

       
        $date = Carbon::createFromDate(date('Y-m-d H:i:s'));
        $model->Sapid = $request->Sapid;
        $model->Hostname = $request->Hostname;
        $model->Loopback= DB::raw('INET_ATON(\''.$request->Loopback.'\')');
        $model->MacAddress = $request->MacAddress;
        $model->ResponseTime =  $date->timestamp;
        //dd( $model);
        $model->save();
        return redirect('/hosts')->with('success', 'Data has been update successfully!');
    }

     public function update(Request $request, $id) {
        $model = HostModel::find($id);
         $validator =Validator::make($request->all(), [
            'Sapid' =>'required|alpha_num|max:18|unique:router_details,Sapid,' . $id,
            'Hostname' => 'required|alpha_num|max:14',
            'Loopback' => 'required|ip',
            'MacAddress' => 'required|max:17',

        ]);
         if (!$validator->passes()) {
           return response()->json(['error'=>$validator->errors()->all()]);
        }
       
        $date = Carbon::createFromDate(date('Y-m-d H:i:s'));
        $model->Sapid = $request->Sapid;
        $model->Hostname = $request->Hostname;
        $model->Loopback= DB::raw('INET_ATON(\''.$request->Loopback.'\')');
        $model->MacAddress = $request->MacAddress;
        $model->ResponseTime =  $date->timestamp;
        //dd( $model);
        $model->save();
        return response()->json(['success'=>'Data has been update successfully!']);
        
    }

    public function import(){
     if (request()->hasFile('file')) {
        Excel::import(new HostImport,request()->file('file'));
       return back()->with('success', 'Data has been imported successfully');
     }else{
         return back()->with('error', 'Please select a file');
     }
    }

    public function destroy(Request $request, $id) {
        if ($request->ajax()) {
            $model = HostModel::find($id);
            if ($model->delete()) {
                return response(['success' => 'Your data has been deleted successfully!']);
            } else {
                return response(['error' => 'Something went wrong please try again!']);
            }
        }
    }

    public function show($id = NULL) {

        $host = DB::table('router_details')
                   ->select('id','Sapid', 'Hostname', 'MacAddress', DB::raw('INET_NTOA(Loopback) as Loopback'))
                   ->where('id', $id)->get()->first();

         return response()->json($host);
    
    }

    public function chart(){
         $data =[];
        $result = HostModel::all();
        foreach($result as $k=>$v){
            $data[] = "[$v->Sapid,$v->ResponseTime]";
        }
        // echo '<pre>';
        // print_r($data);
        return view('host.chart',['res'=>$data]);
    }

}
