<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StepsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('steps')->insert([
            ['recipe_id' => 1, 'deskripsi_langkah' => 'Tumis bawang putih dan cabai merah hingga harum; tambahkan ayam suwir dan wortel, aduk rata; masukkan telur dan orak-arik hingga matang; tambahkan nasi putih, kecap manis, garam, dan merica; aduk hingga semua bahan tercampur rata dan sajikan.'],
            ['recipe_id' => 2, 'deskripsi_langkah' => 'Campurkan madu, kecap manis, air perasan jeruk nipis, bawang putih yang telah dihaluskan, garam, dan merica dalam sebuah wadah; lumuri ayam dengan campuran bumbu tersebut; diamkan selama 30 menit; panaskan minyak zaitun di atas panggangan; bakar ayam hingga matang dan berwarna kecokelatan; sajikan.'],
            ['recipe_id' => 3, 'deskripsi_langkah' => 'Rebus ayam dalam air hingga mendidih dan ayam empuk; angkat ayam dan suwir dagingnya; saring kaldu ayam dan sisihkan; tumis bawang merah, bawang putih, kemiri, lengkuas, daun salam, serai, daun jeruk, kunyit, dan ketumbar dengan minyak goreng hingga harum; masukkan tumisan bumbu ke dalam kaldu ayam; tambahkan garam, merica, dan kecap manis; biarkan mendidih selama 10 menit; sesuaikan rasa; sajikan soto ayam dalam mangkuk dengan irisan ayam suwir, telur rebus, taoge, kol, daun bawang, dan seledri; beri sambal, kerupuk, dan perasan jeruk nipis sesuai selera.'],
            ['recipe_id' => 4, 'deskripsi_langkah' => 'Kupas dan potong mangga; masukkan mangga ke dalam blender bersama yogurt, madu, dan sedikit air; tambahkan es batu secukupnya, blender hingga halus; tuang ke dalam gelas dan sajikan segera.'],
            ['recipe_id' => 5, 'deskripsi_langkah' => 'Rebus ayam dalam air hingga mendidih, buang buihnya; tambahkan jahe yang sudah dimemarkan, bawang putih, wortel, dan kentang; masak hingga sayuran empuk; tambahkan daun seledri, garam, dan merica; aduk rata, sajikan hangat.'],
            ['recipe_id' => 6, 'deskripsi_langkah' => 'Campurkan tepung terigu, gula pasir, baking powder, dan cokelat bubuk dalam sebuah wadah; tambahkan telur, susu cair, dan mentega cair; aduk rata hingga adonan tercampur sempurna; panaskan sedikit minyak di atas wajan; tuang adonan dan masak hingga kedua sisi pancake berwarna keemasan; sajikan dengan topping sesuai selera.'],
            ['recipe_id' => 7, 'deskripsi_langkah' => 'Siapkan kaldu bakso, rebus daging hingga empuk; bentuk bola-bola bakso, masukkan ke dalam kaldu, biarkan mendidih; sajikan bakso dengan mie dan pelengkap seperti sawi dan bakso goreng.'],
            ['recipe_id' => 8, 'deskripsi_langkah' => 'Campurkan bahan es krim, masukkan ke dalam mesin es krim, dan biarkan hingga mengental; sajikan dengan topping sesuai selera.'],
            ['recipe_id' => 9, 'deskripsi_langkah' => 'Siapkan adonan pizza, oleskan saus tomat, taburi dengan keju mozzarella dan daun basil; panggang hingga keju meleleh dan pinggirannya kecoklatan; sajikan hangat.']
        ]);
    }
}

