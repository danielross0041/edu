<script src="{{asset('web/js/jquery-3.6.0.min.js')}}"></script>

<script src="{{asset('vendors/ckeditor/ckeditor.js')}}" type="text/javascript"></script>

<script src="{{asset('web/js/popper.min.js')}}"></script>

<script src="{{asset('web/js/bootstrap.min.js')}}"></script>

<script src="{{asset('web/js/slick.min.js')}}"></script>

<script src="{{asset('web/js/fontawesome.js')}}"></script>


<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<script src="{{asset('web/js/jquery.fontstar.js')}}"></script>

<script src="{{asset('web/js/custom.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>



<script type="text/javascript">
    $(document).on("click", "#cms-generic", function(){
        $("#cms_form").submit();
    })

    $(document).on("click", ".clickable", function(){
        var element = $(this)
        var desc = $(this).html();
        var slug = $(this).data("slug");
        var clas = $(this).data("class");
        var tag = $(this).data("tag");
        $("#addcms").remove();
        console.log(desc)
        console.log(slug)
        console.log(clas)
        console.log(tag)
        $.ajax({
            type : 'POST',
            dataType : 'JSON',
            url: "{{route('modalform')}}",
            data: {desc:desc, slug:slug, class:clas, tag:tag, _token:"{{csrf_token()}}"},
            success: function (response) {
                if (response.status == 1) {
                    $(response.message).insertAfter(element)
                    $("#addcms").modal("show");
                    var description = CKEDITOR.replace('description');
                    description.on( 'change', function( evt ) {
                        $("#description").text( evt.editor.getData())    
                    });
                }
            }
        });
    });
</script>

<script>

    $(".find-job-search").click(function(){

        $('input[name="searching"]').focus();

    })

