@extends('web.layouts.main') 
@section('content')
<section class="job-title">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="search-jbb">
          <div class="row">
            <div class="col-md-5">
              <div class="job-search">
                <input type="text" name="myInput" id="search" placeholder="Search job titles...">
                <i class="fa fa-search" aria-hidden="true"></i>
              </div>
            </div>
            <div class="col-md-5">
              <div class="job-search">
                <input type="text" name="Search job titles..." placeholder="Search job titles...">
              </div>
            </div>
            <div class="col-md-2">
              </div>
            </div>
          </div>
        </div>
      <div class="col-md-6">
        <div class="search-jbb">
          <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-5">
              <div class="job-search">
                <select>
                  <option>Sort by: Posting Date</option>
                </select>
              </div>
            </div>
            <div class="col-md-5">
              <div class="job-search">
                <select>
                  <option>Sort by: Posting Date</option>
                </select>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>    
  
  <section class="indeed-table">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <table class="indeee-typ" id="myTable">
           
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th>Sponsored</th>
              <th>Job Status</th>
            </tr>
            <tr>
            @foreach($jobs as $job)
              <td>
                 
                <div class="fst-blk">
                  <input type="checkbox" name="">
                  <div>
                    <h4><a href="lead-three.html">{{$job->employment_type}}</a></h4>
                    <h3>{{$job->location}}</h3>
                    <p>Created: {{$job->created_at}} - Ends:October 20,21</p>
                  </div>
                </div>
              </td>
              <td>17 <span>Active</span></td>
              <td>7 <span>New</span></td>
              <td>1 <span>Contacting</span></td>
              <td>0 of 1 <span>Hired</span></td>
              <td>0 <span>NewTo invite</span></td>
              <td> starting-salary {{$job->starting_salary}} (USD) ending-salary<span>{{$job->ending_salary}} (USD) period {{$job->period}}</span></td>
              <td>
                <select class="myselect">
                  <option>{{$job->status}}</option>
                </select>
              </td>
              <!-- <td><a href=""><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a> </td> -->
              <td><div class="dropdown">
                                <button class="dropbtn"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                <div class="dropdown-content myDropdown">
                                  <a href="{{route('job_edit' ,Crypt::encrypt($job->id))}}">Edit Job</a>
                                  <a href="#about">Manage budget</a>
                                  <a href="#myModal4" data-target="#myModal4" data-toggle="modal">Post job in multiple locations</a>
                                  <a href="#contact">See performace report</a>
                                  <a href="#contact">View job details</a>
                                </div>
                              </div></td>
                             
            </tr>
             @endforeach
          </table>
        </div>
      </div>
    </div>
  </section>

  <div class="hit-button">
    <div class="container">
      <div class="job-hit">
              <div class="row">
                <div class="col-md-6">
                  <p><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Your job hit its end date. <span>Are you Still hiring? </span></p>
                </div>
              <div class="col-md-6">
                <div class="job-hit-btn">
                <a href="" class="yes-btn">Yes</a>
                <a href="" class="no-btn">No</a>
    </div>
              </div>
            </div>
          </div>
    </div>
  </div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            <div class="pause-job">
              <span class="pause-job-txt">Pause job</span>
              <h4>lead three year old teacher</h4>
              <p>Pausing a job removes it from search results. You can continue to edit details and interact with applicants</p>
              <h5>Why are you pausing this job? <span>(choose one)</span></h5>
              <form class="pause-radio">
                <div class="form-check ">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                      I am evaluating current applicants
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                      I am actively interviewing candidates
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                      Hiring is on hold for this position
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                      Other
                    </label>
                  </div>
              </form>
            </div>

        </div>

            <div class="modal-footer puse-btns">
               <button type="button" class="btn btn-default cancel" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-default pause-btn" data-dismiss="modal">Pause this job</button>

          </div>
          
        </div>
        
      
      
    </div>
  </div>
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            <div class="pause-job">
              <span class="closing-step"><span class="close-job-txt">Close job</span> (Step 1 of 2)</span>
              <h4>lead three year old teacher</h4>
              <p>Closing a job removes it from search results. You can continue to edit details and interact with applicants</p>
              <h5>Why are you closing this job? <span>(choose one)</span></h5>
              <form class="pause-radio">
                <div class="form-check ">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                      I hired someone!
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                      I didn't hire anyone
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                      I have a technical or billing issue
                    </label>
                  </div>
              </form>
            </div>

        </div>

            <div class="modal-footer puse-btns">
               <button type="button" class="btn btn-default cancel" data-dismiss="modal">Cancel</button>
          <a href="#myModal3" data-dismiss="modal" data-toggle="modal" type="button" class="btn btn-default pause-btn">Continue</a>

          </div>
          
        </div>
        
      
      
    </div>
  </div>
   <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            <div class="pause-job">
              <span class="closing-step"><span class="close-job-txt">Close job</span> (Step 2 of 2)</span>
              <h4>lead three year old teacher</h4>
              <p>Closing a job removes it from search results. You can continue to edit details and interact with applicants</p>
              <h5>How did you hire? <span>(choose one or both)</span></h5>
              <form class="pause-radio">
                <div class="form-check ">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="exampleRadios1">
                      I hired with indeed
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="exampleRadios2">
                      I hired another way
                    </label>
                  </div>
              </form>
            </div>

        </div>

            <div class="modal-footer puse-btns">
               <a href="#myModal2" data-dismiss="modal" data-toggle="modal" type="button" class="btn btn-default cancel">Back</a>
          <a href="#myModal3" data-dismiss="modal" data-toggle="modal" type="button" class="btn btn-default pause-btn">Close this job</a>

          </div>
          
        </div>
        
      
    </div>
  </div>
