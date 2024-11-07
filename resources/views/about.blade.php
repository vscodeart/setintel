@extends('layouts.main')
@section('content')
    <div class="h-40 flex justify-center items-center">
        <p class="text-[#FFD106] font-bold text-4xl">{{ $about->name }}</p>
    </div>



    <div class="flex justify-center items-center pb-24 mx-10">
        <div class="mx-auto max-w-7xl rounded-lg shadow-lg flex flex-col md:flex-row"  style="background-color: #ade0e5">
            <div class="w-full md:w-1/2">
                <img src="{{Voyager::image($about->content_image) }}" alt="Business Image" class="w-full h-full object-cover  rounded-lg lg:rounded-l-lg lg:rounded-r-none"/>
            </div>

            <div class="w-full md:w-1/2 p-6 md:p-10">
                 {!! $about->content_text !!}
            </div>
        </div>
    </div>

@endsection
