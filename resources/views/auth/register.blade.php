<x-guest-layout>
    <x-logo src="{{ asset('storage/img/logo.jpg') }}" class="rounded-full h-24 mx-auto justify-center items-center" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <!-- Name -->
        <div>
            <x-label for="name" :value="__('Nombre')" />

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus placeholder="Nombre" />
        </div>

        <!-- User Name -->
        <div class="mt-4">
            <x-label for="username" :value="__('Nombre de Usuario')" />

            <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" placeholder="Nombre de Usuario" />
        </div>

        <!-- Cedula -->
        <div class="mt-4">
            <x-label for="cedula" :value="__('Cedula')" />

            <x-input id="cedula" class="block mt-1 w-full" type="text" name="cedula" :value="old('cedula')" placeholder="Cedula de identidad" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-label for="email" :value="__('Correo')" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="ejemplo@ejemplo.com" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-label for="role" :value="__('Role de Usuario')" />

            <select name="role" id="role" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">-- Seleccione --</option>
                <option value="2">Administrador</option>
                <option value="3">Tutor</option>
            </select>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-label for="password" :value="__('Contraseña')" />

            <x-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            autocomplete="new-password" placeholder="**********" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

            <x-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" placeholder="**********" />
        </div>

        <div class="flex justify-between my-5">
            <x-link :href="route('login')">
                {{ 'Inicia Session' }}
            </x-link>

            <x-button class="ml-4">
                {{ 'Registrar' }}
            </x-button>
        </div>
    </form>
</x-guest-layout>
