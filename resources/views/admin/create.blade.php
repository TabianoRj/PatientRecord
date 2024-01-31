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
        <div class="max-w-7xl max-l-12xl mx-auto sm:px-6 lg:px-8">
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
    <form  method="post" action="{{route('patient.store')}}">
        @csrf
        @method('post')
        <div class="row justify-content-between text-left">
            <label >Name</label>
            <input type="text" name="name" placeholder="Full Name" />
        </div>
        <div class="form-horizontal">
            <label for="exampleFormControlInput1">Email</label>
            <input id="exampleFormControlInput1" type="email" name="email" placeholder="example@gmail.com" />
        </div >
        <div class="form-horizontal">
            <label>Birthdate</label>
            <input type="date" name="date" />
        </div >
        <div class="form-horizontal">
            <label>Time</label>
            <input type="time" name="time" />
        </div >
        <div class="form-horizontal" >
            <div>
                <input class="form-check-input" type="radio" name="sex" value="male">
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" value="female">
                <label class="form-check-label" for="female">Female</label>
            </div>
            </div>
        <div class="form-horizontal">
            <label>Age</label>
            <input type="number" name="age" />
        </div >
        <div class="form-horizontal">
            <label>Address</label>
            <input type="string" name="time" />
        </div >
        <div class="form-horizontal">
            <label>Mother's Name</label>
            <input type="text" name="mother_name" />
        </div >
        <div class="form-horizontal">
            <label>Mother's Phone Number</label>
            <input type="tel" name="mother_phone" />
        </div >
        <div class="form-horizontal">
            <label>Father's Name</label>
            <input type="text" name="father_name" />
        </div >
        <div class="form-horizontal">
            <label>Father's Phone Number</label>
            <input type="tel" name="father_phone" />
        </div >
            <input type="submit" value="Save a New Patient Record" />
        </div>
    </form>
            </div>
        </div>
    </div>
</x-app-layout>
