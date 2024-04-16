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
        Schema::create('deviations', function (Blueprint $table) {
            $table->id();
            $table->integer('initiator_id')->nullable();
            $table->integer('record')->nullable();
            $table->string('division_id')->nullable();
            $table->string('division_code')->nullable();
            $table->string('initiator_group_code')->nullable();
            $table->date('intiation_date')->nullable();
          //  $table->string('form_type')->nullable();
            $table->integer('record_number')->nullable();
            $table->string('Salutation')->nullable();
            $table->string('assign_to')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('department')->nullable();
            
            // $table->text('due_date')->nullable();
            $table->string('employee_code')->nullable();
            $table->string('email')->nullable();
            $table->string('designation')->nullable();
            $table->string('name_reporting_person')->nullable();
            $table->string('email_reporting_person')->nullable();
            $table->string('employee_Code_reporting_person')->nullable();
            $table->string('is_help_desk')->nullable();
            $table->string('is_local_admin')->nullable();
            $table->string('Production_person')->nullable();
            $table->string('Manager')->nullable();
            $table->string('Requestor_User_Comments')->nullable();
            $table->string('training_required')->nullable();
            $table->string('training_reference_number')->nullable();
            $table->string('Audit_file1')->nullable();
            $table->string('no_training_justification')->nullable();
            $table->string('access_description')->nullable();
            $table->string('document_details_required')->nullable();


            //-----------hod
           
            $table->longText('HOD_Remarks')->nullable();

            //--------QA------------------------

            $table->string('QA_Initial_Comments')->nullable();
            $table->longText('QA_attachments')->nullable();
            $table->string('Investigation_required')->nullable();
            $table->longText('Investigation_Details')->nullable();
            $table->longText('related_records')->nullable();
            $table->longText('QAInitialRemark')->nullable();
            $table->longText('Initial_attachment')->nullable();
          
          //---------------------capa-----------------------
          
            $table->string('Investigation_Summary')->nullable();
            $table->string('Impact_assessment')->nullable();
            $table->longText('Root_cause')->nullable();
            $table->longText('CAPA_Rquired')->nullable();
            $table->longText('capa_type')->nullable();
            $table->longText('CAPA_Description')->nullable();
            $table->longText('Post_Categorization')->nullable();
            $table->longText('Investigation_Of_Review')->nullable();
            $table->longText('Capa_attachment')->nullable();
            $table->longText('Audit_file')->nullable();
            //-------------------------------
            $table->longText('QA_Feedbacks')->nullable();

            //-------------------------
            $table->longText('Closure_Comments')->nullable();

            $table->longText('closure_attachment')->nullable();

            $table->string('submit_on')->nullable();
            $table->string('submit_by')->nullable();
            $table->longText('submit_comment')->nullable();
            $table->string('HOD_Review_Complete_By')->nullable();
            $table->string('HOD_Review_Complete_On')->nullable();
            $table->longText('HOD_Review_Comments')->nullable();
            $table->string('QA_Initial_Review_Complete_By')->nullable();
            $table->string('QA_Initial_Review_Complete_On')->nullable();
            $table->longText('QA_Initial_Review_Comments')->nullable();
            $table->string('QA_Final_Review_Complete_By')->nullable();
            $table->string('QA_Final_Review_Complete_On')->nullable();
            $table->longText('QA_Final_Review_Comments')->nullable();
            $table->string('CFT_Review_Complete_By')->nullable();
            $table->string('CFT_Review_Complete_On')->nullable();
            $table->longText('CFT_Review_Comments')->nullable();
             
            $table->string('qa_more_info_required_by')->nullable();
            $table->string('qa_more_info_required_on')->nullable();
            $table->string('Approved_By')->nullable();
            $table->string('Approved_On')->nullable();
            $table->longText('Approved_Comments')->nullable();

            $table->string('cancelled_on')->nullable();
            $table->string('cancelled_by')->nullable();
            $table->string('rejected_on')->nullable();
            $table->string('rejected_by')->nullable();
            //$table->string('production_byy')->nullable();
            $table->string('status')->nullable();
            $table->integer('stage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deviations');
    }
};
