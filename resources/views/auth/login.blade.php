<style class="css">
.login-left-container{
      text-align: left;
  padding: 10px 40px;
}
.login-right-container {
  position: absolute;
  top: 0%;
  left: 60%;
  width: 40%;
  height: 50%;
  background: white;
  
}
.login-right-container h1 {
bottom:30px;
text-align: left;
padding: 10px 40px;
}
.login-right-container h1::before {
  content: "";
  position: absolute;
  top: 11%;
  height: 3px;
  width: 90px;
  border-radius: 5px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}
.login-description {
  position: absolute;
  text-align: center;
  top: 30%;
  left: 3%;
  color: white;
  margin-right: 50%;
  font-size:20px;
}

</style>
<div class="login-left-container d-flex">
<div>
    <img src="images/login.jpg" style="width: 50%; height: 752px" ; /></div>
      <!-- <h1 class="login-title">Saffai</h1> -->
      <h2 class="login-description" >
        <!-- Join the scrap selling revolution and help make a positive impact on the -->
        <!-- planet -->
</div>
<div class="login-right-container">
    <h1>Login</h1>
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
</div>  