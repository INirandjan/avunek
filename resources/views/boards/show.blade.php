<x-layout>
    
           <a href="/" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="mx-4">
                <x-card class="!p-24">
                    <div
                        class="flex flex-col items-center justify-center text-center"
                    >
                        <img
                            class="w-48 mr-6 mb-6"
  src="{{$board->logo ? asset('storage/' . $board->logo) : asset('/images/no-image.png')}}"                            alt=""
                        />

                        <h3 class="text-2xl mb-2">{{$board->title}}</h3>
                        <div class="text-xl font-bold mb-4">{{$board->company}}</div>
                             <x-board-tags :tagsCsv="$board->tags" />
                        <div class="text-lg my-4">
                            <i class="fa-solid fa-location-dot"></i> {{$board->location}}
                        </div>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Job Description
                            </h3>
                            <div class="text-lg space-y-6">
                                {{$board->description}}
                                <a
                                    href="mailto:{{$board->email}}"
                                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-envelope"></i>
                                    Contact Employer</a
                                >

                                <a
                                    href="{{$board->website}}"
                                    target="_blank"
                                    class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-globe"></i> Visit
                                    Website</a
                                >
                            </div>
                        </div>
                    </div>
                </x-card>

                <x-card class="!mt-4 !p-2 !flex !space-x-6">
                    <a href="/boards/{{$board->id}}/edit">
                        <i class="fa-solid fa-pencil">Edit</i>
                    </a>

                    <form method="POST" action="/boards/{{$board->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500">
                            <i class="fa-solid fa-trash">
                                Delete
                            </i>
                        </button>
                    
                    </form>
                </x-card>
            </div>

</x-layout>
