<!DOCTYPE html>
<html>
    <head>
        <title>Laporan Barang Keluar Klikit Toys</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body>
        <h3 class="text-center">
            Laporan Barang Keluar Klikit Toys
        </h3>
        <p class="text-dark">Barang Keluar</p>
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>Nama (Barang)</th>
                    <th>Nama Pembeli</th>
                    <th>Tanggal Keluar</th></th>
                    <th>Jumlah</th></th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangOut as $item)
                <tr>
                    <td class="text-dark">{{ $item->barang->nama_barang }}</td>
                    <td class="text-dark">{{ $item->nama_pembeli }}</td>
                    <td class="text-dark">{{ date('j F Y', strtotime($item->tanggal_keluar)) }}</td>
                    <td class="text-dark">{{ $item->jumlah }}</td>
                    <td class="text-dark">{{ $item->status }}</td>
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
        <p align="left" style="margin-left: 470px" id="tanggal" class="mb-5">Jambi, {{tgl_indo(date('Y-m-d')) }}</p>
        <p align="left" class="mt-2" style="margin-left: 470px">Pemilik </p>
    </body>
</html>