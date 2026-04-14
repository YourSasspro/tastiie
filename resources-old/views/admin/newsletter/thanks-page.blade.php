@extends('layouts.guest')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100" style="background-color: #f4f4f4;">
        <div class="text-center p-5"
            style="background-color: #fff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 400px; width: 100%;">
            <h2 class="text-primary" style="font-size: 2.5rem; font-weight: bold;">Thank You!</h2>
            <p class="text-muted" style="font-size: 1.2rem;">Your subscription was successful. We appreciate your support!</p>
            <a href="{{ route('index') }}" class="btn btn-primary btn-lg"
                style="background-color: #000248; border-color: #000248; padding: 10px 20px; font-size: 1.1rem; text-transform: uppercase; border-radius: 25px;">Back
                to Home</a>
        </div>
    </div>
@endsection
