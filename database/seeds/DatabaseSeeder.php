<?php

use App\Job;
use App\User;
use App\Company;
use App\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(
        //     UsersTableSeeder::class,
        //     CompaniesTableSeeder::class,
        //     JobsTableSeeder::class            
        // );
        factory(User::class, 20)->create();
        factory(Company::class, 20)->create();
        factory(Job::class, 20)->create();

        $categories = [
            'Technology',
            'Engineering',
            'Government',
            'Medical',
            'Construction',
            'Software'
        ];
        foreach($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
