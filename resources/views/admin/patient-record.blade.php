<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div>
            <a href="{{route('patient.patient-record')}}">Patient Record</a>
        </div>
        <div>
            <a href="{{route('patient.create')}}">Add Patient Record</a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
    <div>
        
        <table border="1">
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                
            </tr>
            @foreach($patients as $patient)
                <tr>
                    <td>{{$patient->name}}</td>
                    <td>{{$patient->email}}</td>
                    <td>
                        <a href="{{route('patient.edit', ['patient' =>  $patient])}}">Edit</a>
                    </td>
                    <td>
                    <form method="post" action="{{route('patient.delete', ['patient' => $patient])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" />
                    </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
            </div>
        </div>
    </div>
</x-app-layout>