<div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog modal-dialog-6">
    
      <!-- Modal content-->
      <div class="modal-content modal-content-6">
        <div class="modal-header">
          <h4 class="modal-title">Post Job in Multiple Locations</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            <div class="pause-job">
              <h4>lead three year old teacher</h4>
              <h3>Seminole, FL</h3>
              <h5 class="small-txt">Why is the new job located?</h5>
            </div>
            <div class="loc-form">
              <form class="add-loc">
               <input type="locations" name="location" placeholder="City or Postal code"><a><i class="fa fa-times" aria-hidden="true"></i></a>
               <a href="" class="another-loc">Add additional location</a>
              </form>
            </div>
        </div>

            <div class="modal-footer">
               <a href="#myModal5" data-dismiss="modal" data-toggle="modal" type="button" class="btn btn-default pause-btn">Next</a>
        </div>


          </div>
          
        </div>
        
      
      
    </div>
<div class="modal fade" id="myModal5" role="dialog">
    <div class="modal-dialog modal-dialog-6">
    
      <!-- Modal content-->
      <div class="modal-content modal-content-6">
        <div class="modal-header">
          <h4 class="modal-title">Post Job in Multiple Locations</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            <div class="pause-job">
              <h4>lead three year old teacher</h4>
              <div class="form-group loc-sel">
                <label for="exampleFormControlSelect1">Budget Type</label>
                <select>
                  <option>daily average</option>
                  <option>monthly average</option>
                </select>
              </div>
            </div>
            <div class="loc-form">
              <form class="add-loc-ahead">
               <div class="loc-bud-main">
                 <div class="loc-bud-head">
                   <div class="row">
                     <div class="col-md-6">
                       <div class="loc-bud-heading">
                         <h5>Florida, PR</h5>
                       </div>
                     </div>
                     <div class="col-md-6">
                       <div class="loc-bud-btn">
                        <label>Sponsor</label>
                          <input type="checkbox" class="toggle">
                       </div>
                     </div>
                   </div>
                 </div>
                 <div class="loc-bud-body">
                   <div class="row">
                     <div class="col-md-5">
                       <div class="bud-loc-txt">
                         <h6>Budget (daily avg.)</h6>
                       </div>
                     </div>
                     <div class="col-md-7">
                       <div class="dollar-drp margin-auto">
                        <label class="sr-only" for="inlineFormInputGroup">Amount</label>
                      <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon currency-symbol">$</div>
                        <input type="text" class="form-control currency-amount" id="inlineFormInputGroup" placeholder="0.00" size="8">
                      </div>
                      </div>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-md-5">
                       <div class="bud-loc-txt">
                         <h6>Estimate* (31 days)</h6>
                       </div>
                     </div>
                     <div class="col-md-7">
                       <div class="appli">
                         <span>31 applicants</span>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="form-check set-date-bx">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Set an end date (optional)</label>
                 <div class="form-group">
                    <input type="date" class="form-control">
                  </div>
              </div>
              </form>
            </div>
        </div>

            <div class="modal-footer">
              <a href="#myModal4" data-dismiss="modal" data-toggle="modal" type="button" class="btn btn-default cancel">Back</a>
               <a href="#myModal6" data-dismiss="modal" data-toggle="modal" type="button" class="btn btn-default pause-btn">Next</a>

        </div>
