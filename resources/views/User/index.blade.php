    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
        </x-slot>



<!-- FFFFFF!!!!!!!!!!! me gano una tabla no soy capaz de ponerle media cueries V: --->

<div class=" py-12 flex items-center justify-center">
          <table class="md:table-fixed py-12 bg-gray-200 rounded-lg border-separate border-spacing-2">
            <thead>
              <tr >
                  <th class="">NAME ID</th>
                  <th class="">NAME USER</th>
                  <th class="max-[600px]:hidden">EMAIL USER</th>
                  <th class="" colspan="3">ACTIONS</th>
                </tr>
            </thead>
            <tbody>    
              @foreach ($users as $user )
               
              <tr>
                  <td class="text-center">{{$user->id}}</td>
                  <td class="text-center">{{$user->name}}</td>
                  <td class="max-[600px]:hidden">{{$user->email}}</td>              
                    <td class="">                   
                          <a href="{{route('user.show', $user->id)}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Show</a>
                  </td>
                          <td class="max-[600px]:hidden">
                            
                            <a href="{{route('user.edit', $user->id)}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Edit</a>
                          </td>
                          <td class="max-[600px]:hidden">
                            <form action="{{ route('user.delete',$user->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Delete</button>
                              </form>
                          </td>                
              </tr>
              @endforeach
      </tbody>
    </table>

</div>



               

 </x-app-layout>  