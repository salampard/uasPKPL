<?php

require '../vendor/autoload.php';

class Mahasiswa
{
    public $dataMhs;
    function createMockDataMahasiswa()
    {
        $faker = Faker\Factory::create();
        $faker->seed(1234);

        for ($i = 0; $i < 10; $i++) {
            $nim = $faker->numberBetween(18000, 18999);
            $mockMahasiswa[] = [
                'nim' => $nim,
                'nama' => $faker->name(),
                'IPK' => $faker->randomFloat(2, 0, 4),
                'tanggal' => $faker->date()
            ];
        }
        return $mockMahasiswa;
    }

    function showMhsSortByIPK()
    {
        $dataMhs = $this->createMockDataMahasiswa();
        echo '<br>';
        for ($i = 0; $i < 9; $i++) {
            if ($dataMhs[$i]['IPK'] >= 3.0) {
                echo 'nim = ' . $dataMhs[$i]['nim'] . '<br>';
                echo 'nama = ' . $dataMhs[$i]['nama'] . '<br>';
                echo 'IPK = ' . $dataMhs[$i]['IPK'] . '<br>';
                echo 'tanggal = ' . $dataMhs[$i]['tanggal'] . '<br>';
            }
        }
    }

    function hitung_umur($tanggal_lahir)
    {
        $birthDate = new DateTime($tanggal_lahir);
        $today = new DateTime("today");
        if ($birthDate > $today) {
            exit("0 tahun 0 bulan 0 hari");
        }
        $y = $today->diff($birthDate)->y;
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;
        return $y . " tahun " . $m . " bulan " . $d . " hari";
    }

    function showAge()
    {
        $dataMhs = $this->createMockDataMahasiswa();
        for ($i = 0; $i < 9; $i++) {
            echo '<br>';
            echo 'nim' . $dataMhs[$i]['nim'] . '<br>';
            echo 'nama' . $dataMhs[$i]['nama'] . '<br>';
            echo 'IPK' . $dataMhs[$i]['IPK'] . '<br>';
            echo 'tanggal' . $dataMhs[$i]['tanggal'] . '<br>';
            echo $this->hitung_umur($dataMhs[$i]['tanggal']) . '<br>';
        }
    }
}



class MataUang
{
    function createMockDataMataUang()
    {
        $faker = Faker\Factory::create();
        $faker->seed(0);

        for ($i = 0; $i < 5; $i++) {
            $mockMataUang[] = [
                'kode_matauang' => $faker->currencyCode(),
                'kursJual' => $faker->numberBetween(10000, 20000),
                'kursBeli' => $faker->numberBetween(10000, 20000)
            ];
        }

        return $mockMataUang;
    }

    function showCurrency()
    {
        $dataCurrency = $this->createMockDataMataUang();
        echo '<br><h3>Nilai Kurs Jual dan Beli per 1 nilai mata uang asing Random dalam Rupiah</h3> <br>';
        for ($i = 0; $i < 5; $i++) {
            echo '<br>';
            echo 'kode_matauang = ' . $dataCurrency[$i]['kode_matauang'] . '<br>';
            echo 'nilai = ' . 1 . '<br>';
            echo 'kursJual = ' . $dataCurrency[$i]['kursJual'] . '<br>';
            echo 'kursBeli = ' . $dataCurrency[$i]['kursBeli'] . '<br>';
        }
    }
}

$data = new Mahasiswa;
$data2 = new MataUang;

$dataMataUang = $data2->createMockDataMataUang();
$dataMhs = $data->createMockDataMahasiswa();

echo '<h3>Data Mahasiswa dengan IPK >= 3.0</h3> <br>';
$data->showMhsSortByIPK();
echo '<br> <h3>Data Mahasiswa beserta dengan umurnya</h3> <br>';
$data->showAge();
echo '</h3>Perbandingan Mata Uang</> <br>';
$data2->showCurrency();
