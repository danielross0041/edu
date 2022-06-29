@extends('web.layouts.main') 
@section('content')
<style type="text/css">
    .rev-sec {
    padding-top: 0 !important;
}
</style>
<section class="inner-banner">
    <img src="{{asset('web/images/bnr-bg.jpg')}}" />
    <div class="inner-cap">
        <h4 style="text-align: center;">Company <span> Reviews</span></h4>
    </div>
</section>
<section class="company-ratings">
    <div class="container">
        {{--<div class="title-heading">
            <h2><span>Company </span> Review</h2>
        </div> --}}
<form id="get_started">
@if(isset($review) && $review != null)
  <input type="hidden" name="review_id" value="{{Crypt::encrypt($review->id)}}">
@endif    
<input type="hidden" name="step_filled" value="1">
<input type="hidden" name="user_id" value="{{!is_null(Auth::user())?Auth::user()->id:'0'}}" />
        <div class="review-form">
            <div class="r-message">
                <?php echo (html_entity_decode(Helper::editck('h4', '', 'Please help answer these questions about your employer' ,'h4Please help answer these questions about your employer'.__LINE__)));?>
                <?php echo (html_entity_decode(Helper::editck('p', '', 'Your honest responses help other job seekers and its anonymous <i class="fa fa-question-circle" aria-hidden="true"></i>' ,'pYour honest responsesfaquestion-circlrue>'.__LINE__)));?>
            </div>
            <!-- ROW -->
            <div class="text-field rev-form">
                <h5>What is the company name?*</h5>
                <p>It can be your current or former employer</p>
                <select name="company_name" id="company_name" required="" class="form-control">
                    @if($company_name)
                        @foreach($company_name as $company)
                            @if($company->company_name != "")
                                <option {{(isset($review) && $review->company_name == $company->company_name)?'selected':''}} value="{{$company->company_name}}">{{$company->company_name}}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
                {{-- <input type="text" name="company_name" value="" id="company_name" required="" class="form-control"> --}}
            </div>
            <!-- END ROW -->
            <!-- ROW -->
            <div class="rev-form rate-panel">
                <h5>Overall, I am completely satisfied with my job.</h5>
                    <div class="form-group rating-ability-wrapper" id="">
                    <label class="control-label" for="rating" style="display:none;">
                    <span class="field-label-header">How would you rate your ability to use the computer and access internet?*</span><br>
                    <span class="field-label-info"></span>
                    <input type="hidden" name="i_am_completely_satisfied_with_my_job" value="{{isset($review)?$review->i_am_completely_satisfied_with_my_job:''}}" required="required">
                    </label>
                    {{--<h2 class="bold rating-header" style="display: none;">
                    <span class="selected-rating">0</span><small> / 5</small>
                    </h2>--}}

                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_am_completely_satisfied_with_my_job == '1')?'btn-warning':''}}"  data-attr="1" id="rating-star-1">
                        1
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_am_completely_satisfied_with_my_job == '2')?'btn-warning':''}}"  data-attr="2" id="rating-star-2">
                        2
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_am_completely_satisfied_with_my_job == '3')?'btn-warning':''}}"  data-attr="3" id="rating-star-3">
                        3
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_am_completely_satisfied_with_my_job == '4')?'btn-warning':''}}"  data-attr="4" id="rating-star-4">
                        4
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_am_completely_satisfied_with_my_job == '5')?'btn-warning':''}}"  data-attr="5" id="rating-star-5">
                        5
                    </button>
                    </div>
                    <ul class="agree-comment">
                        <li>Strongly disagree</li>
                        <li>Strongly agree</li>
                    </ul>
            </div>
            <!-- END ROW -->
            <!-- ROW -->
            <div class="rev-form rate-panel">
                <h5>My work has a clear sense of purpose.</h5>
                    <div class="form-group rating-ability-wrapper" id="">
                    <label class="control-label" for="rating" style="display:none;">
                    <span class="field-label-header">How would you rate your ability to use the computer and access internet?*</span><br>
                    <span class="field-label-info"></span>
                    <input type="hidden" name="my_work_has_a_clear_sense_of_purpose" value="{{isset($review)?$review->my_work_has_a_clear_sense_of_purpose:''}}" required="required">
                    </label>
                    {{--<h2 class="bold rating-header" style="display: none;">
                    <span class="selected-rating">0</span><small> / 5</small>
                    </h2>--}}
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->my_work_has_a_clear_sense_of_purpose == '1')?'btn-warning':''}}"  data-attr="1" id="rating-star-1">
                        1
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->my_work_has_a_clear_sense_of_purpose == '2')?'btn-warning':''}}"  data-attr="2" id="rating-star-2">
                        2
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->my_work_has_a_clear_sense_of_purpose == '3')?'btn-warning':''}}"  data-attr="3" id="rating-star-3">
                        3
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->my_work_has_a_clear_sense_of_purpose == '4')?'btn-warning':''}}"  data-attr="4" id="rating-star-4">
                        4
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->my_work_has_a_clear_sense_of_purpose == '5')?'btn-warning':''}}"  data-attr="5" id="rating-star-5">
                        5
                    </button>
                    </div>
                    <ul class="agree-comment">
                        <li>Strongly disagree</li>
                        <li>Strongly agree</li>
                    </ul>
            </div>
            <!-- END ROW -->
            <!-- ROW -->
            <div class="rev-form rate-panel">
                <h5>I feel happy at work most of the time.</h5>
                    <div class="form-group rating-ability-wrapper" id="">
                    <label class="control-label" for="rating" style="display:none;">
                    <span class="field-label-header">How would you rate your ability to use the computer and access internet?*</span><br>
                    <span class="field-label-info"></span>
                    <input type="hidden" name="i_feel_happy_at_work_most_of_the_time" value="{{isset($review)?$review->i_feel_happy_at_work_most_of_the_time:''}}" required="required">
                    </label>
                    {{--<h2 class="bold rating-header" style="display: none;">
                    <span class="selected-rating">0</span><small> / 5</small>
                    </h2>--}}
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_feel_happy_at_work_most_of_the_time == '1')?'btn-warning':''}}"  data-attr="1" id="rating-star-1">
                        1
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_feel_happy_at_work_most_of_the_time == '2')?'btn-warning':''}}"  data-attr="2" id="rating-star-2">
                        2
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_feel_happy_at_work_most_of_the_time == '3')?'btn-warning':''}}"  data-attr="3" id="rating-star-3">
                        3
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_feel_happy_at_work_most_of_the_time == '4')?'btn-warning':''}}"  data-attr="4" id="rating-star-4">
                        4
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_feel_happy_at_work_most_of_the_time == '5')?'btn-warning':''}}"  data-attr="5" id="rating-star-5">
                        5
                    </button>
                    </div>
                    <ul class="agree-comment">
                        <li>Strongly disagree</li>
                        <li>Strongly agree</li>
                    </ul>
            </div>
            <!-- END ROW -->
            <!-- ROW -->
            <div class="rev-form rate-panel">
                <h5>I feel stressed at work most of the time.</h5>
                    <div class="form-group rating-ability-wrapper" id="">
                    <label class="control-label" for="rating" style="display:none;">
                    <span class="field-label-header">How would you rate your ability to use the computer and access internet?*</span><br>
                    <span class="field-label-info"></span>
                    <input type="hidden" name="i_feel_stressed_at_work_most_of_the_time" value="{{isset($review)?$review->i_feel_stressed_at_work_most_of_the_time:''}}" required="required">
                    </label>
                    {{--<h2 class="bold rating-header" style="display: none;">
                    <span class="selected-rating">0</span><small> / 5</small>
                    </h2>--}}
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_feel_stressed_at_work_most_of_the_time == '1')?'btn-warning':''}}"  data-attr="1" id="rating-star-1">
                        1
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_feel_stressed_at_work_most_of_the_time == '2')?'btn-warning':''}}"  data-attr="2" id="rating-star-2">
                        2
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_feel_stressed_at_work_most_of_the_time == '3')?'btn-warning':''}}"  data-attr="3" id="rating-star-3">
                        3
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_feel_stressed_at_work_most_of_the_time == '4')?'btn-warning':''}}"  data-attr="4" id="rating-star-4">
                        4
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_feel_stressed_at_work_most_of_the_time == '5')?'btn-warning':''}}"  data-attr="5" id="rating-star-5">
                        5
                    </button>
                    </div>
                    <ul class="agree-comment">
                        <li>Strongly disagree</li>
                        <li>Strongly agree</li>
                    </ul>
            </div>
            <!-- END ROW -->
            <!-- ROW -->
            <div class="rev-form rate-panel">
                <h5>I am paid fairly for my work.</h5>
                    <div class="form-group rating-ability-wrapper" id="">
                    <label class="control-label" for="rating" style="display:none;">
                    <span class="field-label-header">How would you rate your ability to use the computer and access internet?*</span><br>
                    <span class="field-label-info"></span>
                    <input type="hidden" name="i_am_paid_fairly_for_my_work" value="{{isset($review)?$review->i_am_paid_fairly_for_my_work:''}}" required="required">
                    </label>
                    {{--<h2 class="bold rating-header" style="display: none;">
                    <span class="selected-rating">0</span><small> / 5</small>
                    </h2>--}}
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_am_paid_fairly_for_my_work == '1')?'btn-warning':''}}"  data-attr="1" id="rating-star-1">
                        1
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_am_paid_fairly_for_my_work == '2')?'btn-warning':''}}"  data-attr="2" id="rating-star-2">
                        2
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_am_paid_fairly_for_my_work == '3')?'btn-warning':''}}"  data-attr="3" id="rating-star-3">
                        3
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_am_paid_fairly_for_my_work == '4')?'btn-warning':''}}"  data-attr="4" id="rating-star-4">
                        4
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_am_paid_fairly_for_my_work == '5')?'btn-warning':''}}"  data-attr="5" id="rating-star-5">
                        5
                    </button>
                    </div>
                    <ul class="agree-comment">
                        <li>Strongly disagree</li>
                        <li>Strongly agree</li>
                    </ul>
            </div>
            <!-- END ROW -->
            <!-- ROW -->
            <div class="rev-form rate-panel">
                <h5>There are people at work who give me support and encouragement.</h5>
                    <div class="form-group rating-ability-wrapper" id="">
                    <label class="control-label" for="rating" style="display:none;">
                    <span class="field-label-header">How would you rate your ability to use the computer and access internet?*</span><br>
                    <span class="field-label-info"></span>
                    <input type="hidden" name="there_are_people_at_work_who_give_me_support_and_encouragement" value="{{isset($review)?$review->there_are_people_at_work_who_give_me_support_and_encouragement:''}}" required="required">
                    </label>
                    {{--<h2 class="bold rating-header" style="display: none;">
                    <span class="selected-rating">0</span><small> / 5</small>
                    </h2>--}}
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->there_are_people_at_work_who_give_me_support_and_encouragement == '1')?'btn-warning':''}}"  data-attr="1" id="rating-star-1">
                        1
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->there_are_people_at_work_who_give_me_support_and_encouragement == '2')?'btn-warning':''}}"  data-attr="2" id="rating-star-2">
                        2
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->there_are_people_at_work_who_give_me_support_and_encouragement == '3')?'btn-warning':''}}"  data-attr="3" id="rating-star-3">
                        3
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->there_are_people_at_work_who_give_me_support_and_encouragement == '4')?'btn-warning':''}}"  data-attr="4" id="rating-star-4">
                        4
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->there_are_people_at_work_who_give_me_support_and_encouragement == '5')?'btn-warning':''}}"  data-attr="5" id="rating-star-5">
                        5
                    </button>
                    </div>
                    <ul class="agree-comment">
                        <li>Strongly disagree</li>
                        <li>Strongly agree</li>
                    </ul>
            </div>
            <!-- END ROW -->
            <!-- ROW -->
            <div class="rev-form rate-panel">
                <h5>There are people at work who appreciate me as a person.</h5>
                    <div class="form-group rating-ability-wrapper" id="">
                    <label class="control-label" for="rating" style="display:none;">
                    <span class="field-label-header">How would you rate your ability to use the computer and access internet?*</span><br>
                    <span class="field-label-info"></span>
                    <input type="hidden" name="there_are_people_at_work_who_appreciate_me_as_a_person" value="{{isset($review)?$review->there_are_people_at_work_who_appreciate_me_as_a_person:''}}" required="required">
                    </label>
                    {{--<h2 class="bold rating-header" style="display: none;">
                    <span class="selected-rating">0</span><small> / 5</small>
                    </h2>--}}
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->there_are_people_at_work_who_appreciate_me_as_a_person == '1')?'btn-warning':''}}"  data-attr="1" id="rating-star-1">
                        1
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->there_are_people_at_work_who_appreciate_me_as_a_person == '2')?'btn-warning':''}}"  data-attr="2" id="rating-star-2">
                        2
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->there_are_people_at_work_who_appreciate_me_as_a_person == '3')?'btn-warning':''}}"  data-attr="3" id="rating-star-3">
                        3
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->there_are_people_at_work_who_appreciate_me_as_a_person == '4')?'btn-warning':''}}"  data-attr="4" id="rating-star-4">
                        4
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->there_are_people_at_work_who_appreciate_me_as_a_person == '5')?'btn-warning':''}}"  data-attr="5" id="rating-star-5">
                        5
                    </button>
                    </div>
                    <ul class="agree-comment">
                        <li>Strongly disagree</li>
                        <li>Strongly agree</li>
                    </ul>
            </div>
            <!-- END ROW -->
             <!-- ROW -->
            <div class="rev-form rate-panel">
                <h5>I can trust people in my company.</h5>
                    <div class="form-group rating-ability-wrapper" id="">
                    <label class="control-label" for="rating" style="display:none;">
                    <span class="field-label-header">How would you rate your ability to use the computer and access internet?*</span><br>
                    <span class="field-label-info"></span>
                    <input type="hidden" name="i_can_trust_people_in_my_company" value="{{isset($review)?$review->i_can_trust_people_in_my_company:''}}" required="required">
                    </label>
                    {{--<h2 class="bold rating-header" style="display: none;">
                    <span class="selected-rating">0</span><small> / 5</small>
                    </h2>--}}
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_can_trust_people_in_my_company == '1')?'btn-warning':''}}"  data-attr="1" id="rating-star-1">
                        1
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_can_trust_people_in_my_company == '2')?'btn-warning':''}}"  data-attr="2" id="rating-star-2">
                        2
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_can_trust_people_in_my_company == '3')?'btn-warning':''}}"  data-attr="3" id="rating-star-3">
                        3
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_can_trust_people_in_my_company == '4')?'btn-warning':''}}"  data-attr="4" id="rating-star-4">
                        4
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_can_trust_people_in_my_company == '5')?'btn-warning':''}}"  data-attr="5" id="rating-star-5">
                        5
                    </button>
                    </div>
                    <ul class="agree-comment">
                        <li>Strongly disagree</li>
                        <li>Strongly agree</li>
                    </ul>
            </div>
            <!-- END ROW -->
            <!-- ROW -->
            <div class="rev-form rate-panel">
                <h5>I feel a sense of belonging in my company.</h5>
                    <div class="form-group rating-ability-wrapper" id="">
                    <label class="control-label" for="rating" style="display:none;">
                    <span class="field-label-header">How would you rate your ability to use the computer and access internet?*</span><br>
                    <span class="field-label-info"></span>
                    <input type="hidden" name="i_feel_a_sense_of_belonging_in_my_company" value="{{isset($review)?$review->i_feel_a_sense_of_belonging_in_my_company:''}}" required="required">
                    </label>
                    {{--<h2 class="bold rating-header" style="display: none;">
                    <span class="selected-rating">0</span><small> / 5</small>
                    </h2>--}}
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_feel_a_sense_of_belonging_in_my_company == '1')?'btn-warning':''}}"  data-attr="1" id="rating-star-1">
                        1
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_feel_a_sense_of_belonging_in_my_company == '2')?'btn-warning':''}}"  data-attr="2" id="rating-star-2">
                        2
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_feel_a_sense_of_belonging_in_my_company == '3')?'btn-warning':''}}"  data-attr="3" id="rating-star-3">
                        3
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_feel_a_sense_of_belonging_in_my_company == '4')?'btn-warning':''}}"  data-attr="4" id="rating-star-4">
                        4
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_feel_a_sense_of_belonging_in_my_company == '5')?'btn-warning':''}}"  data-attr="5" id="rating-star-5">
                        5
                    </button>
                    </div>
                    <ul class="agree-comment">
                        <li>Strongly disagree</li>
                        <li>Strongly agree</li>
                    </ul>
            </div>
            <!-- END ROW -->
            <!-- ROW -->
            <div class="rev-form rate-panel">
                <h5>My manager helps me succeed.</h5>
                    <div class="form-group rating-ability-wrapper" id="">
                    <label class="control-label" for="rating" style="display:none;">
                    <span class="field-label-header">How would you rate your ability to use the computer and access internet?*</span><br>
                    <span class="field-label-info"></span>
                    <input type="hidden" name="my_manager_helps_me_succeed" value="{{isset($review)?$review->my_manager_helps_me_succeed:''}}" required="required">
                    </label>
                    {{--<h2 class="bold rating-header" style="display: none;">
                    <span class="selected-rating">0</span><small> / 5</small>
                    </h2>--}}
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->my_manager_helps_me_succeed == '1')?'btn-warning':''}}"  data-attr="1" id="rating-star-1">
                        1
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->my_manager_helps_me_succeed == '2')?'btn-warning':''}}"  data-attr="2" id="rating-star-2">
                        2
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->my_manager_helps_me_succeed == '3')?'btn-warning':''}}"  data-attr="3" id="rating-star-3">
                        3
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->my_manager_helps_me_succeed == '4')?'btn-warning':''}}"  data-attr="4" id="rating-star-4">
                        4
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->my_manager_helps_me_succeed == '5')?'btn-warning':''}}"  data-attr="5" id="rating-star-5">
                        5
                    </button>
                    </div>
                    <ul class="agree-comment">
                        <li>Strongly disagree</li>
                        <li>Strongly agree</li>
                    </ul>
            </div>
            <!-- END ROW -->
            <!-- ROW -->
            <div class="rev-form rate-panel">
                <h5>My work environment feels inclusive and respectful of all people.</h5>
                    <div class="form-group rating-ability-wrapper" id="">
                    <label class="control-label" for="rating" style="display:none;">
                    <span class="field-label-header">How would you rate your ability to use the computer and access internet?*</span><br>
                    <span class="field-label-info"></span>
                    <input type="hidden" name="my_work_environment_feels_inclusive_and_respectful_of_all_people" value="{{isset($review)?$review->my_work_environment_feels_inclusive_and_respectful_of_all_people:''}}" required="required">
                    </label>
                    {{--<h2 class="bold rating-header" style="display: none;">
                    <span class="selected-rating">0</span><small> / 5</small>
                    </h2>--}}
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->my_work_environment_feels_inclusive_and_respectful_of_all_people == '1')?'btn-warning':''}}"  data-attr="1" id="rating-star-1">
                        1
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->my_work_environment_feels_inclusive_and_respectful_of_all_people == '2')?'btn-warning':''}}"  data-attr="2" id="rating-star-2">
                        2
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->my_work_environment_feels_inclusive_and_respectful_of_all_people == '3')?'btn-warning':''}}"  data-attr="3" id="rating-star-3">
                        3
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->my_work_environment_feels_inclusive_and_respectful_of_all_people == '4')?'btn-warning':''}}"  data-attr="4" id="rating-star-4">
                        4
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->my_work_environment_feels_inclusive_and_respectful_of_all_people == '5')?'btn-warning':''}}"  data-attr="5" id="rating-star-5">
                        5
                    </button>
                    </div>
                    <ul class="agree-comment">
                        <li>Strongly disagree</li>
                        <li>Strongly agree</li>
                    </ul>
            </div>
            <!-- END ROW -->
            <!-- ROW -->
            <div class="rev-form rate-panel">
                <h5>My work has the time and location flexibility I need.</h5>
                    <div class="form-group rating-ability-wrapper" id="">
                    <label class="control-label" for="rating" style="display:none;">
                    <span class="field-label-header">How would you rate your ability to use the computer and access internet?*</span><br>
                    <span class="field-label-info"></span>
                    <input type="hidden" name="my_work_has_the_time_and_location_flexibility_i_need" value="{{isset($review)?$review->my_work_has_the_time_and_location_flexibility_i_need:''}}" required="required">
                    </label>
                    {{--<h2 class="bold rating-header" style="display: none;">
                    <span class="selected-rating">0</span><small> / 5</small>
                    </h2>--}}
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->my_work_has_the_time_and_location_flexibility_i_need == '1')?'btn-warning':''}}"  data-attr="1" id="rating-star-1">
                        1
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->my_work_has_the_time_and_location_flexibility_i_need == '2')?'btn-warning':''}}"  data-attr="2" id="rating-star-2">
                        2
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->my_work_has_the_time_and_location_flexibility_i_need == '3')?'btn-warning':''}}"  data-attr="3" id="rating-star-3">
                        3
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->my_work_has_the_time_and_location_flexibility_i_need == '4')?'btn-warning':''}}"  data-attr="4" id="rating-star-4">
                        4
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->my_work_has_the_time_and_location_flexibility_i_need == '5')?'btn-warning':''}}"  data-attr="5" id="rating-star-5">
                        5
                    </button>
                    </div>
                    <ul class="agree-comment">
                        <li>Strongly disagree</li>
                        <li>Strongly agree</li>
                    </ul>
            </div>
            <!-- END ROW -->
            <!-- ROW -->
            <div class="rev-form rate-panel">
                <h5>In most of my work tasks, I feel energized.</h5>
                    <div class="form-group rating-ability-wrapper" id="">
                    <label class="control-label" for="rating" style="display:none;">
                    <span class="field-label-header">How would you rate your ability to use the computer and access internet?*</span><br>
                    <span class="field-label-info"></span>
                    <input type="hidden" name="in_most_of_my_work_tasks_i_feel_energized" value="{{isset($review)?$review->in_most_of_my_work_tasks_i_feel_energized:''}}" required="required">
                    </label>
                    {{--<h2 class="bold rating-header" style="display: none;">
                    <span class="selected-rating">0</span><small> / 5</small>
                    </h2>--}}
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->in_most_of_my_work_tasks_i_feel_energized == '1')?'btn-warning':''}}"  data-attr="1" id="rating-star-1">
                        1
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->in_most_of_my_work_tasks_i_feel_energized == '2')?'btn-warning':''}}"  data-attr="2" id="rating-star-2">
                        2
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->in_most_of_my_work_tasks_i_feel_energized == '3')?'btn-warning':''}}"  data-attr="3" id="rating-star-3">
                        3
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->in_most_of_my_work_tasks_i_feel_energized == '4')?'btn-warning':''}}"  data-attr="4" id="rating-star-4">
                        4
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->in_most_of_my_work_tasks_i_feel_energized == '5')?'btn-warning':''}}"  data-attr="5" id="rating-star-5">
                        5
                    </button>
                    </div>
                    <ul class="agree-comment">
                        <li>Strongly disagree</li>
                        <li>Strongly agree</li>
                    </ul>
            </div>
            <!-- END ROW -->
            <!-- ROW -->
            <div class="rev-form rate-panel">
                <h5>I am achieving most of my goals at work.</h5>
                    <div class="form-group rating-ability-wrapper" id="">
                    <label class="control-label" for="rating" style="display:none;">
                    <span class="field-label-header">How would you rate your ability to use the computer and access internet?*</span><br>
                    <span class="field-label-info"></span>
                    <input type="hidden" name="i_am_achieving_most_of_my_goals_at_work" value="{{isset($review)?$review->i_am_achieving_most_of_my_goals_at_work:''}}" required="required">
                    </label>
                    {{--<h2 class="bold rating-header" style="display: none;">
                    <span class="selected-rating">0</span><small> / 5</small>
                    </h2>--}}
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_am_achieving_most_of_my_goals_at_work == '1')?'btn-warning':''}}"  data-attr="1" id="rating-star-1">
                        1
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_am_achieving_most_of_my_goals_at_work == '2')?'btn-warning':''}}"  data-attr="2" id="rating-star-2">
                        2
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_am_achieving_most_of_my_goals_at_work == '3')?'btn-warning':''}}"  data-attr="3" id="rating-star-3">
                        3
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_am_achieving_most_of_my_goals_at_work == '4')?'btn-warning':''}}"  data-attr="4" id="rating-star-4">
                        4
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_am_achieving_most_of_my_goals_at_work == '5')?'btn-warning':''}}"  data-attr="5" id="rating-star-5">
                        5
                    </button>
                    </div>
                    <ul class="agree-comment">
                        <li>Strongly disagree</li>
                        <li>Strongly agree</li>
                    </ul>
            </div>
            <!-- END ROW -->
             <!-- ROW -->
            <div class="rev-form rate-panel">
                <h5>I often learn something at work.</h5>
                    <div class="form-group rating-ability-wrapper" id="">
                    <label class="control-label" for="rating" style="display:none;">
                    <span class="field-label-header">How would you rate your ability to use the computer and access internet?*</span><br>
                    <span class="field-label-info"></span>
                    <input type="hidden" name="i_often_learn_something_at_work" value="{{isset($review)?$review->i_often_learn_something_at_work:''}}" required="required">
                    </label>
                    {{--<h2 class="bold rating-header" style="display: none;">
                    <span class="selected-rating">0</span><small> / 5</small>
                    </h2>--}}
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_often_learn_something_at_work == '1')?'btn-warning':''}}"  data-attr="1" id="rating-star-1">
                        1
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_often_learn_something_at_work == '2')?'btn-warning':''}}"  data-attr="2" id="rating-star-2">
                        2
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_often_learn_something_at_work == '3')?'btn-warning':''}}"  data-attr="3" id="rating-star-3">
                        3
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_often_learn_something_at_work == '4')?'btn-warning':''}}"  data-attr="4" id="rating-star-4">
                        4
                    </button>
                    <button type="button" class="btnrating btn btn-default {{(isset($review) && $review->i_often_learn_something_at_work == '5')?'btn-warning':''}}"  data-attr="5" id="rating-star-5">
                        5
                    </button>
                    </div>
                    <ul class="agree-comment">
                        <li>Strongly disagree</li>
                        <li>Strongly agree</li>
                    </ul>
            </div>
