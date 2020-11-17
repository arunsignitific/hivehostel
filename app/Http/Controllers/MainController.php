<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Input;
use App\Testimonial;
use App\Blog;
use App\Service;
use App\BlogComment;
use DB;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MainController extends Controller
{
    public function index()
    {
      return view("frontend.index");
    } 


    public function details($id)
    {

        $hostel_details = DB::table('hostels')->where('id','=',$id)->first();

       $city = $hostel_details->city;

        $related_hostels = DB::table('hostels')
        ->where('city','=',$city)
        ->get();

       return view("frontend.detail-page",
        [
            'hostel_detail'=>$hostel_details,
            'related'=>$related_hostels,
        ]
    );

    }


  public function listing()
    {

        $hostels = DB::table('hostels')->get();

       return view("frontend.listing",

        ['hostel'=>$hostels]

   );

    }


    public function aboutUs()
    {
        return view("frontend.about");
    }
   

    public function contact()
    {
      
        return view("frontend.contact");
    }

        public function team()
    {

      $team = DB::table('our_teams')->where('status','=','active')->get();
        return view("frontend.team",['team'=>$team]);
    }


  


public function searchHostels()
    {
   
$searchvalue =  $_POST['value'];
//$searchvalue =  $_GET['value'];

 $query="SELECT h.id as hostelid,h.name as hostelname,a.name as areaname FROM `hostels` as h, areas as a,pincodes as p,universities as u  WHERE (FIND_IN_SET(a.id,h.`tags_area`) AND a.name LIKE '%$searchvalue%') OR (FIND_IN_SET(p.id,h.`tags_pincode`) AND p.name LIKE '%$searchvalue%') OR (FIND_IN_SET(u.id,h.`tags_university`) AND u.name LIKE '%$searchvalue%') GROUP BY h.id";

$hostels = DB::select( DB::raw($query));

return json_encode($hostels);


      } 




public function filterHostels()
    {
   
$hostelarea = $_POST['area_value'];
$hostelstate = $_POST['state_value'];
$hostelcity = $_POST['city_value'];

echo $hostelarea;
echo '<br>';
echo $hostelstate;
echo '<br>';
echo $hostelcity;

 
$res=DB::table('hostels')
        ->when($hostelarea, function($query) use ($hostelarea) {
        return $query->where('hostel_area', '=', $hostelarea);
        })
        ->when($hostelstate, function($query) use ($hostelstate) {
        return $query->where('state', '=', $hostelstate);
        })
        ->when($hostelcity, function($query) use ($hostelcity) {
        return $query->where('city', '=', $hostelcity);
        })

 ->get();

return $res;

    }




    public function pagenotfound()
    {
        $service_menu = DB::table('services')->select('slug', 'title')->get();
        return view("frontend.error.404", ['service_menu'=>$service_menu]);
    }

    public function services()
    {
        $services = Service::all();
        $service_menu = DB::table('services')->select('slug', 'title')->get();
        return view("frontend.services", ['services'=>$services, 'service_menu'=>$service_menu]);
    }

    public function serviceView($slug)
    {
        $service = Service::where('slug', '=', $slug)->firstOrFail();
        $service_menu = DB::table('services')->select('slug', 'title')->get();
        return view("frontend.service-view", ['service'=>$service, 'service_menu'=>$service_menu]);
    }



    
    public function blog()
    {
        $blogs = Blog::where('status', '=', 'active')->orderBy('created_at', 'DESC')->paginate(5);
        $h1 = 'Digital Marketing Blog';
        $service_menu = DB::table('services')->select('slug', 'title')->get();
        return view("frontend.blog", ['blogs'=>$blogs, 'h1'=>$h1, 'service_menu'=>$service_menu]);
    }

    public function blogPost($slug)
    {
        $blog = Blog::where('slug', '=', $slug)->where('status', '=', 'active')->firstOrFail();
        $comments = BlogComment::where('blog_id', '=', $blog->id)->where('status', '=', 'active')->get();
        $comment_count = BlogComment::where('blog_id', '=', $blog->id)->where('status', '=', 'active')->count();
        $service_menu = DB::table('services')->select('slug', 'title')->get();
        return view("frontend.blog-post", [
            'blog'=>$blog,
            'service_menu'=>$service_menu,
            'comments'=>$comments,
            'comment_count'=>$comment_count
            ]);
    }
    
    public function unhinged()
    {
        $blogs = Blog::where('status', '=', 'active')->where('type', '=', 'unhinged')->paginate(3);
        $service_menu = DB::table('services')->select('slug', 'title')->get();
        return view("frontend.unhinged", ['blogs'=>$blogs, 'service_menu'=>$service_menu]);
    }

    public function unhingedPost($slug)
    {
        $blog = Blog::where('slug', '=', $slug)->firstOrFail();
        $comments = BlogComment::where('blog_id', '=', $blog->id)->where('status', '=', 'active')->get();
        $comment_count = BlogComment::where('blog_id', '=', $blog->id)->where('status', '=', 'active')->count();
        $service_menu = DB::table('services')->select('slug', 'title')->get();
        return view("frontend.unhinged-post", [
            'blog'=>$blog,
            'service_menu'=>$service_menu,
            'comments'=>$comments,
            'comment_count'=>$comment_count
            ]);
    }


    public function privacyPolicy()
    {
        $service_menu = DB::table('services')->select('slug', 'title')->get();
        return view("frontend.privacy-policy", ['service_menu'=>$service_menu]);
    }
}
