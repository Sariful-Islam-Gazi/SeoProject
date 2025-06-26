<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{
    public function list(){
        $data['pageTitle'] = 'Portfolio | Seo Tech Master';
        return view('admin.portfolio.list', $data);        
    }
    public function addEdit(Request $request){
        $rules = [];
        $rules['type'] = 'required|string';
        $rules['title'] = 'required|string';
        if (empty($request->id)) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,webp';
        }

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails($rules)){
            $errors = $validator->errors()->all();
            return response()->json(['type'=>'error', 'text' => $errors]);
        }

        $isNewPortfolio = empty($request->id);
        if ($isNewPortfolio) {
            $portfolio = new Portfolio();
        } else {
            $portfolio = Portfolio::find($request->id);
            if (!$portfolio) {
                return response()->json(['type' => 'error', 'text' => 'Portfolio Not Found']);
            }
        }
        
        $portfolio->type = $request->type;
        $portfolio->home = $request->home;
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
    
        if ($request->hasFile('image')) {
            // Handle old image deletion if this is an update
            $old_image_path = public_path('manual_storage/'.$portfolio->image);
            if (file_exists($old_image_path)) {
                @unlink($old_image_path);
            }
        
            $destinationPath = public_path('manual_storage/portfolio/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $img_file = $request->file('image');
            $img_filename = time() . '_' . $img_file->getClientOriginalName();
            $img_file->move($destinationPath, $img_filename);
            $portfolio->image = 'portfolio/' . $img_filename;
        }
        $portfolio->save();
        return response()->json(['type' => 'success', 'text' => $isNewPortfolio ? 'Portfolio Created Successfully' : 'Portfolio Updated Successfully']);    
        
    }
    public function edit(Request $request){
        $data = Portfolio::where('id', $request->id)->first();
        return response()->json($data);
    }
    public function fetchAllList(Request $request){
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

        $query = Portfolio::query();
        $recordsTotal = $query->count();

        $searchableColumns = ['id', 'type','home','title'];
        $orderableColumns = ['id', 'type','home','title', 'description', ''];

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
            $subArray[] = "<div class='img'>
                        <img src='" . asset('manual_storage/' . $row->image) . "' height='50' width='100' style='object-fit: cover; border-radius: 6px;'>
                    </div>";
            $subArray[] = "<div><h6 class='mb-0'>".$row->type."</h6></div>";
            $subArray[] = "<div><h6 class='mb-0'>".$row->home."</h6></div>";
            $subArray[] = "<div><h6 class='mb-0' style='width:200px; overflow:hidden;'>".strip_tags($row->title)."</h6></div>";
            $subArray[] = "<div><h6 class='mb-0' style='width:200px; overflow:hidden;'>".strip_tags($row->description)."</h6></div>";
            $checked = $row->status == 0 ? "" : "checked";
            $subArray[] = "<div class='d-flex'>
                <div><label class='d-flex align-items-center mb-0'><input id='".$row->id."_status' type='checkbox' $checked onclick='updateStatus(" . $row->id . ")'><span class='fs_13 pl-1'>Approve</span></label></div>
                &nbsp;
                <button class='btn btn-sm btn-primary fs_13' onclick='openPortfolioForm(".$row->id.")'>Edit</button>
                &nbsp;
                <button class='btn btn-sm btn-danger fs_13' onclick='deletePortfolio(".$row->id.")'>Delete</button>  
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
    public function updateStatus(Request $request){
        $portfolio = Portfolio::find($request->id); 
        if ($portfolio) {
            $portfolio->status = $request->status;
            $portfolio->save();
            return response()->json(['type' => 'success', 'text' => 'Status Updated successfully']);
        } else {
            return response()->json(['type' => 'error', 'text' => 'Portfolio Not Found']);
        }
    }
    public function delete(Request $request){
        $portfolio = Portfolio::find($request->id);
        $old_image = public_path('manual_storage/').$portfolio->image;
            if(file_exists($old_image)){
                @unlink($old_image);
            }
        $portfolio->delete();
        return response()->json(array('type'=>'success', 'text'=>'Portfolio Successfully Deleted'));

    }
}
