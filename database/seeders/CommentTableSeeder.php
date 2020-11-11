<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'post_id'=>1,
            'user_id'=>1,
            'comment'=>'Cras leo augue, venenatis id accumsan sed, condimentum sed purus. Phasellus quis elit ut tortor eleifend pharetra in a lacus.',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=> \Carbon\Carbon::now(),
        ]);

        DB::table('comments')->insert([
            'post_id'=>1,
            'user_id'=>1,
            'comment'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu feugiat augue. Suspendisse porta velit at sollicitudin accumsan.',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=> \Carbon\Carbon::now(),
        ]);
    }
}
