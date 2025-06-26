<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function visitorList(){
        $data['pageTitle'] = 'Visitor | Seo Tech Master';
        return view('admin.visitor.list', $data);        
    }
    public function visitorFetchAllList(Request $request){
        $draw = intval($request->input("draw"));
        $start = intval($request->input("start"));
        $length = intval($request->input("length"));
        $search = trim(strip_tags($request->input("search.value")));
        // Default ordering values
        $orderColumnIndex = 0;  // Default column index (0 for 'name')
        $orderDirection = 'desc';  // Default direction

        // Check if order is set and valid
        if (!empty($request->order)) {
            $order = $request->order[0];
            $orderColumnIndex = $order['column'];
            $orderDirection = $order['dir'];
        }

        $query = Visitor::query();
        $recordsTotal = $query->count();

        $searchableColumns = ['ip','country_name','city'];
        $orderableColumns = ['ip', 'country_name','city','created_at',''];

        if (!empty($search)) {
            $query->where(function ($q) use ($search, $searchableColumns) {
                foreach ($searchableColumns as $column) {
                    $q->orWhere($column, 'like', "%$search%");
                }
            });
        }

        $query->orderBy($orderableColumns[$orderColumnIndex], $orderDirection);
        
        $query->skip($start)->take($length);

        $recordsFiltered = $query->count();
        
        $data = $query->get();

        $formattedData = [];
        foreach ($data as $row) {
            $subArray = [];
            $subArray[] = "<div><h6 class='mb-0'>".$row->ip."</h6></div>";
            $subArray[] = "<div><h6 class='mb-0'>".$row->country_name."</h6></div>";
            $subArray[] = "<div><h6 class='mb-0'>".$row->city."</h6></div>";
            $subArray[] = "<div><h6 class='mb-0'>".$row->created_at->format('d-m-Y h:i A')."</h6></div>";
            $subArray[] = "<div class='d-flex'>
                <button class='btn btn-sm btn-danger fs_13' onclick='deleteVisitor(".$row->id.")'>Delete</button>  
            </div>";

            $formattedData[] = $subArray;
        }

        $output = [
            "draw" => $draw,
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $formattedData
        ];

        return response()->json($output);
    }
    public function visitorDelete(Request $request){
        $visitor = Visitor::find($request->id);
        $visitor->delete();
        return response()->json(array('type'=>'success', 'text'=>'Visitor Successfully Deleted'));
    }
}
