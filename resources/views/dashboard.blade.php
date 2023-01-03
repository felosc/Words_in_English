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
                    You're logged in!
                            <button  class=" bg-blue-100 text-center m-2 p-3 rounded-sm hover:bg-sky-300 " >
            <a href="{{ route("word.create") }}">hola</a>
        </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
