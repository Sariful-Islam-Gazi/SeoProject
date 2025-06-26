<?php

namespace App\Http\Controllers\front;

use App\Models\Contact;
use App\Mail\ContactMail;
use App\Models\Portfolio;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Video;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(){
        $data['pageTitle'] = 'Home | Seo Tech Master';
        $data['testimonials'] = Testimonial::where('status', 1)->orderBy('id', 'DESC')->get();
        // $data['portfolios'] = Portfolio::where('status', 1)->orderBy('id', 'DESC')->get();
        $data['blogs'] = Blog::where('status', 1)->orderBy('id', 'DESC')->take(6)->get();
        $data['videos'] = Video::where('status', 1)->orderBy('id', 'DESC')->take(6)->get();
        $allPortfolio = Portfolio::where('status', 1)->where('home', 'Yes')->get();
        $data['portfolios'] = $allPortfolio->groupBy('type')->map(function ($group) {
            return $group->take(6);
        });
        return view('front.home', $data);
    }
    public function contact(){
        $data['pageTitle'] = 'Contact Us | Seo Tech Master';
        return view('front.pages.contact', $data);
    }
    public function about(){
        $data['pageTitle'] = 'About Us | Seo Tech Master';
        return view('front.pages.about', $data);
    }
    public function portfolio(){
        $data['pageTitle'] = 'Portfolio | Seo Tech Master';
        $data['portfolios'] = Portfolio::where('status', 1)->get();
        return view('front.pages.portfolio', $data);
    }
    public function video(){
        $data['pageTitle'] = 'Videos | Seo Tech Master';
        $data['videos'] = Video::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('front.pages.video', $data);
    }
    public function blog(){
        $data['pageTitle'] = 'Blog | Seo Tech Master';
        $data['blogs'] = Blog::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('front.pages.blog', $data);
    }
    public function blogDetails(Request $request){
        $data['pageTitle'] = 'Blog Details | Seo Tech Master';
        $data['blogDetails'] = Blog::where('id', $request->id)->first();
        $data['latestBlogs'] = Blog::where('id', '!=', $request->id)->where('status', 1)->orderBy('id', 'DESC')->take(6)->get();
        return view('front.pages.blog_details', $data);
    }
    public function privacyPolicy(){
        $data['pageTitle'] = 'Privacy Policy | Seo Tech Master';
        return view('front.pages.privacy_policy', $data);
    }
    public function termsCondition(){
        $data['pageTitle'] = 'Terms & Condition | Seo Tech Master';
        return view('front.pages.terms_condition', $data);
    }
    public function addContact(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json(['type' => 'error', 'text' => $errors]);
        }
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        // Mail::to('iloveyousariful@gmail.com')->send(new ContactMail($contact));
        return response()->json(['type' => 'success', 'text' => 'Email Sent Successfully']);
    }
    public function addReview(Request $request){
        $rules = [];
        $rules['name'] = 'required|string';
        $rules['rating'] = 'required|integer|between:1,5';
        $rules['country'] = 'required|string';
        $rules['description'] = 'required|string';

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails($rules)){
            $errors = $validator->errors()->all();
            return response()->json(['type'=>'error', 'text' => $errors]);
        }

        $testimonial = new Testimonial();
        
        $testimonial->type = 'Web';
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
        return response()->json(['type' => 'success', 'text' => 'Review Sent Successfully']);    
        
    }
}
