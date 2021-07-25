{{--<div>--}}
{{--    <div id="contact-page" class="contact-section-trans blue-bg section-padding">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12 col-md-12 col-12 text-center wow fadeInRight">--}}
{{--                    <div class="contact-form-wrapper">--}}
{{--                        <div class="section-title">--}}
{{--                            <h2><b>{{ $course->name }}</b></h2>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div class="mt-3">--}}
{{--                                {{ $course}}--}}
{{--                            </div>--}}

{{--                            <div class="mt-3">--}}
{{--                                @foreach($course_video as $video)--}}
{{--                                    {{$video}}--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<div class="faq-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg">
                {{-- Title --}}
                <div class="section-title">
                    <h2>{{ $course->name }}</h2>
                </div>

                {{-- Video Player Place--}}
                <div class="styled-faq">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        @foreach($course_video as $key=>$video)

                            <div class="panel panel-default">
                                @if($key == 0)
                                    <div class="panel-heading active" role="tab" id="heading_{{$key}}">
                                        <h6 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                               data-parent="#accordion"
                                               href="#collapse_{{$key}}" aria-expanded="true"
                                               aria-controls="collapse_{{$key}}">
                                                {{$video->name}}
                                                <i class="fa fa-angle-up"></i>
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                        </h6>
                                    </div>
                                    <div id="collapse_{{$key}}" class="panel-collapse collapse show" role="tabpanel"
                                         aria-labelledby="heading_{{$key}}">
                                        <div class="panel-body">
                                            @if(strpos($video->url, "https://www.youtube.com/watch?v=") !== FALSE)
                                                <x-embed url="{!! $video->url !!}"/>
                                            @else
                                                <a href="{!! $video->url !!}">網址</a>
                                            @endif

                                            <div class="case-overview">
                                                <h5>Description</h5>
                                                <p>{{$video->description}}</p>
                                            </div>

                                        </div>
                                    </div>
                                @else
                                    <div class="panel-heading" role="tab" id="heading_{{$key}}">
                                        <h6 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                               href="#collapse_{{$key}}"
                                               aria-expanded="false" aria-controls="collapse_{{$key}}">
                                                {{$video->name}}
                                                <i class="fa fa-angle-up"></i>
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                        </h6>
                                    </div>
                                    <div id="collapse_{{$key}}" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="heading_{{$key}}">
                                        <div class="panel-body">
                                            @if(strpos($video->url, "https://www.youtube.com/watch?v=") !== FALSE)
                                                <x-embed url="{!! $video->url !!}"/>
                                            @else
                                                <a href="{!! $video->url !!}">網址</a>
                                            @endif

                                            <div class="case-overview">
                                                <h5>Description</h5>
                                                <p>{{$video->description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                        @endforeach

                        {{--                        <div class="panel panel-default">--}}
                        {{--                            <div class="panel-heading" role="tab" id="headingThree">--}}
                        {{--                                <h6 class="panel-title">--}}
                        {{--                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"--}}
                        {{--                                       href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">--}}
                        {{--                                        Are you open a learning online store?--}}
                        {{--                                        <i class="fa fa-angle-up"></i>--}}
                        {{--                                        <i class="fa fa-angle-down"></i>--}}
                        {{--                                    </a>--}}
                        {{--                                </h6>--}}
                        {{--                            </div>--}}
                        {{--                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"--}}
                        {{--                                 aria-labelledby="headingThree">--}}
                        {{--                                <div class="panel-body">--}}
                        {{--                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry--}}
                        {{--                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor--}}
                        {{--                                    brunch.--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}


                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


