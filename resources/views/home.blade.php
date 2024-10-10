@extends('layouts.main')
@section('content')
    <div>
        <div id="heroVideoContainer" class="relative h-[calc(50vh-54px)] w-full overflow-hidden lg:h-[calc(50vh-78px)] " style=" background-image: url({{Voyager::image($home->video_thumb) }});" >

            @php
              $videoPath =  getVideoUri($home->video_file)
            @endphp
                 <video autoplay muted>
                    <source src="{{ $videoPath }}" type="video/mp4" />
{{--                    <source src="./assets/home-qvvV6RXz.webm" type="video/webm" />--}}
{{--                    <source src="./assets/home-B7_8yO-C.ogg" type="video/ogg" />--}}
{{--                    Your browser does not support the video tag.--}}
                  </video>

            <p class="rubik-700 cont absolute left-1/2 top-1/2 text-[32px] pb-6 -translate-x-1/2 -translate-y-1/2 text-center lg:text-[64px] text-white lg:block" style="text-shadow: black 1px 1px 2px">
               {{ $home->heading }}
            </p>
        </div>

        <div class="flex items-center justify-center" style="background-color: #f0f9fa;">
            <div class="bg-white rounded-lg max-w-7xl p-6 md:p-12 shadow-lg -mt-8 mb-16 z-40 mx-8">
                <h1 class="text-center text-3xl font-bold mb-12 text-gray-800">
                    {{ $home->content_title }}
                </h1>

                <div class="md:flex md:space-x-6">
                    <div class="md:w-2/4 space-y-4">
                         {!! $home->content_text !!}
                    </div>

                    <div class="md:w-2/4 flex justify-center mt-6 md:mt-0">
                        <img
                            class="rounded-lg shadow-lg w-full"
                            src="{{Voyager::image($home->content_image) }}"
                            alt="{{ $home->content_title }}"
                        />
                    </div>
                </div>
            </div>
        </div>





    </div>
@endsection
