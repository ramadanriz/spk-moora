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
                            {{ __('input nilai siswa:') }} {{ $student_list->name }}
                        </h2>
                    </header>
                    <form method="POST" action="/student-list/{{ $student_list->student_id_number }}" class="mt-6 space-y-6">
                        @method('put')
                        @csrf
                        <div class="space-y-2">
                            <x-form.label for="student_id_number" :value="__('Nomor Induk Siswa')"/>
                            <x-form.input id="student_id_number" name="student_id_number" type="number" class="block w-full" :value="old('student_id_number', $student_list->student_id_number)" required autofocus autocomplete="student_id_number" disabled/>
                            <x-form.error :messages="$errors->get('student_id_number')" />
                        </div>

                        <div class="space-y-2">
                            <x-form.label for="name" :value="__('Nama Siswa')"/>
                            <x-form.input id="name" name="name" type="text" class="block w-full" :value="old('name', $student_list->name)" required autofocus autocomplete="name" disabled/>
                            <x-form.error :messages="$errors->get('name')" />
                        </div>
    
                        <div class="space-y-2">
                            <x-form.label for="gender" :value="__('Jenis Kelamin')"/>
                            <select name="gender" id="gender" class="block w-full py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring focus:ring-yellow-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1 dark:text-gray-300 dark:focus:ring-offset-dark-eval-1" disabled>
                                <option value="laki-laki" {{ $student_list->gender == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="perempuan" {{ $student_list->gender == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <x-form.label for="class" :value="__('Kelas')"/>
                            <select name="class" id="class" class="block w-full py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring focus:ring-yellow-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1 dark:text-gray-300 dark:focus:ring-offset-dark-eval-1" disabled>
                                <option value="10" {{ $student_list->class == '10' ? 'selected' : '' }}>10</option>
                                <option value="11" {{ $student_list->class == '11' ? 'selected' : '' }}>11</option>
                                <option value="12" {{ $student_list->class == '12' ? 'selected' : '' }}>12</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <x-form.label for="major" :value="__('Jurusan')"/>
                            <select name="major" id="major" class="block w-full py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring focus:ring-yellow-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1 dark:text-gray-300 dark:focus:ring-offset-dark-eval-1" disabled>
                                <option value="Teknik Mesin" {{ $student_list->major == 'Teknik Mesin' ? 'selected' : '' }}>Teknik Mesin</option>
                                <option value="Teknik Komputer Jaringan dan Telekomunikasi" {{ $student_list->major == 'Teknik Komputer Jaringan dan Telekomunikasi' ? 'selected' : '' }}>Teknik Komputer Jaringan dan Telekomunikasi</option>
                                <option value="Teknik Otomotif" {{ $student_list->major == 'Teknik Otomotif' ? 'selected' : '' }}>Teknik Otomotif</option>
                                <option value="Teknik Ketenagalistrikan" {{ $student_list->major == 'Teknik Ketenagalistrikan' ? 'selected' : '' }}>Teknik Ketenagalistrikan</option>
                            </select>
                        </div>
    
                        <div class="space-y-2">
                            <x-form.label for="knowledge" :value="__('Nilai Pengetahuan Umum')"/>
                            <x-form.input id="knowledge" name="knowledge" type="number" class="block w-full" :value="old('knowledge', $student_list->knowledge)" required autocomplete="knowledge"/>            
                            <x-form.error :messages="$errors->get('knowledge')" />
                        </div>

                        <div class="space-y-2">
                            <x-form.label for="interview" :value="__('Nilai Wawancara')"/>
                            <x-form.input id="interview" name="interview" type="number" class="block w-full" :value="old('interview', $student_list->interview)" required autocomplete="interview"/>            
                            <x-form.error :messages="$errors->get('interview')" />
                        </div>

                        <div class="space-y-2">
                            <x-form.label for="pbb" :value="__('Nilai PBB')"/>
                            <x-form.input id="pbb" name="pbb" type="number" class="block w-full" :value="old('pbb', $student_list->pbb)" required autocomplete="pbb"/>            
                            <x-form.error :messages="$errors->get('pbb')" />
                        </div>

                        <div class="space-y-2">
                            <x-form.label for="physical" :value="__('Nilai Kesehatan')"/>
                            <x-form.input id="physical" name="physical" type="number" class="block w-full" :value="old('physical', $student_list->physical)" required autocomplete="physical"/>            
                            <x-form.error :messages="$errors->get('physical')" />
                        </div>

                        <div class="space-y-2">
                            <x-form.label for="absent" :value="__('Total Ketidak Hadiran')"/>
                            <x-form.input id="absent" name="absent" type="number" class="block w-full" :value="old('absent', $student_list->absent)" required autocomplete="absent"/>            
                            <x-form.error :messages="$errors->get('absent')" />
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