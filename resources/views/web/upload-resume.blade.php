@extends('web.layouts.main') @section('content')
<section class="inner-banner">
    <img src="{{asset('web/images/bnr-bg.jpg')}}" />
    <div class="inner-cap">
      <?php echo (html_entity_decode(Helper::editck('h4', '', 'upload <span>resume</span>' ,'h4upload <span>resume</span>'.__LINE__)));?>
    </div>
</section>
<!-- Slider Start -->
<section class="upload-resume">
    <div class="container">
        <div class="user-login">
            <div class="user-maininfo">
                <h4>Do you have <span> resume?</span></h4>
            </div>
            <form method="POST" enctype="multipart/form-data" action="{{route('upload_resume_submit')}}" id="image-upload">
                @csrf
                <input type="hidden" id="file_content" name="file_content" />
                <input type="hidden" id="file_from" name="file_from" />
                <div class="row">
                    <div class="col-md-12">
                        <div class="cntnue-mail">
                            <a href="https://www.canva.com/create/resumes/" target="_blank">I dont have a resume</a>
                        </div>
                    </div>
                    <div class="option">
                        <h5>OR</h5>
                    </div>
                    <div class="col-md-12 dropzone attch">
                        <div class="drop-zone">
                            <span class="drop-zone__prompt">Drag and drop files here or...</span>
                            <input type="file" name="myFile" class="drop-zone__input" />
                            <div class="file-image">
                                <img src="{{asset('web/images/file.png')}}" />
                            </div>
                        </div>
                        <!-- <button><i class="fa fa-upload" aria-hidden="true"></i>Upload File</button> -->
                    </div>
                    <div class="col-md-12">
                        <div class="upload-device">
                            <button><i class="fa fa-upload" aria-hidden="true"></i>Upload Submit</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-md-12">
                <div class="google">
                    {{-- <a href="{{url('auth/google')}}" class="btn-style"><img src="{{asset('web/images/google.png')}}" />upload from google drive</a> --}}
                    <a href="javascript:void(0)" onclick="showPickerDialog()" class="btn-style"><img src="{{asset('web/images/google.png')}}" />upload from google drive</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="dropbox">
                    {{-- <a href="{{url('dropbox')}}"><i class="fa fa-dropbox" aria-hidden="true"></i>upload from drop box</a> --}}
                    <a href="javascript:void(0)" onclick="chooseFromDropbox()" class="btn-style"><i class="fa fa-dropbox" aria-hidden="true"></i>upload from drop box</a>
                </div>
            </div>
            <div class="col-md-12">
                {{--
                <div class="microsoft-drive">
                    <a href="{{url('auth/graph')}}" id="uploadFile" class="btn-style"><i class="fa fa-cloud" aria-hidden="true"></i>Upload From Microsoft Onedrive</a>
                </div>
                --}}
                <div class="supppot-file">
                    <p>Supported file types are .pdf, .doc, .docx, .rtf, .txt (Max size: 5 MB)</p>
                </div>
            </div>
        </div>
        {{--
        <div class="row">
            <div class="col-md-12">
                <div class="google">
                    <button type="button" class="uploadbutton" id="uploadFile">Upload</button>
                </div>
                <div class="supppot-file">
                    <p>Supported file types are .pdf, .doc, .docx, .rtf, .txt (Max size: 5 MB)</p>
                </div>
            </div>
        </div>
        --}}
    </div>
</section>
@endsection @section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet" />
<style type="text/css">
    .uploadbutton {
        width: 80%;
        padding: 10px 0px;
        border-radius: 30px;
        font-size: 18px;
        font-family: "GTWalsheimPro-bold";
        outline: none !important;
    }
    .user-login-button {
        width: 80%;
        padding: 12px 0px 10px;
        border-radius: 30px;
        font-size: 18px;
        outline: none !important;
        font-family: "GT Walsheim-pro-bold";
        line-height: 30px;
        cursor: pointer;
    }
    .google a {
        border: 1px solid #404040;
        color: #3b3b3b;
        background: #fff;
        margin-bottom: 20px;
        text-transform: uppercase;
    }
    .dropbox i {
        margin-right: 5px;
    }
    .google a img {
        position: relative;
        top: -3px;
        left: -2px;
    }
    .dropbox a {
        border: 1px solid #0050d0;
        color: #0050d0;
        background: #fff;
        margin-bottom: 20px;
        text-transform: uppercase;
    }
    .user-login a {
        width: 80%;
        padding: 12px 0px 10px;
        border-radius: 30px;
        font-size: 18px;
        outline: none !important;
        font-family: "GT Walsheim-pro-bold";
        line-height: 30px;
        cursor: pointer;
        display: inline-block;
    }
    .user-login .dropzone.attch {
        padding-bottom: 0;
        padding-top: 0;
    }
