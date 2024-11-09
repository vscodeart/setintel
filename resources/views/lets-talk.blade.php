@extends('layouts.main')
@section('content')

    <div class="h-40 flex justify-center items-center">
        <p class="text-[#FFD106] font-bold text-4xl">Let`s Talk</p>
    </div>



    <section class="flex flex-col items-center mx-5">
        <div
            class="p-10 shadow-lg rounded-lg w-full max-w-6xl"
            style="background: rgba(106, 199, 209, 0.1)"
        >


            @if ($message = session('error'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                     role="alert">
                    <span class="font-medium">  {{ $message }}</span>
                </div>
            @endif

            @if ($message = session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                     role="alert">
                    <span class="font-medium"> {{ $message }}</span>
                </div>
            @endif

            <form class="grid grid-cols-1 md:grid-cols-2 lg:gap-14" method="post"
                  action="{{ route('lets.talk.submit') }}">
                @csrf
                <div class="lg:space-y-6 lg:py-8 py-3.5">
                    <div class="lg:pl-16">
                        <input
                            type="text"
                            placeholder="First Name"
                            name="first_name"
                            class="border border-[#FFD106] rounded-lg py-3 px-4 w-full focus:outline-none focus:ring-2 focus:ring-red-900"
                        />
                        @error('first_name')
                        <div class="invalid">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="pt-3 lg:pl-16">
                        <input
                            type="text"
                            name="last_name"
                            placeholder="Last Name"
                            class="border border-[#FFD106] rounded-lg py-3 px-4 w-full focus:outline-none focus:ring-2 focus:ring-red-900"
                        />
                        @error('last_name')
                        <div class="invalid">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="pt-3 lg:pl-16">
                        <input
                            type="text"
                            name="personal_phone"
                            placeholder="Personal Phone"
                            class="border border-[#FFD106] rounded-lg py-3 px-4 w-full focus:outline-none focus:ring-2 focus:ring-red-900"
                        />
                        @error('personal_phone')
                        <div class="invalid">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="pt-3 lg:pl-16">
                        <input
                            type="email"
                            name="personal_email"
                            placeholder="Personal Email"
                            class="border border-[#FFD106] rounded-lg py-3 px-4 w-full focus:outline-none focus:ring-2 focus:ring-red-900"
                        />
                        @error('personal_email')
                        <div class="invalid">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col lg:space-y-6 lg:py-8 lg:pr-16">
                    <input
                        type="text"
                        name="company"
                        placeholder="Company"
                        class="border border-[#FFD106] rounded-lg py-3 px-4 w-full focus:outline-none focus:ring-2 focus:ring-red-900"
                    />
                    @error('company')
                    <div class="invalid" style="margin-top:initial;">{{ $message }}</div>
                    @enderror
                    <div class="pt-3">
              <textarea
                  placeholder="Message"
                  name="message"
                  rows="5"
                  class="border border-[#FFD106] rounded-lg py-2 px-4 w-full focus:outline-none focus:ring-2 focus:ring-red-900"
              ></textarea>
                        @error('message')
                        <div class="invalid">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex justify-center pt-2">
                        <button
                            type="submit"
                            class="bg-white text-[#FFD106] py-2 px-12 rounded-full border-2 border-[#FFD106] hover:bg-[#FFD106] hover:text-white transition ease-in-out duration-300"
                        >
                            <b>SEND</b>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>



    <div class="h-40 flex justify-center items-center">
    </div>

@endsection
