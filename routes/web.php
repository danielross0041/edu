<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\GenericController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\LeaveApplicationController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Auth\GoogleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', [IndexController::class,'index'])->name('welcome'); 
Route::get('auth/google',[GoogleController::class,'redirectToGoogle'])->name('redirectToGoogle');
Route::get('auth/google/callback',[GoogleController::class,'handleGoogleCallback'])->name('handleGoogleCallback');
Route::get('dropbox',[GoogleController::class,'dropbox'])->name('dropbox'); 
Route::get('auth/graph',[GoogleController::class,'redirectToProvider'])->name('redirectToProvider');
Route::get('uth/graph/callback',[GoogleController::class,'handleProviderCallback'])->name('handleProviderCallback');
Route::get('search-detail', [IndexController::class, 'search_detail'])->name('search_detail');
Route::get('/about-us', [IndexController::class, 'about_us'])->name('about_us');
Route::get('/popular-companies', [IndexController::class, 'popular_companies'])->name('popular_companies');
Route::get('/view-reviews/{slug?}', [IndexController::class, 'view_reviews'])->name('view_reviews');
Route::get('/terms-and-condition', [IndexController::class, 'terms'])->name('terms');
Route::get('/Privacy-Policy', [IndexController::class, 'policy'])->name('policy');
Route::get('/contact-us', [IndexController::class, 'contact_us'])->name('contact_us');
Route::post('/bulk-open', [IndexController::class, 'bulk_open'])->name('bulk_open'); 
Route::get('/career', [IndexController::class, 'career'])->name('career');
Route::get('/news-detail/{slug?}', [IndexController::class, 'news_detail'])->name('news_detail');
Route::get('/signin', [IndexController::class, 'signup_login'])->name('signup_login');
Route::post('contact_submit', [IndexController::class , 'contact_submit'])->name('contact_submit');
Route::post('/newsletter-submit', [IndexController::class, 'newsletter_submit'])->name('newsletter_submit'); 
Route::get('/signup', [IndexController::class, 'signup'])->name('signup');

Route::get('job-details/{id?}', [IndexController::class ,'job_details'])->name('job_details');
Route::post('user-search', [IndexController::class , 'user_search'])->name('user_search');

Route::get('view-applied-jobs/{id}', [IndexController::class ,'view_applied_jobs'])->name('view_applied_jobs');


// Reviews
    Route::get('/company-reviews/{id?}', [IndexController::class, 'company_reviews'])->name('company_reviews');
    Route::get('/company-reviews-step2/{id?}', [IndexController::class, 'company_reviews_step2'])->name('company_reviews_step2');
    Route::get('/company-reviews-step3/{id?}', [IndexController::class, 'company_reviews_step3'])->name('company_reviews_step3');
    Route::post('/reviews-save', [IndexController::class , 'reviews_save'])->name('reviews_save');
// Review End

//Route::get('/', [IndexController::class, 'home'])->name('welcome');
//Route::get('/employee-registration', [RegistrationController::class, 'index'])->name('employee_registration');
    
