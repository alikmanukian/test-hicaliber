<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $handle = fopen(database_path('data/property-data.csv'), 'r');
        $firstLine = array_map(fn($value) => strtolower($value), fgetcsv($handle, 0, ','));

        while (!feof($handle)) {
            Property::create(
                array_combine(
                    $firstLine,
                    fgetcsv($handle, 0, ',')
                )
            );
        }
        fclose($handle);
    }

}
