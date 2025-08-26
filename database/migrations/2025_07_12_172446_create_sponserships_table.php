<?php

use App\Models\Package;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('sponsorships', function (Blueprint $table) {
            $table->id();

            // 1. Brand Information
            $table->string('brand_name');
            $table->string('social_link')->nullable();
            $table->string('industry_category')->nullable(); // You can use enum if needed

            // 2. Contact Details
            $table->string('contact_name');
            $table->string('contact_designation')->nullable();
            $table->string('contact_number');
            $table->string('email');
            $table->string('city_state')->nullable();

            // 3. Sponsorship Interest
            $table->string('budget_range')->nullable();

            // 4. Product / Service Details
            $table->text('product_service_details')->nullable();
            $table->enum('hire_models', ['Yes', 'No', 'Maybe'])->nullable();
            $table->enum('model_preference', ['Male', 'Female', 'Both'])->nullable();

            // 5. Logistics
            $table->enum('handle_own_travel', ['Yes', 'No'])->nullable();
            $table->enum('booth_setup', ['Yes', 'No'])->nullable();

            // 6. Final Notes
            $table->text('special_requests')->nullable();
            $table->string('file_path')->nullable();

            $table->string('heard_from')->nullable(); // Instagram, WhatsApp, etc.
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->boolean('show_on_home_page')->default(false);
            $table->foreignIdFor(Package::class)->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sponsorships');
    }
};
