<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostTagTableSeeder extends Seeder
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

        for ($i=1; $i < 100; ++$i) { 
            $numbers = \range(1,20);
            \shuffle($numbers);
            $n = \rand(3,6);

            for ($j=0; $j < $n; $j++) { 
                $date = $this->randDate();

                DB::table('post_tag')->insert([
                    'post_id' => $i,
                    'tag_id' => $numbers[$i],
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);
            }
        }
    }
}
