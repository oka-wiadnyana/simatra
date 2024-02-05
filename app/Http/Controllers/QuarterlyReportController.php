<?php

namespace App\Http\Controllers;

use App\Http\Traits\DTBtnTrait;
use App\Models\QuarterlyReport;
use App\Models\ReportType;
use App\Models\Satker;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class QuarterlyReportController extends Controller
{
    use DTBtnTrait;
    // Begin Satker
    public function index(Request $request,$report_id){
        $reportData=ReportType::find($report_id);
        return view('report.quarterly_report',['report_id'=>$report_id,'report_data'=>$reportData]);
    }

    public function getQuarterlyReport(Request $request,$report_id){
        $data=QuarterlyReport::whereHas('reportType', function($q) use($report_id){
            $q->where('id',$report_id);
        })->where('satker_id',auth()->user()->satker_id)->orderByDesc('quarter')->orderByDesc('year')->get();

        return DataTables::of($data)
                ->addIndexColumn()
               
                ->addColumn('link',function($row){
                  
                    $link=$this->plainAnchor(url:$row->link,color:"info",text:"Link",target:"_blank");
                    return $link;
                })
                ->addColumn('action',function($row){

                 
                    $link=$this->modalEditBtn(id: $row->id,message:'modal-edit-quarterly-report',text:'Update')." ".$this->deleteBtn(id: $row->id,url:'delete_quarterly_report');
                    return $link;
                })
                ->rawColumns(['link','action'])
                ->make(true);


    }

    public function insertQuarterlyReport(Request $request){
        $validate=Validator::make(
            $request->all(),
            [
                'quarter'=>['required'],
                'year'=>['required'],
                'link'=>['required'],
            ]
        );

        if($validate->fails()){
            Alert::error('Gagal', $validate->errors()->all());
            return back();
        }

        // change with session
        $satker_id=auth()->user()->satker_id;



        try{
            if($request->edit){
                QuarterlyReport::where('id',$request->report_id)->update(array_merge($validate->safe()->all(),['satker_id'=>$satker_id]));
            }else {
                QuarterlyReport::create(array_merge($validate->safe()->all(),['report_type_id'=>$request->report_type_id,'satker_id'=>$satker_id]));
            }
          
            Alert::success('Berhasil', __('message.success'));
            return back();
        }catch(\Exception $e){
            Alert::error('Gagal', $e->getMessage());
            return back();
        }


    }

    public function deleteQuarterlyReport(Request $request){
        QuarterlyReport::destroy($request->id);
        Alert::success('Berhasil', __('message.delete'));
        return response()->json(['msg'=>'success']);
    }

    // EndSatker

    // Begin Admin
    public function admin(Request $request,$satker_id,$periode){
        $reportData=ReportType::where('periode',$periode)->get();
        $satkerData=Satker::find($satker_id);
        return view('report.quarterly_report_admin',['satker_data'=>$satkerData,'report_data'=>$reportData]);
    }

    public function getQuarterlyReportSatker(Request $request,$satker_id,$report_id){
        $data=QuarterlyReport::whereHas('reportType', function($q) use($report_id){
            $q->where('id',$report_id);
        })->where('satker_id',$satker_id)->orderByDesc('quarter')->orderByDesc('year')->get();

        return DataTables::of($data)
                ->addIndexColumn()
               
                ->addColumn('link',function($row){
                  
                    $link=$this->plainAnchor(url:$row->link,color:"info",text:"Link",target:"_blank");
                    return $link;
                })
                ->addColumn('action',function($row){
                  
                    if(!$row->notes){

                        $link=$this->modalEditBtn(id:json_encode($row->id."/caturwulan"),message:"modal-upload-note",text:"Catatan",color:'warning');
                    }else {
                        $link=$this->deleteBtn(id:$row->id,url:'delete-quarterly-note',color:'secondary',text:'Hapus Catatan');
                    }
                    return $link;
                })
               
                ->rawColumns(['link','action'])
                ->make(true);


    }

    public function insertNote(Request $request){
        $validate=Validator::make(
            $request->all(),
            [
                'notes'=>['required'],
                
            ]
        );

        if($validate->fails()){
            Alert::error('Gagal', $validate->errors()->all());
            return back();
        }

       
        try{
            QuarterlyReport::where('id',$request->id)->update([
                'notes'=>$request->notes
            ]);
          
            Alert::success('Berhasil', __('message.success'));
            return back();
        }catch(\Exception $e){
            Alert::error('Gagal', $e->getMessage());
            return back();
        }
    }

    public function deleteNote(Request $request){

        try{
            QuarterlyReport::where('id',$request->id)->update([
                'notes'=>''
            ]);
            Alert::success('Berhasil', __('message.success'));
            return response()->json(['msg'=>'success']);
        }catch(\Exception $e){
            Alert::error('Gagal', $e->getMessage());
            return response()->json(['msg'=>'fail']);
        }
    }

}
