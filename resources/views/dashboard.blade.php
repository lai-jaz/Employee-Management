<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>

            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3">
                <div class="flex p-6 text-gray-900 gap-5">
                    <div>
                    <a href="{{ route('employees.index') }}"> <x-primary-button>See all employees</x-primary-button></a>
                    </div>
                    <div>
                    <a href="{{ route('employees.create') }}"> <x-primary-button>Add new employee</x-primary-button></a>
                    </div>

                </div>

                <!--- search form --->
                <div class="grid mb-6 ml-6">
                    <form method="POST" action="{{ route('employee.search') }}" class="flex">
                    @csrf
                    <x-text-input type="search" placeholder="Search for an employee" name="search" value="{{ request('search') }}" class="w-full"/>
                    <x-secondary-button type="submit" class="mx-3"> Go! </x-secondary-button>
                    </form>
                </div>
            </div>
            
        </div>

        

    </div>



</x-app-layout>
