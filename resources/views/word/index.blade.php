

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('WordEnglisGame') }}
        </h2>
    </x-slot>

    <div class="p-6 mt-10 max-w-sm mx-auto bg-gray-900 rounded-xl shadow-lg flex-row items-center space-x-4">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">{{ $wordtoguess }}</h5>

@foreach ($getwords as $word )

    <a href="#" class=" basis-1/3 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    {{$word}}
    </a>
@endforeach

</div>
</x-app-layout>


