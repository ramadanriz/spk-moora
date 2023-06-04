<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Data kriteria') }}
            </h2>
            <a href="/category/create" class="py-2 px-3 rounded-lg text-white bg-indigo-500 shadow-lg hover:bg-indigo-600">Input Data kriteria</a>
        </div>
    </x-slot>

    @if($categories->count())
    <div class="overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
          <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700">
              <tr class="text-center">
                  <th scope="col" class="px-6 py-3">No</th>
                  <th scope="col" class="px-6 py-3">Nama Kriteria</th>
                  <th scope="col" class="px-6 py-3">Tipe</th>
                  <th scope="col" class="px-6 py-3">Bobot</th>
                  <th scope="col" class="px-6 py-3">action</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 text-center capitalize">
              <td class="px-6 py-4">{{ $loop->iteration }}</td>
              <td class="px-6 py-4 {{ $category->category_name == 'pbb' ? 'uppercase' : '' }}">{{ $category->category_name }}</td>
              <td class="px-6 py-4">{{ $category->type }}</td>
              <td class="px-6 py-4">{{ $category->weight }}</td>
              <td class="px-6 py-4 flex justify-around">
                <a href="/category/{{ $category->id }}/edit"><x-heroicon-o-pencil-square class="flex-shrink-0 w-6 h-6 hover:text-blue-500" aria-hidden="true" /></a>
                <form action="/category/{{ $category->id }}" method="POST">
                    @method('delete')
                    @csrf
                    <button onclick="return confirm('Anda ingin menghapus data ini?')" value="{{ $category->id }}"><x-heroicon-o-trash class="flex-shrink-0 w-6 h-6 hover:text-red-500" aria-hidden="true" /></button>
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
</x-app-layout>
