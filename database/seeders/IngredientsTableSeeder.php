<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IngredientsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('ingredients')->insert([
            ['recipe_id' => 1, 'nama_bahan' => '2 porsi nasi putih; 1 butir telur; 2 siung bawang putih; 1 buah cabai merah; 1 buah wortel; 100 gram ayam suwir; 2 sendok makan kecap manis; minyak goreng; garam; merica'],
            ['recipe_id' => 2, 'nama_bahan' => '4 potong ayam bagian paha; 3 sendok makan madu; 2 sendok makan kecap manis; 1 sendok teh air perasan jeruk nipis; 2 siung bawang putih; garam; merica; minyak zaitun'],
            ['recipe_id' => 3, 'nama_bahan' => '500 gram ayam utuh atau bagian dada; 2 liter air; 3 lembar daun salam; 2 batang serai; 4 daun jeruk; 1 ruas lengkuas; 1 sendok teh kunyit bubuk; 1 sendok teh ketumbar bubuk; 3 siung bawang putih; 5 butir bawang merah; 2 butir kemiri; 1 sendok teh garam; 1/2 sendok teh merica; 2 sendok makan minyak goreng; 1 sendok makan kecap manis; 1 batang daun bawang; 1 batang seledri; 2 buah telur rebus; 100 gram taoge; 100 gram kol iris tipis; kerupuk; sambal; jeruk nipis'],
            ['recipe_id' => 4, 'nama_bahan' => '2 buah mangga matang; 1/2 cangkir yogurt plain; 1 sendok makan madu; es batu; air matang'],
            ['recipe_id' => 5, 'nama_bahan' => '500 gram ayam potong; 1 ruas jahe; 1 batang daun seledri; 2 siung bawang putih; 1 wortel; 1 buah kentang; garam; merica; air'],
            ['recipe_id' => 6, 'nama_bahan' => '1 cangkir tepung terigu; 2 sendok makan gula pasir; 1 sendok teh baking powder; 1 butir telur; 1/2 cangkir susu cair; 2 sendok makan cokelat bubuk; mentega cair; minyak goreng'],
            ['recipe_id' => 7, 'nama_bahan' => '500 gram daging sapi; 1 liter air; 3 sendok makan bawang putih cincang; 100 gram mie kunir; 1 batang sawi hijau'],
            ['recipe_id' => 8, 'nama_bahan' => '200 ml susu; 100 gram coklat batangan; 50 gram gula pasir; es krim dasar'],
            ['recipe_id' => 9, 'nama_bahan' => '1 adonan pizza; 100 gram saus tomat; 150 gram keju mozzarella; beberapa lembar daun basil']
        ]);
    }
}

