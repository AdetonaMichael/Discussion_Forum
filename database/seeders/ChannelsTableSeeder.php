<?php

namespace Database\Seeders;

use App\Models\Channel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channels = Channel::create([
            'name'=>'Geo Development',
            'slug'=>Str::slug('Geo Development')
        ]);
        $channels = Channel::create([
            'name'=>'Geo Spatial Analysis',
            'slug'=>Str::slug('Geo Spatial Analysis')
        ]);
        $channels = Channel::create([
            'name'=>'Geo Spatial Processing',
            'slug'=>Str::slug('Geo Spatial Processing')
        ]);
        $channels = Channel::create([
            'name'=>'Geo Server Integration',
            'slug'=>Str::slug('Geo Server Integration')
        ]);
    }
}
