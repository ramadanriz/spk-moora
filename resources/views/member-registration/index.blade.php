<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-xl font-semibold leading-tight capitalize">
                    {{ __('Pendaftaran Anggota OSIS') }}
                </h2>
                <p>Status Pendaftaran: {{ $students->count() ? 'Terdaftar' : 'Belum Terdaftar' }}</p>
            </div>
            @if($students->count())
            @foreach ($students as $student)
            <a href="/member-registration/{{ $student->id }}/edit"  class="py-2 px-3 rounded-lg text-white bg-yellow-500 shadow-lg hover:bg-yellow-600">Edit Data</a>
            @endforeach
            @else
            <a href="/member-registration/create" class="py-2 px-3 rounded-lg text-white bg-indigo-500 shadow-lg hover:bg-indigo-600">Daftar Sekarang</a>
            @endif
        </div>
    </x-slot>

    @if($students->count())
    <div class="space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800 capitalize">
            <div class="grid md:grid-cols-2 text-sm">
                @foreach ($students as $student)
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
                @endforeach
            </div>
        </div>
    </div>
    @endif
</x-app-layout>