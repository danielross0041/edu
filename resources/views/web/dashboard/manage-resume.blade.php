@extends('web.layouts.main') @section('content')

\



<div class="modal fade re-modal" id="ResumeandCVModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" style="display: none;" aria-hidden="true">

   <form class="needs-validation" novalidate method="POST" action="{{route('profile_submit')}}" enctype="multipart/form-data" id="profile3">

      @csrf

      <div class="modal-dialog modal-dialog-centered" role="document">

         <div class="modal-content">

            <div class="modal-header">

               <h5 class="modal-title" id="exampleModalLongTitle1">Resume/CV Document</h5>

               <button type="button" class="close" data-dismiss="modal" aria-label="Close">

               <span aria-hidden="true">×</span>

               </button>

            </div>

            <div class="modal-body">

               <div class="form-group">

                  <label for="validationCustom28">Document Attach(Resume/CV)<span class="text-danger font-weight-bold">*</span></label>

                  <input type="file" id="validationCustom28" name="cv_file" class="form-control bg-transparent">

                  <small class="form-text">Upload your Resume/CV.</small>

               </div>

               <div class="document image-documents">

                  <div class="document-content">

                     @if(Auth::check())

                     @php $user = Auth::user(); $cond= false; @endphp

                     @if($user->resume_doc != "")

                     @php $path3 = $user->resume_doc; $cond = true; @endphp

                     @else

                     @php $path3 = "images/no-img.png"; $cond= false; @endphp

                     @endif

                     @endif

                     <div class="document-profile text-center">

                        <!-- <img src="" alt="{{$user->name}} Profile"  title="{{ Auth::user()->name }} Dashboard" class="user-image img-fluid"> -->

                        <div class="document-info">

                        <a href="{{asset($path3)}}" target="_blank" rel="noopener noreferrer">{{(($cond == true)?'Click for view file':'No Resume is Uploaded')}}</a>

                        </div>

                     </div>

                     <?php 

                        if (env('APP_ENV') == 'local') {

                            $file_size3 = "Not Define";

                        }else{

                            $filename3 = asset($path3);

                            $headers3  = get_headers($filename3 , 1);

                            $fsize3    = $headers3['Content-Length'];

                            $file_size3 = number_format($fsize3/1000 , 2) . " KB";

                        }     

                        ?>

                     <div class="document-email">

                        <p class="mb-0 small">Size:  </p>

                        <p class="user-email">{{$file_size3}}</p>

                     </div>

                     <div class="line-h-1 h5">                                 

                     </div>

                  </div>

               </div>

            </div>

            <div class="modal-footer">

               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

               <button type="button" id="profile3-form" class="btn btn-primary">Save changes</button>

            </div>

         </div>

      </div>

   </form>

</div>



<section class="inner-banner">

    <img src="{{asset('web/images/inner-banner.jpg')}}" />

    <div class="inner-cap">

        <h4>Manage  <span>Resume</span></h4>

    </div>

</section>





<section class="expire-jobs re-preview mng-jbs">

    <div class="container">

        <div class="row">

            <div class="col-md-6">

               

                <div class="job-table job-resum">
                     <h4><i class="fa fa-file-text" aria-hidden="true"></i> Resume Preview</h4>
                     
                     <div class="yop-icn">

                     <a class="edit-document" href="{{asset($path3)}}" target="_blank">{{(($cond == true)?'Click for view file':'No Resume is Uploaded')}}</a>
                </div>
                </div>
            </div>
            
            <div class="col-md-6 sticky-top">
                <div class="job-table job-resum">
                    <h4><i class="fa fa-upload" aria-hidden="true"></i> Upload New Resume</h4>
                          <div class="yop-icn">
                    <a class="edit-document" href="#" data-toggle="modal" data-target="#ResumeandCVModal"> Upload New Resume</a>
                </div>
                </div>
            </div>

        </div>

    </div>



</section>

@endsection 

@section('css')

<style>

    .posting-date {

        width: 100%;

        padding-left: 10px;

    }

    .dropdown-content.myDropdown.current {

        display: block !important;

    }

    .prof-box a {

        padding: 8px 20px !important;

    }

    .navbar-dark .lst-log {

        border-top: 1px solid #00000040 !important;

        margin-top: 10px;

        padding-top: 13px !important;

    }

</style>

@endsection 

@section('js')

<script>

        $("#myInput").on("keyup", function () {

            var value = $(this).val().toLowerCase();

            $("#jobs tr").filter(function () {

                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);

            });

        });

    

    $("#profile3-form").click(function(){

          $("#profile3").submit();

   });



</script>

@endsection

