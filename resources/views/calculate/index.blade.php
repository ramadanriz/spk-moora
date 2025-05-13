<x-app-layout>
    <x-slot name="header">
        
    </x-slot>

    <div class="grid gap-4">
        <div class="container grid gap-7">
            <div class="grid gap-2">
                <h2 class="text-xl font-semibold leading-tight capitalize">
                  {{ __('data siswa') }}
                </h2>
            </div>
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-center">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama Siswa</th>
                            <th scope="col" class="px-6 py-3">Pengetahuan Umum (C1)</th>
                            <th scope="col" class="px-6 py-3">Wawancara (C2)</th>
                            <th scope="col" class="px-6 py-3">PBB (C3)</th>
                            <th scope="col" class="px-6 py-3">Kesehatan (C4)</th>
                            <th scope="col" class="px-6 py-3">Absensi Kehadiran (C5)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 capitalize">
                          <td class="px-6 py-4">{{ $loop->iteration }}</td>
                          <td class="px-6 py-4">{{ $student->name }}</td>
                          <td class="px-6 py-4">{{ $student->knowledge }}</td>
                          <td class="px-6 py-4">{{ $student->interview }}</td>
                          <td class="px-6 py-4">{{ $student->pbb }}</td>
                          <td class="px-6 py-4">{{ $student->physical }}</td>
                          <td class="px-6 py-4">{{ $student->absent }}</td>
                        </tr>
                        @endforeach              
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container grid gap-7">
            <div class="grid gap-2">
                <h2 class="text-xl font-semibold leading-tight capitalize">
                  {{ __('normalisasi') }}
                </h2>
            </div>
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-center">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama Siswa</th>
                            <th scope="col" class="px-6 py-3">Pengetahuan Umum (C1)</th>
                            <th scope="col" class="px-6 py-3">Wawancara (C2)</th>
                            <th scope="col" class="px-6 py-3">PBB (C3)</th>
                            <th scope="col" class="px-6 py-3">Kesehatan (C4)</th>
                            <th scope="col" class="px-6 py-3">Absensi Kehadiran (C5)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($normalizes as $normalize)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 capitalize">
                          <td class="px-6 py-4">{{ $loop->iteration }}</td>
                          <td class="px-6 py-4">{{ $normalize['name'] }}</td>
                          <td class="px-6 py-4">{{ $normalize['c1'] }}</td>
                          <td class="px-6 py-4">{{ $normalize['c2'] }}</td>
                          <td class="px-6 py-4">{{ $normalize['c3'] }}</td>
                          <td class="px-6 py-4">{{ $normalize['c4'] }}</td>
                          <td class="px-6 py-4">{{ $normalize['c5'] }}</td>
                        </tr>
                        @endforeach              
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container grid gap-7">
            <div class="grid gap-2">
                <h2 class="text-xl font-semibold leading-tight capitalize">
                  {{ __('Terbobot') }}
                </h2>
            </div>
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-center">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama Siswa</th>
                            <th scope="col" class="px-6 py-3">Pengetahuan Umum (C1)</th>
                            <th scope="col" class="px-6 py-3">Wawancara (C2)</th>
                            <th scope="col" class="px-6 py-3">PBB (C3)</th>
                            <th scope="col" class="px-6 py-3">Kesehatan (C4)</th>
                            <th scope="col" class="px-6 py-3">Absensi Kehadiran (C5)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($weighted as $weight)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 capitalize">
                          <td class="px-6 py-4">{{ $loop->iteration }}</td>
                          <td class="px-6 py-4">{{ $weight['name'] }}</td>
                          <td class="px-6 py-4">{{ $weight['knowledge'] }}</td>
                          <td class="px-6 py-4">{{ $weight['interview'] }}</td>
                          <td class="px-6 py-4">{{ $weight['pbb'] }}</td>
                          <td class="px-6 py-4">{{ $weight['physical'] }}</td>
                          <td class="px-6 py-4">{{ $weight['absent'] }}</td>
                        </tr>
                        @endforeach              
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container grid gap-7">
            <div class="grid gap-2">
                <h2 class="text-xl font-semibold leading-tight capitalize">
                  {{ __('hasil') }}
                </h2>
            </div>
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-center">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama Siswa</th>
                            <th scope="col" class="px-6 py-3">Total</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $result)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 capitalize">
                          <td class="px-6 py-4">{{ $loop->iteration }}</td>
                          <td class="px-6 py-4">{{ $result['name'] }}</td>
                          <td class="px-6 py-4">{{ $result['total'] }}</td>
                          <td class="px-6 py-4">{{ $result['total'] >= 0.5 ? 'Lolos' : 'Gagal' }}</td>
                        </tr>
                        @endforeach              
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>