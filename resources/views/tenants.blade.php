<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tenants') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Here are the list of Tenants: 
                </div>
            </div>

            @forelse ($tenant as $tenant)
                <div class="py-3 text-gray-900 mt-3 pl-3">
                    <a href="http://{{ $tenant->domain->domain }}:8000"><b>Domain: </b>{{ $tenant->domain->domain }}:8000</a>
                    <h2><b>{{ $tenant->id }}</b></h2>
                    <p><b>Tenant DATA: </b>{{ $tenant->data }}</p>
                    <p><b>Tenant DB NAME: </b>{{ $tenant->tenancy_db_name }}</p>
                    <a href="/dashboard/tenants/delete/{{ $tenant->id }}" class='btn btn-danger'>Delete</a>
                </div>
                @empty
                    <div class="py-3 text-gray-900 mt-3 pl-3">
                        <h2>No Tenants</h2>
                    </div>
            @endforelse

        </div>



    </div>
</x-app-layout>
