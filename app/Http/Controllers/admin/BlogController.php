<?php

namespace App\Http\Controllers\admin;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function list(){
        $data['pageTitle'] = 'Blog | Seo Tech Master';
        return view('admin.blog.list', $data);        
    }
    public function addEdit(Request $request){
        $rules = [];
        $rules['type'] = 'required|string';
        $rules['title'] = 'required|string';
        $rules['publish_at'] = 'required|date';
        if (empty($request->id)) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,webp';
        }

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails($rules)){
            $errors = $validator->errors()->all();
            return response()->json(['type'=>'error', 'text' => $errors]);
        }

        $isNewBlog = empty($request->id);
        if ($isNewBlog) {
            $blog = new Blog();
        } else {
            $blog = Blog::find($request->id);
            if (!$blog) {
                return response()->json(['type' => 'error', 'text' => 'Blog Not Found']);
            }
        }
        
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title, '-');
        $blog->type = $request->type;
        $blog->publish_at = $request->publish_at;
        $blog->description = $request->description;
      
        if ($request->hasFile('image')) {
            // Handle old image deletion if this is an update
            $old_image_path = public_path('manual_storage/'.$blog->image);
            if (file_exists($old_image_path)) {
                @unlink($old_image_path);
            }
        
            $destinationPath = public_path('manual_storage/blog/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $img_file = $request->file('image');
            $img_filename = time() . '_' . $img_file->getClientOriginalName();
            $img_file->move($destinationPath, $img_filename);
            $blog->image = 'blog/' . $img_filename;
        }
        $blog->save();
        return response()->json(['type' => 'success', 'text' => $isNewBlog ? 'Blog Created Successfully' : 'Blog Updated Successfully']);    
        
    }
    public function edit(Request $request){
        $data = Blog::where('id', $request->id)->first();
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

        $query = Blog::query();
        $recordsTotal = $query->count();

        $searchableColumns = ['id','type','title'];
        $orderableColumns = ['id','type','title', 'publish_at','description', ''];

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
            $subArray[] = "<div><h6 class='mb-0' style='width:200px; overflow:hidden;'>".strip_tags($row->title)."</h6></div>";
            $subArray[] = "<div><h6 class='mb-0'>".$row->publish_at."</h6></div>";
            $subArray[] = "<div><h6 class='mb-0' style='width:200px; overflow:hidden;'>".strip_tags($row->description)."</h6></div>";
            $checked = $row->status == 0 ? "" : "checked";
            $subArray[] = "<div class='d-flex'>
                <div><label class='d-flex align-items-center mb-0'><input id='".$row->id."_status' type='checkbox' $checked onclick='updateStatus(" . $row->id . ")'><span class='fs_13 pl-1'>Approve</span></label></div>
                &nbsp;
                <button class='btn btn-sm btn-primary fs_13' onclick='openBlogForm(".$row->id.")'>Edit</button>
                &nbsp;
                <button class='btn btn-sm btn-danger fs_13' onclick='deleteBlog(".$row->id.")'>Delete</button>  
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
        $blog = Blog::find($request->id); 
        if ($blog) {
            $blog->status = $request->status;
            $blog->save();
            return response()->json(['type' => 'success', 'text' => 'Status Updated successfully']);
        } else {
            return response()->json(['type' => 'error', 'text' => 'Blog Not Found']);
        }
    }
    public function delete(Request $request){
        $blog = Blog::find($request->id);
        $old_image = public_path('manual_storage/').$blog->image;
        if(file_exists($old_image)){
            @unlink($old_image);
        }
        $blog->delete();
        return response()->json(array('type'=>'success', 'text'=>'Blog Successfully Deleted'));

    }
}
