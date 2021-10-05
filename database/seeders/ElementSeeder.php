<?php

namespace Database\Seeders;

use App\Models\Element;
use Illuminate\Database\Seeder;

class ElementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Element::truncate();

        $csvFile = fopen(public_path("data/element.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Element::create([
                    "id" => $data['0'],
                    "number" => $data['1'],
                    "title" => $data['2'],
                    "n_elemen" => $data['3']
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