</script>



        <script>

            // Menu Js

            (function ($) {

                $.fn.menumaker = function (options) {

                    var cssmenu = $(this),

                        settings = $.extend(

                            {

                                format: "dropdown",

                                sticky: false,

                            },

                            options

                        );

                    return this.each(function () {

                        $(this)

                            .find(".button")

                            .on("click", function () {

                                $(this).toggleClass("menu-opened");

                                var mainmenu = $(this).next("ul");

                                if (mainmenu.hasClass("open")) {

                                    mainmenu.slideToggle().removeClass("open");

                                } else {

                                    mainmenu.slideToggle().addClass("open");

                                    if (settings.format === "dropdown") {

                                        mainmenu.find("ul").show();

                                    }

                                }

                            });

                        cssmenu.find("li ul").parent().addClass("has-sub");

                        multiTg = function () {

                            cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');

                            cssmenu.find(".submenu-button").on("click", function () {

                                $(this).toggleClass("submenu-opened");

                                if ($(this).siblings("ul").hasClass("open")) {

                                    $(this).siblings("ul").removeClass("open").slideToggle();

                                } else {

                                    $(this).siblings("ul").addClass("open").slideToggle();

                                }

                            });

                        };

                        if (settings.format === "multitoggle") multiTg();

                        else cssmenu.addClass("dropdown");

                        if (settings.sticky === true) cssmenu.css("position", "fixed");

                        resizeFix = function () {

                            var mediasize = 1000;

                            if ($(window).width() > mediasize) {

                                cssmenu.find("ul").show();

                            }

                            if ($(window).width() <= mediasize) {

                                cssmenu.find("ul").hide().removeClass("open");

                            }

                        };

                        resizeFix();

                        return $(window).on("resize", resizeFix);

                    });

                };

            })(jQuery);



            (function ($) {

                $(document).ready(function () {

                    $("#cssmenu").menumaker({

                        format: "multitoggle",

                    });

                });

            })(jQuery);



            document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {

                const dropZoneElement = inputElement.closest(".drop-zone");



                dropZoneElement.addEventListener("click", (e) => {

                    inputElement.click();

                });



                inputElement.addEventListener("change", (e) => {

                    if (inputElement.files.length) {

                        updateThumbnail(dropZoneElement, inputElement.files[0]);

                    }

                });



                dropZoneElement.addEventListener("dragover", (e) => {

                    e.preventDefault();

                    dropZoneElement.classList.add("drop-zone--over");

                });



                ["dragleave", "dragend"].forEach((type) => {

                    dropZoneElement.addEventListener(type, (e) => {

                        dropZoneElement.classList.remove("drop-zone--over");

                    });

                });



                dropZoneElement.addEventListener("drop", (e) => {

                    e.preventDefault();



                    if (e.dataTransfer.files.length) {

                        inputElement.files = e.dataTransfer.files;

                        updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);

                    }



                    dropZoneElement.classList.remove("drop-zone--over");

                });

            });



            /**

             * Updates the thumbnail on a drop zone element.

             *

             * @param {HTMLElement} dropZoneElement

             * @param {File} file

             */

            function updateThumbnail(dropZoneElement, file) {

                let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");



                // First time - remove the prompt

                if (dropZoneElement.querySelector(".drop-zone__prompt")) {

                    dropZoneElement.querySelector(".drop-zone__prompt").remove();

                }



                // First time - there is no thumbnail element, so lets create it

                if (!thumbnailElement) {

                    thumbnailElement = document.createElement("div");

                    thumbnailElement.classList.add("drop-zone__thumb");

                    dropZoneElement.appendChild(thumbnailElement);

                }



                thumbnailElement.dataset.label = file.name;



                // Show thumbnail for image files

                if (file.type.startsWith("image/")) {

                    const reader = new FileReader();



                    reader.readAsDataURL(file);

                    reader.onload = () => {

                        thumbnailElement.style.backgroundImage = `url('${reader.result}')`;

                    };

                } else {

                    thumbnailElement.style.backgroundImage = null;

                }

            }



            $("#boost-img").click(function () {

                $("#upload-file").click();

            });

            $("#finalize-video").click(function () {

                $("#upload-file").click();

            });

            $("#company-image").click(function () {

                $("#upload-file").click();

            });



            //$(".country-opt").hide();

            $(".asterik").hide();

            $(".country-an").click(function () {

                $(this).closest(".mainn").find(".asterik").show();

                $(this).closest(".mainn").find(".lang").hide();

                $(this).closest(".mainn").find(".country-opt").show();

                $(this).hide();

            });



            // Post a job

            $(document).ready(function () {

                var current_fs, next_fs, previous_fs; //fieldsets

                var opacity;



                $(".next").click(function () {

                    current_fs = $(this).parent();

                    next_fs = $(this).parent().next();



                    //Add Class Active

                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");



                    //show the next fieldset

                    next_fs.show();

                    //hide the current fieldset with style

                    current_fs.animate(

                        { opacity: 0 },

                        {

                            step: function (now) {

                                // for making fielset appear animation

                                opacity = 1 - now;



                                current_fs.css({

                                    display: "none",

                                    position: "relative",

                                });

                                next_fs.css({ opacity: opacity });

                            },

                            duration: 600,

                        }

                    );

                });



                $(".previous").click(function () {

                    current_fs = $(this).parent();

                    previous_fs = $(this).parent().prev();



                    //Remove class active

                    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");



                    //show the previous fieldset

                    previous_fs.show();



                    //hide the current fieldset with style

                    current_fs.animate(

                        { opacity: 0 },

                        {

                            step: function (now) {

                                // for making fielset appear animation

                                opacity = 1 - now;



                                current_fs.css({

                                    display: "none",

                                    position: "relative",

                                });

                                previous_fs.css({ opacity: opacity });

                            },

                            duration: 600,

                        }

                    );

                });



                $(".radio-group .radio").click(function () {

                    $(this).parent().find(".radio").removeClass("selected");

                    $(this).addClass("selected");

                });



                $(".submit").click(function () {

                    return false;

                });

            });

        </script>



@yield('script')





<!-- <script type="text/javascript">

	$('div.alert').delay(3000).slideUp(300);

  $(":input").inputmask();

</script> -->



<script>

  @if(Session::has('message'))

  toastr.options =

  {

    "closeButton" : true,

    "progressBar" : true,

    "debug": false,

    "positionClass": "toast-bottom-right",

  }

      toastr.success("{{ session('message') }}");

  @endif



  @if(Session::has('error'))

  toastr.options =

  {

    "closeButton" : true,

    "progressBar" : true,

    "debug": false,

    "positionClass": "toast-bottom-right",

  }

      toastr.error("{{ session('error') }}");

  @endif



  @if(Session::has('info'))

  toastr.options =

  {

    "closeButton" : true,

    "progressBar" : true,

    "debug": false,

    "positionClass": "toast-bottom-right",

  }

      toastr.info("{{ session('info') }}");

  @endif



  @if(Session::has('warning'))

  toastr.options =

  {

    "closeButton" : true,

    "progressBar" : true,

    "debug": false,

    "positionClass": "toast-bottom-right",

  }

      toastr.warning("{{ session('warning') }}");

  @endif

</script>



