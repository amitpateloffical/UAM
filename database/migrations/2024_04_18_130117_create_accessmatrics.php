<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_matrices', function (Blueprint $table) {
            $table->id();
            $table->integer('deviation_id');
            $table->integer('row');
            $table->string('Membership_allocation_type')->nullable();
            $table->string('SiteName')->nullable();
            $table->string('Module')->nullable();
            $table->string('Module_others')->nullable();
            $table->longText('User_roles_group_category')->nullable();
            $table->text('Others')->nullable();
            $table->text('Process_title')->nullable();
            $table->string('Application')->nullable();
            $table->text('Role')->nullable();
            $table->text('Training_completed')->nullable();
            $table->longtext('training_certificate')->nullable();
            $table->text('Is_tmp_user')->nullable();
            $table->date('period_from')->nullable();
            $table->date('Period_to')->nullable();
            $table->text('Acces_provided_by')->nullable();
            $table->date('Access_provided_on')->nullable();
            $table->text('Access_revoked_by')->nullable();
            $table->date('Access_revoked_on')->nullable();
            $table->longText('Remarks')->nullable();
            
            $table->string('Assets_required')->nullable();      
   //-----------------------row2----------------------------------         
        
            $table->string('laptop')->nullable();
            $table->string('Desktop_Computer')->nullable();
            $table->string('Tablet')->nullable();
            $table->string('Smartphone')->nullable();
            $table->string('Monitor')->nullable();
            $table->string('Keyboard')->nullable();
            $table->string('Mouse')->nullable();
            $table->string('Printer')->nullable();
            $table->string('Scanner')->nullable();
            $table->string('Headset')->nullable();
            $table->string('Projector')->nullable();
            $table->string('Server')->nullable();
            $table->string('Network_Switch')->nullable();
            $table->string('External_Hard_Drive')->nullable();
            $table->string('USB_Flash_Drive')->nullable();
            $table->string('Software_Licenses')->nullable();
            $table->string('Access_Card_Badge')->nullable();
            $table->string('Security_Key_Token')->nullable();
            $table->string('Desk_Phone')->nullable();
            $table->string('Company_Vehicle')->nullable();
            $table->string('QA_app_comment')->nullable();
            $table->string('is_admin')->nullable();
            $table->string('Super_admin')->nullable();
            $table->string('administrator_comment')->nullable();
            $table->string('Employee')->nullable();
            $table->string('login_username')->nullable();
            $table->string('temp_deact')->nullable();
            $table->string('Supporting_documents')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('access_matrices');
    }
};
