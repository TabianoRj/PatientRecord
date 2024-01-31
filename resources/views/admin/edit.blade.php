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
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('patient.update', ['patient'=> $patient])}}">
        @csrf
        @method('put')
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Full Name" value="{{$patient->name}}"/>
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" placeholder="example@gmail.com" />
        </div>
            <input type="submit" value="Save a New Patient Record" />
        </div>
    </form>
            </div>
        </div>
    </div>
</x-app-layout>
