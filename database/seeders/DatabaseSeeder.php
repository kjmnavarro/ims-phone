<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        \App\Models\Status::create(['name' => 'ACTIVE']);
        \App\Models\Status::create(['name' => 'INACTIVE']);

        \App\Models\Domain::create(['domain' => 'ims.mnc660.mcc302.3gppnetwork.org']);
        \App\Models\Domain::create(['domain' => 'ims.mnc550.mcc202.3gppnetwork.org']);
        \App\Models\Domain::create(['domain' => 'ims.mnc440.mcc102.3gppnetwork.org']);
        \App\Models\Domain::create(['domain' => 'ims.mnc330.mcc402.3gppnetwork.org']);
        \App\Models\Domain::create(['domain' => 'ims.mnc220.mcc502.3gppnetwork.org']);
        \App\Models\Domain::create(['domain' => 'ims.mnc120.mcc602.3gppnetwork.org']);

        \App\Models\Feature::create(['feature' => 'callForwardNoReply', 'provisioned' => true, 'destination' => 'tel:+18675182800']);
        \App\Models\Feature::create(['feature' => 'callForwardNoReply1', 'provisioned' => true, 'destination' => 'tel:+18675182801']);
        \App\Models\Feature::create(['feature' => 'callForwardNoReply2', 'provisioned' => true, 'destination' => 'tel:+18675182802']);
        \App\Models\Feature::create(['feature' => 'callForwardNoReply3', 'provisioned' => true, 'destination' => 'tel:+18675182803']);
        \App\Models\Feature::create(['feature' => 'callForwardNoReply4', 'provisioned' => true, 'destination' => 'tel:+18675182804']);
        \App\Models\Feature::create(['feature' => 'callForwardNoReply5', 'provisioned' => true, 'destination' => 'tel:+18675182805']);
        \App\Models\Feature::create(['feature' => 'callForwardNoReply6', 'provisioned' => true, 'destination' => 'tel:+18675182806']);

        \App\Models\Subscriber::create(['phone_number' => 18675181010, 
                                            'username' => 16045906403, 
                                            'password' => 'p@ssw0rd!', 
                                            'domain_id' => 1, 
                                            'status_id' => 1, 
                                            'features_id' => 1
                                        ]);

        for ($j=2; $j <=6 ; $j++) 
        { 
            \App\Models\Subscriber::create(['phone_number' => random_int(10000000000,19999999999), 
                                            'username' => random_int(10000000000,19999999999), 
                                            'password' => Str::random(12), 
                                            'domain_id' => $j, 
                                            'status_id' => random_int(1,2), 
                                            'features_id' => $j
                                        ]);
        }

    }
}
