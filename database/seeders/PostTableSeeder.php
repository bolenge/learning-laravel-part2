<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class PostTableSeeder extends Seeder
{
    private function randDate()
    {
        return Carbon::createFromDate(null, \rand(1,12), \rand(1,28));
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();

        for ($i=0; $i < 100; $i++) { 
            $date = $this->randDate();

            DB::table('posts')->insert([
                'title' => 'Titre'.$i,
                'content' => 'Contenu '.$i.' Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque vero iste illum dolorum. At
                neque id velit repudiandae ut! Deserunt, accusamus at facere quas laudantium voluptas minus quam eos
                quae.',
                'user_id' => \rand(1, 10),
                'created_at' => $date,
                'updated_at' => $date
            ]);
        }
    }
}
