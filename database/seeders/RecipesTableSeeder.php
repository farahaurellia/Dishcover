<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RecipesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('recipes')->insert([
            ['user_id' => 1, 'judul' => 'Nasi Goreng Spesial', 'deskripsi' => 'Nasi goreng dengan bumbu rahasia', 'image_url' => 'https://i.pinimg.com/736x/94/82/ab/9482ab2e248d249e7daa7fd6924c8d3b.jpg', 'porsi' => 2, 'waktu' => 30],
            ['user_id' => 3, 'judul' => 'Ayam Bakar Madu', 'deskripsi' => 'Ayam bakar dengan olesan madu', 'image_url' => 'https://i.pinimg.com/736x/5b/a1/71/5ba1715298513331e0089ffb4a7a3bdb.jpg', 'porsi' => 4, 'waktu' => 60],
            ['user_id' => 2, 'judul' => 'Soto Ayam', 'deskripsi' => 'Soto ayam khas Jawa', 'image_url' => 'https://i.pinimg.com/736x/9b/e7/70/9be7701ba3a1729d1c3f3c44f96b3cfc.jpg', 'porsi' => 6, 'waktu' => 90],
            ['user_id' => 5, 'judul' => 'Smoothie Mangga', 'deskripsi' => 'Smoothie mangga yang segar dan manis, sempurna untuk menyegarkan diri di pagi hari.', 'image_url' => 'https://i.pinimg.com/736x/6a/0f/82/6a0f82c91a31ec36b540924211b99b75.jpg', 'porsi' => 2, 'waktu' => 10],
            ['user_id' => 8, 'judul' => 'Sup Ayam Jahe', 'deskripsi' => 'Sup ayam dengan rasa hangat dari jahe yang cocok untuk cuaca dingin.', 'image_url' => 'https://i.pinimg.com/736x/3a/13/04/3a13041d08bd1915d568d5653015fc04.jpg', 'porsi' => 3, 'waktu' => 30],
            ['user_id' => 6, 'judul' => 'Pancake Coklat', 'deskripsi' => 'Pancake lembut dengan lapisan cokelat yang manis, cocok untuk sarapan atau camilan.', 'image_url' => 'https://i.pinimg.com/736x/29/48/b4/2948b43b975d1474e9115fab88205e4b.jpg', 'porsi' => 3, 'waktu' => 25],
            ['user_id' => 4, 'judul' => 'Bakso', 'deskripsi' => 'Bakso daging sapi dengan kuah gurih, disajikan dengan mie dan pelengkap.', 'image_url' => 'https://i.pinimg.com/736x/28/f6/da/28f6dac742767af11536256fabf230f2.jpg', 'porsi' => 4, 'waktu' => 60],
            ['user_id' => 7, 'judul' => 'Es Krim Coklat', 'deskripsi' => 'Es krim coklat dengan rasa creamy dan manis.', 'image_url' => 'https://i.pinimg.com/736x/f8/be/af/f8beafc2b697458609f24be4eb2fd04b.jpg', 'porsi' => 6, 'waktu' => 180],
            ['user_id' => 3, 'judul' => 'Pizza Margherita', 'deskripsi' => 'Pizza dengan saus tomat, keju mozzarella, dan daun basil.', 'image_url' => 'https://i.pinimg.com/736x/d9/db/94/d9db947145fb931a2bd2b0dc46b59ac0.jpg', 'porsi' => 2, 'waktu' => 40],
            ['user_id' => 9, 'judul' => 'Mie Goreng Pedas', 'deskripsi' => 'Mie goreng dengan tambahan cabai rawit dan saus spesial.', 'image_url' => 'https://i.pinimg.com/736x/a1/d6/1d/a1d61d04c329c5d50fdea717d07f4b84.jpg', 'porsi' => 1, 'waktu' => 20],
            ['user_id' => 10, 'judul' => 'Kue Lapis', 'deskripsi' => 'Kue lapis tradisional yang legit dan harum pandan.', 'image_url' => 'https://i.pinimg.com/736x/f5/86/9e/f5869e92373e0623ea4ce7e1d8c8218d.jpg', 'porsi' => 8, 'waktu' => 120],
            ['user_id' => 1, 'judul' => 'Rendang Daging', 'deskripsi' => 'Rendang daging khas Padang yang kaya rempah dan lezat', 'image_url' => 'https://i.pinimg.com/736x/d0/aa/52/d0aa521546872cba34257b91c71589f7.jpg', 'porsi' => 6, 'waktu' => 120],
            ['user_id' => 5, 'judul' => 'Gado-Gado', 'deskripsi' => 'Salad sayuran dengan bumbu kacang yang kaya rasa', 'image_url' => 'https://i.pinimg.com/736x/1a/ad/d7/1aadd728c61347fa67dce9690c8b44ba.jpg', 'porsi' => 4, 'waktu' => 30],
            ['user_id' => 8, 'judul' => 'Nasi Uduk', 'deskripsi' => 'Nasi uduk dengan santan, disajikan dengan ayam goreng dan sambal', 'image_url' => 'https://i.pinimg.com/736x/72/47/e0/7247e0753ada5ee056c14fb491cb023b.jpg', 'porsi' => 4, 'waktu' => 60],
            ['user_id' => 2, 'judul' => 'Karedok', 'deskripsi' => 'Sayuran segar dengan sambal kacang mentah', 'image_url' => 'https://i.pinimg.com/736x/69/48/ba/6948ba478333c170bd8003a8bdf0f3eb.jpg', 'porsi' => 2, 'waktu' => 20],
            ['user_id' => 4, 'judul' => 'Mie Ayam', 'deskripsi' => 'Mie ayam dengan kuah kaldu dan ayam cincang', 'image_url' => 'https://i.pinimg.com/736x/10/9c/a0/109ca0cd6c676168beb76544a6052bd3.jpg', 'porsi' => 4, 'waktu' => 45],
            ['user_id' => 9, 'judul' => 'Bakmi Naga Resto', 'deskripsi' => 'Bakmi dengan saus khas dan topping ayam serta sayuran', 'image_url' => 'https://i.pinimg.com/736x/7a/93/c9/7a93c9b7fad08effe9e771fd30f46a63.jpg', 'porsi' => 3, 'waktu' => 40],
            ['user_id' => 3, 'judul' => 'Es Teler', 'deskripsi' => 'Es campur dengan kelapa muda, alpukat, dan nangka', 'image_url' => 'https://i.pinimg.com/736x/a8/47/6a/a8476a8f3aab654303ec6dd168d0efd8.jpg', 'porsi' => 2, 'waktu' => 10],
            ['user_id' => 7, 'judul' => 'Puding Coklat', 'deskripsi' => 'Puding coklat lezat yang lembut dan manis', 'image_url' => 'https://i.pinimg.com/736x/fd/48/f2/fd48f2048d577027d70ce232a5c62957.jpg', 'porsi' => 6, 'waktu' => 90],
            ['user_id' => 8, 'judul' => 'Sate Ayam', 'deskripsi' => 'Sate ayam dengan bumbu kacang dan kecap manis', 'image_url' => 'https://i.pinimg.com/736x/49/74/1a/49741ac0e9739fbffe02ddafa0d0a4a9.jpg', 'porsi' => 4, 'waktu' => 40],
            ['user_id' => 6, 'judul' => 'Lontong Sayur', 'deskripsi' => 'Lontong dengan sayur labu dan sambal kacang', 'image_url' => 'https://i.pinimg.com/736x/c3/a4/d8/c3a4d822615c588672389428b2de3a70.jpg', 'porsi' => 4, 'waktu' => 60]
        ]);
    }
}