</style>
@endsection @section('js')
<script type="text/javascript" src="https://apis.google.com/js/api.js"></script>
<script>
    function showPickerDialog() {
        loadPicker();
    }
</script>
<script type="text/javascript">
    // The Browser API key obtained from the Google API Console.
    // Replace with your own Browser API key, or your own key.
    var developerKey = "<?=env('GOOGLE_KEY')?>";
    // The Client ID obtained from the Google API Console. Replace with your own Client ID.
    var clientId = "<?=env('GOOGLE_CLIENT_ID')?>";
    // Replace with your own project number from console.developers.google.com.
    // See "Project number" under "IAM & Admin" > "Settings"
    var appId = "<?=env('GOOGLE_APP_ID')?>";
    // Scope to use to access user's Drive items.
    var scope = "https://www.googleapis.com/auth/drive.file";
    var pickerApiLoaded = false;
    var oauthToken;
    // Use the Google API Loader script to load the google.picker script.
    function loadPicker() {
        gapi.load("auth", { callback: onAuthApiLoad });
        gapi.load("picker", { callback: onPickerApiLoad });
    }
    function onAuthApiLoad() {
        window.gapi.auth.authorize(
            {
                client_id: clientId,
                scope: scope,
                immediate: false,
            },
            handleAuthResult
        );
    }
    function onPickerApiLoad() {
        pickerApiLoaded = true;
        createPicker();
    }
    function handleAuthResult(authResult) {
        if (authResult && !authResult.error) {
            oauthToken = authResult.access_token;
            createPicker();
        }
    }
    // Create and render a Picker object for searching images.
    function createPicker() {
        if (pickerApiLoaded && oauthToken) {
            var view = new google.picker.View(google.picker.ViewId.DOCS);
            view.setMimeTypes("text/plain,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document");
            var picker = new google.picker.PickerBuilder()
                .enableFeature(google.picker.Feature.NAV_HIDDEN)
                .enableFeature(google.picker.Feature.MULTISELECT_ENABLED)
                .setAppId(appId)
                .setOAuthToken(oauthToken)
                .addView(view)
                .addView(new google.picker.DocsUploadView())
                .setDeveloperKey(developerKey)
                .setCallback(pickerCallback)
                .build();
            picker.setVisible(true);
        }
    }
    // A simple callback implementation.
    function pickerCallback(data) {
        if (data.action == google.picker.Action.PICKED) {
            var fileId = data.docs[0].id;
            //   console.log(data);
            //   return false;
            var datastring = "url=" + data.docs[0].url + "&name=" + data.docs[0].name + "&mimeType=" + data.docs[0].mimeType + "&fileId=" + data.docs[0].id + "&token=" + oauthToken;
            $("#file_content").val(datastring);
            $("#file_from").val("google");
            $("#image-upload").submit();
            //var url_path = "https://drive.google.com/file/d/"+fileId+"/view?usp=sharing"
            //alert("<a href='"+url_path+"'>Open</a>");
        }
    }
</script>
<!--For Dropbox-->
<script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="{{env('DROPBOX_APP_KEY')}}"></script>
<script>
    function chooseFromDropbox() {
        //Trigger dropbox chooser
        Dropbox.choose({
            success: function (files) {
                //files is list of selected files (array)
                if (files.length < 0) {
                    return;
                }
                var file = files[0];
                console.log(file);
                var datastring = "url=" + file.link + "&name=" + file.name;
                $("#file_content").val(datastring);
                $("#file_from").val("dropbox");
                $("#image-upload").submit();
                // return false;
                // alert("Download Link : " + file.link + "\nFile Name : " + file.name);
                // console.log("Download Link : " + file.link + "\nFile Name : " + file.name);
                //Sent link to server and grab content in server side
            },
            cancel: function () {
                //here is code when user close chooser
            },
            linkType: "direct", //Direct = Download link
            multiselect: true, //Allow to select one file
            extensions: [".pdf", ".doc", ".docx", ".pdf", ".xlsx"], //Allow to choose PDF file only
            folderselect: false, //Not allow to select folder
            sizeLimit: 1024 * 1024 * 2, //File size limit (2MB)
        });
    }
</script>
@endsection
