<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{__('Add Employee')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('employees.store') }}"> 
                        @csrf
                        <div class="flex gap-4"> 
                            <div>
                            <x-input-label for="fName" :value="__('First Name')" />
                            <x-text-input id="fName" class="block mt-1 w-full" type="text" name="fName" required/>
                            </div>

                            <div>
                            <x-input-label for="lName" :value="__('Last Name')" />
                            <x-text-input id="lName" class="block mt-1 w-full" type="text" name="lName" required/>
                            </div>

                            <div>
                            <x-input-label for="DOB" :value="__('Date Of Birth')" />
                            <x-text-input id="DOB" class="block mt-1 w-full" type="date" name="DOB" required/>
                            </div>
                        </div>

                        <div class="mt-5 flex gap-4">
                        <b>{{ __('Employment Details')}}</b>
                        </div>
                        <div class="mt-4 flex gap-4">
                            <div> 
                            <x-input-label for="salary" :value="__('Salary')" />
                            <x-text-input id="salary" class="block mt-1 w-full" type="number" step="1000" name="salary" required/>
                            </div>

                            <div> 
                            <x-input-label for="Department" :value="__('Department')" />
                            <select id="Department" name="Department" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                             name="Department" required/>
                                <option value="" selected> {{__('--Select Department--')}} </option>
                                
                                @foreach(config('departments.departments') as $department)
                                <option value="{{ $department }}">
                                        {{ $department }}
                                    </option>
                                @endforeach

                            </select>
                            </div>

                        </div>

                        <div class="mt-5 flex gap-4">
                        <b>{{ __('Contact Details')}}</b>
                        </div>
                        <div class=" mt-4 flex gap-4"> 
                            <div class="grow">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required
                            pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$"
                            oninvalid="this.setCustomValidity('Enter email in this format: [____]@[___].[___]')" 
                            />
                            </div>

                            <div> 
                            <x-input-label for="phoneNo" :value="__('Phone Number')" />
                            <x-text-input id="phoneNo" class="block mt-1 w-full" type="text" name="phoneNo" required
                            placeholder="XXX-XXX-XXXX" pattern="\d{3}[\-]\d{3}[\-]\d{4}"
                            oninvalid="this.setCustomValidity('Enter phone number in this format: XXX-XXX-XXXX')"/>
                            </div>

                            <div class="grow"> 
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" required/>
                            </div>  
                        </div>
                        
                        <div class="mt-4 flex gap-4">
                            <x-primary-button class="ms-3" type="submit">
                                {{ __('Add') }}
                            </x-primary-button>
                            <x-primary-button class="ms-3" type="reset">
                                {{ __('Clear') }}
                            </x-primary-button>
                        </div> 
                        
                    </form>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
