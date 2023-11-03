<x-app-layout header="true" :title="__('New user')">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            @if (session("error"))
                <x-alert type="error">
                    {{session("error")}}
                </x-alert>
            @endif
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Create a new user') }}
            </h2>
            <form method="post" action="{{ route('users.store') }}" class="space-y-6 max-w-lg">
                @csrf
                <div>
                    <x-input-label for="name" :value="__('Username')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" autocomplete="username" value="{{old('name')}}" required/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="email" :value="__('E-Mail')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" autocomplete="email" value="{{old('email')}}"  required/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm password')" />
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" required/>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <button type="submit">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
