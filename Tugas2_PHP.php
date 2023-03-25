<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM PROSES RINCIAN GAJI</title>
</head>
<body>
    <!-- Styling CSS Internal -->
    <style>
        body {
            background-color: navy;
            color: white;
            margin: 50px;
            padding: 10px;
        }

        h1 {
            text-align: center;
        }

        summary {
            font-size : 24px;
            font-weight: bold;
        }

        details{
            font-size : 18px;}

        table {
            border-collapse: collapse;
            margin: auto;
            font-family: Arial, sans-serif;
            font-size: 18px;
            table-layout: fixed;
            text-align: center; 
            border-style: solid;
            border-color: maroon;
            background-color: #FFFAFA;
            color: black;
        }

        td {
            padding: 10px;
            border: 1px solid black;
            width: 50%;
        }

        input{
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
            font-size: 18px;
        }

        select{
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
            font-size: 18px;
        }
    </style>

    <!-- Bagian Header judul hanya pakai tag HTML -->
    <h1 align='center'>FORM RINCIAN GAJI<br>MENGGUNAKAN PHP</h1>
    <hr color='white'>

    <!-- Bagian tampilan soal hanya pakai tag HTML-->
    <details>
        <summary>SOAL</summary>
        <p>
        Diketahui sebuah perusahaan ingin memasukan rincian gaji ke pegawai dengan menggunakan form proses PHP, dengan rincian sebagai berikut :
        <br>
            <ol type = "1">
                <li>Tentukan gaji pokok menggunakan switch case
                    <ul>
                        <li>Jabatan Manager = Rp 20.000.000</li>
                        <li>Jabatan Asisten Manager = Rp 15.000.000</li>
                        <li>Jabatan Kepala Bagian = Rp 10.000.000</li>
                        <li>Jabatan Staff = Rp 4.000.000</li>
                    </ul>
                </li>
                <li>Tentukan tunjangan jabatan = 20% dari gaji pokok</li>
                <li>Tentukan tunjangan keluarga menggunakan if multi kondisi:
                    <ul>
                        <li>Jika sudah menikah dan anak maksimal 2 = 5% dari gapok</li>
                        <li>Jika sudah menikah dan anak antara 3 - 5 = 10% dari gapok</li>
                        <li>Selain itu belum dapat tunjangan keluarga</li>
                    </ul>
                </li>
                <li>Tentukan gaji kotor</li>
                <li>Tentukan zakat_profesi menggunakan ternary
                    <ul>
                        <li> Jika ia muslim dan gaji kotor minimal 6 juta, ada zakat = 2.5% dari gaji kotor</li>
                        <li>Selain itu tidak ada zakat</li>
                    </ul>
                </li>
                <li>Tentukan take home pay</li>
            </ol>
        </p>
    </details>
    <hr color='white'>

    <!-- Bagian Form Proses -->
    <h2>FORM PROSES</h2>
    <form method="POST">
        <table>
            <tr>
                <td colspan="2" style="font-weight: bold; background-color: gold;">FORM INPUT RINCIAN GAJI</td>
            </tr>
            <tr>
                <td><label for="nama">Nama:</label></td>
                <td><input type="text" id="nama" name="nama" placeholder="Masukan Nama Pegawai" required></td>
            </tr>
            <tr>
                <td><label for="jabatan">Jabatan:</label></td>
                <td><select id="jabatan" name="jabatan" required>
                    <option value="">-Pilih Jabatan-</option>
                    <option value="Manager">Manager</option>
                    <option value="Asisten">Asisten</option>
                    <option value="Kabag">Kabag</option>
                    <option value="Staff">Staff</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Status Nikah:</td>
                <td>
                    <input type="radio" id="menikah" name="status_nikah" value="menikah" required>
                    <label for="menikah">Menikah</label>
                    <input type="radio" id="belum_menikah" name="status_nikah" value="belum_menikah" required>
                    <label for="belum_menikah">Belum Menikah</label>
                </td>
            </tr>
            <tr>
                <td>Jumlah Anak:</td>
                <td><input type="number" name="jumlah_anak" min="0" max="5" placeholder="Masukan Jumlah Anak" required></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>
                    <select name="agama" required>
                    <option value="">- Pilih Agama -</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="hitung" value="HITUNG GAJI"></td>
            </tr>
        </table>
    </form>

    <br>

    <!-- Bagian PHP -->
    <hr color='white'>
    <h2>OUTPUT</h2>

    <!-- Bagian hasil PHP -->
    <?php
    error_reporting(0); //menghilangkan error pada saat proses penginputan data

        //bagian ini memeriksa apakah terdapat data yang dikirim melalui metode POST lalu mengambil nilainya
        if (isset($_POST['hitung'])) {
            $nama = $_POST['nama'];
            $jabatan = $_POST['jabatan'];
            $status_nikah = $_POST['status_nikah'];
            $jumlah_anak = $_POST['jumlah_anak'];
            $agama = $_POST['agama'];

            //bagian ini untuk menghitung gaji pokok berdasarkan jabatan menggunakan switch-case
            switch ($jabatan) {
                case 'Manager':
                    $gaji_pokok = 20000000;
                    break;
                case 'Asisten':
                    $gaji_pokok = 15000000;
                    break;
                case 'Kabag':
                    $gaji_pokok = 10000000;
                    break;
                case 'Staff':
                    $gaji_pokok = 4000000;
                    break;
                default:
                    $gaji_pokok = 0;
            }

            // bagian ini untuk menghitung tunjangan jabatan sebesar 20% dari gaji pokok
            $tunjangan_jabatan = 0.2 * $gaji_pokok;

            // bagian ini untuk menghitung tunjangan keluarga berdasarkan status nikah dan jumlah anak menggunakan if multi kondisi
            if ($status_nikah == 'menikah') {
                if ($jumlah_anak <= 2) {
                    $tunjangan_keluarga = 0.05 * $gaji_pokok;
                } elseif ($jumlah_anak >= 3 && $jumlah_anak <= 5) {
                    $tunjangan_keluarga = 0.1 * $gaji_pokok;
                } else {
                    $tunjangan_keluarga = 0;
                }
            } else {
                $tunjangan_keluarga = 0;
            }

            // bagian ini untuk menghitung gaji kotor, total akumulasi dari gaji pokok, tunjangan jabatan, dan tunjangan keluarga
            $gaji_kotor = $gaji_pokok + $tunjangan_jabatan + $tunjangan_keluarga;

            // bagian ini untuk menghitung zakat profesi menggunakan ternary, 
            // jika agama yang dipilih adalah Islam dan gaji kotor melebihi atau sama dengan 6 juta, maka akan dikenakan zakat profesi sebesar 2.5% dari gaji kotor.  
            // Jika tidak, maka zakat profesi dihitung sebagai 0.
            $zakat_profesi = ($agama == 'Islam' && $gaji_kotor >= 6000000) ? 0.025 * $gaji_kotor : 0;

            // bagian ini untuk menghitung take home pay (gaji bersih), selisih antara gaji kotor dan zakat profesi
            $take_home_pay = $gaji_kotor - $zakat_profesi;

            // bagian ini untuk menampilkan tabel hasil perhitungan gaji
            echo '<table>
                    <tr>
                        <td colspan="2" style="font-weight: bold; background-color: gold;">HASIL PERHITUNGAN RINCIAN GAJI</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>' . $nama . '</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>' . $jabatan . '</td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>' . $agama . '</td>
                    </tr>
                    <tr>
                        <td>Gaji Pokok</td>
                        <td>Rp ' . number_format($gaji_pokok, 0, ',', '.') . '</td>
                    </tr>
                    <tr>
                        <td>Tunjangan Jabatan</td>
                        <td>Rp ' . number_format($tunjangan_jabatan, 0, ',', '.') . '</td>
                    </tr>
                    <tr>
                        <td>Tunjangan Keluarga</td>
                        <td>Rp ' . number_format($tunjangan_keluarga, 0, ',', '.') . '</td>
                    </tr>
                    <tr>
                        <td>Gaji Kotor</td>
                        <td>Rp ' . number_format($gaji_kotor, 0, ',', '.') . '</td>
                    </tr>
                    <tr>
                        <td>Zakat Profesi</td>
                        <td>Rp ' . number_format($zakat_profesi, 0, ',', '.') . '</td>
                    </tr>
                    <tr>
                        <td>Take Home Pay <br> (Gaji Bersih)</td>
                        <td>Rp ' . number_format($take_home_pay, 0, ',', '.') . '</td>
                    </tr>
                    </table>';

        }
    ?>

</body>
</html>