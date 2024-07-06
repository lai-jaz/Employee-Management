<x-app-layout>
    <?php
        $tableData = "p-3";
    ?>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search Results for: ') }} {{ $searchKeyword }}
        </h2>

        <!--- search form --->
        <div class="grid justify-end">
            <form method="POST" action="{{ route('employee.search') }}" class="flex">
            @csrf
            <x-text-input type="search" placeholder="Search" name="search" value="{{ request('search') }}" />
            <x-secondary-button type="submit" class="mx-3"> Go! </x-secondary-button>
            </form>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-4">

            <div>
            @if($searchResults->isEmpty())
                <div>
                    {{__('No results found.')}}
                </div>
            @else
                <!--- table to display the search results --->
                <table class="table-auto">
                    <thead>
                        <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Salary</th>
                        <th>Department</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Date Of Birth</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($searchResults as $employee)
                        <tr class="odd:bg-white even:bg-slate-200">
                            
                            <!--- edit and delete buttons --->
                            <td class="{{ $tableData }}">
                            <form action="{{ route('employees.edit', $employee) }}"> 
                                @csrf
                                <x-secondary-button style="margin:auto; display:block; width:100%" type="submit">Edit</x-secondary-button>
                            </form>
                            <form method="POST" action="{{ route('employees.destroy', $employee) }}" class="mt-2"> 
                                @csrf
                                @method('DELETE')
                                <x-secondary-button style="margin:auto; display:block; width:100%" type="submit" onclick="return confirm('Are you sure?')">Delete</x-secondary-button>
                            </form>
                            </td>

                            <td  class="{{ $tableData }}"> {{ $employee->empID }} </td>
                            <td  class="{{ $tableData }}"> {{ $employee->fName }} {{ $employee-> lName}} </td>
                            <td  class="{{ $tableData }}"> {{ $employee->salary }} </td>
                            <td  class="{{ $tableData }}"> {{ $employee->Department }} </td>
                            <td  class="{{ $tableData }}"> {{ $employee->email }} </td>
                            <td  class="{{ $tableData }}"> {{ $employee->phoneNo }} </td>
                            <td  class="{{ $tableData }}"> {{ $employee->address }} </td>
                            <td  class="{{ $tableData }}"> {{ $employee->DOB }} </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table> 
                @endif
            </div>
            
        </div> 
    </div>
</x-app-layout>
