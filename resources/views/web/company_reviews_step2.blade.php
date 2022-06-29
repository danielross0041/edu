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
        <h4 style="text-align: center;">Company <span> Review</span></h4>
    </div>
</section>
<section class="company-ratings">
    <div class="container">
        {{--<div class="title-heading">
            <h2><span>Company </span> Review</h2>
        </div>--}}
<form id="get_started">        
@if(isset($review) && $review != null)
  <input type="hidden" name="review_id" value="{{Crypt::encrypt($review->id)}}">
@endif
<input type="hidden" name="user_id" value="{{!is_null(Auth::user())?Auth::user()->id:'0'}}" />
<input type="hidden" name="step_filled" value="2">

        <div class="review-form">
            <!-- STEP 02 -->
            <!-- ROW -->
            <div class="r-message">
                <h3>Take a minute to review <span>EEEA, Inc.</span></h3>
                <p>Your anonymous feedback will help fellow jobseekers <i class="fa fa-question-circle" aria-hidden="true"></i></p>
                <ul>
                    <li>Company reviews are <strong>NEVER</strong> attached to your job applications</li>
                    <li>The reviews <strong>ONLY</strong> include star ratings, review text, job title, location and review date</li>
                </ul>
            </div>
            <!-- END ROW -->
            <!-- ROW -->
            <div class="rev-form star-rate">
                <h3>How would you rate this company?</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- ROW -->
                        <div class="s-rev">
                        <h6>Overall rating</h6>
                        <select required="" name="company_overall_rating" class="star">
                            <option value="">--</option>
                            <option {{(isset($review) && $review->company_overall_rating == 1)?'selected':''}} value="1">1</option>
                            <option {{(isset($review) && $review->company_overall_rating == 2)?'selected':''}} value="2">2</option>
                            <option {{(isset($review) && $review->company_overall_rating == 3)?'selected':''}} value="3">3</option>
                            <option {{(isset($review) && $review->company_overall_rating == 4)?'selected':''}} value="4">4</option>
                            <option {{(isset($review) && $review->company_overall_rating == 5)?'selected':''}} value="5">5</option>
                        </select>
                        </div>
                        <!-- END ROW -->
                        <!-- ROW -->
                        <div class="s-rev">
                        <h6>Compensation/Benefits</h6>
                        <select required="" name="company_compensation_or_benefits" class="star">
                            <option value="">--</option>
                            <option {{(isset($review) && $review->company_compensation_or_benefits == 1)?'selected':''}} value="1">1</option>
                            <option {{(isset($review) && $review->company_compensation_or_benefits == 2)?'selected':''}} value="2">2</option>
                            <option {{(isset($review) && $review->company_compensation_or_benefits == 3)?'selected':''}} value="3">3</option>
                            <option {{(isset($review) && $review->company_compensation_or_benefits == 4)?'selected':''}} value="4">4</option>
                            <option {{(isset($review) && $review->company_compensation_or_benefits == 5)?'selected':''}} value="5">5</option>
                        </select>
                        </div>
                        <!-- END ROW -->
                        <!-- ROW -->
                        <div class="s-rev">
                        <h6>Management</h6>
                        <select required="" name="company_management" class="star">
                            <option value="">--</option>
                            <option {{(isset($review) && $review->company_management == 1)?'selected':''}} value="1">1</option>
                            <option {{(isset($review) && $review->company_management == 2)?'selected':''}} value="2">2</option>
                            <option {{(isset($review) && $review->company_management == 3)?'selected':''}} value="3">3</option>
                            <option {{(isset($review) && $review->company_management == 4)?'selected':''}} value="4">4</option>
                            <option {{(isset($review) && $review->company_management == 5)?'selected':''}} value="5">5</option>
                        </select>
                        </div>
                        <!-- END ROW -->
                    </div>
                    <div class="col-sm-6">
                        <!-- ROW -->
                        <div class="s-rev">
                        <h6>Job Work/Life Balance</h6>
                        <select required="" name="company_job_work_or_life_balance" class="star">
                            <option value="">--</option>
                            <option {{(isset($review) && $review->company_job_work_or_life_balance == 1)?'selected':''}} value="1">1</option>
                            <option {{(isset($review) && $review->company_job_work_or_life_balance == 2)?'selected':''}} value="2">2</option>
                            <option {{(isset($review) && $review->company_job_work_or_life_balance == 3)?'selected':''}} value="3">3</option>
                            <option {{(isset($review) && $review->company_job_work_or_life_balance == 4)?'selected':''}} value="4">4</option>
                            <option {{(isset($review) && $review->company_job_work_or_life_balance == 5)?'selected':''}} value="5">5</option>
                        </select>
                        </div>
                        <!-- END ROW -->
                        <!-- ROW -->
                        <div class="s-rev">
                        <h6>Job Security/Advancement</h6>
                        <select required="" name="company_job_security_or_advancement" class="star">
                            <option value="">--</option>
                            <option {{(isset($review) && $review->company_job_security_or_advancement == 1)?'selected':''}} value="1">1</option>
                            <option {{(isset($review) && $review->company_job_security_or_advancement == 2)?'selected':''}} value="2">2</option>
                            <option {{(isset($review) && $review->company_job_security_or_advancement == 3)?'selected':''}} value="3">3</option>
                            <option {{(isset($review) && $review->company_job_security_or_advancement == 4)?'selected':''}} value="4">4</option>
                            <option {{(isset($review) && $review->company_job_security_or_advancement == 5)?'selected':''}} value="5">5</option>
                        </select>
                        </div>
                        <!-- END ROW -->
                        <!-- ROW -->
                        <div class="s-rev">
                        <h6>Job Culture</h6>
                        <select required="" name="company_job_culture" class="star">
                            <option value="">--</option>
                            <option {{(isset($review) && $review->company_job_culture == 1)?'selected':''}} value="1">1</option>
                            <option {{(isset($review) && $review->company_job_culture == 2)?'selected':''}} value="2">2</option>
                            <option {{(isset($review) && $review->company_job_culture == 3)?'selected':''}} value="3">3</option>
                            <option {{(isset($review) && $review->company_job_culture == 4)?'selected':''}} value="4">4</option>
                            <option {{(isset($review) && $review->company_job_culture == 5)?'selected':''}} value="5">5</option>
                        </select>
                        </div>
                        <!-- END ROW -->
                    </div>
                </div>
            </div>
            <!-- END ROW -->
            <!-- ROW -->
            <div class="rev-form txtarea">
                <h3>The good and the bad. What stands out about working at this company?</h3>
                <div class="row">
                    <div class="col-sm-12">
                        <h5>Review Summary *</h5>
                        <textarea class="form-control" required="" name="review_summary" placeholder="Example: Productive and fun workplace with ping pong table">{{isset($review)?$review->review_summary:''}}</textarea>
                    </div>
                    <div class="col-md-12">
                        <h5>Your Review</h5>
                        <ul class="count-char">
                          <li><span id="charNum"></span> characters (150 minimum)</li>
                        </ul>
                        <textarea class="form-control" required="" maxlength="150" name="your_review" id="field" onkeyup="countChar(this)" laceholder="Example: Productive and fun workplace with ping pong table">{{isset($review)?$review->your_review:''}}</textarea>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-sm-12">
                        <h5>Pros</h5>
                        <textarea class="form-control" required="" name="pros" placeholder="Example: Productive and fun workplace with ping pong table">{{isset($review)?$review->pros:''}}</textarea>
                    </div>
                    <div class="col-sm-12">
                        <h5>Cons</h5>
                        <textarea class="form-control" required="" name="cons" placeholder="Example: Productive and fun workplace with ping pong table">{{isset($review)?$review->cons:''}}</textarea>
                    </div>
                </div>
            </div>
            <!-- END ROW -->
            <!-- ROW -->
            <div class="rev-form text-field">
                <h3>Tell us about you</h3>
                <div class="row">
                    <div class="col-sm-12">
                        <h5>Job Title at EEEA, Inc *</h5>
                        <input type="text" required="" name="job_title" value="{{isset($review)?$review->job_title:''}}" required="" class="form-control">
                    </div>
                    <div class="col-sm-12">
                        <h5>Job Location at EEEA, Inc *</h5>
                        <input type="text" required="" name="job_location" value="{{isset($review)?$review->job_location:''}}" required="" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <h5>Start Date *</h5>
                        <select required="" name="start_date" value="{{isset($review)?$review->start_date:''}}"  class="form-control">
                            <option label="Select year" value="">Select year</option>
                            <option {{(isset($review) && $review->start_date == 2022)?'selected':''}} label="2022" value="2022">2022</option>
                            <option {{(isset($review) && $review->start_date == 2021)?'selected':''}} label="2021" value="2021">2021</option>
                            <option {{(isset($review) && $review->start_date == 2020)?'selected':''}} label="2020" value="2020">2020</option>
                            <option {{(isset($review) && $review->start_date == 2019)?'selected':''}} label="2019" value="2019">2019</option>
                            <option {{(isset($review) && $review->start_date == 2018)?'selected':''}} label="2018" value="2018">2018</option>
                            <option {{(isset($review) && $review->start_date == 2017)?'selected':''}} label="2017" value="2017">2017</option>
                            <option {{(isset($review) && $review->start_date == 2016)?'selected':''}} label="2016" value="2016">2016</option>
                            <option {{(isset($review) && $review->start_date == 2015)?'selected':''}} label="2015" value="2015">2015</option>
                            <option {{(isset($review) && $review->start_date == 2014)?'selected':''}} label="2014" value="2014">2014</option>
                            <option {{(isset($review) && $review->start_date == 2013)?'selected':''}} label="2013" value="2013">2013</option>
                            <option {{(isset($review) && $review->start_date == 2012)?'selected':''}} label="2012" value="2012">2012</option>
                            <option {{(isset($review) && $review->start_date == 2011)?'selected':''}} label="2011" value="2011">2011</option>
                            <option {{(isset($review) && $review->start_date == 2010)?'selected':''}} label="2010" value="2010">2010</option>
                            <option {{(isset($review) && $review->start_date == 2009)?'selected':''}} label="2009" value="2009">2009</option>
                            <option {{(isset($review) && $review->start_date == 2008)?'selected':''}} label="2008" value="2008">2008</option>
                            <option {{(isset($review) && $review->start_date == 2007)?'selected':''}} label="2007" value="2007">2007</option>
                            <option {{(isset($review) && $review->start_date == 2006)?'selected':''}} label="2006" value="2006">2006</option>
                            <option {{(isset($review) && $review->start_date == 2005)?'selected':''}} label="2005" value="2005">2005</option>
                            <option {{(isset($review) && $review->start_date == 2004)?'selected':''}} label="2004" value="2004">2004</option>
                            <option {{(isset($review) && $review->start_date == 2003)?'selected':''}} label="2003" value="2003">2003</option>
                            <option {{(isset($review) && $review->start_date == 2002)?'selected':''}} label="2002" value="2002">2002</option>
                            <option {{(isset($review) && $review->start_date == 2001)?'selected':''}} label="2001" value="2001">2001</option>
                            <option {{(isset($review) && $review->start_date == 2000)?'selected':''}} label="2000" value="2000">2000</option>
                            <option {{(isset($review) && $review->start_date == 1999)?'selected':''}} label="1999" value="1999">1999</option>
                            <option {{(isset($review) && $review->start_date == 1998)?'selected':''}} label="1998" value="1998">1998</option>
                            <option {{(isset($review) && $review->start_date == 1997)?'selected':''}} label="1997" value="1997">1997</option>
                            <option {{(isset($review) && $review->start_date == 1996)?'selected':''}} label="1996" value="1996">1996</option>
                            <option {{(isset($review) && $review->start_date == 1995)?'selected':''}} label="1995" value="1995">1995</option>
                            <option {{(isset($review) && $review->start_date == 1994)?'selected':''}} label="1994" value="1994">1994</option>
                            <option {{(isset($review) && $review->start_date == 1993)?'selected':''}} label="1993" value="1993">1993</option>
                            <option {{(isset($review) && $review->start_date == 1992)?'selected':''}} label="1992" value="1992">1992</option>
                            <option {{(isset($review) && $review->start_date == 1991)?'selected':''}} label="1991" value="1991">1991</option>
                            <option {{(isset($review) && $review->start_date == 1990)?'selected':''}} label="1990" value="1990">1990</option>
                            <option {{(isset($review) && $review->start_date == 1989)?'selected':''}} label="1989" value="1989">1989</option>
                            <option {{(isset($review) && $review->start_date == 1988)?'selected':''}} label="1988" value="1988">1988</option>
                            <option {{(isset($review) && $review->start_date == 1987)?'selected':''}} label="1987" value="1987">1987</option>
                            <option {{(isset($review) && $review->start_date == 1986)?'selected':''}} label="1986" value="1986">1986</option>
                            <option {{(isset($review) && $review->start_date == 1985)?'selected':''}} label="1985" value="1985">1985</option>
                            <option {{(isset($review) && $review->start_date == 1984)?'selected':''}} label="1984" value="1984">1984</option>
                            <option {{(isset($review) && $review->start_date == 1983)?'selected':''}} label="1983" value="1983">1983</option>
                            <option {{(isset($review) && $review->start_date == 1982)?'selected':''}} label="1982" value="1982">1982</option>
                            <option {{(isset($review) && $review->start_date == 1981)?'selected':''}} label="1981" value="1981">1981</option>
                            <option {{(isset($review) && $review->start_date == 1980)?'selected':''}} label="1980" value="1980">1980</option>
                            <option {{(isset($review) && $review->start_date == 1979)?'selected':''}} label="1979" value="1979">1979</option>
                            <option {{(isset($review) && $review->start_date == 1978)?'selected':''}} label="1978" value="1978">1978</option>
                            <option {{(isset($review) && $review->start_date == 1977)?'selected':''}} label="1977" value="1977">1977</option>
                            <option {{(isset($review) && $review->start_date == 1976)?'selected':''}} label="1976" value="1976">1976</option>
                            <option {{(isset($review) && $review->start_date == 1975)?'selected':''}} label="1975" value="1975">1975</option>
                            <option {{(isset($review) && $review->start_date == 1974)?'selected':''}} label="1974" value="1974">1974</option>
                            <option {{(isset($review) && $review->start_date == 1973)?'selected':''}} label="1973" value="1973">1973</option>
                            <option {{(isset($review) && $review->start_date == 1972)?'selected':''}} label="1972" value="1972">1972</option>
                            <option {{(isset($review) && $review->start_date == 1971)?'selected':''}} label="1971" value="1971">1971</option>
                            <option {{(isset($review) && $review->start_date == 1970)?'selected':''}} label="1970" value="1970">1970</option>
                            <option {{(isset($review) && $review->start_date == 1969)?'selected':''}} label="1969" value="1969">1969</option>
                            <option {{(isset($review) && $review->start_date == 1968)?'selected':''}} label="1968" value="1968">1968</option>
                            <option {{(isset($review) && $review->start_date == 1967)?'selected':''}} label="1967" value="1967">1967</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <h5>End Date *</h5>
                        <select required="" name="end_date" value="{{isset($review)?$review->end_date:''}}"  class="form-control">
                            <option label="Select year" value="">Select year</option>
                            <option {{(isset($review) && $review->end_date == "I currently work here")?'selected':''}} label="I currently work here" value="currently work here">I currently work here</option>
                            <option {{(isset($review) && $review->end_date == 2022)?'selected':''}} label="2022" value="2022">2022</option>
                            <option {{(isset($review) && $review->end_date == 2021)?'selected':''}} label="2021" value="2021">2021</option>
                            <option {{(isset($review) && $review->end_date == 2020)?'selected':''}} label="2020" value="2020">2020</option>
                            <option {{(isset($review) && $review->end_date == 2019)?'selected':''}} label="2019" value="2019">2019</option>
                            <option {{(isset($review) && $review->end_date == 2018)?'selected':''}} label="2018" value="2018">2018</option>
                            <option {{(isset($review) && $review->end_date == 2017)?'selected':''}} label="2017" value="2017">2017</option>
                            <option {{(isset($review) && $review->end_date == 2016)?'selected':''}} label="2016" value="2016">2016</option>
                            <option {{(isset($review) && $review->end_date == 2015)?'selected':''}} label="2015" value="2015">2015</option>
                            <option {{(isset($review) && $review->end_date == 2014)?'selected':''}} label="2014" value="2014">2014</option>
                            <option {{(isset($review) && $review->end_date == 2013)?'selected':''}} label="2013" value="2013">2013</option>
                            <option {{(isset($review) && $review->end_date == 2012)?'selected':''}} label="2012" value="2012">2012</option>
                            <option {{(isset($review) && $review->end_date == 2011)?'selected':''}} label="2011" value="2011">2011</option>
                            <option {{(isset($review) && $review->end_date == 2010)?'selected':''}} label="2010" value="2010">2010</option>
                            <option {{(isset($review) && $review->end_date == 2009)?'selected':''}} label="2009" value="2009">2009</option>
                            <option {{(isset($review) && $review->end_date == 2008)?'selected':''}} label="2008" value="2008">2008</option>
                            <option {{(isset($review) && $review->end_date == 2007)?'selected':''}} label="2007" value="2007">2007</option>
                            <option {{(isset($review) && $review->end_date == 2006)?'selected':''}} label="2006" value="2006">2006</option>
                            <option {{(isset($review) && $review->end_date == 2005)?'selected':''}} label="2005" value="2005">2005</option>
                            <option {{(isset($review) && $review->end_date == 2004)?'selected':''}} label="2004" value="2004">2004</option>
                            <option {{(isset($review) && $review->end_date == 2003)?'selected':''}} label="2003" value="2003">2003</option>
                            <option {{(isset($review) && $review->end_date == 2002)?'selected':''}} label="2002" value="2002">2002</option>
                            <option {{(isset($review) && $review->end_date == 2001)?'selected':''}} label="2001" value="2001">2001</option>
                            <option {{(isset($review) && $review->end_date == 2000)?'selected':''}} label="2000" value="2000">2000</option>
                            <option {{(isset($review) && $review->end_date == 1999)?'selected':''}} label="1999" value="1999">1999</option>
                            <option {{(isset($review) && $review->end_date == 1998)?'selected':''}} label="1998" value="1998">1998</option>
                            <option {{(isset($review) && $review->end_date == 1997)?'selected':''}} label="1997" value="1997">1997</option>
                            <option {{(isset($review) && $review->end_date == 1996)?'selected':''}} label="1996" value="1996">1996</option>
                            <option {{(isset($review) && $review->end_date == 1995)?'selected':''}} label="1995" value="1995">1995</option>
                            <option {{(isset($review) && $review->end_date == 1994)?'selected':''}} label="1994" value="1994">1994</option>
                            <option {{(isset($review) && $review->end_date == 1993)?'selected':''}} label="1993" value="1993">1993</option>
                            <option {{(isset($review) && $review->end_date == 1992)?'selected':''}} label="1992" value="1992">1992</option>
                            <option {{(isset($review) && $review->end_date == 1991)?'selected':''}} label="1991" value="1991">1991</option>
                            <option {{(isset($review) && $review->end_date == 1990)?'selected':''}} label="1990" value="1990">1990</option>
                            <option {{(isset($review) && $review->end_date == 1989)?'selected':''}} label="1989" value="1989">1989</option>
                            <option {{(isset($review) && $review->end_date == 1988)?'selected':''}} label="1988" value="1988">1988</option>
                            <option {{(isset($review) && $review->end_date == 1987)?'selected':''}} label="1987" value="1987">1987</option>
                            <option {{(isset($review) && $review->end_date == 1986)?'selected':''}} label="1986" value="1986">1986</option>
                            <option {{(isset($review) && $review->end_date == 1985)?'selected':''}} label="1985" value="1985">1985</option>
                            <option {{(isset($review) && $review->end_date == 1984)?'selected':''}} label="1984" value="1984">1984</option>
                            <option {{(isset($review) && $review->end_date == 1983)?'selected':''}} label="1983" value="1983">1983</option>
                            <option {{(isset($review) && $review->end_date == 1982)?'selected':''}} label="1982" value="1982">1982</option>
                            <option {{(isset($review) && $review->end_date == 1981)?'selected':''}} label="1981" value="1981">1981</option>
                            <option {{(isset($review) && $review->end_date == 1980)?'selected':''}} label="1980" value="1980">1980</option>
                            <option {{(isset($review) && $review->end_date == 1979)?'selected':''}} label="1979" value="1979">1979</option>
                            <option {{(isset($review) && $review->end_date == 1978)?'selected':''}} label="1978" value="1978">1978</option>
                            <option {{(isset($review) && $review->end_date == 1977)?'selected':''}} label="1977" value="1977">1977</option>
                            <option {{(isset($review) && $review->end_date == 1976)?'selected':''}} label="1976" value="1976">1976</option>
                            <option {{(isset($review) && $review->end_date == 1975)?'selected':''}} label="1975" value="1975">1975</option>
                            <option {{(isset($review) && $review->end_date == 1974)?'selected':''}} label="1974" value="1974">1974</option>
                            <option {{(isset($review) && $review->end_date == 1973)?'selected':''}} label="1973" value="1973">1973</option>
                            <option {{(isset($review) && $review->end_date == 1972)?'selected':''}} label="1972" value="1972">1972</option>
                            <option {{(isset($review) && $review->end_date == 1971)?'selected':''}} label="1971" value="1971">1971</option>
                            <option {{(isset($review) && $review->end_date == 1970)?'selected':''}} label="1970" value="1970">1970</option>
                            <option {{(isset($review) && $review->end_date == 1969)?'selected':''}} label="1969" value="1969">1969</option>
                            <option {{(isset($review) && $review->end_date == 1968)?'selected':''}} label="1968" value="1968">1968</option>
                            <option {{(isset($review) && $review->end_date == 1967)?'selected':''}} label="1967" value="1967">1967</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- END ROW -->
            <!-- ROW -->
            <div class="rev-form text-field">
                <h3>What is the salary like?</h3>
                <div class="row">
                    <div class="col-sm-12">
                        <h5>Salary at EEEA, Inc</h5>
                    </div>
                    <div class="col-sm-6"><input type="text" required="" name="salary" value="{{isset($review)?$review->salary:''}}"  class="form-control"></div>
                    <div class="col-sm-6">
                        <select class="form-control" required="" name="salary_per" value="{{isset($review)?$review->salary_per:''}}">
                            <option {{(isset($review) && $review->salary_per == 'yearly')?'selected':''}} value="yearly">per year</option>
                            <option {{(isset($review) && $review->salary_per == 'monthly')?'selected':''}} value="monthly">per month</option>
                            <option {{(isset($review) && $review->salary_per == 'weekly')?'selected':''}} value="weekly">per week</option>
                            <option {{(isset($review) && $review->salary_per == 'daily"')?'selected':''}} value="daily">per day</option>
                            <option {{(isset($review) && $review->salary_per == 'hourly')?'selected':''}} value="hourly">per hour</option>
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <p>CONFIDENTIAL - Salary information you provide is completely anonymous and will not be shown with your review.</p>
                    </div>
                </div>
            </div>    
            <!-- END ROW -->
            <!-- ROW -->
            <div class="rev-form rate-panel yn">
                <h3>What do you think of the CEO?</h3>
                <div class="row">
                    <div class="col-sm-12">
                        <h5>Do you approve of EEEA, Inc's CEO?</h5>
                    <div class="form-group rating-ability-wrapper" id="">
                    <label class="control-label" for="rating" style="display:none;">
                    <span class="field-label-header">How would you rate your ability to use the computer and access internet?*</span><br>
                    <span class="field-label-info"></span>
                    <input type="hidden" required="" name="do_you_approve_of_eeea_incs_ceo" value="{{isset($review)?$review->do_you_approve_of_eeea_incs_ceo:''}}" >
                    </label>
                    {{--<h2 class="bold rating-header" style="display: none;">
                    <span class="selected-rating">0</span><small> / 5</small>
                    </h2>--}}
                    <button type="button" class="btnrating btn btn-default btn-lg {{(isset($review) && $review->do_you_approve_of_eeea_incs_ceo == 'Yes')?'btn-warning':''}}" data-attr="Yes" id="rating-star-1">
                       Yes
                    </button>
                    <button type="button" class="btnrating btn btn-default btn-lg {{(isset($review) && $review->do_you_approve_of_eeea_incs_ceo == 'No')?'btn-warning':''}}" data-attr="No" id="rating-star-2">
                        No
                    </button>
                    </div>
                    </div>
                </div>
            </div>
            <!-- END ROW -->
            <!-- ROW -->
            <div class="rev-form txtarea">
                <h3>Please help answer these questions about EEEA, Inc</h3>
                <div class="row">
                    <div class="col-sm-12">
                        <h5>What tips or advice would you give to someone interviewing at EEEA, Inc?</h5>
                        <textarea class="form-control" required="" name="tips_or_advice_would_you_give_to_someone_interviewing" placeholder="Example: Productive and fun workplace with ping pong table">{{isset($review)?$review->tips_or_advice_would_you_give_to_someone_interviewing:''}}</textarea>
                    </div>
                    <div class="col-sm-12">
                        <h5>How long does it take to get hired from start to finish? What are the steps along the way?</h5>
                        <textarea class="form-control" required="" name="hired_from_start_to_finish_and_steps_along_the_way" placeholder="Example: Productive and fun workplace with ping pong table">{{isset($review)?$review->hired_from_start_to_finish_and_steps_along_the_way:''}}</textarea>
                    </div>
                </div>
            </div>
            <!-- END ROW -->
    </form>
            <!-- LAST BTN -->
            

                            

            
            
            <div class="btn-to-step two-btn">
                <input type="button" onclick="window.location.href='{{route('company_reviews' ,Crypt::encrypt($review->id))}}';" value="<< Back">
                <input type="button" value="Continue" class="submit-form">
            </div>

            <!-- END LAST BTN -->
            <!-- STEP 02 -->
        </div>
    </div>
</section>
@endsection
@section('css')
<style type="text/css"></style>
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
   var has_error = 0
    $("#get_started select,textarea,input").each(function(i,e){
        if($(e).prop("required") == true){
            if($(e).val() == ""){
                var name = $(e).prop("name")
                name = name.replaceAll("_" , " ")
                if (name!='email') {
                word = name[0].toUpperCase() + name.substring(1)
                toastr.error(word
                    +" this question is required")
                f.preventDefault();
                $(e).closest(".rating-ability-wrapper").find("button").focus()
                has_error++;
                return false
                }
                
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