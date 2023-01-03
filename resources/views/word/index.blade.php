<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('HELLO THESE ARE ALL THE WORDS') }}
        </h2>
    </x-slot>
    
    <div class="max-w-lg mx-auto mt-5 text-center grid grid-cols-3">
        @foreach ($getwords as $word )
        <div class="bg-sky-500 m-2 rounded-md hover:bg-sky-300">
            <p>{{ $word->word }}</p>
            <p>{{ $word->w_spanish }}</p>
        </div>
        @endforeach
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