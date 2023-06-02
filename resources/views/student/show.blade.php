<x-app-layout>
    <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight capitalize">
                {{ __('Detail Data Siswa:') }} {{ $student->name }}
            </h2>
    </x-slot>

    <div class="space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800 capitalize">
            <div class="grid md:grid-cols-2 text-sm">
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Nomor Induk</div>
                    <div class="px-4 py-2">{{ $student->student_id_number }}</div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Nama</div>
                    <div class="px-4 py-2">{{ $student->name }}</div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Kelas</div>
                    <div class="px-4 py-2">{{ $student->class }}</div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Jurusan</div>
                    <div class="px-4 py-2">{{ $student->major }}</div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Jenis Kelamin</div>
                    <div class="px-4 py-2">{{ $student->gender }}</div>
                </div>
                
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Nilai Pengetahuan Umum</div>
                    <div class="px-4 py-2">{{ $student->knowledge }}</div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Nilai Wawancara</div>
                    <div class="px-4 py-2">{{ $student->interview }}</div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Nilai PBB</div>
                    <div class="px-4 py-2">{{ $student->pbb }}</div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold">Nilai Kesehatan</div>
                    <div class="px-4 py-2">{{ $student->physical }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
