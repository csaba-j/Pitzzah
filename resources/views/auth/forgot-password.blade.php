<x-guest-layout>
    <div class="mb-4 text-sm lg:text-base text-center my-8 lg:my-16">
        {{ __('Amennyiben elfelejtette a jelszavát, az e-mail címének megadása után egy e-mailt küldünk Önnek a további teendőkkel.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="mx-16 lg:mx-80">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Jelszócsere e-mail küldése') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