</form>
            <!-- END ROW -->
            <!-- LAST BTN -->
            <div class="btn-to-step two-btn comp-rev">
                <input type="button" value="Continue" class="submit-form">
            </div>
            <!-- END LAST BTN -->
        </div>
    </div>
</section>
@endsection
@section('css')
<style type="text/css">
 .comp-rev input {
    width: 100% !important;
 }   
</style>
@endsection
@section('js')
<script type="text/javascript">
 $(document).ready(function () {
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#jobs tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
        $("#myLocation").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#jobs tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
 </script>
 <script>
$(".submit-form").click(function(f){
    var has_error = 0
    $("#get_started input").each(function(i,e){
        if($(e).prop("required") == true){
            if($(e).val() == ""){
                var name = $(e).prop("name")
                name = name.replaceAll("_" , " ")
                word = name[0].toUpperCase() + name.substring(1)
                toastr.error(word
                    +" this question is required")
                f.preventDefault();
                $(e).closest(".rating-ability-wrapper").find("button").focus()
                has_error++;
                return false
            }
        }
    })
    if(has_error == 0){
        // $("#get_started").submit(); 
        var formData = $("#get_started").serialize();
            $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            type: 'post',
            dataType : 'json',
            url: "{{route('reviews_save')}}",
            data: formData,
              success: function (response) {
                if (response.status == 1) {
                    window.location.href = response.location;
                }
                return false;
              }
          });   
    }
    
})

      
        

</script>
@endsection