<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\jobs;
use App\Models\reviews;
use App\Models\company;
use App\Models\blogs;
use App\Models\attributes;
use Illuminate\Support\Str;
use Session;
use Helper;
use Response;
use App\Models\states;
use App\Models\inquiry;
use App\Models\job_inquiry;  
use App\Models\newsletter;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNewsLetter;
use App\Mail\MailContact;
use Illuminate\Support\Facades\Hash;
use \Crypt;
class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $jobs = jobs::orderBy('id','asc')->where('status','Open')->paginate(9);
       $states = states::where("is_active" , 1)->where('is_deleted',0)->get();
        $data = array("Academic Adviser","Academic Support Coordinator","Administrator","Admissions Assistant","Admissions Representative","Adjunct Professor","Adviser","After-School Program Aide","After-School Program Coordinator","Assistant Coach","Assistant Dean","Assistant Instructor","Assistant Principal","Assistant Preschool Teacher","Assistant Professor","Assistant Registrar","Assistant Teacher","Associate Dean","Associate Professor","Career Counselor","Child Care Assistant","Child Care Center Teacher","Coach","Crossing Guard","Day Care Assistant","Day Care Center Teacher","Dean","Driver Education Teacher","Education Coordinator","Education Specialist","Education Technician","Educator","Financial Aid Administrator","Food Service Aide","Food Service Coordinator","Food Service Manager","Guidance Counselor","Instructor","Instructional Assistant","Lead Teacher","Lunch Monitor","Preschool Assistant Teacher","Preschool Director","Preschool Group Leader","Preschool Lead Teacher","Preschool Specialist","Preschool Teacher","Principal","Program Assistant","Program Coordinator","Registrar","Residence Hall Manager","Resource Development Coordinator","School Administrator","School Bus Driver","School Counselor","School Librarian","School Nurse","School Psychologist","School Secretary","School Social Worker","Special Education Assistant","Special Education Coordinator","Substitute Teacher","Superintendent","Superintendent of Schools","Teacher","Teacher Aide","Teacher Assistant","Teaching Assistant","Tutor","Youth Care Worker");
        return view('web.index')->with(compact('data','states','jobs'));
    }
    public function newsletter_submit(Request $request){
        $newsletter = newsletter::where("email" , $_POST['email'])->first();
        if($newsletter){
            return redirect()->route('welcome')->with('error', "This email is already registered!");
        }
        $token_ignore = ['_token' => ''];
        $post_feilds = array_diff_key($_POST , $token_ignore);
        $newsletter = newsletter::create($post_feilds);
        $details = [
            'type' => 'user',
            'body' => $_POST['email']
        ];
        Mail::to($_POST['email'])->send(new MailNewsLetter($details));
        $details = [
            'type' => 'admin',
            'body' => $_POST['email']
        ];
        Mail::to(Helper::config('emailaddress'))->send(new MailNewsLetter($details));
        return redirect()->route('welcome')->with('message', "Congratulations, You’re Now on the list!");
    }
     public function search_detail(Request $request)
      { 
    $data = array("Academic Adviser","Academic Support Coordinator","Administrator","Admissions Assistant","Admissions Representative","Adjunct Professor","Adviser","After-School Program Aide","After-School Program Coordinator","Assistant Coach","Assistant Dean","Assistant Instructor","Assistant Principal","Assistant Preschool Teacher","Assistant Professor","Assistant Registrar","Assistant Teacher","Associate Dean","Associate Professor","Career Counselor","Child Care Assistant","Child Care Center Teacher","Coach","Crossing Guard","Day Care Assistant","Day Care Center Teacher","Dean","Driver Education Teacher","Education Coordinator","Education Specialist","Education Technician","Educator","Financial Aid Administrator","Food Service Aide","Food Service Coordinator","Food Service Manager","Guidance Counselor","Instructor","Instructional Assistant","Lead Teacher","Lunch Monitor","Preschool Assistant Teacher","Preschool Director","Preschool Group Leader","Preschool Lead Teacher","Preschool Specialist","Preschool Teacher","Principal","Program Assistant","Program Coordinator","Registrar","Residence Hall Manager","Resource Development Coordinator","School Administrator","School Bus Driver","School Counselor","School Librarian","School Nurse","School Psychologist","School Secretary","School Social Worker","Special Education Assistant","Special Education Coordinator","Substitute Teacher","Superintendent","Superintendent of Schools","Teacher","Teacher Aide","Teacher Assistant","Teaching Assistant","Tutor","Youth Care Worker");
       $search_jobs=$request->searching;
       $search_city=$request->state;
       $jobs = jobs::where("is_active" , 1)->where('job_title','LIKE',"%$search_jobs%")->where('status','Open')->get();
       $find_jobs=jobs::where("is_active" , 1)->where('is_deleted',0)->get();
       $states = states::where("is_active" , 1)->where('name','LIKE',"%$search_city%")->get();
      return view('web.search-detail')->with(compact('data','states','jobs','find_jobs'));
      } 
    public function career()
    {
        if(isset($_GET) && $_GET != []){
            $blogs = blogs::where("is_active" , 1)->where('name', 'LIKE', '%'.$_GET['search'].'%')->get();
            $search=$_GET['search'];
            return view('web.career')->with(compact('blogs','search')); 
    }
    else{
        $blogs = blogs::where("is_active" , 1)->orderBy('id', 'desc')->get();
    }
        return view('web.career')->with(compact('blogs'));
    }
    public function contact_us()
    {
        return view('web.contact_us');
    }
    public function about_us()
    {
        return view('web.about_us');
    }
    public function popular_companies()
    {
      $company_name = reviews::select("company_name")->where("company_name" ,"!=" , null)->where("is_active" ,1)->where("is_confirm" ,1)->groupBy("company_name")->get();
        return view('web.popular_companies')->with('title',"Popular Companies")->with(compact('company_name'));
    }
    public function view_reviews($slug="")
    {
        $review = null;
        if ($slug != "") {
            try {
                $slug = Crypt::decrypt($slug);
            }
            catch (\Throwable $th) {
                return redirect()->back()->with('message', 'Error : '.$th->getMessage());
            }
            $review = reviews::where('company_name',$slug)->first();           
        }
        $reviews_details = reviews::where('is_active',1)->where('company_name',$slug)->where('is_confirm',1)->get();
        return view('web.view_reviews')->with(compact('reviews_details'));
    }
    public function contact_submit(Request $request)
    {
        $token_ignore = ['_token' => ''];
        $post_feilds = array_diff_key($_POST , $token_ignore);
        $inquiry = inquiry::create($post_feilds);
        Mail::to(Helper::config('emailaddress'))->send(new MailNewsLetter($post_feilds));
        return redirect()->route('welcome')->with('message', "Inquiry has been submitted.");
    }
    public function terms()
    {
        return view('web.terms');
    }
    public function policy()
    {
        return view('web.policy');
    }
    public function news_detail($slug = '')
    {
        if($slug == ''){
            return redirect()->back()->with('notify_error','No record Found');
        }
        $blog_details = blogs::where('is_active',1)->where('slug',$slug)->first();
        $recent_blogs = blogs::where("is_active" , 1)->where("id" , '!=' , $blog_details->id)->limit(6)->get();
        return view('web.news-detail')->with(compact('blog_details','recent_blogs'));
    }
    public function signup_login()
    {
        if (Auth::check()) {
            return redirect()->back()->with('error', "You're already logged In");
        }
        return view('web.signup-login');
    }
    public function signup()
    {
        if (Auth::check()) {
            return redirect()->route('welcome')->with('error', "You're already logged In");
        }
        return view('web.signup');
    }
    public function steps()
    {
        if(Auth::user()->role_id == 1){
            $projects = attributes::where('attribute' , 'project')->where('is_active' ,1)->get();
            return view('steps')->with(compact('projects'));
        }else{
            return redirect()->back()->with('error', 'No Page Found');
        }
    }
    public function user_infoupdate(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->personal_email = $request->personal_email;
        $user->phonenumber = $request->phonenumber;
        $user->emergency_number = $request->emergency_number;
        $user->cnic = $request->cnic;
        $user->residential_address = $request->residential_address;
        $user->blood_group = $request->blood_group;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->marital_status = $request->marital_status;
        $user->save();
        return redirect()->back()->with('message', 'Information updated successfully');
    }
    
    public function user_search(Request $request)
    {
        $user = User::where("email" , $_POST['email'])->first();
        if($user){
            // Sign In
            Auth::login($user, true);
            $url = route('welcome');
            $body['status'] = 1;
            $body['message'] = 'Welcome '.$user->name.' to the Education System';
            $body['stat'] = 1;
            $body['url'] = $url;
            return json_encode($body);
        }else{
            
            
            //Create User
            $user =  new User;
            $user->name = $_POST['name'];
            $user->email = $_POST['email'];
            $user->profile_pic = $_POST['picture'];
            $user->google_id = $_POST['google_id'];
            $user->token = $_POST['token'];
            $user->password = Hash::make($_POST['google_id']);
            if($_POST['user_type'] == "Employee"){
                $user->role_type = 'Job seeker';
            }else{
                $user->role_type = 'Employer';
            }
            $user->save();
            
            
            try{
                $attempt = Auth::attempt(['email' => $_POST['email'], 'password' => $_POST['google_id']]);
                $url = route('welcome');
                $body['message'] = 'Welcome '.$user->name.' to the Education System';
                $body['stat'] = 1;
                $body['url'] = $url;
                return json_encode($body);
            }
             catch (\Throwable $th) {
                $body['message'] = 'Error : '.$th;
                $body['stat'] = 0;
                return json_encode($body);
            }
        }
        
    }
    public function user_office_infoupdate(Request $request)
    {
        $user = User::find(Auth::user()->id);
        // $user->emp_id = $request->emp_id;
        // $user->email = $request->email;
        // $user->designation = $request->designation;
        // $user->department = $request->department;
        // $user->join_date = $request->join_date;
        // $user->reporting_line = $request->reporting_line;
        $user->bank_account_number = $request->bank_account_number;
        $user->v_model_name = $request->v_model_name;
        $user->v_model_year = $request->v_model_year;
        $user->v_number_plate = $request->v_number_plate;
        $user->save();
        // Session::flash('message', 'This is a message!'); 
         Session::flash('alert-class', 'alert-danger'); 
        return redirect()->back()->with('message', 'Information updated successfully');
    }
    public function profile_submit(Request $request)
    {
        $user = User::find(Auth::user()->id);
        // Avatar Upload
        if ($request->has('avatar')) {
            if ($request->file('avatar') != '') {
                 $request->validate([
                 'avatar' => ['required', 'mimes:jpeg,png,jpg', 'max:2000']
                ]);
                $path_a = ($request->file('avatar'))->store('uploads/avatar/'.md5(Str::random(20)), 'public');
                $user->profile_pic = $path_a;
                $user->save();
                return redirect()->back()->with('message', 'Profile Picture been updated successfully');
            }
            else{
                 return redirect()->back()->with('error', 'File not found, please update your Profile Picture');
            }
        }
        // Resume Upload
        if ($request->has('cnic_file')) {
            if ($request->file('cnic_file') != '') {
            $request->validate([
             'cnic_file' => ['required', 'mimes:jpeg,png,jpg', 'max:2000']
            ]);
            $path_c = ($request->file('cnic_file'))->store('uploads/cnic/'.md5(Str::random(20)), 'public');
            $user->cnic_doc = $path_c;
            $user->save();
            return redirect()->back()->with('message', 'NIC Picture has been updated successfully');
        }
            else{
                 return redirect()->back()->with('error', 'File not found, please update your NIC Picture');
            }
        }
        // // CNIC Upload
        if ($request->has('cv_file')) {
            if ($request->file('cv_file') != '') {
            $request->validate([
             'cv_file' => ['required', 'mimes:doc,docs,pdf', 'max:5000']
            ]);
            $path_r = ($request->file('cv_file'))->store('uploads/resume/'.md5(Str::random(20)), 'public');
            $user->resume_doc = $path_r;
            $user->save();
            return redirect()->back()->with('message', 'Resume/CV Document has been updated successfully');
        }
            else{
                 return redirect()->back()->with('error', 'File not found, please update your Resume/CV Document');
            }
        }
       // // Education Upload
        if ($request->has('education_file')) {
            if ($request->file('education_file') != '') {
            $request->validate([
             'education_file' => ['required', 'mimes:doc,docs,pdf', 'max:5000']
            ]);
            $path_e = ($request->file('education_file'))->store('uploads/education/'.md5(Str::random(20)), 'public');
            $user->education_doc = $path_e;
            $user->save();
            return redirect()->back()->with('message', 'Education Document has been updated successfully');
        }
            else{
                 return redirect()->back()->with('error', 'File not found, please update your Education Document');
            }
        }
    }
    public function job_details($id="")
    {
        $job = null;
        if ($id != "") {
            try {
                $id = Crypt::decrypt($id);
            }
            catch (\Throwable $th) {
                return redirect()->back()->with('message', 'Error : '.$th->getMessage());
            }
            $job=jobs::where("is_active",1)->where("id",$id)->first();  
            // dd($job);
            if(!$job){
                return redirect()->back()->with('notify_error','No record Found');
            } 
            return view('web.jobs-details')->with(compact('job'));       
            }
        else{
            return redirect()->back()->with('notify_error','No record Found');
        }
    }


      // for Applied jobs views

    public function view_applied_jobs($id=""){
        if ($id != "") {
            try {
                $job_id = Crypt::decrypt($id);
            }
            catch (\Throwable $th) {
                return redirect()->back()->with('message', 'Error : '.$th->getMessage());
            }
            $applied_jobs=job_inquiry::where("is_active",1)->where("job_id",'=',$job_id)->get();
            $resume = array();
            foreach ($applied_jobs as $value) {
                   $result = array_push($resume, $value->resume_upload);
            }
            $final_resume =implode(',', $resume);
            if(!$applied_jobs){
                return redirect()->back()->with('notify_error','No record Found');
            } 
            return view('web.reviews-applied-jobs')->with(compact('applied_jobs','final_resume'));     
        }
        else{
            return redirect()->back()->with('notify_error','No record Found');
        }
    }

    
      
    public function bulk_open()
    {
         // dd(1);
    }
    

    
    // Company review
    public function company_reviews($id = "")
    {
               $review = null;
        if ($id != "") {
            try {
                $id = Crypt::decrypt($id);
            }
            catch (\Throwable $th) {
                return redirect()->back()->with('message', 'Error : '.$th->getMessage());
            }
            $review = reviews::findOrFail($id);           
        }
        $company_name = jobs::select("company_name")->where("company_name" ,"!=" , null)->where("is_active" ,1)->groupBy("company_name")->get();
        return view('web.company_reviews')->with('title',"Company Reviews")->with(compact('review','company_name'));
    }
    public function company_reviews_step2($id = "")
    {

       $review = null;
        if ($id != "") {
            try {
                $id = Crypt::decrypt($id);
            }
            catch (\Throwable $th) {
                return redirect()->back()->with('message', 'Error : '.$th->getMessage());
            }
            $review = reviews::findOrFail($id);           
        }
        return view('web.company_reviews_step2')->with('title',"Company Reviews Step2")->with(compact('review'));
    }
    public function company_reviews_step3($id = "")
    {    

        $review = null;
        if ($id != "") {
            try {
                $id = Crypt::decrypt($id);
            }
            catch (\Throwable $th) {
                return redirect()->back()->with('message', 'Error : '.$th->getMessage());
            }
            $review = reviews::findOrFail($id);           
        }
        return view('web.company_reviews_step3')->with('title',"Company Reviews preview")->with(compact('review'));
    }
        public function reviews_save(Request $request)
     {
        // dd($_POST);
        if (isset($_POST['review_id']) && $_POST['review_id'] != "") {
            $id = Crypt::decrypt($_POST['review_id']); 
            Session::put('review_id',$id);          
            $token_ignore = ['_token' => '' , 'review_id' => ''];
            $post_feilds = array_diff_key($_POST , $token_ignore);
            $reviews = reviews::where('id', $id)->update($post_feilds);            
            $review_id = $_POST['review_id'];
            $review_id = $review_id;
            $resp['review_id'] = $review_id;
            $resp['status'] = 1;
            $resp['message'] = "review details has been updated";
            if ($_POST['step_filled'] == 1) {
                $resp['location'] = route('company_reviews_step2',$review_id);
            }
            if ($_POST['step_filled'] == 2) {
                $resp['location'] = route('company_reviews_step3',$review_id);
            }
            if ($_POST['step_filled'] == 3) {
                $resp['location'] = route('welcome');
            }
            return json_encode($resp);
        }else{
            $token_ignore = ['_token' => '' , 'review_id' => ''];
            $post_feilds = array_diff_key($_POST , $token_ignore);
            $reviews = reviews::create($post_feilds);
            $review_id = Crypt::encrypt($reviews->id);
            $resp['review_id'] = $review_id;
            $resp['status'] = 1;
            $resp['message'] = "Review details has been saved";
            $resp['location'] = route('company_reviews_step2',$review_id);
            return json_encode($resp);
        }
    }
    
}