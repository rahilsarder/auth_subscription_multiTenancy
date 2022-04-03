<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add a Tenant') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Here you can add a tenant: 
                </div>
            </div>

        <form action="/dashboard/tenants/add" method="POST">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
                <div class="mt-2">

                    <x-label >Tenant Name</x-label>  
                    <x-input type='text' name='id' placeholder='Tenant Name' class="mt-2 px-3"/>
                </div>
                <div class="mt-2">
                <x-label>Tenant Domain</x-label>
                <x-input type='text' name='domain' placeholder='Tenant Domain' class="mt-2 px-3"/>
            </div>
            @csrf
            <x-button type='submit' class='mt-3'>Create</x-button>
            </div>
        </form>
        </div>



    </div>
</x-app-layout>
