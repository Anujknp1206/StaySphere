<?php

namespace Database\Seeders;
use App\Models\Setting;
use App\Models\Team;
use Illuminate\Database\Seeder;
use App\Models\Size;
use App\Models\BedType;
use App\Models\Suite;
use App\Models\RoomType;
use App\Models\Occupancy;
use App\Models\View;
use App\Models\Facility;

class MasterDataSeeder extends Seeder
{
    public function run(): void
    {

        // Settings
        Setting::create([
            '_site_name' => 'Stay Sphere',
            'logo' => 'StaySphere.png',
            'logo_footer' => 'StaySphereT.png',
            'office1' => 'Main Office - Kanpur',
            'office2' => 'Branch Office - Lucknow',
            'address' => '123 Paradise Road, Kanpur, UP',
            'phone_no' => '1800123456',
            'website' => 'https://staysphere.com',
            'facebook' => 'https://facebook.com/staysphere',
            'instagram' => 'https://instagram.com/staysphere',
            'linkedin' => 'https://linkedin.com/company/staysphere',
            'slug' => 'Experience the Art of Hospitality',
            'twitter' => 'https://x.com/staysphere',
            'whatsapp' => '1800123456',
            'email' =>'staysphere@gmail.com',
            'map_location' => 'https://goo.gl/maps/xyz123',
        ]);

        // Room Types
        $roomTypes = ['Deluxe', 'Executive', 'Standard'];
        foreach ($roomTypes as $name) {
            RoomType::create(['name' => $name]);
        }
        $standardFacilities = [
            ['name' => 'Free WiFi', 'icon' => 'fa fa-wifi'],
            ['name' => 'Air Conditioning', 'icon' => 'fa fa-snowflake'],
            ['name' => 'Television', 'icon' => 'fa fa-tv'],
            ['name' => 'Swimming Pool', 'icon' => 'fa fa-swimmer'],
        ];

        $premiumFeatures = [
            ['name' => 'Room Size: 600 sq ft', 'icon' => 'fa fa-ruler-combined'],
            ['name' => 'Bed Type: 2 Queen Beds', 'icon' => 'fa fa-bed'],
            ['name' => 'Occupancy: 3 Persons', 'icon' => 'fa fa-users'],
            ['name' => 'View: Sea View', 'icon' => 'fa fa-water'],
        ];

        foreach ($standardFacilities as $facility) {
            Facility::create(array_merge($facility, ['type' => 'standard']));
        }

        foreach ($premiumFeatures as $feature) {
            Facility::create(array_merge($feature, ['type' => 'premium']));
        }
    }
}
