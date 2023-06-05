

    {{-- <div class="grid gap-4">
        <div class="container grid gap-7">
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-center">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama Siswa</th>
                            <th scope="col" class="px-6 py-3">Total Nilai</th>
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
    </div> --}}

<!-- CSS Code: Place this code in the document's head (between the 'head' tags) -->
<style>
    table.GeneratedTable {
      
    }
    
    table.GeneratedTable td, table.GeneratedTable th {
      
    }
    
    table.GeneratedTable thead {
      
    }
    </style>
    
    <h2 style="text-align: center; font-size: 18px; text-transform: uppercase; letter-spacing: 1px; padding: 30px 0;">Hasil Seleksi Anggota OSIS SMK PGRI 2 Jombang</h2>
    <table class="GeneratedTable" style="width: 100%; background-color: #ffffff; border-collapse: collapse; border-width: 2px; border-color: #000000; border-style: solid; color: #000000;">
      <thead style="background-color: #ffffff;">
        <tr>
          <th style="border-width: 2px; border-color: #000000; border-style: solid; padding: 3px;">No.</th>
          <th style="border-width: 2px; border-color: #000000; border-style: solid; padding: 3px;">Nama</th>
          <th style="border-width: 2px; border-color: #000000; border-style: solid; padding: 3px;">Nilai</th>
          <th style="border-width: 2px; border-color: #000000; border-style: solid; padding: 3px;">Hasil</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($results as $result)
        <tr>
          <td style="border-width: 2px; border-color: #000000; border-style: solid; padding: 3px; text-transform: capitalize;">{{ $loop->iteration }}</td>
          <td style="border-width: 2px; border-color: #000000; border-style: solid; padding: 3px; text-transform: capitalize;">{{ $result['name'] }}</td>
          <td style="border-width: 2px; border-color: #000000; border-style: solid; padding: 3px; text-transform: capitalize;">{{ $result['total'] }}</td>
          <td style="border-width: 2px; border-color: #000000; border-style: solid; padding: 3px; text-transform: capitalize;">{{ $result['total'] >= 0.5 ? 'Lolos' : 'Gagal' }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
    