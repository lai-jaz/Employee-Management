<x-app-layout>
    <?php
        $tableData = "p-3";
        $tableHeader = "px-3 bg-white py-2";
        $thStyle = "position: sticky; top:0;";
    ?>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>

        <!--- search form --->
        <div class="grid justify-end">
            <form method="POST" action="{{ route('employee.search') }}" class="flex">
            @csrf
            <x-text-input type="search" placeholder="Search" name="search" value="{{ request('search') }}" />
            <x-secondary-button type="submit" class="mx-3 bg-purple-200 hover:bg-purple-300"> Go! </x-secondary-button>
            </form>
        </div>
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-4 lg:px-4">
        @if($employees->isEmpty())
            <p>{{__('No employees found.')}}</p>
        @else
            <div>
                <!--- table to display the employee database --->
                <table class="table-auto">
                    <thead>
                        <tr class="divide-y divide-y-reverse">
                        <th class="{{ $tableHeader }}"style=" {{ $thStyle }} "></th>
                        <th class="{{ $tableHeader }}"style=" {{ $thStyle }} ">ID</th>
                        <th class="{{ $tableHeader }}"style=" {{ $thStyle }} ">Name</th>
                        <th class="{{ $tableHeader }}"style=" {{ $thStyle }} ">Salary</th>
                        <th class="{{ $tableHeader }}"style=" {{ $thStyle }} "> Dept</th>
                        <th class="{{ $tableHeader }}"style=" {{ $thStyle }} ">Email</th>
                        <th class="{{ $tableHeader }}"style=" {{ $thStyle }} ">Phone</th>
                        <th class="{{ $tableHeader }}"style=" {{ $thStyle }} ">Address</th>
                        <th class="{{ $tableHeader }}"style=" {{ $thStyle }} ">DOB</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                        <tr class="odd:bg-white even:bg-purple-100 text-sm">
                            
                            <!--- edit and delete buttons --->
                            <td class="{{ $tableData }}">
                            <form action="{{ route('employees.edit', $employee) }}"> 
                                @csrf
                                <x-secondary-button class="bg-slate-50 hover:bg-violet-200 h-7" style="margin:auto; display:block; width:100%" type="submit">
                                <i class="fa-solid fa-pencil fa-1x"></i>
                                </x-secondary-button>
                            </form>
                            <form method="POST" action="{{ route('employees.destroy', $employee) }}" class="mt-2"> 
                                @csrf
                                @method('DELETE')
                                <x-secondary-button class="bg-red-300 hover:bg-red-400 h-7" style="margin:auto; display:block; width:100%" type="submit" onclick="return confirm('Are you sure?')">
                                <i class="fa-solid fa-trash"></i>
                                </x-secondary-button>
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
            </div>

            <div class="mt-3 mb-5 pagination">
            <!-- display pagination links -->
                {{ $employees->links('vendor.pagination.tailwind') }}
            </div>
            @endif
            
        </div> 
    </div>
</x-app-layout>
