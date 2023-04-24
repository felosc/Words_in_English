<x-app-layout>
            <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Update date of user  {{  $editUser->name }}
            </h2>
        </x-slot>
    <x-auth-card>
                <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>


<form action="{{ route('user.update',$editUser->id) }}" method="POST">
            @csrf
            @method('PUT')
        <div class="mt-4">
            <x-input-label for="name" :value="__('User Name')"/>
            <x-text-input id="name_edit" class="block mt-1 w-full" type="text" name="name_edit" :value="($editUser->name)" required autofocus />
        </div>        
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email User')"/>
            <x-text-input id="email_edit" class="block mt-1 w-full" type="email" name="email_edit" :value="($editUser->email)" required autofocus />
        </div>
              
        <div class="mt-4 text-center"> 

                <x-primary-button>
                    {{ __('Update') }}
                </x-primary-button>               
        </div>
</form>

<div class="mt-4 text-center">               
       <button>
       <a href="{{route('user.index')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">home</a>
     </button>
 </div>

</x-auth-card>
</x-app-layout>