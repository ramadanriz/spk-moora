<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Data Peserta') }}
            </h2>
            <a href="/participant/create" class="py-2 px-3 rounded-lg text-white bg-indigo-500 shadow-lg hover:bg-indigo-600">Input Data Peserta</a>
        </div>
    </x-slot>

    @if($participants->count())
    <div class="overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
          <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700">
              <tr class="text-center">
                  <th scope="col" class="px-6 py-3">No</th>
                  <th scope="col" class="px-6 py-3">Nomor Peserta</th>
                  <th scope="col" class="px-6 py-3">Nama Peserta</th>
                  <th scope="col" class="px-6 py-3">action</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($participants as $index => $participant)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 text-center">
              <td class="px-6 py-4">{{ $participants->firstItem() + $index }}</td>
              <td class="px-6 py-4">{{ $participant->registration_number }}</td>
              <td class="px-6 py-4">{{ $participant->name }}</td>
              <td class="px-6 py-4 flex justify-around">
                <x-heroicon-o-eye class="flex-shrink-0 w-6 h-6 hover:text-green-500 cursor-pointer" aria-hidden="true" x-data="" x-on:click.prevent="$dispatch('open-modal', '{{ $participant->id }}')" />
                <x-modal name="{{ $participant->id }}" focusable>                    
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                            <span class="tracking-wide">Detail Peserta</span>
                        </div>
                        <div class="text-gray-700 text-left">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Nama</div>
                                    <div class="px-4 py-2">{{ $participant->name }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Nomor Peserta</div>
                                    <div class="px-4 py-2">{{ $participant->registration_number }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Jenis Kelamin</div>
                                    <div class="px-4 py-2">{{ $participant->gender }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Asal Sekolah</div>
                                    <div class="px-4 py-2">{{ $participant->school }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Tempat, Tanggal Lahir</div>
                                    <div class="px-4 py-2">{{ $participant->birth_place }}, {{ $participant->birth_date }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-modal>
                <a href="/participant/{{ $participant->id }}/edit"><x-heroicon-o-pencil-square class="flex-shrink-0 w-6 h-6 hover:text-blue-500" aria-hidden="true" /></a>
                <form action="/participant/{{ $participant->id }}" method="POST">
                    @method('delete')
                    @csrf
                    <button onclick="return confirm('Anda ingin menghapus data ini?')" value="{{ $participant->id }}"><x-heroicon-o-trash class="flex-shrink-0 w-6 h-6 hover:text-red-500" aria-hidden="true" /></button>
                  </form>
              </td>
          </tr>
          @endforeach              
          </tbody>
      </table>
    </div>

    @else
    <p class="text-center text-lg">Tidak ada Data</p>
    @endif

    {{ $participants->links() }}
</x-app-layout>
