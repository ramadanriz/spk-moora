<x-app-layout>
    <x-slot name="header">
        
    </x-slot>

    @php
        $incomplete = collect($students)->contains(function ($student) {
            return is_null($student->knowledge) ||
                is_null($student->interview) ||
                is_null($student->pbb) ||
                is_null($student->physical) ||
                is_null($student->absent);
        });
    @endphp

    @if ($incomplete)
    <div class="text-center text-xl font-semibold mt-10">
        Nilai belum dimasukkan
    </div>
    @else
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
                            @php
                                $absentValue = $student->absent;
                                if ($absentValue == 0) {
                                    $absentDisplay = 0;
                                } elseif ($absentValue >= 1 && $absentValue <= 2) {
                                    $absentDisplay = 50;
                                } elseif ($absentValue >= 3 && $absentValue <= 4) {
                                    $absentDisplay = 75;
                                } elseif ($absentValue >= 5) {
                                    $absentDisplay = 100;
                                } else {
                                    $absentDisplay = '-';
                                }
                            @endphp
                            <td class="px-6 py-4">{{ $absentDisplay}}</td>
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
            <div class="flex justify-between">
                <h2 class="text-xl font-semibold leading-tight capitalize">
                  {{ __('hasil') }}
                </h2>
                @if($results)
                <a href="/selection/print_pdf" target="_blank" class="py-2 px-3 rounded-lg text-white bg-indigo-500 shadow-lg hover:bg-indigo-600">Cetak Data</a>
                @endif
            </div>
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-center">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nama Siswa</th>
                            <th scope="col" class="px-6 py-3">Total</th>
                            <th scope="col" class="px-6 py-3">Ranking</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $result)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 capitalize">
                          <td class="px-6 py-4">{{ $result['name'] }}</td>
                          <td class="px-6 py-4">{{ $result['total'] }}</td>
                          <td class="px-6 py-4">{{ $result['ranking']}}</td>
                        </tr>
                        @endforeach              
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

    
</x-app-layout>