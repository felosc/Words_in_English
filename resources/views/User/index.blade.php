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
                  <th class="">EMAIL USER</th>
                  <th class="" colspan="3">ACTIONS</th>
                </tr>
            </thead>
            <tbody>    
              @foreach ($users as $user )
               
              <tr>
                  <td class="text-center">{{$user->id}}</td>
                  <td class="text-center">{{$user->name}}</td>
                  <td class="">{{$user->email}}</td>              
                    <td class="">                   
                          <a href="{{route('user.show', $user->id)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-0.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Show</a>
                  </td>
                          <td class="">
                            
                            <a href="{{route('user.edit', $user->id)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-0.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</a>
                          </td>
                          <td class="">
                            <form action="{{ route('user.delete',$user->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-0.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Delete</button>
                              </form>
                          </td>                
              </tr>
              @endforeach
      </tbody>
    </table>

</div>



               

 </x-app-layout>  