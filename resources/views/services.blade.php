@extends('layouts.main')
@section('content')

    <div class="h-40 flex justify-center items-center">
        <p class="text-[#FFD106] font-bold text-4xl">Services</p>
    </div>

    <div class="grid lg:grid-cols-3 gap-10 mx-auto max-w-7xl mb-24 lg:px-8">
        <!-- <div
          style="width: 100%; margin: 0 auto"
          class="max-w-sm bg-white border border-gray-200 rounded-lg shadow h-100 hover:border-[#FFD106] flex flex-col">
          <div
            style="text-align: center; padding-bottom: 15px; padding-top: 10px">
            <p
              class="pt-2 font-bold text-2xl"
              style="color: rgba(53, 47, 47, 0.822)">
              Partnership Integration
            </p>
          </div>
          <div
            class="rounded-[10px] h-full w-11/12 m-auto bg-[#FFD106] flex flex-col flex-grow mb-3.5">
            <div class="p-5">
              <p class="mb-3 font-normal text-white">
                We specialize in creating dynamic partnerships with local sports
                media and broadcasters, delivering innovative inventory solutions
                that drive growth and engagement.
              </p>
            </div>
            <div class="h-full flex flex-col center">
              <div class="flex-grow"></div>
              <div class="flex items-center justify-center">
                <p class="text-white pb-2 font-bold">Close</p>
              </div>
            </div>
          </div>
        </div> -->


        @if($services)
            @foreach($services as $service)
                @php
                    $tags = json_decode($service->tag_content, true);
                    $countTags = count($tags);
                @endphp
                @if($service->tag_content != null && !empty($tags) && trim($service->content) == '')
                    <div
                        style="width: 100%; margin: 0 auto; position:relative;"
                        class="max-w-sm bg-white border border-gray-200 flex flex-col rounded-lg shadow h-100 hover:border-[#FFD106]">
                        <div
                            style="text-align: center; padding-bottom: 15px; padding-top: 10px">
                            <p
                                class="pt-2 font-bold text-2xl"
                                style="color: rgba(53, 47, 47, 0.822)">
                                {{ $service->name }}
                            </p>
                        </div>

                        <div  class="block">
                            <img
                                class="rounded-[10px] h-48 w-11/12 m-auto"
                                src="{{url('storage/'.$service->image)}}"
                                alt="" />

                            <div class="pt-5 w-10/12 m-auto">
                                @foreach($tags as $tag)

                                    <div class="flex @if ($loop->iteration == 1 && count($tags) > 1) pt-5 @elseif($loop->iteration == $countTags) pt-4 pb-20 @elseif(count($tags) == 1) pb-20 @else pt-4  @endif" style="cursor: pointer;">
                                        <svg
                                            width="40"
                                            height="26"
                                            viewBox="0 0 50 36"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_264_1438)">
                                                <path
                                                    d="M18.089 0.252303L9.03677 8.78158C8.8518 8.95628 8.7439 9.20475 8.7439 9.46097V14.8845C8.7439 15.1329 8.84409 15.3736 9.02136 15.5483L17.6304 24.0737C17.9849 24.4231 18.5514 24.4309 18.9137 24.0854L20.7018 22.3772C21.0794 22.0161 21.0871 21.4105 20.7133 21.0417L13.5956 13.9954C13.5571 13.9566 13.5224 13.9178 13.4916 13.8712C13.3105 13.6111 12.8403 12.8346 13.0022 11.802C13.1602 10.7809 13.8307 10.1986 14.0003 10.0588C15.349 8.80488 16.694 7.55091 18.0427 6.29307C18.4243 5.93978 19.0216 5.97084 19.3607 6.36295C19.5341 6.56482 19.7885 6.68129 20.0544 6.68129H23.5843C24.409 6.68129 24.8213 5.67191 24.2317 5.08957L19.3684 0.267832C19.0177 -0.0815695 18.4512 -0.089334 18.0928 0.252303H18.089Z"
                                                    fill="#FFD106" />
                                                <path
                                                    d="M19.3876 35.7515L28.4398 27.2222C28.6248 27.0475 28.7327 26.799 28.7327 26.5428V21.1193C28.7327 20.8708 28.6325 20.6301 28.4552 20.4554L19.8462 11.93C19.4917 11.5806 18.9252 11.5729 18.5629 11.9184L16.7748 13.6266C16.3972 13.9876 16.3895 14.5933 16.7633 14.9621L23.881 22.0083C23.9195 22.0472 23.9542 22.086 23.985 22.1326C24.1661 22.3927 24.6363 23.1691 24.4744 24.2018C24.3164 25.2228 23.6459 25.8052 23.4763 25.9449C22.1276 27.1989 20.7826 28.4529 19.4339 29.7107C19.0523 30.064 18.455 30.0329 18.1159 29.6408C17.9425 29.4389 17.6882 29.3225 17.4223 29.3225H13.8923C13.0676 29.3225 12.6553 30.3319 13.2449 30.9142L18.1082 35.7282C18.4589 36.0776 19.0254 36.0853 19.3838 35.7437L19.3876 35.7515Z"
                                                    fill="#FFD106" />
                                                <path
                                                    d="M6.06562 12.2095L0.146416 17.7301C-0.0424125 17.9087 -0.0501198 18.2076 0.134855 18.3901L8.33156 26.5893C8.41634 26.6748 8.53195 26.7213 8.65142 26.7213H13.4877C13.8924 26.7213 14.0966 26.2283 13.8076 25.9371L6.23518 18.3357C6.0502 18.1494 6.05791 17.8465 6.25059 17.6718L6.67835 17.2836C6.77469 17.1982 6.82864 17.074 6.82864 16.9459V12.5473C6.82864 12.1474 6.35464 11.9378 6.06562 12.2095Z"
                                                    fill="#FFD106" />
                                                <path
                                                    d="M31.0603 23.8214L36.9834 18.3008C37.1722 18.1223 37.1799 17.8233 36.9949 17.6409L28.7982 9.44157C28.7134 9.35616 28.5978 9.30957 28.4784 9.30957H23.642C23.2374 9.30957 23.0332 9.80261 23.3222 10.0938L30.8946 17.6952C31.0796 17.8816 31.0719 18.1844 30.8792 18.3591L30.4514 18.7473C30.3551 18.8327 30.3011 18.9569 30.3011 19.085V23.4836C30.3011 23.8835 30.7751 24.0931 31.0642 23.8214H31.0603Z"
                                                    fill="#FFD106" />
                                                <g opacity="0.99"></g>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_264_1438">
                                                    <rect width="40" height="40" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <p class="tag-title">{{ $tag['title'] }}</p>

                                        {{--tag content start--}}
                                        <div
                                            class="hidden  w-11/12 m-auto h-full flex flex-col flex-grow mb-3.5 tag-content">
                                            <div
                                                class="rounded-[10px] w-12/13 bg-[#FFD106] flex flex-col flex-grow">
                                                <div class="flex justify-center items-center pt-7">
                                                    <svg
                                                        width="36"
                                                        height="35"
                                                        viewBox="0 0 36 35"
                                                        fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <mask
                                                            id="mask0_141_638"
                                                            style="mask-type: luminance"
                                                            maskUnits="userSpaceOnUse"
                                                            x="0"
                                                            y="0"
                                                            width="36"
                                                            height="35">
                                                            <path d="M36 0H0V34.6542H36V0Z" fill="white" />
                                                        </mask>
                                                        <g mask="url(#mask0_141_638)">
                                                            <path
                                                                d="M17.5431 0.240253L8.74737 8.45921C8.55512 8.65146 8.45898 8.84372 8.45898 9.13211V14.3711C8.45898 14.6114 8.55512 14.8517 8.74737 14.9959L17.1105 23.2149C17.447 23.5513 18.0237 23.5513 18.3602 23.2149L20.0905 21.5807C20.475 21.2443 20.475 20.6675 20.0905 20.283L13.1693 13.5059C13.1212 13.4579 13.1212 13.4098 13.0731 13.4098C12.8809 13.1695 12.4483 12.4005 12.5925 11.4392C12.7367 10.4779 13.4096 9.90113 13.5538 9.75694C14.8515 8.55534 16.1492 7.35373 17.495 6.15213C17.8796 5.81568 18.4563 5.86375 18.7928 6.2002C18.985 6.39245 19.2253 6.48858 19.4657 6.48858H22.8782C23.6953 6.48858 24.0798 5.5273 23.503 4.95053L18.7928 0.33638C18.4563 -0.0481325 17.8795 -0.0961951 17.5431 0.240253Z"
                                                                fill="white" />
                                                        </g>
                                                        <mask
                                                            id="mask1_141_638"
                                                            style="mask-type: luminance"
                                                            maskUnits="userSpaceOnUse"
                                                            x="0"
                                                            y="0"
                                                            width="36"
                                                            height="35">
                                                            <path d="M36 0H0V34.6542H36V0Z" fill="white" />
                                                        </mask>
                                                        <g mask="url(#mask1_141_638)">
                                                            <path
                                                                d="M18.793 34.4139L27.5888 26.195C27.781 26.0027 27.8771 25.8104 27.8771 25.5221V20.2831C27.8771 20.0428 27.781 19.8024 27.5888 19.6582L19.2256 11.4393C18.8891 11.1028 18.3124 11.1028 17.9759 11.4393L16.2456 13.0735C15.8611 13.4099 15.8611 13.9867 16.2456 14.3712L23.1669 21.1482C23.2149 21.1963 23.2149 21.2444 23.263 21.2444C23.4552 21.4847 23.8878 22.2537 23.7436 23.215C23.5994 24.1763 22.9265 24.753 22.7823 24.8972C21.4846 26.0988 20.1869 27.3004 18.8411 28.502C18.4566 28.8385 17.8798 28.7904 17.5434 28.454C17.3511 28.2617 17.1108 28.1656 16.8705 28.1656H13.4579C12.6408 28.1656 12.2563 29.1269 12.8331 29.7036L17.5434 34.3178C17.8798 34.7504 18.4566 34.7504 18.793 34.4139Z"
                                                                fill="white" />
                                                        </g>
                                                        <mask
                                                            id="mask2_141_638"
                                                            style="mask-type: luminance"
                                                            maskUnits="userSpaceOnUse"
                                                            x="0"
                                                            y="0"
                                                            width="36"
                                                            height="35">
                                                            <path d="M36 0H0V34.6542H36V0Z" fill="white" />
                                                        </mask>
                                                        <g mask="url(#mask2_141_638)">
                                                            <path
                                                                d="M5.86382 11.7757L0.144192 17.1108C-0.0480641 17.3031 -0.0480641 17.5915 0.144192 17.7356L8.07477 25.6182C8.17089 25.7143 8.26702 25.7623 8.36315 25.7623H13.0734C13.4579 25.7623 13.6502 25.2817 13.4099 24.9933L6.05607 17.6395C5.86381 17.4473 5.86381 17.1589 6.05607 17.0147L6.48865 16.6302C6.58478 16.534 6.63284 16.4379 6.63284 16.2937V12.0641C6.63284 11.7276 6.1522 11.4873 5.86382 11.7757Z"
                                                                fill="white" />
                                                        </g>
                                                        <mask
                                                            id="mask3_141_638"
                                                            style="mask-type: luminance"
                                                            maskUnits="userSpaceOnUse"
                                                            x="0"
                                                            y="0"
                                                            width="36"
                                                            height="35">
                                                            <path d="M36 0H0V34.6542H36V0Z" fill="white" />
                                                        </mask>
                                                        <g mask="url(#mask3_141_638)">
                                                            <path
                                                                d="M30.1359 22.9265L35.8556 17.5914C36.0478 17.3992 36.0478 17.1108 35.8556 16.9666L27.925 9.08407C27.8289 8.98795 27.7327 8.93988 27.6366 8.93988H22.9263C22.5418 8.93988 22.3496 9.42052 22.5899 9.70891L29.9437 17.0146C30.1359 17.2069 30.1359 17.4953 29.9437 17.6395L29.5111 18.024C29.415 18.1201 29.3669 18.2163 29.3669 18.3604V22.5901C29.3669 23.0227 29.8476 23.2149 30.1359 22.9265Z"
                                                                fill="white" />
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="p-5">
                                                    <div class="mb-3 font-normal dark:text-gray">
                                                        {{ $tag['content'] }}
                                                    </div>
                                                </div>
                                                <div class="h-full flex flex-col center">
                                                    <div class="flex-grow"></div>
                                                    <div class="flex items-center justify-center">
                                                        <button class="close-content">
                                                            <p class="text-white font-bold pb-3.5">Close</p>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--tag content end--}}
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                    <div
                        style="width: 100%; margin: 0 auto"
                        class="max-w-sm bg-white border border-gray-200 flex flex-col rounded-lg shadow h-100 hover:border-[#FFD106]">
                        <div
                            style="text-align: center; padding-bottom: 15px; padding-top: 10px">
                            <p
                                class="pt-2 font-bold text-2xl"
                                style="color: rgba(53, 47, 47, 0.822)">
                                {{ $service->name }}
                            </p>
                        </div>

                        <div  class="hidden flex-grow pb-3.5 hidden-content">
                            <div
                                class="rounded-[10px]  w-11/12 m-auto bg-[#FFD106] flex flex-col h-full flex-grow mb-3.5">
                                <div class="p-5">
                                    <div class="mb-3 font-normal text-white  h-[290px] overflow-hidden content-wrapper">
                                        {!! $service->content !!}
                                    </div>
                                </div>
                                <div class="h-full flex flex-col center">
                                    <div class="flex-grow"></div>
                                    <div class="flex items-center justify-center">
                                        <button class="close-content">
                                            <p class="text-white pb-2 font-bold">Close</p>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div  class="text-content block">
                            <a href="#">
                                <img
                                    class="rounded-[10px] h-48 w-11/12 m-auto"
                                    src="{{url('storage/'.$service->image)}}"
                                    alt="" />
                            </a>
                            <div class="pt-5 w-10/12 m-auto  ">
                                <div class="mb-3 font-normal text-gray-700 dark:text-gray h-[115px] overflow-hidden">
                                    {!! $service->content !!}
                                </div>
                                <div class="pb-5 pt-5">
                                    <button class="open-content">
                                        <p
                                            class="inline-flex items-center py-2 text-sm font-medium text-center text-teal-400 rounded-lg focus:outline-none">
                                            Read more
                                        </p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            @endforeach
        @endif










    </div>


