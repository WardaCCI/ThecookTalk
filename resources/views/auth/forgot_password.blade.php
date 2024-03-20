@extends('base')

@section('content')

<div class="container">

    <div class="d-flex flex-column align-items-center">

        <h1 class="text-center py-4">Authentification</h1>

        <form method="POST" action="{{ route('forgotPassword.post') }}" class="col-sm-4">
            @csrf

            @if(session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }} &#9785;
            </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }} &#128578;
            </div>
            @endif

            <div class="form-group my-2">
                <input type="email" id="email" name="email" placeholder="email" aria-describedby="email_feedback" class="py-3 form-control shadow-none @error('email') is-invalid @enderror" />

                @error('email')
                <div id="email_feedback" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="fw-bold btn btn-success my-2">Envoyer</button>
            </div>
        </form>

    </div>

</div>

@endsection