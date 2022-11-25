

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('WordEnglisGame') }}
        </h2>
    </x-slot>

    <div class="p-6 mt-10 max-w-sm mx-auto bg-gray-500 rounded-xl shadow-lg flex-row items-center space-x-4">
        <div class=" text-center rounded-lg p-10">
            <h5 class="text-2xl font-bold text-white">{{ $wordtoguess }}</h5>
        </div>

@foreach ($getwords as $word )
        <div class=" bg-blue-100 text-center m-2 p-3 rounded-sm hover:bg-sky-300 ">
            <a href="#" >
                {{$word}}
            </a>
        </div>
@endforeach

</div>
</x-app-layout>


