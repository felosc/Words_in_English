<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Word') }}
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


<div class="p-6 mt-10 max-w-sm mx-auto bg-gray-500 rounded-xl shadow-lg flex-row items-center space-x-4">
   
        <div class=" text-center p-10">
            <h5 class="text-2xl font-bold text-white">{{ $show_word->word }}</h5>
        </div>

        <div class=" text-center p-10">
            <p>Meaning in Spanish</p>
        </div>        

        <div class=" text-center rounded-lg bg-slate-400 p-10">
            <h5 class="text-2xl font-bold text-white">{{ $show_word->w_spanish }}</h5>
        </div>

<div class="">
                <button class="bg-blue-100 text-center m-5 p-3 rounded-sm hover:bg-sky-300">
                    <a href="{{ route('word.edit',$show_word->id) }}">
                        Edit word
                    </a>
                </button>
                <form action="{{ route('word.delete',$show_word->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="bg-blue-100 text-center m-5 p-3 rounded-sm hover:bg-sky-300" >
                        Delete word
                    </button>
                </form>
</div>


    
</div>



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