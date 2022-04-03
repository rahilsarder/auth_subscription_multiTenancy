<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Here are the list of clients: 
                </div>
            </div>

            @foreach ($clients as $client)
                <div class="py-3 text-gray-900 mt-2 pl-3">
                    <h3>{{ $client->name }}</h3>
                    <p><b>Client ID: </b>{{ $client->id }}</p>
                    <p><b>Client Redirect URI: </b>{{ $client->redirect }}</p>
                    <p><b>Client Secret: </b>{{ $client->secret }}</p>
                </div>
            @endforeach
        </div>


        

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3 pl-3">
            <form action="/oauth/clients" method="POST">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <x-label for='name'>Name</x-label>
                    <x-input type='text' name='name' placeholder='Name of Client' />
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
                    <x-label for='redirect'>redirect</x-label>
                    <x-input type='text' name='redirect' placeholder='Redirect Link of Client' />
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
                    Here are the list of Password Grant Clients: 
                </div>
            </div>

            
                <div class="py-3 text-gray-900 mt-2 pl-3 bg-pearl">
                    <h3>{{ $personalClients->name }}</h3>
                    <p><b>Client ID: </b>{{ $personalClients->id }}</p>
                    <p><b>Client Redirect URI: </b>{{ $personalClients->redirect }}</p>
                    <p><b>Client Secret: </b>{{ $personalClients->secret }}</p>
                </div>
            
        </div>

    </div>
</x-app-layout>
