<?php

namespace App\Http\Controllers\admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    public function list(){
        $data['pageTitle'] = 'Testimonial | Seo Tech Master';
        return view('admin.testimonial.list', $data);        
    }
    public function addEdit(Request $request){
        $rules = [];
        $rules['name'] = 'required|string';
        $rules['rating'] = 'required|integer|between:1,5';
        // $rules['designation'] = 'required|string';
        $rules['description'] = 'required|string';

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails($rules)){
            $errors = $validator->errors()->all();
            return response()->json(['type'=>'error', 'text' => $errors]);
        }

        $isNewTestimonial = empty($request->id);
        if ($isNewTestimonial) {
            $testimonial = new Testimonial();
            $testimonial->type = 'Admin';
        } else {
            $testimonial = Testimonial::find($request->id);
            if (!$testimonial) {
                return response()->json(['type' => 'error', 'text' => 'Testimonial Not Found']);
            }
        }
    
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->country = $request->country;
        $testimonial->rating = $request->rating;
        $testimonial->description = $request->description;
        if ($request->hasFile('image')) {
            // Handle old image deletion if this is an update
            $old_image_path = public_path('manual_storage/'.$testimonial->image);
            if (file_exists($old_image_path)) {
                @unlink($old_image_path);
            }
        
            $destinationPath = public_path('manual_storage/testimonial/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $img_file = $request->file('image');
            $img_filename = time() . '_' . $img_file->getClientOriginalName();
            $img_file->move($destinationPath, $img_filename);
            $testimonial->image = 'testimonial/' . $img_filename;
        }
        $testimonial->save();
        return response()->json(['type' => 'success', 'text' => $isNewTestimonial ? 'Testimonial Created Successfully' : 'Testimonial Updated Successfully']);    
        
    }
    public function edit(Request $request){
        $data = Testimonial::where('id', $request->id)->first();
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

        $query = Testimonial::where('type', 'Admin');
        $recordsTotal = $query->count();

        $searchableColumns = ['id', 'name','designation','country','rating'];
        $orderableColumns = ['id', 'name', 'designation','country','rating','description', ''];

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
            $subArray[] = "<div><h6 class='mb-0'>".$row->name."</h6></div>";
            $subArray[] = "<div><h6 class='mb-0'>".$row->designation."</h6></div>";
            $subArray[] = "<div><h6 class='mb-0'>".$row->country."</h6></div>";
            $subArray[] = "<div><h6 class='mb-0'>".$row->rating."</h6></div>";
            $subArray[] = "<div><h6 class='mb-0' style='width:200px; overflow:hidden;'>".strip_tags($row->description)."</h6></div>";
            $checked = $row->status == 0 ? "" : "checked";
            $subArray[] = "<div class='d-flex'>
                <div><label class='d-flex align-items-center mb-0'><input id='".$row->id."_status' type='checkbox' $checked onclick='updateStatus(" . $row->id . ")'><span class='fs_13 pl-1'>Approve</span></label></div>
                &nbsp;
                <button class='btn btn-sm btn-primary fs_13' onclick='openTestimonialForm(".$row->id.")'>Edit</button>
                &nbsp;
                <button class='btn btn-sm btn-danger fs_13' onclick='deleteTestimonial(".$row->id.")'>Delete</button>  
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
        $testimonial = Testimonial::find($request->id); 
        if ($testimonial) {
            $testimonial->status = $request->status;
            $testimonial->save();
            return response()->json(['type' => 'success', 'text' => 'Status Updated successfully']);
        } else {
            return response()->json(['type' => 'error', 'text' => 'Testimonial Not Found']);
        }
    }
    public function delete(Request $request){
        $testimonial = Testimonial::find($request->id);
        $old_image = public_path('manual_storage/').$testimonial->picture;
            if(file_exists($old_image)){
                @unlink($old_image);
            }
        $testimonial->delete();
        return response()->json(array('type'=>'success', 'text'=>'Testimonial Successfully Deleted'));

    }
    //Client
    public function clientTestimonialList(){
        $data['pageTitle'] = 'Client Testimonial | Seo Tech Master';
        return view('admin.testimonial.client_testimonial_list', $data);        
    }
    public function clientTestimonialFetchAllList(Request $request){
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

        $query = Testimonial::where('type', 'Web');
        $recordsTotal = $query->count();

        $searchableColumns = ['id', 'name','designation','country','rating'];
        $orderableColumns = ['id', 'name', 'designation','country','rating','description', ''];

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
            $subArray[] = "<div><h6 class='mb-0'>".$row->name."</h6></div>";
            $subArray[] = "<div><h6 class='mb-0'>".$row->designation."</h6></div>";
            $subArray[] = "<div><h6 class='mb-0'>".$row->country."</h6></div>";
            $subArray[] = "<div><h6 class='mb-0'>".$row->rating."</h6></div>";
            $subArray[] = "<div><h6 class='mb-0' style='width:200px; overflow:hidden;'>".strip_tags($row->description)."</h6></div>";
            $checked = $row->status == 0 ? "" : "checked";
            $subArray[] = "<div class='d-flex'>
                <div><label class='d-flex align-items-center mb-0'><input id='".$row->id."_status' type='checkbox' $checked onclick='updateStatus(" . $row->id . ")'><span class='fs_13 pl-1'>Approve</span></label></div>
                &nbsp;
                <button class='btn btn-sm btn-primary fs_13' onclick='openTestimonialForm(".$row->id.")'>Edit</button>
                &nbsp;
                <button class='btn btn-sm btn-danger fs_13' onclick='deleteTestimonial(".$row->id.")'>Delete</button>  
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
}