<div class="modal-fte-note">
                 <p>*Application esatimates are based on indeed's past results of similar titles in a 31 days time period. This is not a gurantee of a future performance.</p>
                 <p>Actual daily spend may vary</p>
               </div>

          </div>
        </div>
      
    </div>
    <div class="modal fade" id="myModal6" role="dialog">
    <div class="modal-dialog modal-dialog-6">
    
      <!-- Modal content-->
      <div class="modal-content modal-content-6">
        <div class="modal-header">
          <h4 class="modal-title">Post Job in Multiple Locations</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            <div class="pause-job">
              <h4>lead three year old teacher</h4>
              <h5 class="conf">
                Confirmation
              </h5>
              <p class="conf-p">Ready to post this job? You may edit the job after it's posted.</p>
            </div>
            <div class="loc-form">
              <form class="add-loc-ahead">
               <div class="loc-bud-main">
                 <div class="loc-bud-head">
                   <div class="row">
                     <div class="col-md-6">
                       <div class="loc-bud-heading">
                         <h5>Florida, PR</h5>
                       </div>
                     </div>
                     <div class="col-md-6">
                       
                     </div>
                   </div>
                 </div>
                 <div class="loc-bud-body">
                   <div class="row">
                     <div class="col-md-6">
                       <div class="bud-loc-txt">
                         <h6>Budget (daily avg.)</h6>
                       </div>
                     </div>
                     <div class="col-md-6">
                       <div class="appli">
                         <span>$ 29</span>
                       </div>
                     </div>
                   </div>
                   
                 </div>
               </div>
               <div class="loc-bud-main">
                 <div class="opt-date">
                   <div class="row">
                     <div class="col-md-6">
                       <div class="bud-loc-txt">
                         <h6>Oprtional end date</h6>
                       </div>
                     </div>
                     <div class="col-md-6">
                       <div class="bud-loc-txt">
                         <h6>11/11/21</h6>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
              </form>
            </div>
        </div>
<div class="modal-fte-note2">
                 <p>*Application esatimates are based on indeed's past results of similar titles in a 31 days time period. This is not a gurantee of a future performance.</p>
                 <p>Actual daily spend may vary</p>
               </div>
            <div class="modal-footer">
              <a href="#myModal5" data-dismiss="modal" data-toggle="modal" type="button" class="btn btn-default cancel">Back</a>
               <button type="button" class="btn btn-default pause-btn" data-dismiss="modal">Confirm</button>
        </div>


          </div>
          
        </div>
        
      
      
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){ //Make script DOM ready
    $('.myselect').change(function() { //jQuery Change Function
        var opval = $(this).val(); //Get value from select element
        if(opval=="pause"){ 
            $('#myModal').modal("show"); 
        }
        else if(opval=="closed"){ 
            $('#myModal2').modal("show"); 
        }
    });
});


$(document).ready(function(){  
           $('#search').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){  
                $('#myTable tr').each(function(){  
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {  
                          $(this).show();  
                     }  
                     else  
                     {  
                          $(this).hide();  
                     }  
                });  
           }  
      });  
    </script>
  </body>
</html>


@endsection