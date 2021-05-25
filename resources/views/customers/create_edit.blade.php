@extends('layouts.app')

@section('title')
    Customers
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-4">
            <form method="post" action="{{ $customer->exists ? route('customers.update', $customer->id) : route('customers.store') }}">
                @csrf
                @if($customer->exists)
                    @method('PUT')
                @endif
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="first_name" value="{{old('first_name', $customer->first_name)}}" name="first_name" class="form-control" id="first_name">
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="last_name" value="{{old('last_name', $customer->last_name)}}" name="last_name" class="form-control" id="last_name">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" value="{{old('email', $customer->email)}}" name="email" class="form-control" id="email">
                </div>

                <div class="mb-3">
                    <label for="tel_number" class="form-label">Telephone Number</label>
                    <input type="tel_number" value="{{old('tel_number', $customer->tel_number)}}" name="tel_number" class="form-control" id="tel_number" onkeypress="validate(event)" maxlength="10" minlength="10">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection

<script>
    function validate(evt) {
        var theEvent = evt || window.event;

        // Handle paste
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
            // Handle key press
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>
