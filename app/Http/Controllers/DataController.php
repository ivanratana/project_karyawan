<?php

namespace App\Http\Controllers;

use App\Traits\getData;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use Yajra\DataTables\DataTables;
class DataController extends Controller
{
    //
    use GetData;
    public function getData(Request $request){

        if($request->ajax()){
            // $sqlQuery = "SELECT * FROM t_karyawan";
            // $data = DB::select($sqlQuery);

            $result = $this->getKaryawan();
            // $dataCollection

            $dataCollection = collect($result);

            return DataTables::of($dataCollection)
                ->addIndexColumn()
                ->addColumn('edit', function($row){
                    return '<a href="javascript:void(0)" class="btn btn-success btn-sm btn-edit"
                    data-id="'. $row->id .'"
                    data-nama="'. htmlspecialchars($row->nama, ENT_QUOTES, 'UTF-8') .'"
                    data-alamat="'. htmlspecialchars($row->alamat, ENT_QUOTES, 'UTF-8') .'"
                    data-no_telp="'. htmlspecialchars($row->no_telp, ENT_QUOTES, 'UTF-8') .'"
                    data-jabatan="'. htmlspecialchars($row->jabatan, ENT_QUOTES, 'UTF-8') .'"?\>
                    
                    Edit
                    </a>';
        })
        ->addColumn('delete', function($row){
            return '<a href="javascript:void(0)" class="btn btn-danger btn-sm btn-delete"
                    data-id="'. $row->id .'">
                    Delete
                    </a>';
    })
    ->rawColumns(['edit','delete'])
    ->make(true);
    }
}

    public function update_datatables(Request $request){
       // dd($request);
        $record = Karyawan::find($request->id);
        
        if($record){
            $record->nama = $request->nama;
            $record->alamat = $request->alamat;
            $record->no_telp = $request->no_telp;
            $record->jabatan_id = $request->jabatan_id;
            // $record->jabatan = $request->jabatan;
            $record->save();

           return redirect()->back()->with('success','Data Successfully Saved!');
            // return response()->json(['success'=> 'true', 'message' => 'Data Updated']);
        }
        return response()->json(['success'=> false, 'message' => 'Record not found'], 404);
        
    }

    public function delete_datatables(Request $request){
        $record = Karyawan::find($request->id);

        if($record){
            $record->delete();
            return response()->json(['success' => 'data delete successfully.']);
        }
        return response()->json(['error' =>'data deleted'], 404);
    }
}
