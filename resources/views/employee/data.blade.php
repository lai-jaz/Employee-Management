<x-app-layout>
    <?php
        $tableData = "p-4";
    ?>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div>
                <table class="table-auto">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Date Of Birth</th>
                        <th>Salary</th>
                        <th>Department</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                        <tr class="odd:bg-white even:bg-slate-200">
                            <td  class="{{ $tableData }}"> {{ $employee->empID }} </td>
                            <td  class="{{ $tableData }}"> {{ $employee->fName }} {{ $employee-> lName}} </td>
                            <td  class="{{ $tableData }}"> {{ $employee->email }} </td>
                            <td  class="{{ $tableData }}"> {{ $employee->phoneNo }} </td>
                            <td  class="{{ $tableData }}"> {{ $employee->address }} </td>
                            <td  class="{{ $tableData }}"> {{ $employee->DOB }} </td>
                            <td  class="{{ $tableData }}"> {{ $employee->salary }} </td>
                            <td  class="{{ $tableData }}"> {{ $employee->Department }} </td>
                            <td class="{{ $tableData }}"><a href="{{ route('employees.edit', $employee) }}">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>

                </table> 
            </div>
            
        </div> 
    </div>
</x-app-layout>
