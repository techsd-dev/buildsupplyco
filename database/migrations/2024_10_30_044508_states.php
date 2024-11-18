<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('state_name', 50);
            $table->char('state_code', 2)->unique();
            $table->timestamps();
        });

        // Insert state data
        DB::table('states')->insert([
            ['state_name' => 'Andhra Pradesh', 'state_code' => 'AP'],
            ['state_name' => 'Arunachal Pradesh', 'state_code' => 'AR'],
            ['state_name' => 'Assam', 'state_code' => 'AS'],
            ['state_name' => 'Bihar', 'state_code' => 'BR'],
            ['state_name' => 'Chhattisgarh', 'state_code' => 'CG'],
            ['state_name' => 'Goa', 'state_code' => 'GA'],
            ['state_name' => 'Gujarat', 'state_code' => 'GJ'],
            ['state_name' => 'Haryana', 'state_code' => 'HR'],
            ['state_name' => 'Himachal Pradesh', 'state_code' => 'HP'],
            ['state_name' => 'Jharkhand', 'state_code' => 'JH'],
            ['state_name' => 'Karnataka', 'state_code' => 'KA'],
            ['state_name' => 'Kerala', 'state_code' => 'KL'],
            ['state_name' => 'Madhya Pradesh', 'state_code' => 'MP'],
            ['state_name' => 'Maharashtra', 'state_code' => 'MH'],
            ['state_name' => 'Manipur', 'state_code' => 'MN'],
            ['state_name' => 'Meghalaya', 'state_code' => 'ML'],
            ['state_name' => 'Mizoram', 'state_code' => 'MZ'],
            ['state_name' => 'Nagaland', 'state_code' => 'NL'],
            ['state_name' => 'Odisha', 'state_code' => 'OR'],
            ['state_name' => 'Punjab', 'state_code' => 'PB'],
            ['state_name' => 'Rajasthan', 'state_code' => 'RJ'],
            ['state_name' => 'Sikkim', 'state_code' => 'SK'],
            ['state_name' => 'Tamil Nadu', 'state_code' => 'TN'],
            ['state_name' => 'Telangana', 'state_code' => 'TG'],
            ['state_name' => 'Tripura', 'state_code' => 'TR'],
            ['state_name' => 'Uttar Pradesh', 'state_code' => 'UP'],
            ['state_name' => 'Uttarakhand', 'state_code' => 'UT'],
            ['state_name' => 'West Bengal', 'state_code' => 'WB'],
            ['state_name' => 'Andaman and Nicobar Islands', 'state_code' => 'AN'],
            ['state_name' => 'Chandigarh', 'state_code' => 'CH'],
            ['state_name' => 'Dadra and Nagar Haveli and Daman and Diu', 'state_code' => 'DN'],
            ['state_name' => 'Delhi', 'state_code' => 'DL'],
            ['state_name' => 'Jammu and Kashmir', 'state_code' => 'JK'],
            ['state_name' => 'Ladakh', 'state_code' => 'LA'],
            ['state_name' => 'Lakshadweep', 'state_code' => 'LD'],
            ['state_name' => 'Puducherry', 'state_code' => 'PY'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
};
