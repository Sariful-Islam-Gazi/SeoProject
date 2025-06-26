<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function list(){
        $data['pageTitle'] = 'Video | Seo Tech Master';
        return view('admin.video.list', $data);        
    }
    public function addEdit(Request $request){
        $rules = [];
        $rules['home'] = 'required|string';
        $rules['title'] = 'required|string';
        if (empty($request->id)) {
            $rules['video'] = 'required|mimes:mp4,avi,mov,wmv,flv';
        }

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails($rules)){
            $errors = $validator->errors()->all();
            return response()->json(['type'=>'error', 'text' => $errors]);
        }

        $isNewVideo = empty($request->id);
        if ($isNewVideo) {
            $video = new Video();
        } else {
            $video = Video::find($request->id);
            if (!$video) {
                return response()->json(['type' => 'error', 'text' => 'Video Not Found']);
            }
        }
        
        $video->title = $request->title;
        $video->home = $request->home;
        $video->description = $request->description;
    
        if ($request->hasFile('video')) {
            // Handle old image deletion if this is an update
            $old_video_path = public_path('manual_storage/'.$video->video);
            if (file_exists($old_video_path)) {
                @unlink($old_video_path);
            }
        
            $destinationPath = public_path('manual_storage/video/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $img_file = $request->file('video');
            $img_filename = time() . '_' . $img_file->getClientOriginalName();
            $img_file->move($destinationPath, $img_filename);
            $video->video = 'video/' . $img_filename;
        }
        $video->save();
        return response()->json(['type' => 'success', 'text' => $isNewVideo ? 'Video Created Successfully' : 'Video Updated Successfully']);    
        
    }
    public function edit(Request $request){
        $data = Video::where('id', $request->id)->first();
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

        $query = Video::query();
        $recordsTotal = $query->count();

        $searchableColumns = ['title','home'];
        $orderableColumns = ['title','home','description',''];

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
            $subArray[] = "<div><h6 class='mb-0' style='width:200px; overflow:hidden;'>".strip_tags($row->title)."</h6></div>";
            $subArray[] = "<div><h6 class='mb-0'>".$row->home."</h6></div>";
            $subArray[] = "<div><h6 class='mb-0' style='width:200px; overflow:hidden;'>".strip_tags($row->description)."</h6></div>";
            $checked = $row->status == 0 ? "" : "checked";
            $subArray[] = "<div class='d-flex'>
                <div><label class='d-flex align-items-center mb-0'><input id='".$row->id."_status' type='checkbox' $checked onclick='updateStatus(" . $row->id . ")'><span class='fs_13 pl-1'>Approve</span></label></div>
                &nbsp;
                <button class='btn btn-sm btn-primary fs_13' onclick='openVideoForm(".$row->id.")'>Edit</button>
                &nbsp;
                <button class='btn btn-sm btn-danger fs_13' onclick='deleteVideo(".$row->id.")'>Delete</button>  
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
        $video = Video::find($request->id); 
        if ($video) {
            $video->status = $request->status;
            $video->save();
            return response()->json(['type' => 'success', 'text' => 'Status Updated successfully']);
        } else {
            return response()->json(['type' => 'error', 'text' => 'Video Not Found']);
        }
    }
    public function delete(Request $request){
        $video = Video::find($request->id);
        $old_video = public_path('manual_storage/').$video->video;
            if(file_exists($old_video)){
                @unlink($old_video);
            }
        $video->delete();
        return response()->json(array('type'=>'success', 'text'=>'Video Successfully Deleted'));

    }
}
