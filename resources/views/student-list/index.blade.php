<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Data Siswa Terdaftar') }}
            </h2>
            <form action="/student-list">
                <x-form.input-with-icon-wrapper>
                    <x-slot name="icon">
                        <x-heroicon-o-magnifying-glass aria-hidden="true" class="w-5 h-5" />
                    </x-slot>
  
                    <x-form.input withicon id="search" class="block w-full" type="text" name="search" :value="request('search')" placeholder="{{ __('Search') }}" autofocus />
                </x-form.input-with-icon-wrapper>
            </form>
        </div>
    </x-slot>

    @if($students->count())
    <div class="overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
          <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700">
              <tr class="text-center">
                  <th scope="col" class="px-6 py-3">No</th>
                  <th scope="col" class="px-6 py-3">Nomor Induk</th>
                  <th scope="col" class="px-6 py-3">Nama Siswa</th>
                  <th scope="col" class="px-6 py-3">action</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($students as $student)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 text-center capitalize">
                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                <td class="px-6 py-4">{{ $student->student_id_number }}</td>
                <td class="px-6 py-4">{{ $student->name }}</td>
                <td class="px-6 py-4"><a href="/student-list/{{ $student->student_id_number }}" class="hover:underline">Detail</a></td>
            </tr>
          @endforeach              
          </tbody>
      </table>
    </div>

    @else
    <p class="text-center text-lg">Tidak ada Data</p>
    @endif

</x-app-layout>