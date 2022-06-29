<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <!-- START: Head-->
    <head>
        <meta charset="UTF-8">
        <title>{{isset($title)?$title:env('APP_NAME')}}</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}"> 
        <meta name="description" content="{{isset($description)?$description:''}}">
        <meta name="keywords" content="{{isset($keywords)?$keywords:''}}">

        
        <?php  
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $str_add = "web/css/custom.css";
        if (strpos($actual_link, 'dashboard') !== false) {
            ?>
                @include('web.layouts.d-links')
            <?php
        }else{
            ?>
                @include('web.layouts.links')
            <?php
        }
        ?>
       
        
        @yield('css')
        <!-- END: Custom CSS-->
    </head>
    <!-- END Head-->

    <!-- START: Body-->
     <body>

        <?php  
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $str_add = "web/css/custom.css";
            if (strpos($actual_link, 'dashboard') === false) {
                ?>
                    @include('web.layouts.header')
                <?php
            }else{
                ?>
                    @include('web.layouts.d-header')
                <?php
            }
        ?>

        
        
        <input type="hidden" id="web_url" value="{{url('/')}}"/>
        <!-- START: Main Content-->
        @yield('content')
        <!-- END: Content-->
        <!-- START: Template JS-->
        {{--
        <?php  
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $str_add = "web/css/custom.css";
            if (strpos($actual_link, 'dashboard') === false) {
                ?>
                    @include('web.layouts.footer')
                <?php
            }
        ?>
            --}}
        @include('web.layouts.footer')

        @include('web.layouts.scripts')
        @yield('js')
    </body>
    <!-- END: Body-->
</html>
