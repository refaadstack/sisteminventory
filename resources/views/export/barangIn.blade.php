<!DOCTYPE html>
<html>
    <head>
        <title>Laporan Barang Klikit Toys</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body>
        <h3 class="text-center">
            Laporan Barang Klikit Toys
        </h3>
        <p class="text-dark">Barang Masuk</p>
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>Nama (Barang)</th>
                    <th>Nama Supplier</th>
                    <th>Tanggal Masuk</th></th>
                    <th>Jumlah</th></th>
                    <th>Di input oleh</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangIn as $item)
                <tr>
                    <td class="text-dark">{{ $item->barang->nama_barang }}</td>
                    <td class="text-dark">{{ $item->supplier->nama_supplier }}</td>
                    <td class="text-dark">{{ date('j F Y', strtotime($item->tanggal_masuk)) }}</td>
                    <td class="text-dark">{{ $item->jumlah }}</td>
                    <td class="text-dark">{{ $item->user->name }}</td>
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