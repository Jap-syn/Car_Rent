@include('layouts.frontend.header')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/frontend/images/30.jpg');" data-stellar-background-ratio="0.5">
<div class="overlay"></div>
</section>
<section class="ftco-section contact-section">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"style="box-shadow:2px 2px 2px 2px grey;">
                <div class="card-header" style="background-color:black;color:wheat;">Reset Password</div>

                <div class="card-body"> 
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="color:black;">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit"  class="btn btn-warning">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@include('layouts.frontend.footer')