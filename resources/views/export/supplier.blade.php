<!DOCTYPE html>
<html>
    <head>
        <title>Laporan Supplier Klikit Toys</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body>
        <h3 class="text-center">
            Laporan Supplier Klikit Toys
        </h3>
        <p class="text-dark">Supplier</p>
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($supplier as $item)
                <tr>
                    <td class="text-dark">{{ $item->nama_supplier }}</td>
                    <td class="text-dark">{{ $item->alamat }}</td>
                    <td class="text-dark">{{ $item->no_telp }}</td>
                    <td class="text-dark">{{ $item->deskripsi }}</td>
                </tr>    
                
                @endforeach
            </tbody>
        </table>
        <br><br><br>
        <?php
        function tgl_indo($tanggal){
            $bulan = array (
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan = explode('-', $tanggal);
            
            // variabel pecahkan 0 = tanggal
            // variabel pecahkan 1 = bulan
            // variabel pecahkan 2 = tahun
        
            return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
        }
    ?>
        <p id="tanggal" class="mb-5">
            <span style="margin-left:10px">Admin yang bertugas</span>
            <span style="margin-left: 330px">Jambi, {{tgl_indo(date('Y-m-d')) }}</span>
        </p>

        <p class="mb-5">
            <span style="margin-left:10px">{{ Auth::user()->name }}</span>
            <span style="margin-left:440px">Pemilik Klikit Toys</span>
        </p>
    </body>
</html>