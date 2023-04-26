<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">           
                {{-- cuadro con contador de usuario @comentario --}}
                <div class=" text-center rounded shadow-xl hover:shadow-md mb-12 p-4 bg-white border-2 border-slate-950">
                  <div class="flex items-center">
                    <div class="flex ">
                      <span class=" bg-gray-200 rounded-md p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase text-primary">
                            <span class="material-symbols-outlined">
                            group
                            </span>
                        </svg>
                      </span>
                    </div>
                    <div class="flex-1  ml-4 text-sm text-center">
                      <p class="font-bold mb-3">ARE</p>
                      <div class="flex items-center justify-between mb-3">
                        <h4 class="font-bold text-3xl flex-grow mb-0">
                          <span x-data="animatedCounter({{ $cus }}, 200, 0)" x-init="updatecounter" x-text="Math.round(current)"></span>
                        </h4>
                      </div>
                      <p class="text-muted text-truncate mb-0">USERS REGISTRED</p>
                    </div>
                  </div>
                  @can('user.index')    
<a href="{{ route("user.index") }}">
    <button  class="inline-flex items-center px-4 py-2  bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" >
        See or look up users
    </button>
</a>
@endcan
            </div>              
            {{-- cuadro con contrado de palabras @comentario --}}
          <div class="text-center rounded shadow-xl hover:shadow-md mb-12  p-4 bg-white border-2 border-slate-950">
          <div class="flex items-center">
          <div class="flex ">
          <span class=" bg-gray-200 rounded-md p-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase text-primary">
          <span class="material-symbols-outlined">
          sort_by_alpha
          </span>
          </svg>
          </span>
          </div>
          <div class="flex-1  ml-4 text-sm text-center">
          <p class="font-bold mb-3"> WE HAVE 
          </p>
          <div class="flex items-center justify-between mb-3">
          <h4 class="font-bold text-3xl flex-grow mb-0">
          <span x-data="animatedCounter({{ $cws }}, 200, 0)" x-init="updatecounter" x-text="Math.round(current)"></span>
          </h4>
          </div>
          <p class="text-muted text-truncate mb-0">WORDS REGISTRED</p>
          </div>
          </div>
                            @can('word.create')
                  <a href="{{ route("word.create") }}">
                      <button  class="inline-flex items-center px-4 py-2 mb-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" >
                          Create a new word 
                      </button>
                  </a>
                  @endcan


          <a href="{{ route("word.index") }}">
          <button  class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" >
          See or look up words
          </button>
          </a>
          </div>
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