@endsection
@section('js')
    {{--    <script>--}}
    {{--        function toggleDivs() {--}}
    {{--            const div1 = document.getElementById('div1');--}}
    {{--            const div2 = document.getElementById('div2');--}}

    {{--            div1.classList.toggle('hidden');--}}
    {{--            div2.classList.toggle('hidden');--}}
    {{--        }--}}

    {{--        function toggleDivs2() {--}}
    {{--            const div3 = document.getElementById('div3');--}}
    {{--            const div4 = document.getElementById('div4');--}}

    {{--            div3.classList.toggle('hidden');--}}
    {{--            div4.classList.toggle('hidden');--}}
    {{--        }--}}
    {{--    </script>--}}
    <script>
        $(function (){
            $(document).on("click",".open-content", function (e){
                e.preventDefault();
                $('.hidden-content').addClass('hidden');
                $('.text-content').removeClass('hidden');
                $('.tag-content').addClass('hidden');
                var $this = $(this);
                var $textContent = $this.parent().parent().parent();
                var $hiddenContent = $this.parent().parent().parent().parent();
                if(!$textContent.hasClass('hidden')){
                    $textContent.addClass('hidden');
                }
                if($hiddenContent.find('.hidden-content').hasClass('hidden')){
                    $hiddenContent.find('.hidden-content').removeClass('hidden');
                }
            });

            $(document).on("click",".close-content", function (e){
                e.preventDefault();
                var $this = $(this);
                $('.hidden-content').addClass('hidden');
                $('.text-content').removeClass('hidden');
                $('.tag-content').addClass('hidden');
                var $hiddenContent = $this.parent().parent().parent().parent();
                var $textContent = $this.parent().parent().parent().parent().parent();
                if(!$hiddenContent.hasClass('hidden')){
                    $hiddenContent.addClass('hidden')
                }
                $textContent.find('.text-content').removeClass('hidden');
            });


            $(document).on("click",".tag-title", function (e){
                e.preventDefault();
                $('.hidden-content').addClass('hidden');
                $('.tag-content').addClass('hidden');
                $('.text-content').removeClass('hidden');
                var $this = $(this);
                if($this.parent().find('.tag-content').hasClass('hidden')){
                    $this.parent().find('.tag-content').removeClass('hidden');
                }
            });
        });
    </script>
@endsection
