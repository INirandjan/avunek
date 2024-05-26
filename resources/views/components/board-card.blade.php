@props(['board'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$board->logo ? asset('storage/' . $board->logo) : asset('/images/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/boards/{{$board->id}}">{{$board->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$board->company}}</div>
            <x-board-tags :tagsCsv="$board->tags" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> 
                {{$board->location}}
            </div>
        </div>
    </div>
</x-card>