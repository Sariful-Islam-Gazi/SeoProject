<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Visitor;
use App\Models\Portfolio;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $data['pageTitle'] = 'Dashboard | Seo Tech Master';
        $data['portfolio'] = Portfolio::count();
        $data['blog'] = Blog::count();
        $data['testimonial'] = Testimonial::count();
        $data['contact'] = Contact::count();
        $data['totalVisitors'] = Visitor::count();
        $data['todayVisitors'] = Visitor::whereDate('created_at', today())->count();
        $data['lastMonthVisitors'] = Visitor::where('created_at', '>=', Carbon::now()->subMonth())->count();
        return view('admin.dashboard', $data);
    }
}
