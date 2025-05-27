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
            ['recipe_id' => 9, 'nama_bahan' => '1 adonan pizza; 100 gram saus tomat; 150 gram keju mozzarella; beberapa lembar daun basil'],
            ['recipe_id' => 10, 'nama_bahan' => '200 gram mie telur atau mie instan; 5 buah cabai merah; 5 buah cabai rawit; 3 siung bawang merah; 2 siung bawang putih; 2 sendok makan kecap manis; 1 sendok makan saus tiram; 1 sendok makan kecap asin; 100 gram sawi hijau; 50 gram kol; 100 gram ayam atau udang sesuai selera; bawang goreng untuk taburan.'],
            ['recipe_id' => 11, 'nama_bahan' => '200 gram tepung beras; 500 ml santan; 150 gram gula pasir; pewarna makanan sesuai selera; minyak untuk mengoles loyang.'],
            ['recipe_id' => 12, 'nama_bahan' => '1 kg daging sapi; 500 ml santan kental; 500 ml santan cair; 8 buah cabai merah; 5 siung bawang merah; 5 siung bawang putih; 2 cm jahe; 2 cm lengkuas; 3 lembar daun jeruk; 2 lembar daun salam; 1 batang serai; 2 sendok makan minyak untuk menumis.'],
            ['recipe_id' => 13, 'nama_bahan' => '100 gram kacang panjang; 100 gram kol; 50 gram tauge; 100 gram mentimun; 50 gram terong hijau; 100 gram kacang tanah goreng; 5 buah cabai merah; 2 siung bawang putih; 1 ruas kencur; 50 gram gula merah; 1 sendok teh garam; 2 sendok makan air asam jawa; air secukupnya.'],
            ['recipe_id' => 14, 'nama_bahan' => '500 gram beras; 500 ml santan; 2 lembar daun pandan; 1 batang serai; 2 lembar daun salam; 1 sendok teh garam; ayam goreng, telur dadar, sambal, tempe goreng, dan kerupuk sebagai pelengkap.'],
            ['recipe_id' => 15, 'nama_bahan' => '100 gram kol; 100 gram tauge; 100 gram kacang panjang; 100 gram mentimun; 50 gram terong hijau; 100 gram kacang tanah goreng; 5 buah cabai merah; 2 siung bawang putih; 1 ruas kencur; 50 gram gula merah; 1 sendok teh garam; 2 sendok makan air asam jawa; air secukupnya; kerupuk untuk pelengkap.'],
            ['recipe_id' => 16, 'nama_bahan' => '200 gram mie telur; 100 gram ayam fillet; 2 siung bawang putih; 2 siung bawang merah; 1 sendok makan kecap manis; 1 sendok makan kecap asin; 1 sendok makan saus tiram; 1 batang daun bawang; 100 ml kaldu ayam; 50 gram sawi hijau; bawang goreng untuk taburan.'],
            ['recipe_id' => 17, 'nama_bahan' => '200 gram mie telur; 150 gram ayam cincang; 2 siung bawang putih; 1 siung bawang merah; 1 sendok makan kecap manis; 1 sendok makan kecap asin; 1 sendok makan saus tiram; 1 sendok teh minyak wijen; 100 ml kaldu ayam; 50 gram sawi hijau; bawang goreng; pangsit goreng untuk pelengkap.'],
            ['recipe_id' => 18, 'nama_bahan' => '2 buah alpukat; 100 gram nangka; 100 gram kelapa muda; 100 gram cincau hitam; 200 ml santan; 100 ml gula merah cair; es serut secukupnya.'],
            ['recipe_id' => 19, 'nama_bahan' => '500 ml susu cair; 100 gram gula pasir; 50 gram coklat bubuk; 1 bungkus agar-agar bubuk; 200 ml air.'],
            ['recipe_id' => 20, 'nama_bahan' => '500 gram daging ayam fillet; 20 tusuk sate; 5 sendok makan kecap manis; 2 siung bawang putih; 1 sendok teh ketumbar; 1 sendok teh garam; 2 sendok makan air jeruk nipis; lontong dan bumbu kacang untuk pelengkap.'],
            ['recipe_id' => 21, 'nama_bahan' => '5 buah lontong; 200 gram labu siam; 500 ml santan; 2 lembar daun salam; 1 ruas lengkuas; 5 siung bawang merah; 3 siung bawang putih; 3 buah cabai merah; 1 sendok makan ebi; 1 sendok teh garam; 1 sendok teh gula; kerupuk, sambal, dan telur rebus untuk pelengkap.']
        ]);
    }
}

