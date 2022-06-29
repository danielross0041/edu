<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\RequestUser;
use App\Models\User;
use App\Models\role_assign;
use App\Models\attributes;
use App\Models\jobs;
use App\Models\reviews;
use App\Models\company;
use App\Models\job_inquiry;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;
use Response;
use Session;
use \Crypt;
class CandidateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function step1_form($id = '')
    {
        $job = null;
        if ($id != "") {
            try {
                $id = Crypt::decrypt($id);
            }
            catch (\Throwable $th) {
                return redirect()->back()->with('message', 'Error : '.$th->getMessage());
            }
            $job = jobs::findOrFail($id);           
        }
        $user = Auth::user();
        $all_job = jobs::where("is_active" , 1)->where("is_deleted" , 0)->where("user_id" ,$user->id)->get();
        return view('web.dashboard.step-1')->with('title',"Get Started")->with(compact('job',"all_job"));
    }
    public function candidate_form()
    {
        $departments = attributes::where('attribute' , 'departments')->where('is_active' ,1)->get();
        $designations = attributes::where('attribute' , 'designations')->where('is_active' ,1)->get();
        $projects = attributes::where('attribute' , 'project')->where('is_active' ,1)->get();
        // $departments = DB::table('departments')->select('name')->get();
        // $designations = DB::table('designations')->select('name')->get();
        return view('candidate.candidate_form')->with('title',"Candidate Registration")->with(compact('departments','designations','projects'));
    }
    public function manage_resume()
    {
        return view('web.dashboard.manage-resume')->with('title',"Manage Resume");
    }    
    public function step2_form($id = "")
    {
        $job = null;
        if ($id != "") {
            try {
                if (strlen($id) > 188) {
                    $id = Crypt::decrypt($id);
                    $id = Crypt::decrypt($id);
                }else{
                    $id = Crypt::decrypt($id);
                }
            }
            catch (\Throwable $th) {
                return redirect()->back()->with('error', 'Error : '.$th->getMessage());
            }
            $job = jobs::findOrFail($id);           
        }
        $data = array("hiring_process_role" => array("Human Resources Generalist" , "Owner / CEO" , "Assistant or Office Manager" ,"Recruiter or Talent Acquisition" ,"Hiring Manager" ,"Other") , 
            "hiring_budget" => array("Not Provided" , "I have a budget for my role(s)" , "No planned budget but I can spend if needed" , "I'm not able to spend on hiring"),
            "period" => array("hour" , "day" ,"week" , "month" ,"year"),
            "role_location" => array("One location" => "Job is performed at a specific address" ,"Multiple Locations" => "Job may be performed at multiple sites" ,"Remote" => "Job is performed remotely No one site work is required" , "On the Road" => "Job require regular travels"),
            "employment_type" => array("Full Time" , "Part time" , "Contractor" , "Temporary","Intern","Volunteer","Per diem"),
            "compensation" => array("Bonus" , "Commission" , "Tip"),
        );
        $data2 = array("Academic Adviser","Academic Support Coordinator","Administrator","Admissions Assistant","Admissions Representative","Adjunct Professor","Adviser","After-School Program Aide","After-School Program Coordinator","Assistant Coach","Assistant Dean","Assistant Instructor","Assistant Principal","Assistant Preschool Teacher","Assistant Professor","Assistant Registrar","Assistant Teacher","Associate Dean","Associate Professor","Career Counselor","Child Care Assistant","Child Care Center Teacher","Coach","Crossing Guard","Day Care Assistant","Day Care Center Teacher","Dean","Driver Education Teacher","Education Coordinator","Education Specialist","Education Technician","Educator","Financial Aid Administrator","Food Service Aide","Food Service Coordinator","Food Service Manager","Guidance Counselor","Instructor","Instructional Assistant","Lead Teacher","Lunch Monitor","Preschool Assistant Teacher","Preschool Director","Preschool Group Leader","Preschool Lead Teacher","Preschool Specialist","Preschool Teacher","Principal","Program Assistant","Program Coordinator","Registrar","Residence Hall Manager","Resource Development Coordinator","School Administrator","School Bus Driver","School Counselor","School Librarian","School Nurse","School Psychologist","School Secretary","School Social Worker","Special Education Assistant","Special Education Coordinator","Substitute Teacher","Superintendent","Superintendent of Schools","Teacher","Teacher Aide","Teacher Assistant","Teaching Assistant","Tutor","Youth Care Worker",        );
        return view('web.dashboard.create-job')->with('title',"Create Job")->with(compact('job','data','data2'));
        //return view('web.createjob')->with('title',"Create Job")->with(compact('job','data'));
    }
    public function company_profile($id = "")
    {        
        $job = null;
        if ($id != "") {
            try {
                $id = Crypt::decrypt($id);
            }
            catch (\Throwable $th) {
                return redirect()->back()->with('message', 'Error : '.$th->getMessage());
            }
            $job = jobs::findOrFail($id);           
        }
        return view('web.dashboard.company-profile')->with('title',"Company Profile")->with(compact('job'));
    }
    public function job_create_save(Request $request)
     {
        if (isset($_POST['job_id']) && $_POST['job_id'] != "") {
            if (strlen($_POST['job_id']) > 188) {
                $id = Crypt::decrypt($_POST['job_id']);
                $id = Crypt::decrypt($id);
            }else{
                $id = Crypt::decrypt($_POST['job_id']);
            }
                // dd($id);
             if (isset($_POST['job_schedule'])) {
                $_POST['job_schedule']=implode(", ", $_POST['job_schedule']);
            }    
            if (isset($_POST['compensation'])) {
                $_POST['compensation']=implode(", ", $_POST['compensation']);
            }
            if (isset($_POST['benefits'])) {
                $_POST['benefits']=implode(", ", $_POST['benefits']);
            }
            $token_ignore = ['_token' => '' , 'job_id' => ''];
            $post_feilds = array_diff_key($_POST , $token_ignore);
        // dd($post_feilds);
            $jobs = jobs::where('id', $id)->update($post_feilds);
            $job_id = $_POST['job_id'];
            $job_id = $job_id;
            $resp['job_id'] = $job_id;
            $resp['status'] = 1;
            $resp['message'] = "Job details has been updated";
            if ($_POST['step_filled'] == 0) {
                $resp['location'] = route('step2_form',$job_id);
            }
            if ($_POST['step_filled'] == 1) {
                $resp['location'] = route('step3_form',$job_id);
            }
            if ($_POST['step_filled'] == 2) {
                $resp['location'] = route('step4_form',$job_id);
            }
            // if ($_POST['step_filled'] == 2) {
            //     $resp['location'] = route('step2_form',$job_id);
            // }
            if ($_POST['step_filled'] == 3) {
                // $jobs = jobs::find($id);
                // $resp['checker'] = 3;
                // $resp['title'] = $jobs->job_title;
                // $resp['email'] = Auth::user()->email;
                // $resp['company_name'] = $jobs->company_name;
                // $resp['salary'] = "Starting from (".$jobs->currency.")".$jobs->starting_salary." to ".$jobs->currency."(".$jobs->ending_salary.")";
                // $resp['summary'] = $jobs->summary;
                // $resp['skills'] = $jobs->skills;
                // $resp['company_description'] = $jobs->company_description;
                // $resp['employment_type'] = $jobs->employment_type;
                // $resp['compensation'] = $jobs->compensation;
                $resp['location'] = route('step5_form',$job_id);
            }
            if ($_POST['step_filled'] == 4) {
                $resp['location'] = route('step6_form',$job_id);
            }
            if ($_POST['step_filled'] == 5) {
                $resp['location'] = route('job_edit',$job_id.'?action=review');
            }
            if ($_POST['step_filled'] == 6 && $_POST['action']='view'&& isset($_POST['is_confirm']) &&$_POST['is_confirm']==1) {
                 return redirect()->route('job_display')->with('message', 'Success : Update Successfully');
            }
            if ($_POST['step_filled'] == 6 && $_POST['action']='review') {
                // dd(1);
                return redirect()->route('job_edit',$job_id.'?action=review')->with('message', 'Success : Update Successfully');
            }
            if ($_POST['step_filled'] == 6 && $_POST['action']='view') {
                 return redirect()->route('job_display')->with('message', 'Success : Update Successfully');
            }
            if ($_POST['step_filled'] == 7) {
                $resp['message'] = "Job status has been updated";
                $resp['location'] = route('job_display');
            }
            return json_encode($resp);
        }else{
            $token_ignore = ['_token' => '' , 'job_id' => ''];
            $post_feilds = array_diff_key($_POST , $token_ignore);
            $jobs = jobs::create($post_feilds);
            $job_id = Crypt::encrypt($jobs->id);
            $resp['job_id'] = $job_id;
            $resp['status'] = 1;
            $resp['message'] = "Job details has been saved";
            $resp['location'] = route('step2_form',$job_id);
            return json_encode($resp);
        }
    }
    public function step3_form($id = '')
     {
        $job = null;
        if ($id != "") {
            try {
                $id = Crypt::decrypt($id);
            }
            catch (\Throwable $th) {
                return redirect()->back()->with('message', 'Error : '.$th->getMessage());
            }
            $job = jobs::findOrFail($id);           
        }
        $data = array("part_time" => array("Full-time" , "Part-time" ,"Either full-time or part-time"),
            "employment_type" => array("Full Time" , "Part time" , "Contractor" , "Temporary","Internship","Volunteer","Per diem"),
            "job_schedule" => array("8 hour shift" , "10 hour shift" ,"12 hour shift","Weekend availability","Monday to Friday","On call","Holidays","Day shift","Night shift","Overtime","Other"),
            "need_to_hire" => array("1 to 3 days", "3 to 7 days","1 to 2 weeks","2 to 4 weeks","More than 4 weeks"), 
        );
        return view('web.dashboard.step-3')->with('title',"Include Details")->with(compact('job','data'));
     }
    public function step4_form($id = '')
      {
        $job = null;
        if ($id != "") {
            try {
                $id = Crypt::decrypt($id);
            }
            catch (\Throwable $th) {
                return redirect()->back()->with('message', 'Error : '.$th->getMessage());
            }
            $job = jobs::findOrFail($id);           
        }
        $data = array("compensation" => array("Bonus" , "Commission" ,"Signing bonus", "Tip","Other"),
            "benefits" => array("Health insurance" , "Paid time off" , "Dental insurance","401(k)","Vision insurance","Flexible schedule","Tuition reimbursement","Life insurance","401(k) matching","Retirement plan","Referral program","Employee discount","Flexible spending account","Health savings account","Relocation assistance","Parental leave","Professional development assistance","Employee assistance program","Other"),
            "period" => array("hour" , "day" ,"week" , "month" ,"year"),
        );
        return view('web.dashboard.step-4')->with('title',"Compensation Details")->with(compact('job','data'));
    }
    public function step5_form($id = '')
     {
        $job = null;
        if ($id != "") {
            try {
                $id = Crypt::decrypt($id);
            }
            catch (\Throwable $th) {
                return redirect()->back()->with('message', 'Error : '.$th->getMessage());
            }
            $job = jobs::findOrFail($id);           
        }
        $data = array("compensation" => array("Bonus" , "Commission" ,"Signing bonus", "Tip","Other"),
            "benefits" => array("Health insurance" , "Paid time off" , "Dental insurance","401(k)","Vision insurance","Flexible schedule","Tuition reimbursement","Life insurance","401(k) matching","Retirement plan","Referral program","Employee discount","Flexible spending account","Health savings account","Relocation assistance","Parental leave","Professional development assistance","Employee assistance program","Other"),
            "period" => array("hour" , "day" ,"week" , "month" ,"year"),
        );
        // dd(1);
        return view('web.dashboard.step-5')->with('title',"Compensation Details")->with(compact('job','data'));
     }
    public function step6_form($id = '')
     {
        $job = null;
        if ($id != "") {
            try {
                $id = Crypt::decrypt($id);
            }
            catch (\Throwable $th) {
                return redirect()->back()->with('message', 'Error : '.$th->getMessage());
            }
            $job = jobs::findOrFail($id);           
        }
        $data = array("receive_applications" => array("Email" => "Screen applications individually, received by email." ,"Walk In"=>"Add a street address where people can drop off applications.")    
        );
        $data2 =array("submit_resume" => array("Yes" => "People will be required to include a resume." ,"No"=>"People will not be required to include a resume.","Optional"=>"People can choose whether to include a resume."));
        return view('web.dashboard.step-6')->with('title',"Include Details")->with(compact('job','data','data2'));
       }
    public function job_display(Request $request)
      {
        $user = Auth::user();
        if ($user) {
      $jobs=jobs::where("is_confirm",1)->where("is_active",1)->where("user_id",$user->id)->orderby("id" , 'desc')->paginate(200);
        $open_paused_jobs=jobs::where("is_confirm",1)->where("is_active",1)->where("user_id",$user->id)->where("status", "!=" ,"Closed")->where("user_id",$user->id)->count();
    $closed_jobs=jobs::where("is_confirm",1)->where("is_active",1)->where("status","Closed")->where("user_id",$user->id)->count();
         }
        else{
            return redirect()->back()->with('notify_error','Kindly Login First');
        }        
        return view('web.jobs')->with(compact('jobs','open_paused_jobs','closed_jobs'));
    }
    public function job_response($id = 0)
     {
        $user = Auth::user();
        if ($id != "") {
            try {
                $id = Crypt::decrypt($id);
            }
            catch (\Throwable $th) {
                return redirect()->back()->with('message', 'Error : '.$th->getMessage());
            }           
        }else{
            return redirect()->back()->with('message','No Job ID Found');
        }
        if ($user->role_type != "Employer") {
            return redirect()->back()->with('message','No Page Found');
        }
        if ($user) {
            $job=jobs::where("id",$id)->where("is_active" , 1)->where("is_deleted" , 0)->first();
            if (!$job || is_null($job)) {
                return redirect()->back()->with('message','No active job found');
            }
            $job_inquiry=job_inquiry::where("job_id",$id)->where("is_active",1)->orderby("id" , 'desc')->paginate(10);
            $open_paused_jobs=jobs::where("is_confirm",1)->where("is_active",1)->where("user_id",$user->id)->where("status","Open")->orWhere("status","Paused")->where("user_id",$user->id)->count();
            $closed_jobs=jobs::where("is_confirm",1)->where("is_active",1)->where("status","Closed")->where("user_id",$user->id)->count();
      $applied_jobs=job_inquiry::where("is_active",1)->where("job_id",'=',$id)->get();
              $resume = array();
           foreach ($applied_jobs as $value) {
           $result = array_push($resume, $value->resume_upload);
          }
        
        $final_resume =implode(',', $resume);
        }
        else{
            return redirect()->back()->with('message','Kindly Login First');
        }        
        return view('web.dashboard.job-response')->with(compact('job','job_inquiry','open_paused_jobs','closed_jobs','final_resume'));
    }


      public function get_download(Request $request){
         
        $file = public_path()."/uploads/resume/".$_POST['files']."";
        $headers = array('Content-Type: application/pdf',);
        return Response::download($file, "".$_POST['files']."",$headers);
    }
    public function job_Edit($id='')
    {
        $user = Auth::user();
        if ($user) {
        $job = null;
        if ($id != "") {
            try {
                $id = Crypt::decrypt($id);
            }
            catch (\Throwable $th) {
                return redirect()->back()->with('message', 'Error : '.$th->getMessage());
            }
            $job=jobs::where("is_active",1)->where("id",$id)->where("user_id",$user->id)->where("is_deleted",0)->first();           
        }
        }
        else{
            return redirect()->back()->with('notify_error','Kindly Login First');
        }
        $data = array("hiring_process_role" => array("Human Resources Generalist" , "Owner / CEO" , "Assistant or Office Manager" ,"Recruiter or Talent Acquisition" ,"Hiring Manager" ,"Other") , 
            "hiring_budget" => array("Not Provided" , "I have a budget for my role(s)" , "No planned budget but I can spend if needed" , "I'm not able to spend on hiring"),
            "period" => array("hour" , "day" ,"week" , "month" ,"year"),
            "role_location" => array("One location" => "Job is performed at a specific address" ,"Multiple Locations" => "Job may be performed at multiple sites" ,"Remote" => "Job is performed remotely No one site work is required" , "On the Road" => "Job require regular travels"),
            "employment_type" => array("Full Time" , "Part time" , "Contractor" , "Temporary","Intern","Volunteer","Per diem"),
            "compensation" => array("Bonus" , "Commission" , "Tip"),);
        $data2= array("part_time" => array("Full-time" , "Part-time" ,"Either full-time or part-time"),
            "employment_type" => array("Full Time" , "Part time" , "Contractor" , "Temporary","Internship","Volunteer","Per diem"),
            "job_schedule" => array("8 hour shift" , "10 hour shift" ,"12 hour shift","Weekend availability","Monday to Friday","On call","Holidays","Day shift","Night shift","Overtime","Other"),
            "need_to_hire" => array("1 to 3 days", "3 to 7 days","1 to 2 weeks","2 to 4 weeks","More than 4 weeks"), 
        );
       $data3= array("compensation" => array("Bonus" , "Commission" ,"Signing bonus", "Tip","Other"),
            "benefits" => array("Health insurance" , "Paid time off" , "Dental insurance","401(k)","Vision insurance","Flexible schedule","Tuition reimbursement","Life insurance","401(k) matching","Retirement plan","Referral program","Employee discount","Flexible spending account","Health savings account","Relocation assistance","Parental leave","Professional development assistance","Employee assistance program","Other"),
            "period" => array("hour" , "day" ,"week" , "month" ,"year"),
        ); 
       $data4 = array("receive_applications" => array("Email" => "Screen applications individually, received by email." ,"Walk In"=>"Add a street address where people can drop off applications.")    
        );
        $data5 =array("submit_resume" => array("Yes" => "People will be required to include a resume." ,"No"=>"People will not be required to include a resume.","Optional"=>"People can choose whether to include a resume."));
        return view('web.job-edit')->with('title',"Create Job")->with(compact('job','data','data2','data3','data4','data5'));
    }
    public function company_create_save(Request $request)
    {
        $token_ignore = ['_token' => '' , 'job_id' => '' , 'full_name' => '' , 'hear_about' => ''];
        $post_feilds = array_diff_key($_POST , $token_ignore);
        $company = company::create($post_feilds);
        $job = jobs::where('id', $_POST['job_id'])->update(['hear_about' => $_POST['hear_about'] ,'company_name' => $company->id]);
        return redirect()->route('welcome')->with('message', 'Post submitted');
    }
    public function companylogo_submit(Request $request)
     {
        if (!empty($_FILES)) {
            $file = $request->file('file');
            $file_name = $request->file('file')->getClientOriginalName();
            $file_name = substr($file_name, 0, strpos($file_name, "."));
            $name = $file_name."_".time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path().'/uploads/company_logo/';
            $share = $request->file('file')->move($destinationPath,$name);
            return $name;
        }
    }
    public function upload_resume()
     {
        if (!Auth::check()) {
            return redirect()->back()->with('error', "Kindly login first to upload your resume");
        }
        return view('web.upload-resume');
    }
    public function upload_resume_submit(Request $request)
      {
       $user = User::find(Auth::user()->id);
        if(isset($_POST['file_content']) && $_POST['file_content'] != ""){
            if(isset($_POST['file_from']) && $_POST['file_from'] == "google"){
                $main = explode("&",$_POST['file_content']);
                $url = explode("url=",$main[0]);
                $url= $url[1];
                $token = explode("token=",$main[4]);
                $token= $token[1];
                $filename = explode("name=",$main[1]);
                $filename= $filename[1];
                $filename_data = explode("." , $filename);
                $filename = $filename_data[0];
                $file_ext = $filename_data[count($filename_data) - 1];
                $mimetype = explode("mimeType=",$main[2]);
                $mimetype= $mimetype[1]; 
                $fileId = explode("fileId=",$main[3]);
                $fileId= $fileId[1];
                $oAuthToken = $token;
                $fileId = $fileId;
                $getUrl = 'https://www.googleapis.com/drive/v3/files/' . $fileId . '?alt=media';
                $authHeader = 'Authorization: Bearer ' . $oAuthToken ;
                $ch = curl_init($getUrl);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [$authHeader]);
                $data = curl_exec($ch);
                $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                $error = curl_errno($ch);
                $data = curl_exec($ch);
                $error = curl_error($ch);
                curl_close($ch);
                //$path = asset('uploads/resume/'.$filename);
                $path = 'uploads/resume/'.$filename."_".time().".".$file_ext;
                file_put_contents("public/".$path, $data);
                $user->resume_doc=$path;
                $save=$user->save();
            }elseif(isset($_POST['file_from']) && $_POST['file_from'] == "dropbox"){
                $main = explode("&",$_POST['file_content']);
                $url = explode("url=",$main[0]);
                $url= $url[1];
                $filename = explode("name=",$main[1]);
                $filename= $filename[1];
                $filename_data = explode("." , $filename);
                $filename = $filename_data[0];
                $file_ext = $filename_data[count($filename_data) - 1];
                $curlSession = curl_init();
                curl_setopt($curlSession, CURLOPT_URL, $url);
                curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
                curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
                $jsonData = curl_exec($curlSession);
                curl_close($curlSession);
                $path = 'uploads/resume/'.$filename."_".time().".".$file_ext;
                file_put_contents("public/".$path, $jsonData);
                $user->resume_doc=$path;
                $save=$user->save();
            }
            return redirect()->back()->with('message', 'Resume has been uploaded');
        }
        //$user->resume_doc=$request->hasFile('myFile');
        if($request->hasFile('myFile')){
            $filename = $request->myFile->getClientOriginalName();
            $path=$request->myFile->storeAs('uploads/resume', $filename, 'public');
            $user->resume_doc=$path;
            $save=$user->save();
        }else{
            return redirect()->back()->with('error', 'Please attached the file first');
        }
        if($save)
        {
            return redirect()->back()->with('message', 'Resume has been uploaded');
        }
        else{
            return redirect()->back()->with('error', 'Format not allowed');
        }
    }
    public function apply_job($id = '')
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
            return view('web.apply-job')->with(compact('job'));       
            }
        else{
            return redirect()->back()->with('notify_error','No record Found');
        }
    }
    public function job_applied(Request $request)
    {
        $job_inquiry = job_inquiry::where("user_id" , $_POST['user_id'])->where("job_id" , $_POST['job_id'])->first();
        if($job_inquiry){
            $resp['status'] = 0;
            $resp['message'] = "You have already applied for this job";
            $resp['location'] = route('job_details' ,Crypt::encrypt($_POST['job_id']));
            return json_encode($resp);
        }
        $token_ignore = ['_token' => ''];
        $post_feilds = array_diff_key($_POST , $token_ignore);
        $job_inquiry = job_inquiry::create($post_feilds);
        $resp['status'] = 1;
        $resp['message'] = "Job Applied";
        $resp['location'] = route('welcome');
        return json_encode($resp);
    }
    public function resume_upload_submit(Request $request)
    {
        if (!empty($_FILES)) {
            $file = $request->file('file');
            $file_name = $request->file('file')->getClientOriginalName();
            $file_name = substr($file_name, 0, strpos($file_name, "."));
            $name = $file_name."_".time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path().'/uploads/resume/';
            $share = $request->file('file')->move($destinationPath,$name);
            return $name;
        }
    }
     public function reviews_save2(Request $request)
     {
// dd(1);
        if (isset($_POST['review_id']) && $_POST['review_id'] != "") {
            $id = Crypt::decrypt($_POST['review_id']);           
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
                // $resp['location'] = route('welcome');
                Session::forget('review_id');
                return redirect()->route('welcome')->with('message', 'Review details has been saved');
            }
            return json_encode($resp);
        }else{
            // $token_ignore = ['_token' => '' , 'review_id' => ''];
            // $post_feilds = array_diff_key($_POST , $token_ignore);
            // $reviews = reviews::create($post_feilds);
            // $review_id = Crypt::encrypt($reviews->id);
            // $resp['review_id'] = $review_id;
            // $resp['status'] = 1;
            // $resp['message'] = "Review details has been saved";
            // $resp['location'] = route('company_reviews_step2',$review_id);
            // return json_encode($resp);
             return redirect()->route('welcome')->with('error', 'due to error Review has been not saved');
        }
    }
}