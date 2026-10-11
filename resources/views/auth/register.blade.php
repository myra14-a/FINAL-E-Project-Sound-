<x-guest-layout>
    <div class="auth-heading">
        <h1>Create Account</h1>
        <p>Join SOUND and discover music & videos</p>
    </div>

    @if ($errors->any())
        <div class="auth-errors">
            <strong>Please fix the following:</strong>
            <ul style="margin:7px 0 0 18px;padding:0;">
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="auth-field">
            <label class="auth-label" for="name">Name <span class="auth-required">*</span></label>
            <input id="name" class="auth-input" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Your full name">
        </div>

        <div class="auth-field">
            <label class="auth-label" for="username">User ID <span class="auth-required">*</span></label>
            <input id="username" class="auth-input" type="text" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Choose a unique user ID">
        </div>

        <div class="auth-field">
            <label class="auth-label" for="address">Address <span class="auth-required">*</span></label>
            <input id="address" class="auth-input" type="text" name="address" value="{{ old('address') }}" required autocomplete="street-address" placeholder="Your address">
        </div>

        <div class="auth-field">
            <label class="auth-label" for="phone">Phone Number <span class="auth-required">*</span></label>
            <input id="phone" class="auth-input" type="text" name="phone" value="{{ old('phone') }}" required autocomplete="tel" placeholder="03XX XXXXXXX">
        </div>

        <div class="auth-field">
            <label class="auth-label" for="email">Email <span class="auth-required">*</span></label>
            <input id="email" class="auth-input" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="you@example.com">
        </div>

        <div class="auth-field">
            <label class="auth-label" for="password">Password <span class="auth-required">*</span></label>
            <input id="password" class="auth-input" type="password" name="password" required autocomplete="new-password" placeholder="Create a password">
        </div>

        <div class="auth-field">
            <label class="auth-label" for="password_confirmation">Confirm Password <span class="auth-required">*</span></label>
            <input id="password_confirmation" class="auth-input" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat your password">
        </div>

        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <label class="auth-check" style="align-items:flex-start;">
                <input type="checkbox" name="terms" id="terms" required style="margin-top:3px;">
                <span>I agree to the <a class="auth-link" target="_blank" href="{{ route('terms.show') }}">Terms of Service</a> and <a class="auth-link" target="_blank" href="{{ route('policy.show') }}">Privacy Policy</a>.</span>
            </label>
        @endif

        <div class="auth-row">
            <a class="auth-link" href="{{ route('login') }}">Already registered?</a>
            <button class="auth-button" type="submit"><i class="fa fa-user-plus"></i>&nbsp; Register</button>
        </div>
    </form>
</x-guest-layout>
