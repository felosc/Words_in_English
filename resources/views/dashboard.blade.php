<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Welcome to my page about a game of guessing words in English
                </div>
                <button  class=" bg-blue-100 text-center m-2 p-3 rounded-sm hover:bg-sky-300 " >
<a href="{{ route("word.create") }}">Create a new word</a>
</button>

                        <button  class=" bg-blue-100 text-center m-2 p-3 rounded-sm hover:bg-sky-300 " >
<a href="{{ route("word.index") }}">See or look up words</a>
</button>

<p>La base de datos cuenta con palabras</p>
            </div>
        </div>
    </div>
</x-app-layout>
