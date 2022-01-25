<?php

require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class MockDataTest extends TestCase
{
    function testmakeMockDataMhs()
    {
        $faker = Faker\Factory::create();
        $faker->seed(1234);

        for ($i = 0; $i < 10; $i++) {
            $nim = $faker->numberBetween(18000, 18999);
            $mockMahasiswa[] = [
                'nim' => $nim,
                'nama' => $faker->name(),
                'IPK' => $faker->randomFloat(2, 0, 4),
                'tanggal' => $faker->dateTime()
            ];
        }
    }
}
