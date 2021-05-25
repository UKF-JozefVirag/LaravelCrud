@extends('layouts.app')

@section('title')
    Rents
@endsection

@section('content')


    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <form method="POST" action="{{ $rent->exists ? route('rents.update', $rent->id) : route('rents.store') }}">
                @csrf
                @if($rent->exists)
                    @method('PUT')
                @endif
                <div class="mb-3">
                    <label for="from" class="form-label">From</label>
                    <input type="from" value="{{old('from', $rent->from)}}" name="from" class="form-control" id="from">
                </div>

                <div class="mb-3">
                    <label for="to" class="form-label">To</label>
                    <input type="to" value="{{old('to', $rent->to)}}" name="to" class="form-control" id="to">
                </div>

                <div class="mb-3">
                    <label for="Sportsground_idSportsground" class="form-label">Sportsground</label>
                    <select name="Sportsground_idSportsground" id="Sportsground_idSportsground" class="mb-3">
                        @unless($rent->exists)
                            <option selected></option>
                        @endunless
                        @foreach($sportsgrounds as $sportsground)
                            <option
                                value="{{ $sportsground->id }}"{{ $sportsground->id === old('Sportsground_idSportsground',$rent->Sportsground_idSportsground ?? '') ? 'selected' : ''}}>
                                {{ $sportsground->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="Customer_idCustomer" class="form-label">Customer</label>
                    <select name="Customer_idCustomer" id="Customer_idCustomer" class="mb-3">
                        @unless($rent->exists)
                            <option selected></option>
                        @endunless
                        @foreach($customers as $customer)
                            <option
                                value="{{ $customer->id }}"{{ $customer->id === old('Customer_idCustomer',$rent->Customer_idCustomer ?? '') ? 'selected' : ''}}>
                                {{ $customer->first_name." ".$customer->last_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="decimal" min="0" value="{{old('price', $rent->price)}}" name="price"
                           class="form-control" id="price">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>

@endsection

<!-- Jquery date picker -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
      integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous"/>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
        integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>


<script>
    //Allow to pick date from calendar
    $(function () {
        $("#from").datepicker();
    });

    // Allow to pick date from calendar
    $(function () {
        $("#to").datepicker();
    });

    // Allow to search in input fields
    $(document).ready(function () {
        $('select').selectize({
            sortField: 'text'
        });
    });
</script>


