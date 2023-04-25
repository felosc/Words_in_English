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
                @can('word.create')
                <a href="{{ route("word.create") }}">
                    <button  class=" bg-blue-100 text-center m-2 p-3 rounded-sm hover:bg-sky-300 " >
                        Create a new word
                    </button>
                </a>
                @endcan
                
                <a href="{{ route("word.index") }}">
                    <button  class=" bg-blue-100 text-center m-2 p-3 rounded-sm hover:bg-sky-300 " >
                    See or look up words
                </button>
                </a>
                @can('user.index')    
                <a href="{{ route("user.index") }}">
                    <button  class=" bg-blue-100 text-center m-2 p-3 rounded-sm hover:bg-sky-300 " >
                        See or look up users
                    </button>
                </a>
                @endcan
                <p>la base datos cuenta con</p>
<span x-data="animatedCounter({{ $lel }}, 200)" x-init="updatecounter" x-text="Math.round(current)"></span>
<p>palabras</p>
            </div>
        </div>
    </div>

    <script>
  function animatedCounter(targer, time = 200, start = 0) {
    return {
      current: 0,
      target: targer,
      time: time,
      start: start,
      updatecounter: function() {
        start = this.start;
        const increment = (this.target - start) / this.time;
        const handle = setInterval(() => {
          if (this.current < this.target)
            this.current += increment
          else {
            clearInterval(handle);
            this.current = this.target
          }
        }, 1);
      }
    };
  }
</script>
</x-app-layout>
