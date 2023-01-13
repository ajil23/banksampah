<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">Istana Sumber Suci</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: {{ $data->id }}</span> <br>
                    <span>Tangal:{{ date('Y-m-d : H:i:s', strtotime($data->created_at)) }}</span> <br>
                    <span>Alamat: Desa Tambong, Kec.Kabat, Banyuwangi - 68461</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Detail Pembelian</th>
                <th width="50%" colspan="2">Detail Pelanggan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>ID Pesanan:</td>
                <td>{{ $data->id }}</td>

                <td>Nama Lengkap:</td>
                <td>{{ $data->nasabah->penduduk->namaLengkap }}</td>
            </tr>
            <tr>
                <td>Tanggal Pesan:</td>
                <td> {{ $data->tgl_transaksi }}</td>

                <td>No Telepon:</td>
                <td>{{ $data->nasabah->penduduk->no_hp }}</td>
            </tr>
            <tr>
                <td>Status Pesanan:</td>
                <td>Lunas</td>

                <td>Alamat:</td>
                <td>{{ $data->nasabah->penduduk->alamat }}</td>
            </tr>
        </tbody>
    </table>
    <br>
    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Pesanan
                </th>
            </tr>
            <tr class="bg-blue">
                <th>No</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="10%">1</td>
                <td width="10%">
                    {{ $data->keterangan_pembelian }}
                </td>
                <td width="10%">Rp {{ number_format($data->nominal) }}</td>
                <td width="10%">1</td>
                <td width="15%" class="fw-bold">Rp {{ number_format($data->nominal) }}</td>
            </tr>
            <tr>
                <td colspan="4" class="total-heading">Total :</td>
                <td colspan="1" class="total-heading">Rp {{ number_format($data->nominal) }}</td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Terimakasih karena telah menjadi nasabah KSM Istana Sumber Suci😊
    </p>
</body>
</html>

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        .container {
            width: 300px;
        }
        .header {
            margin: 0;
            text-align: center;
        }
        h2, p {
            margin: 0;
        }
        .flex-container-1 {
            display: flex;
            margin-top: 10px;
        }
        .flex-container-1 > div {
            text-align : left;
        }
        .flex-container-1 .right {
            text-align : right;
            width: 200px;
        }
        .flex-container-1 .left {
            width: 100px;
        }
        .flex-container {
            width: 300px;
            display: flex;
        }
        .flex-container > div {
            -ms-flex: 1;  /* IE 10 */
            flex: 1;
        }
        ul {
            display: contents;
        }
        ul li {
            display: block;
        }
        hr {
            border-style: dashed;
        }
        a {
            text-decoration: none;
            text-align: center;
            padding: 10px;
            background: #00e676;
            border-radius: 5px;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header" style="margin-bottom: 30px;">
            <h2>Istana Sumber Suci</h2>
            <small>Desa Tambong, Kec.Kabat, Banyuwangi - 68461
            </small>
        </div>
        <hr>
        <div class="flex-container-1">
            <div class="left">
                <ul>
                    <li>Id Tagihan</li>
                    <li>Nama Nasabah</li>
                    <li>Tanggal</li>
                </ul>
            </div>
            <div class="right">
                <ul>
                    <li> {{ $data->id }} </li>
                    <li> {{ $data->nasabah->penduduk->namaLengkap }} </li>
                    <li> {{ date('Y-m-d : H:i:s', strtotime($data->created_at)) }} </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="flex-container" style="margin-bottom: 10px; text-align:right;">
            <div style="text-align: left;">Jenis Transaksi</div>
            <div>Total</div>
        </div>
            <div class="flex-container" style="text-align: right;">
                <div style="text-align: left;"> {{ $data->keterangan_pembelian }}</div>
                <div>Rp {{ number_format($data->nominal) }} </div>
            </div>
        <hr>
        <div class="flex-container" style="text-align: right; margin-top: 10px;">
            <div></div>
            <div>
                <ul>
                    <li>Grand Total</li>
                    
                </ul>
            </div>
            <div style="text-align: right;">
                <ul>
                    <li>Rp {{ number_format($data->nominal) }} </li>
                   
                </ul>
            </div>
        </div>
        <hr>
        <div class="header" style="margin-top: 50px;">
            <h3>Terimakasih</h3>
            <p>Silahkan berkunjung kembali</p>
        </div>
    </div>
</body>
</html> --}}