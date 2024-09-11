<?php

namespace Database\Factories;

use App\Models\EtlConfig;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EtlConfigFactory extends Factory
{
    protected $model = EtlConfig::class;

    public function definition()
    {
        return [
            'report_type' => $this->faker->randomElement(['Inventory Report', 'Sales Report', 'Purchase Report']),
            'channel_id' => $this->faker->numberBetween(1, 5), // Random channel IDs
            'last_run_status' => $this->faker->randomElement(['SUCCESS', 'FAILED', 'PENDING']),
            'last_report_id' => Str::random(10), // Random string for report ID
            'last_report_doc' => Str::random(20), // Random string for report doc
            'first_run_hr' => $this->faker->numberBetween(0, 23), // Random hour in a 24-hour format
            'freq_run_min' => $this->faker->numberBetween(5, 60), // Random minutes between runs
            'seller_id' => $this->faker->numberBetween(1, 10), // Random seller ID
            'changed_by' => 1, // Assuming the user who created/updated this is user with ID 1
        ];
    }
}
