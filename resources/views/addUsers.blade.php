<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tenants') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3 pl-3">
            <form action="/users/add" method="POST">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <x-label for='name'>Name</x-label>
                    <x-input type='text' name='name' placeholder='Name of Client' />
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
                    <x-label for='email'>Email</x-label>
                    <x-input type='email' name='email' placeholder='Email Address....' />
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
                    <x-label for='password'>Password</x-label>
                    <x-input type='password' name='password' placeholder='Enter your password' />
                </div>
                
                <div class="mt-2">
                    @csrf
                    
                    <x-button type='submit'>Submit</x-button>
                </div>
            </form>
        </div>



        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Here are the list of Users under tenant: 
                </div>
            </div>
            <div class="my-3">
                
                @forelse ($users as $user)
                    <p> <b>ID:</b> {{ $user->id }} </p>
                    <p><b>Name:</b>{{ $user->name }}</p>
                     <p><b>Email:</b> {{ $user->email  }}</p>
                    @empty
                     No Users
                @endforelse
            </div>

        </div>


    </div>
</x-app-layout>
