<?php

use Illuminate\Database\Seeder;

class StartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(['name' =>"Техническая"]);
        DB::table('priorities')->insert(['name' =>"Обычный"]);
        DB::table('priorities')->insert(['name' =>"Высокий"]);
        DB::table('statuses')->insert(['name' =>"Новая"]);
        DB::table('statuses')->insert(['name' =>"Открыта"]);
        DB::table('statuses')->insert(['name' =>"Выполнена"]);
        DB::table('statuses')->insert(['name' =>"Закрыта"]);

    }
}
