@extends('layouts.main')
@section('content')


    <div class="h-40 flex justify-center items-center">
        <p class="text-[#FFD106] font-bold text-4xl">Partners</p>
    </div>


    <div class="max-w-7xl mx-auto py-2 lg:px-8">


        <!-- Grid container for partner logos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mx-5 lg:mx-0">

            @if(count($partners))
                @foreach($partners as $partner)
                    <div class="bg-white border-2 border-[#FFD106] shadow-lg rounded-lg flex flex-col justify-between">
                        <div class="flex items-center justify-center h-52 p-4">
                            <!-- Replace with the actual logo image -->
                            <!-- <img src="path-to-logo" alt="Ally Ap" class="h-full object-contain"> -->
                            <img src="{{url('storage/'.$partner->image)}}" class="object-cover  w-[200px]" />
{{--                            <img src="{{ getImageUriCropped($partner, 'image' )  }}" class="object-cover  w-[200px]" />--}}
                        </div>
                        <div class="bg-[#FFD106] w-full pt-4 pb-4 flex items-center justify-center">
                            <div class="bg-white w-full mx-4 py-2  px-4 text-center rounded-md">
                                <p class="text-gray-800 font-semibold text-lg text-slate-600" ><b>{{ $partner->name }}</b></p>
                            </div>
                        </div>
                    </div>

                @endforeach
            @endif
            <!-- Partner Card -->



        </div>
    </div>

    <div class="h-40 flex justify-center items-center">
    </div>






@endsection
