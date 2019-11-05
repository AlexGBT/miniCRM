<?php

use Illuminate\Database\Seeder;
use App\Model\Company;
use App\Model\Worker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
//         factory(\App\Model\Company::class,10)->create();
//         factory(App\Model\Worker::class,10)->create();
        factory(Company::class,4)->create()->each(function ($company){
            $company->workers()->saveMany(factory(App\Model\Worker::class, 2)->make());
        });

    }
}
