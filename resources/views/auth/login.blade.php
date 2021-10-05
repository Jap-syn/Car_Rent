@include('layouts.frontend.header')
@yield('content')
    

<section class="ftco-section contact-section" style="background-image: url('/frontend/images/24.jpg');" >
<div class="contaier">
<div class="col-md-5 col-md-offset 7">
<form method="POST" action="{{ route('login') }}" style="margin-top:80px;">
       @csrf
        <div class="form-group">
          <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email">
          @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
         @enderror
 
        </div>
        <div class="form-group">
          <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
          @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
       @enderror
        </div>
        <div class="form-group">
        <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>

        <div class="form-group">
              <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

          @if (Route::has('password.request'))
          <a class="btn btn-link" href="{{ route('password.request') }}">
              {{ __('Forgot Your Password?') }}
          </a>
      @endif

        </div>
      </form>
</div>
</div>
</section>

    
@include('layouts.frontend.footer')