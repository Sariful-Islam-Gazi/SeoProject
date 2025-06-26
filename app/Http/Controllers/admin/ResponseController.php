<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function contactList(){
        $data['pageTitle'] = 'Contact | Seo Tech Master';
        return view('admin.reponse.contact', $data);        
    }
    public function contactFetchAllList(Request $request){
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

        $query = Contact::query();
        $recordsTotal = $query->count();

        $searchableColumns = ['name','phone','email','subject'];
        $orderableColumns = ['name', 'phone','email','subject','message',''];

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
            $subArray[] = "<div><h6 class='mb-0'>".$row->name."</h6></div>";
            $subArray[] = "<div><h6 class='mb-0'>".$row->phone."</h6></div>";
            $subArray[] = "<div><h6 class='mb-0'>".$row->email."</h6></div>";
            $subArray[] = "<div><h6 class='mb-0'>".$row->subject."</h6></div>";
            $subArray[] = "<div><h6 class='mb-0' style='width:200px; overflow:hidden;'>".strip_tags($row->message)."</h6></div>";
            $subArray[] = "<div class='d-flex'>
                <button class='btn btn-sm btn-danger fs_13' onclick='deleteContact(".$row->id.")'>Delete</button>  
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
    public function contactDelete(Request $request){
        $contact = Contact::find($request->id);
        $contact->delete();
        return response()->json(array('type'=>'success', 'text'=>'Contact Successfully Deleted'));
    }
}
