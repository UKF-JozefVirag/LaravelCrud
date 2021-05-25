@extends('layouts.app')

@section('title')
    Sportsgrounds
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-4">
            <form method="post" action="{{ $sportsground->exists ? route('sportsgrounds.update', $sportsground->id) : route('sportsgrounds.store') }}">
                @csrf
                @if($sportsground->exists)
                    @method('PUT')
                @endif
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="title" value="{{old('title', $sportsground->title)}}" name="title" class="form-control" id="title">
                </div>

                <div class="mb-3">
                    <label for="latitude" class="form-label">Latitude</label>
                    <input type="latitude" value="{{old('latitude', $sportsground->latitude)}}" name="latitude" class="form-control" id="latitude">
                </div>

                <div class="mb-3">
                    <label for="longitude" class="form-label">Longitude</label>
                    <input type="longitude" value="{{old('longitude', $sportsground->longitude)}}" name="longitude" class="form-control" id="longitude">
                </div>

                <div class="mb-3">
                    <label for="area" class="form-label">Area</label>
                    <input type="area" value="{{old('area', $sportsground->area)}}" name="area" class="form-control" id="area">
                </div>



                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
