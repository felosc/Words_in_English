<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Add a New Word') }}
        </h2>
    </x-slot>
    
    <div class="max-w-lg mx-auto mt-5 text-center">
    @if (session('success'))
    <div id="alert-dismissible" class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
        <span class="font-medium">{{ session('success') }}</span>
    </div>
        @endif
        @if (session('fail'))
        <div id="alert-dismissible" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
            <span class="font-medium">{{ session('fail') }}</span>
        </div>
        @endif
    </div>
    <div class="p-6 mt-10 max-w-sm mx-auto bg-gray-500 rounded-xl shadow-lg flex-row items-center">
        <form action="{{ route('word.store') }}" method="post">
            @csrf
            <div>
                <x-input-label class="font-bold text-cyan-50 text-center " for="new_word" :value="__('New Word')" />
                <x-text-input id="new_word" name="new_word" type="text" class="mt-1 block w-full text-center" autocomplete="new-word" />
            </div>
            <div>
                <x-input-label class="font-bold text-cyan-50 text-center" for="new_word_spanihs" :value="__('New Word In Spanish ')" />
                <x-text-input id="new_word_spanish" name="new_word_spanish" type="text" class="mt-1 block w-full text-center" autocomplete="new-word" />
            </div>            
            <div class="text-center">
                <button type="submit" class="m-4 p-2 bg-white rounded-lg hover:bg-sky-300">
                    Save New Word
                </button>
            </div>
        </form>
</div>

<!---
        <button  class=" bg-blue-100 text-center m-2 p-3 rounded-sm hover:bg-sky-300 " >
            <a href="">hola</a>
        </button>
----->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $("#alert-dismissible").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert-dismissible").alert('close');
        });

        $('[data-toggle="tooltip"]').tooltip({
            trigger : 'hover'
        });
    });
</script>
</x-app-layout>
