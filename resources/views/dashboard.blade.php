<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <h2 class="text-xl font-semibold leading-tight">Sistem Pendukung Keputusan Seleksi anggota PASKIBRAKA</h2>
        <p class="mt-2">Sistem Pendukung Keputusan (SPK) penyeleksian anggota paskibraka ini dapat merekomendasikan hasil keputusan kepada panitia seleksi DISPORA Kabupaten Jombang dalam seleksi anggota Paskibraka untuk menjadi perwakilan Kabupaten dalam seleksi di tingkat Provinsi.</p>
    </div>
</x-app-layout>
