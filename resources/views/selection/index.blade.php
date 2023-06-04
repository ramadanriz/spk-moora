<x-app-layout>
    <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight capitalize">
        {{ __('hasil seleksi') }}
    </h2>
    </x-slot>

    <div class="grid gap-4">
        <div class="container grid gap-7">
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