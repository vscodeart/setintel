@extends('layouts.main')
@section('content')


    <div class="h-40 flex justify-center items-center">
        <p class="text-red-900 font-bold text-4xl">{{ $policy->name }}</p>
    </div>



    <div class="flex justify-center items-center pb-24 mx-10">
        <div class="mx-auto max-w-7xl rounded-lg shadow-lg flex flex-col md:flex-row"  style="background-color: #ade0e5">

            <div class="w-full   p-6 md:p-10">
                {!!  $policy->content !!}
            </div>
        </div>
    </div>
@endsection
