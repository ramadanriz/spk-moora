
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
          <th style="border-width: 2px; border-color: #000000; border-style: solid; padding: 3px;">Nama</th>
          <th style="border-width: 2px; border-color: #000000; border-style: solid; padding: 3px;">Nilai</th>
          <th style="border-width: 2px; border-color: #000000; border-style: solid; padding: 3px;">Rangking</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($results as $result)
        <tr>
          <td style="border-width: 2px; border-color: #000000; border-style: solid; padding: 3px; text-transform: capitalize;">{{ $result['name'] }}</td>
          <td style="border-width: 2px; border-color: #000000; border-style: solid; padding: 3px; text-transform: capitalize;">{{ $result['total'] }}</td>
          <td style="border-width: 2px; border-color: #000000; border-style: solid; padding: 3px; text-transform: capitalize;">{{ $result['ranking']}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
    