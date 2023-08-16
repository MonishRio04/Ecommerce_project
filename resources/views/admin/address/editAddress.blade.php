@extends('admin.layout.headerandfooter')
@section('admincontent')
                <main class="h-full pb-16 overflow-y-auto">
                    <div class="container px-6 mx-auto grid">
                        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">

                        </h2>
                        <!-- CTA -->


                        <!-- General elements -->
                        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                            Edit Address
                        </h4>
                        {{-- <form action="{{ route() }}" method="post"> --}}
                        {!! Form::open([
                            'method' => 'PUT',
                            'url' => route('address.update',$id),
                            'files' => true,
                            'enctype' => 'multipart/form-data',
                        ]) !!}
                        {{-- <form method="POST" url={{ route("category.store")}}> --}}
                        @csrf

                        @foreach($address as $addr)
                        {{-- {!! Form::hidden('id', $addr->id) !!} --}}
                        {{-- {{ dd($addr->id) }} --}}
                        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Name:</span>
                                <input type="text" name="name" value="{{ $addr->name }}"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Name" />
                                @error('name')
                                    <p style="color:red;font-size:12px">{{ '*' . $message }}</p>
                                @enderror
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Mobile:</span>
                                <input type="number" name="mobile" value="{{$addr->mobile_no }}"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Mobile No." />
                                @error('mobile')
                                    <p style="color:red;font-size:12px">{{ '*' . $message }}</p>
                                @enderror
                            </label>
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Address 1:</span>
                                <textarea name='address1'
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Address line 1" >{{ $addr->address_line1 }}</textarea>
                                @error('address1')
                                    <p style="color:red;font-size:12px">{{ '*' . $message }}</p>
                                @enderror
                            </label>
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Address 2:</span>
                                <textarea name='address2'
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Address line 2">{{ $addr->address_line2 }}</textarea>
                                @error('address2')
                                    <p style="color:red;font-size:12px">{{ '*' . $message }}</p>
                                @enderror
                            </label>
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Country code:</span>
                                <input type="number" name="ccode" value="{{ $addr->country_code }}"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Country Code" />
                                @error('ccode')
                                    <p style="color:red;font-size:12px">{{ '*' . $message }}</p>
                                @enderror
                            </label>
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Pin Code:</span>
                                <input type="number" name="post_code" value="{{ $addr->post_code }}"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Pin Code" />
                                @error('post_code')
                                    <p style="color:red;font-size:12px">{{ '*' . $message }}</p>
                                @enderror
                            </label>
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">State Code:</span>
                                <input type="numer" name="scode" value="{{  $addr->state_code }}"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="State Code" />
                                @error('scode')
                                    <p style="color:red;font-size:12px">{{ '*' . $message }}</p>
                                @enderror
                            </label>
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">City Code:</span>
                                <input type="number" name="citycode" value="{{  $addr->city_code }}"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="City code" />
                                @error('City code')
                                    <p style="color:red;font-size:12px">{{ '*' . $message }}</p>
                                @enderror
                            </label>
                            <br>
                        </div>
                        <button type="submit"
                            class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Submit
                        </button>
                        <button type="button" onclick="history.back()"
                            class="px-5 py-3 font-medium leading-5 text-black transition-colors duration-150 bg-gray-400 border border-transparent rounded-lg active:bg-gray-500 hover:bg-gray-400 focus:outline-none focus:shadow-outline-gray">
                            <i class="fa fa-angle-double-left"></i> Back
                        </button>
                        @endforeach
                        </form>
                </main>
            </div>
        </div>
    </body>
@endsection

</html>
