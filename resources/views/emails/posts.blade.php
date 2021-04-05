<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Postingan Baru</title>
</head>

<body>
    <h2>Selamat, akun anda telah berhasil diverifikasi</h2>
    <h4>Berikut ini adalah data akun anda</h4>
    <table style="width: 60%">
        <tr>
            <td>Nama Sekolah</td>
            <td>{{ $nama_sekolah }}</td>
        </tr>
        <tr>
            <td>NPSN</td>
            <td>{{ $npsn }}</td>
        </tr>
        <tr>
            <td>Email Operator Sekolah</td>
            <td>{{ $email }}</td>
        </tr>
        <tr>
            <td>Password</td>
            <td>{{ $password }}</td>
        </tr>
    </table>
    <p>Anda dapat login ke Sistem GSR dengan menggunakan email dan password diatas</p>
</body>

</html>
