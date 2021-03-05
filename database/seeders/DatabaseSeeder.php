<?php

namespace Database\Seeders;

use App\Models\CompanyEvent;
use Carbon\Carbon;
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
        // \App\Models\User::factory(10)->create();
        CompanyEvent::create(
            [
                'title' => 'Przykładowy tytuł',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->add(7, 'day'),
            ]
        );
        CompanyEvent::create(
            [
                'title' => 'Example title Example title Example title Example title Example title Example title',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->add(7, 'day'),
            ]
        );
        CompanyEvent::create(
            [
                'title' => 'Example title Example title Example title Example title Example title Example title',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->add(7, 'day'),
                'thumbnail' => 'example.jpg'
            ]
        );
    }
}
