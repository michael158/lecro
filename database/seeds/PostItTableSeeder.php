<?php

use Illuminate\Database\Seeder;
use App\Models\PostIt;

class PostItTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PostIt::class, 25)->create();
    }
}
