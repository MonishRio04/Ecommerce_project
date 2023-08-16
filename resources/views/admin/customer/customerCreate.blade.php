@extends('admin.layout.headerandfooter')
@section('admincontent')
            <main class="h-full pb-16 overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">

                    </h2>
                    <!-- CTA -->


                    <!-- General elements -->
                    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                        Add new Customer
                    </h4>
                    {{-- <form action="{{ route() }}" method="post"> --}}
                        {!! Form::open(['method'=>'POST','url'=>route('customer.store'),'files'=>true,'enctype'=>'multipart/form-data']) !!}
                        {{-- <form method="POST" url={{ route("category.store")}}> --}}
                        @csrf
                    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Name:</span>
                            <input type="text" name="name" value="{{ old("name") }}"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="Name" />
                                @error('name')
                                <p style="color:red;font-size:12px">{{ '*'.$message }}</p>
                            @enderror
                        </label>
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Email:</span>
                            <input type="email" name="email" value="{{ old("email") }}"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="Email" />
                                @error('email')
                                <p style="color:red;font-size:12px">{{ '*'.$message }}</p>
                            @enderror
                        </label>
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                             Password:
                            </span>
                            {!! Form::password('password',["class" => "block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"])!!}
                            @error('password')
                            <p style="color:red;font-size:12px">{{ '*'.$message }}</p>
                            @enderror
                        </label>
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                             Select image:
                            </span>
                            {!! Form::file('file',["class" => "block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"])!!}
                            @error('file')
                            <p style="color:red;font-size:12px">{{ '*'.$message }}</p>
                            @enderror
                        </label>
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                              Role:
                            </span>
                            {!! Form::select('role',$userrole, 'customer', ["class" => "block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"])!!}
                            @error('role')
                            <p style="color:red;font-size:12px">{{ '*'.$message }}</p>
                            @enderror
                        </label><br>
                    </div>
                    <button type="submit"
                    class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Submit
                  </button>
                  <button type="button" onclick="history.back()"
                            class="px-5 py-3 font-medium leading-5 text-black transition-colors duration-150 bg-gray-400 border border-transparent rounded-lg active:bg-gray-500 hover:bg-gray-400 focus:outline-none focus:shadow-outline-gray">
                            <i class="fa fa-angle-double-left"></i> Back
                        </button>
                  </form>
            </main>
        </div>
    </div>
</body>
@endsection
</html>
