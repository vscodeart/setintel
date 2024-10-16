@extends('layouts.main')
@section('content')

    <div class="h-40 flex justify-center items-center">
        <p class="text-red-900 font-bold text-4xl">Let`s Talk</p>
    </div>



    <section class="flex flex-col items-center mx-5">
        <div
            class="p-10 shadow-lg rounded-lg w-full max-w-6xl"
            style="background: rgba(106, 199, 209, 0.1)"
        >
            <form class="grid grid-cols-1 md:grid-cols-2 lg:gap-14">
                <div class="lg:space-y-6 lg:py-8 py-3.5">
                    <div class="lg:pl-16">
                        <input
                            type="text"
                            placeholder="First Name"
                            class="border border-red-900 rounded-lg py-3 px-4 w-full focus:outline-none focus:ring-2 focus:ring-red-900"
                        />
                    </div>

                    <div class="pt-3 lg:pl-16">
                        <input
                            type="text"
                            placeholder="Last Name"
                            class="border border-red-900 rounded-lg py-3 px-4 w-full focus:outline-none focus:ring-2 focus:ring-red-900"
                        />
                    </div>
                    <div class="pt-3 lg:pl-16">
                        <input
                            type="text"
                            placeholder="Personal Phone"
                            class="border border-red-900 rounded-lg py-3 px-4 w-full focus:outline-none focus:ring-2 focus:ring-red-900"
                        />
                    </div>
                    <div class="pt-3 lg:pl-16">
                        <input
                            type="email"
                            placeholder="Personal Email"
                            class="border border-red-900 rounded-lg py-3 px-4 w-full focus:outline-none focus:ring-2 focus:ring-red-900"
                        />
                    </div>
                </div>

                <div class="flex flex-col lg:space-y-6 lg:py-8 lg:pr-16">
                    <input
                        type="text"
                        placeholder="Company"
                        class="border border-red-900 rounded-lg py-3 px-4 w-full focus:outline-none focus:ring-2 focus:ring-red-900"
                    />
                    <div class="pt-3">
              <textarea
                  placeholder="Message"
                  rows="5"
                  class="border border-red-900 rounded-lg py-2 px-4 w-full focus:outline-none focus:ring-2 focus:ring-red-900"
              ></textarea>
                    </div>

                    <div class="flex justify-center pt-2">
                        <button
                            type="submit"
                            class="bg-white text-red-900 py-2 px-12 rounded-full border-2 border-red-900 hover:bg-red-900 hover:text-white transition ease-in-out duration-300"
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