Route::post('/employee-registration-submit', [RegistrationController::class, 'registration_submit'])->name('registration_submit');
Route::post('validator', [RegistrationController::class , 'validator_check'])->name('validator_check');
Route::group(['middleware' => 'auth'], function()
   {
    Route::get('/home', [HomeController::class, 'user_profile'])->name('user_profile');
    Route::get('/steps', [HomeController::class, 'steps'])->name('steps');
    Route::get('/switch-project/{id}', [HomeController::class, 'switch_project'])->name('switch_project');
    Route::get('/profile', [HomeController::class, 'user_profile'])->name('user_profile');
    Route::get('/user-profile', [HomeController::class , 'user_profile'])->name('user_profile');
    Route::post('/user-info-update', [HomeController::class, 'user_infoupdate'])->name('user_infoupdate');
    Route::get('/user-office-details', [HomeController::class , 'user_office_details'])->name('user_office_details');
    Route::post('/user-office-info-update', [HomeController::class, 'user_office_infoupdate'])->name('user_office_infoupdate');
    Route::post('/user-file-info-update', [HomeController::class, 'user_file_infoupdate'])->name('user_file_infoupdate');
    Route::get('/user-file-details', [HomeController::class , 'user_file_details'])->name('user_file_details');
    Route::post('/user-photo-update', [HomeController::class, 'upload_image'])->name('upload_image');
    Route::post('/profile-submit', [HomeController::class, 'profile_submit'])->name('profile_submit');
    Route::get('/user-rights', [HomeController::class , 'user_rights'])->name('user_rights');
    Route::get('/inquiry-manage', [HomeController::class , 'inquiry_manage'])->name('inquiry_manage');
    // Reports Routes
    Route::post('/user-updates', [HomeController::class , 'user_updates'])->name('user_updates');
    Route::post('/shift-change', [HomeController::class , 'shift_change'])->name('shift_change');
    // blog
    Route::get('/blog-listing', [BlogController::class , 'blogs_index'])->name('blogs_index');
    Route::post('/store-blog/{id?}', [BlogController::class , 'blogs_store'])->name('blogs_store');
    Route::get('/show-blog/{id?}', [BlogController::class , 'blogs_show'])->name('blogs_show');
    Route::get('/edit-blog/{id?}', [BlogController::class , 'blogs_edit'])->name('blogs_edit');
    Route::post('/update_blog', [BlogController::class , 'blogs_update'])->name('blogs_update');
    Route::any('/destroy_blog/{id?}', [BlogController::class , 'blogs_destroy'])->name('blogs_destroy');
    // review
    Route::get('/review-listing', [ReviewController::class , 'reviews_index'])->name('reviews_index');
    Route::post('/store-review/{id?}', [ReviewController::class , 'reviews_store'])->name('reviews_store');
    Route::get('/show-review/{id?}', [ReviewController::class , 'reviews_show'])->name('reviews_show');
    Route::get('/edit-review/{id?}', [ReviewController::class , 'reviews_edit'])->name('reviews_edit');
    Route::post('/update_review', [ReviewController::class , 'reviews_update'])->name('reviews_update');
    Route::any('/destroy_review/{id?}', [ReviewController::class , 'reviews_destroy'])->name('reviews_destroy');
    Route::get('/status-review}', [ReviewController::class, 'reviews_status'])->name('reviews_status');


    Route::post('/cms_create', [GenericController::class , 'cms_generator'])->name('cms_generator');
    Route::post('/modalform', [GenericController::class , 'modalform'])->name('modalform');


    
    Route::get('/registered-user-report', [ReportController::class , 'registered_user_report'])->name('registered_user_report');
    Route::get('/all-user-report/{slug?}', [ReportController::class , 'all_registered_user_report'])->name('all_registered_user_report');
    Route::get('/attendance-sheet-import', [ReportController::class , 'attendance_sheet_import'])->name('attendance_sheet_import');
    Route::post('attendance-import-submit', [ReportController::class, 'attendance_import_submit'])->name('attendance_import_submit');
    Route::get('/all-leave-application-report', [ReportController::class , 'all_leave_application_report'])->name('all_leave_application_report');
    Route::get('/birthday-list', [ReportController::class , 'birthday_list'])->name('birthday_list');
    // Reports Routes End
    Route::get('/attributes', [GenericController::class , 'roles'])->name('roles');
    Route::get('/attribute/{slug}', [GenericController::class , 'listing'])->name('listing');
    Route::get('/report/{slug}', [GenericController::class , 'report_user'])->name('report_user');
    Route::post('/custom-report', [GenericController::class , 'custom_report'])->name('custom_report');
    Route::get('/custom-report/{slug}/{slug2}', [GenericController::class , 'custom_report_user'])->name('custom_report_user');
    Route::post('/generic-submit', [GenericController::class , 'generic_submit'])->name('generic_submit');
    Route::post('/assign-role-submit', [GenericController::class , 'roleassign_submit'])->name('roleassign_submit');
    Route::post('/role-assign-modal', [GenericController::class , 'role_assign_modal'])->name('role_assign_modal');
    // Payroll Routes
    Route::get('/payroller', [PayrollController::class , 'payroller'])->name('payroller');
    Route::post('/payroll-month-report', [PayrollController::class , 'payroll_month_report'])->name('payroll_month_report');
    Route::get('/payslips', [PayrollController::class , 'payslips'])->name('payslips');
    Route::get('/view-payslip/{id}', [PayrollController::class , 'view_payslip'])->name('view_payslip');
    Route::post('/payslip-generate', [PayrollController::class , 'payslip_generate'])->name('payslip_generate');
    // Payroll Routes End
    // Chat Room
    Route::get('chat', [ChatController::class , 'chat'])->name('chat');
    Route::post('save-msg', [ChatController::class , 'save_msg'])->name('save_msg');
    Route::post('fetch-messages', [ChatController::class , 'fetch_msg'])->name('fetch_msg');
    // Leave Application Form
    Route::get('all-leave-application', [LeaveApplicationController::class , 'all_leave_application'])->name('all_leave_application');
    Route::get('leave-applicaton/show', [LeaveApplicationController::class , 'leave_show'])->name('leave_show');
    Route::get('leave-applicaton/team-show', [LeaveApplicationController::class , 'leave_teamshow'])->name('leave_teamshow');
    Route::post('leave-applicaton-submit', [LeaveApplicationController::class , 'leave_submit'])->name('leave_submit');
    Route::get('leave-applicaton-delete/{id}', [LeaveApplicationController::class , 'application_delete'])->name('application_delete');
    Route::post('update-team-leave-applicaton', [LeaveApplicationController::class , 'update_leave_form'])->name('update_leave_form');
    Route::post('leave-form-validate', [LeaveApplicationController::class , 'leave_form_validate'])->name('leave_form_validate');
    // Candidate Form
    // Step 1
    Route::get('dashboard/job/get-started/{id?}', [CandidateController::class , 'step1_form'])->name('step1_form');
    Route::get('dashboard/job/create/{id?}', [CandidateController::class , 'step2_form'])->name('step2_form');
    Route::get('dashboard/job/include-details/{id?}', [CandidateController::class , 'step3_form'])->name('step3_form');
    Route::get('dashboard/job/compensation-details/{id?}', [CandidateController::class , 'step4_form'])->name('step4_form');
    Route::get('dashboard/job/job-description/{id?}', [CandidateController::class , 'step5_form'])->name('step5_form');
    Route::get('dashboard/job/set-app-preferences/{id?}', [CandidateController::class , 'step6_form'])->name('step6_form');
    Route::get('application', [CandidateController::class , 'candidate_form'])->name('candidate_form');
    Route::get('dashboard/job/company-profile/{id?}', [CandidateController::class , 'company_profile'])->name('company_profile');
    Route::post('dashboard/job/save', [CandidateController::class , 'job_create_save'])->name('job_create_save');
    Route::post('dashboard/company/save', [CandidateController::class , 'company_create_save'])->name('company_create_save');
    Route::post('dashboard/company/logo', [CandidateController::class , 'companylogo_submit'])->name('companylogo_submit');
    Route::get('manage/jobs', [CandidateController::class , 'job_display'])->name('job_display');
    Route::get('manage/job-response/{id?}', [CandidateController::class , 'job_response'])->name('job_response');
    Route::post('get-download', [CandidateController::class ,'get_download'])->name('get_download');

    Route::get('dashboard/job-edit/{id?}', [CandidateController::class , 'job_edit'])->name('job_edit');
    Route::get('/upload-resume', [CandidateController::class, 'upload_resume'])->name('upload_resume');
    Route::post('/upload-resume-submit', [CandidateController::class, 'upload_resume_submit'])->name('upload_resume_submit');
    Route::get('apply-job/{id?}', [CandidateController::class , 'apply_job'])->name('apply_job');
    Route::post('job-applied', [CandidateController::class , 'job_applied'])->name('job_applied');
    Route::post('resume-upload-submit', [CandidateController::class , 'resume_upload_submit'])->name('resume_upload_submit');
    // Manage resume
    Route::get('/manage-resume', [CandidateController::class, 'manage_resume'])->name('manage_resume');


    // review last step
    Route::post('/reviews-save2', [CandidateController::class , 'reviews_save2'])->name('reviews_save2');

});