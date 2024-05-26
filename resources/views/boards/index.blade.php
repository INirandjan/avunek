<x-layout>
@include('partials._hero')
@include('partials._search')
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

@unless (count($boards) == 0)
    
@foreach ($boards as $board)
    <x-board-card :board="$board"/>
@endforeach

@else
<p>No boards found</p>
@endunless
</div>

<div>
    <div class="mt-6 p-4">
        {{$boards->links()}}
    </div>
</div>
</x-layout>
