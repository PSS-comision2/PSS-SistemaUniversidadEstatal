<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        <div class="div" style="opacity: 50%; font-size: 40px">
                Universidad Estatal
            </div>
            <div class="div" style="opacity: 50%; font-size: 18px; text-align: center;">
                Profesor
            </div>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('profesor.login') }}">
            @csrf

            <!-- legajo -->
            <div>
                <x-label for="legajo" :value="__('Legajo')" />

                <x-input id="legajo" class="block mt-1 w-full" type="integer" name="legajo" :value="old('legajo')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Contraseña')" />

                <x-input id="password" class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Ingresar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
