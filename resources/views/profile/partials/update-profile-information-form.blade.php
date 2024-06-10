<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="nama_customer" :value="__('Nama')" />
            <x-text-input id="nama_customer" name="nama_customer" type="text" class="mt-1 block w-full" :value="old('nama_customer', $user->nama_customer)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('nama_customer')" />
        </div>

        <div>
            <x-input-label for="telp_customer" :value="__('Telepon')" />
            <x-text-input id="telp_customer" name="telp_customer" type="text" class="mt-1 block w-full" :value="old('telp_customer', $user->telp_customer)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('telp_customer')" />
        </div>

        <div>
            <x-input-label for="email_customer" :value="__('Email')" />
            <x-text-input id="email_customer" name="email_customer" type="email_customer" class="mt-1 block w-full" :value="old('email_customer', $user->email_customer)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email_customer')" />

            <!-- ignore bagian ini, kita tidak memakai fitur ini -->
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
