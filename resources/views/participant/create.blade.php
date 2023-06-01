<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight capitalize">
                {{ __('data peserta') }}
            </h2>
        </div>
    </x-slot>

    <div class="space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium capitalize">
                            {{ __('input data peserta') }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Input biodata peserta.") }}
                        </p>
                    </header>
                    <form method="POST" action="/participant" class="mt-6 space-y-6">
                        @csrf
                        <div class="space-y-2">
                            <x-form.label for="registration_number" :value="__('Nomor Peserta')"/>
                            <x-form.input id="registration_number" name="registration_number" type="text" class="block w-full" :value="old('registration_number')" required autofocus autocomplete="registration_number"/>
                            <x-form.error :messages="$errors->get('registration_number')" />
                        </div>

                        <div class="space-y-2">
                            <x-form.label for="name" :value="__('Nama Peserta')"/>
                            <x-form.input id="name" name="name" type="text" class="block w-full" :value="old('name')" required autofocus autocomplete="name"/>
                            <x-form.error :messages="$errors->get('name')" />
                        </div>
    
                        <div class="space-y-2">
                            <x-form.label for="gender" :value="__('Jenis Kelamin')"/>
                            <select name="gender" id="gender" class="block w-full py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring focus:ring-yellow-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1 dark:text-gray-300 dark:focus:ring-offset-dark-eval-1">
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
    
                        <div class="space-y-2">
                            <x-form.label for="school" :value="__('Asal Sekolah')"/>
                            <x-form.input id="school" name="school" type="text" class="block w-full" :value="old('school')" required autocomplete="school"/>            
                            <x-form.error :messages="$errors->get('school')" />
                        </div>
    
                        <div class="space-y-2">
                            <x-form.label for="birth_place" :value="__('Tempat Lahir')"/>
                            <x-form.input id="birth_place" name="birth_place" type="text" class="block w-full" :value="old('birth_place')" required autocomplete="birth_place"/>            
                            <x-form.error :messages="$errors->get('birth_place')" />
                        </div>
    
                        <div class="space-y-2">
                            <x-form.label for="birth_date" :value="__('Tanggal Lahir')"/>
                            <x-form.input id="birth_date" name="birth_date" type="date" class="block w-full" :value="old('birth_date')" required autocomplete="birth_date"/>            
                            <x-form.error :messages="$errors->get('birth_date')" />
                        </div>
    
                        <div class="flex items-center gap-4">
                            <x-button type="submit">{{ __('Save') }}</x-button>
                        </div>
                    </form>
                </section>             
            </div>
        </div>
    </div>
</x-app-layout>