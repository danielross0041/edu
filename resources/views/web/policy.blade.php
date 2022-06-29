@extends('web.layouts.main') @section('content')
<section class="inner-banner">
    <img src="{{asset('web/images/bnr-bg.jpg')}}" />
    <div class="inner-cap">
        <h4>Privacy <span>Policy</span></h4>
    </div>
</section>
<section class="article-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="article-txt">
                    <div class="article-blk">
                        <?php echo (html_entity_decode(Helper::editck('p', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duisaute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.' ,'pLoremdoeiusmodtempo'.__LINE__)));?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection @section('css')
<style type="text/css"></style>
@endsection @section('js') @endsection
