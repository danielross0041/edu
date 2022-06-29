<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class reviews extends Model
{
 	protected $primaryKey = 'id';
  	protected $table = 'reviews';
    protected $guarded = [];  
    public function user(){
    	return $this->belongsTo('App\Models\User', 'user_id' , 'id');
    }
    public function img($id)
    {
        $company_logo = jobs::where("is_active" , 1)->where("company_name" , $id)->where("company_logo" ,"!=" , null)->first();
        return $company_logo;
    }public function reviews_count($id)
    {
        $reviews_count = reviews::where("is_active" , 1)->where("is_confirm" , 1)->where("company_name" , $id)->count();
        return $reviews_count;
    }
    public function user_reviews_rating($id)
    {
        $rev = reviews::where("is_active" , 1)->where("is_confirm" , 1)->where("id" , $id)->first();
        if($rev) {              
       $all_starts = $rev['i_am_completely_satisfied_with_my_job']
		             +$rev['my_work_has_a_clear_sense_of_purpose']
		             +$rev['i_feel_happy_at_work_most_of_the_time']
		             +$rev['i_feel_stressed_at_work_most_of_the_time']
		             +$rev['i_am_paid_fairly_for_my_work']
		             +$rev['there_are_people_at_work_who_give_me_support_and_encouragement']
		             +$rev['there_are_people_at_work_who_appreciate_me_as_a_person']
		             +$rev['i_can_trust_people_in_my_company']
		             +$rev['i_feel_a_sense_of_belonging_in_my_company']
		             +$rev['my_manager_helps_me_succeed']
		             +$rev['my_work_environment_feels_inclusive_and_respectful_of_all_people']
		             +$rev['my_work_has_the_time_and_location_flexibility_i_need']
		             +$rev['in_most_of_my_work_tasks_i_feel_energized']
		             +$rev['i_am_achieving_most_of_my_goals_at_work']
		             +$rev['i_often_learn_something_at_work']
		             +$rev['company_overall_rating']
		             +$rev['company_compensation_or_benefits']
		             +$rev['company_management']
		             +$rev['company_job_work_or_life_balance']
		             +$rev['company_job_security_or_advancement']
		             +$rev['company_job_culture']
             ;
             $review_starts=$all_starts/21;
        return $review_starts;
        }else{
        return 0;
        }
    }public function reviews_rating($id)
    {
        $reviews = reviews::where("is_active" , 1)->where("is_confirm" , 1)->where("company_name" , $id)->get();
        if (sizeof($reviews)) {
            $avg=0;
            // dd($reviews);
           foreach($reviews as $rev){
       $all_starts = ($rev->i_am_completely_satisfied_with_my_job+$rev->my_work_has_a_clear_sense_of_purpose
		             +$rev->i_feel_happy_at_work_most_of_the_time
		             +$rev->i_feel_stressed_at_work_most_of_the_time
		             +$rev->i_am_paid_fairly_for_my_work
		             +$rev->there_are_people_at_work_who_give_me_support_and_encouragement
		             +$rev->there_are_people_at_work_who_appreciate_me_as_a_person
		             +$rev->i_can_trust_people_in_my_company
		             +$rev->i_feel_a_sense_of_belonging_in_my_company
		             +$rev->my_manager_helps_me_succeed
		             +$rev->my_work_environment_feels_inclusive_and_respectful_of_all_people
		             +$rev->my_work_has_the_time_and_location_flexibility_i_need
		             +$rev->in_most_of_my_work_tasks_i_feel_energized
		             +$rev->i_am_achieving_most_of_my_goals_at_work
		             +$rev->i_often_learn_something_at_work
		             +$rev->company_overall_rating
		             +$rev->company_compensation_or_benefits
		             +$rev->company_management
		             +$rev->company_job_work_or_life_balance
		             +$rev->company_job_security_or_advancement
		             +$rev->company_job_culture);
             $review_starts=$all_starts/21;
             $avg+= $review_starts;
        }
        return ($avg/count($reviews));
        }else{
        return 0;
        }
    }
}