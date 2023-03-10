<x-guest-layout>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf
        <!-- Email Address -->
        <div>
            <x-label for="email" :value="__('Correo')" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-label for="password" :value="__('Contraseña')" />

            <x-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex justify-between my-5">
            <x-link :href="route('register')">
                Crear cuenta
            </x-link>
            
            <x-link :href="route('password.request')">
                Olvidaste tu contraseña
            </x-link>
        </div>
        
        <x-button class="w-full justify-center">
            {{ 'Iniciar Session' }}
        </x-button>
    </form>
</x-guest-layout>
