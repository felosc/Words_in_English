    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
        </x-slot>

<div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
        <div class="flex items-center justify-center">     
          <table class="border border-slate-900">
            <thead>
              <tr >
                  <th class="border border-slate-900 ... bg-slate-200">NAME id</th>
                  <th class="border border-slate-900 ... bg-slate-200">NAME USER</th>
                  <th class="border border-slate-900 ... bg-slate-200">EMAIL USER</th>
                  <th class=" border-slate-900 ... bg-slate-200" colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>    
              @foreach ($users as $user )
               
              <tr>
                  <td class="bg-cyan-200 border border-slate-700 ... text-center">{{$user->id}}</td>
                  <td class="bg-cyan-200 border border-slate-700 ... text-center">{{$user->name}}</td>
                  <td class="bg-red-200 border border-slate-700 ... text-center">{{$user->email}}</td>              
                    <td class="bg-indigo-200 border border-slate-700 ... text-center">                   
                          <a href="{{route('user.show', $user->id)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-0.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Show</a>
                  </td>
                          <td class="bg-indigo-200 border border-slate-700 ... text-center">
                            
                            <a href="{{route('user.edit', $user->id)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-0.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</a>
                          </td>
                          <td class="bg-indigo-200 border border-slate-700 ... text-center">
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
                </div>
            </div>
      </div>             

 </x-app-layout>  