@extends('web.layouts.main') @section('content')
<section class="edit-job-sec">
    <div class="container">
        <div class="heading-edit-job">
            <div class="row">
                <div class="col-md-6">
                    <div class="hding-job">
                        <?php echo (html_entity_decode(Helper::editck('h4', '', 'Create a job post' ,'h4Create a job post'.__LINE__)));?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="hding-job-img">
                        <img src="{{asset('web/images/joob2.png')}}" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row white-back">
            <div class="lead-year-blk .pst-jp" style="width: 100%;">
                <div class="start-jobb">
                    <h4>How would you like to start your job post?</h4>
                    <form id="get_started">
                        <input type="hidden" name="step_filled" value="0" />
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                        <div class="post-opt get_job">
                            <label class="container">
                                <p>Start with a new post<span> (Use our posting tool to create your job)</span></p>
                                <!--<p>Use our posting tool to create your job.</p>-->
                                <input type="radio" value="New Job" name="get_job" />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="post-opt get_job">
                            <label class="container">
                                <p>Use a previous job as a template<span> (Copy a past job post and edit as needed)</span></p>
                                <input type="radio" value="Previous Job" name="get_job" />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="post-opt old_post">
                            <div class="">
                                <p>Please select one of your old Job Post <span class="asterik">*</span></p>
                            </div>
                            <div class="country-opt">
                                <select class="form-control" id="old_job">
                                    @foreach($all_job as $val)
                                    <option value="{{Crypt::encrypt($val->id)}}">{{($val->job_title != '')?$val->job_title:'Job Title Not Set'}} - {{date('M d,Y',strtotime($val->created_at))}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="cancel-preview-confirm-blk">
            <div class="row" style="align-items: center;">
                <div class="col-sm-6">
                    <div class="cancel">
                        <a href="{{url('/')}}"> <i class="fa fa-angle-left" aria-hidden="true"></i> back</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="show-confirm text-right">
                        <ul style="float: right; margin: 0;">
                            <li class="confirm"><a href="javascript:void(0)" class="submit-form">Continue</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection @section('css') @endsection @section('js')
<script>
    $(document).ready(function () {
        $(".old_post").hide();
    });
    $(".get_job").click(function () {
        var temp = $(this).find("input").val();
        if (temp == "Previous Job") {
            $(".old_post").show();
            $("#old_job").prop("required", true);
            $("#old_job").prop("name", "job_id");
        } else {
            $(".old_post").hide();
            $("#old_job").prop("required", false);
            $("#old_job").prop("name", "");
        }
    });
    $(".submit-form").click(function () {
        if ($('input[name="get_job"]:checked').val() === undefined) {
            toastr.error("Please Job Post first to process further");
            return false;
        }
        var formData = $("#get_started").serialize();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "post",
            dataType: "json",
            url: "{{route('job_create_save')}}",
            data: formData,
            success: function (response) {
                if (response.status == 1) {
                    window.location.href = response.location;
                }
                return false;
            },
        });
    });
</script>
@endsection
