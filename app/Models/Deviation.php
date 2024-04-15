<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deviation extends Model
{
    use HasFactory;
 
    protected $table = "deviations";
    protected $fillable = [
        'employe_code',
        'email_id',
        'designation',
        'Name_reporting_person',
        'Employee_code_reporting_person',
        'Email_Reporting_Person',
        'Is_help_Desk',
        'Is_Local_Admin',
        'Production_Person',
        'manager'];
}
