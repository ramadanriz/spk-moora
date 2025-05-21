<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight capitalize">
            {{ __('data siswa') }}
        </h2>
    </x-slot>

    <div class="space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium capitalize">
                            {{ __('input data siswa') }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Input biodata siswa.") }}
                        </p>
                    </header>
                    <form method="POST" action="/student" class="mt-6 space-y-6">
                        @csrf
                        <div class="space-y-2">
                            <x-form.label for="student_id_number" :value="__('Nomor Induk Siswa')"/>
                            <x-form.input id="student_id_number" name="student_id_number" type="number" class="block w-full" :value="old('student_id_number')" required autofocus autocomplete="student_id_number"/>
                            <x-form.error :messages="$errors->get('student_id_number')" />
                        </div>

                        <div class="space-y-2">
                            <x-form.label for="name" :value="__('Nama Siswa')"/>
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
                            <x-form.label for="class" :value="__('Kelas')"/>
                            <select name="class" id="class" class="block w-full py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring focus:ring-yellow-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1 dark:text-gray-300 dark:focus:ring-offset-dark-eval-1">
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <x-form.label for="major" :value="__('Jurusan')"/>
                            <select name="major" id="major" class="block w-full py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring focus:ring-yellow-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1 dark:text-gray-300 dark:focus:ring-offset-dark-eval-1">
                                <option value="Teknik Mesin">Teknik Mesin</option>
                                <option value="Teknik Komputer Jaringan dan Telekomunikasi">Teknik Komputer Jaringan dan Telekomunikasi</option>
                                <option value="Teknik Otomotif">Teknik Otomotif</option>
                                <option value="Teknik Ketenagalistrikan">Teknik Ketenagalistrikan</option>
                            </select>
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