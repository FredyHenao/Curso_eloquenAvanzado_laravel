<?php

use Illuminate\Database\Seeder;
use eloquenAvance\Page;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Page::class, 10)->create();
    }
}
