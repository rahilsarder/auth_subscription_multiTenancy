<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tenants') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        
        <form action='/users/add' method="POST">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
                <div class="mt-2">

                    <x-label >Name</x-label>  
                    <x-input type='text' name='name' placeholder='Name' class="mt-2 px-3"/>
                </div>
                <div class="mt-2">
                <x-label>Email</x-label>
                <x-input type='text' name='email' placeholder='Email' class="mt-2 px-3"/>
                <x-label>Password</x-label>
                <x-input type='text' name='password' placeholder='Password' class="mt-2 px-3"/>
                
            </div>
            @csrf
            <x-button type='submit' class='mt-3'>Create</x-button>
            </div>
        </form>



        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Here are the list of Users under tenant: 
                </div>
            </div>

           @forelse ($users as $user)
               Name: {{ $user }}
               @empty
                No Tenants
           @endforelse

        </div>


    </div>
</x-app-layout>
