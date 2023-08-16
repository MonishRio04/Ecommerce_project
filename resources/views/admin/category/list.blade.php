@extends('admin.layout.headerandfooter')
@section('admincontent')
            <main class="h-full pb-16 overflow-y-auto">
                <div class="container grid px-6 mx-auto">
                    <h2
                    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Categories List <a href="{{ route('category.create') }}"class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Add new</a>
                  </h2>
                  @if(Session::has('dlt'))
                  <div class="alert">
                      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                      <strong>!</strong> {{ Session::get('dlt') }}
                    </div>
                  @endif
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">S.no</th>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Parent</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @if (count($category)<=0)
                            <td class="px-4 py-3 text-sm text-center" colspan="5">No records</td>
                            @endif
                            @foreach ($category as $cate)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">{{ $loop->iteration}}</td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div
                                          class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                                        >
                                          <img
                                            class="object-cover w-full h-full rounded-full" name='img'
                                            {{-- src="{{ asset('publc/images/'.$cate->image) }}" --}}
                                            src="storage/images/{{ $cate->image }}"
                                            {{-- src="{{ Storage::disk('public')->get('images/'.$cate->image) }}" --}}

                                            alt="{{ $cate->name }}"
                                            loading="lazy"
                                          />
                                        {{-- <img src="/public/images/{$cate->image}"> --}}
                                          <div
                                            class="absolute inset-0 rounded-full shadow-inner"
                                            aria-hidden="true"
                                          ></div>
                                        </div>
                                        <div>
                                          <p class="font-semibold">{{ $cate->name }}</p>

                                        </div>
                                      </div>
                                    </td>
                               <td class="px-4 py-3 text-sm">
                                    {{ $cate->parent_name->name??'' }}
                                    {{-- {{$parent_category[$cate->parent_id]??''}} --}}
                                  {{-- {{  $category::find($cate->id)->parent_name }} --}}
                                <td class="px-4 py-3 text-xs">

                                    @if ($cate->status==1)
                                    <span id="status"
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:text-red-100 dark:bg-green-700"
                                        ;>
                                        Active
                                    </span>
                                    @else
                                    <span id="status"
                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700"
                                        ;>
                                        InActive
                                    </span>
                                    @endif


                                </td>
                                <style>
                                    #editbtn {
                                        cursor: pointer;
                                    }
                                </style>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a type="submit" id="editbtn" href="{{ route('category.edit',$cate->id) }}"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </a>
                                        <form method="post" action="{{ route('category.destroy',$cate->id )}}">
                                            {{ csrf_field() }}{{ method_field('DELETE') }}
                                            <button type="submit" onclick="return confirm('do you want to delete')"
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Delete">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
                </div>
            </main>
</body>
@endsection

</html>
