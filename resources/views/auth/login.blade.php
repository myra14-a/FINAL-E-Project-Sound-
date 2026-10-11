<x-guest-layout>
    <div class="auth-heading">
        <h1>Welcome Back</h1>
        <p>Login to continue to your SOUND account</p>
    </div>

    @if ($errors->any())
        <div class="auth-errors">
            <strong>Please fix the following:</strong>
            <ul style="margin:7px 0 0 18px;padding:0;">
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    @session('status')
        <div class="auth-status">{{ $value }}</div>
    @endsession

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="auth-field">
            <label class="auth-label" for="email">Email or User ID <span class="auth-required">*</span></label>
            <input id="email" class="auth-input" type="text" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Enter email or user ID">
        </div>

        <div class="auth-field">
            <label class="auth-label" for="password">Password <span class="auth-required">*</span></label>
            <input id="password" class="auth-input" type="password" name="password" required autocomplete="current-password" placeholder="Enter password">
        </div>

        <label class="auth-check">
            <input id="remember_me" type="checkbox" name="remember">
            <span>Remember me</span>
        </label>

        <div class="auth-row">
            @if (Route::has('password.request'))
                <a class="auth-link" href="{{ route('password.request') }}">Forgot your password?</a>
            @endif
            <button class="auth-button" type="submit"><i class="fa fa-sign-in"></i>&nbsp; Log in</button>
        </div>
    </form>

    <div class="auth-divider"></div>
    <div class="auth-footer">Don't have an account? <a class="auth-link" href="{{ route('register') }}">Create Account</a></div>
</x-guest-layout>
