<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('HELLO THESE ARE ALL THE WORDS') }}
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
    
    <div class=" text-center"> 
        <form action="{{ route('search') }}" method="GET">
            
            <input class="form-control " id="search" name="search" type="search" placeholder="search word..." value="">
            <button type="submit">search</button>
        </form> 
  </div>

  <div class="max-w-lg mx-auto mt-5 text-center grid grid-cols-3" id="show-data">  
  </div>

    
<div class="max-w-lg mx-auto mt-5 text-center grid grid-cols-3" id="index">
    @foreach ($getwords as $word )
        <button>
                <a href="{{ route('word.show',$word->id) }}">
                <div class="bg-sky-500 m-2 rounded-md hover:bg-sky-300 p-4">
                    <p>{{ $word->word }}</p>
                </div>
            </a>
            </button>
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


<script type="text/javascript">

$('#search').on('keyup',function(event){
    $value=$(this).val();
if ($value=="") {
    $('#show-data').hide()
    $('#index').show()
     event.stopPropagation();
        return false;
}else{
    $('#index').hide()
    $.ajax({
        type : 'get',
        url : '{{URL::to('search')}}',
        data:{'search':$value},
        success:function(data){
            $('#show-data').html(data);
        }
    });
}
})
</script>




</x-app-layout>