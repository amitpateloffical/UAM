@extends('frontend.layout.main')
@section('container')
    @php
$users = DB::table('users')
    ->select('id', 'name')
    ->get();

    @endphp
    


    <style>
        textarea.note-codable {
            display: none !important;
        }

        header {
            display: none;
        }

        .sub-main-head {
        display: flex;
        justify-content: space-evenly;
    } 

    .Activity-type {
        margin-bottom: 7px;
    }

    /* .sub-head {
        margin-left: 280px;
        margin-right: 280px;
        color: #4274da;
        border-bottom: 2px solid #4274da;
        padding-bottom: 5px;
        margin-bottom: 20px;
        font-weight: bold;
        font-size: 1.2rem;

    } */

    .create-entity {
        background: #323c50;
        padding: 10px 15px;
        color: white;
        margin-bottom: 20px;

    }

    .bottom-buttons {
        display: flex;
        justify-content: flex-end;
        margin-right: 300px;
        margin-top: 50px;
        gap: 20px;
    }
    </style>
    <style>
        .calenderauditee {
            position: relative;
        }

        .new-date-data-field input.hide-input {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
        }

        .new-date-data-field input {
            border: 1px solid grey;
            border-radius: 5px;
            padding: 5px 15px;
            display: block;
            width: 100%;
            background: white;
        }

        .calenderauditee input::-webkit-calendar-picker-indicator {
            width: 100%;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    
    <style>
        .calenderauditee {
            position: relative;
        }

        .new-date-data-field input.hide-input {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
        }

        .new-date-data-field input {
            border: 1px solid grey;
            border-radius: 5px;
            padding: 5px 15px;
            display: block;
            width: 100%;
            background: white;
        }

        .calenderauditee input::-webkit-calendar-picker-indicator {
            width: 100%;
        }
    </style>

    <script>
        function otherController(value, checkValue, blockID) {
            let block = document.getElementById(blockID)
            let blockTextarea = block.getElementsByTagName('textarea')[0];
            let blockLabel = block.querySelector('label span.text-danger');
            if (value === checkValue) {
                blockLabel.classList.remove('d-none');
                blockTextarea.setAttribute('required', 'required');
            } else {
                blockLabel.classList.add('d-none');
                blockTextarea.removeAttribute('required');
            }
        }
    </script>
    <script>
        function addAuditAgenda(tableId) {
            var table = document.getElementById(tableId);
            var currentRowCount = table.rows.length;
            var newRow = table.insertRow(currentRowCount);
            newRow.setAttribute("id", "row" + currentRowCount);
            var cell1 = newRow.insertCell(0);
            cell1.innerHTML = currentRowCount;

            var cell2 = newRow.insertCell(1);
            cell2.innerHTML = "<input type='text'>";

            var cell3 = newRow.insertCell(2);
            cell3.innerHTML = "<input type='date'>";

            var cell4 = newRow.insertCell(3);
            cell4.innerHTML = "<input type='time'>";

            var cell5 = newRow.insertCell(4);
            cell5.innerHTML = "<input type='date'>";

            var cell6 = newRow.insertCell(5);
            cell6.innerHTML = "<input type='time'>";

            var cell7 = newRow.insertCell(6);
            cell7.innerHTML =
                // '<select name="auditor"><option value="">-- Select --</option><option value="1">Amit Guru</option></select>'

            var cell8 = newRow.insertCell(7);
            cell8.innerHTML =
                // '<select name="auditee"><option value="">-- Select --</option><option value="1">Amit Guru</option></select>'

            var cell9 = newRow.insertCell(8);
            cell9.innerHTML = "<input type='text'>";
            for (var i = 1; i < currentRowCount; i++) {
                var row = table.rows[i];
                row.cells[0].innerHTML = i;
            }
        }
    </script>
 <!-- <script>
        function addWhyField(con_class, name) {
            let mainBlock = document.querySelector('.why-why-chart')
            let container = mainBlock.querySelector(`.${con_class}`)
            let textarea = document.createElement('textarea')
            textarea.setAttribute('name', name);
            container.append(textarea)
        }
    </script> -->
    
   
    
<script>
        $(document).ready(function() {
            $('#Document_Details').click(function(e) {
                function generateTableRow(serialNumber) {
                    
                    var html =
                        '<tr>'+
                        '<td><input disabled type="text" name="serial[]" value="' + serialNumber +'"></td>'+
                        '<td><input type="text" name="Number[]"></td>'+
                        '<td><input type="text" name="ReferenceDocumentName[]"></td>'+
                        '<td><input type="text" name="Document_Remarks[]"></td>'+

                        
                        '</tr>';

                
                 
                    return html;
                }

                var tableBody = $('#Document_Details_Details tbody');
                var rowCount = tableBody.children('tr').length;
                var newRow = generateTableRow(rowCount + 1);
                tableBody.append(newRow);
            });
        });
    </script>
    
   <script>
        $(document).ready(function() {
            $('#Access_Matrix_Details').click(function(e) {
                function generateTableRow(serialNumber) {
                    
                    var html =
                        '<tr>' +
                        '<td><input disabled type="text" name="serial[]" value="' + serialNumber +'"></td>' +
                         '<td><select name="Membership_Allocation_Type" id="Membership_Allocation_Type">
                                                <option value="0">-- Select --</option>
                                                <option value="Temporary">Temporary</option>
                                                <option value="Permanent">Permanent</option>

                                            </select></td>'+
                                            '<td><select name="SiteName" id="SiteName">
                                                <option value="0">-- Select --</option>
                                                <option value="yes">EU</option>
                                                <option value="yes">Asia</option>
                                                <option value="yes">Global</option>
                                                <option value="yes">HR-Headquarter</option>
                                                <option value="yes">IT-EMEA</option>
                                                <option value="yes">QMS-APAC</option>
                                                <option value="yes">QMS-North America</option>
                                                <option value="yes">RA-EMEA</option>
                                                <option value="yes">SQM-EMEA</option>

                                            </select>
                                       </td>'+
                                        
                                             '<td> <select name="Module" id="Module">
                                                <option value="0">-- Select --</option>
                                                <option value="QMS">QMS</option>
                                                <option value="DMS">DMS</option>
                                                <option value="HRMS">HRMS</option>
                                                <option value="R&D">R&D</option>
                                                <option value="IPQA">IPQA</option>
                                                <option value="Warehouse">Warehouse</option>
                                                <option value="Manufacturing">Manufacturing</option>
                                                <option value="SAP">SAP</option>
                                                <option value="Regulatory Affairs">Regulatory Affairs</option>

                                                <option value="Medical Affairs">Medical Affairs</option>

                                                <option value="Logistics">Logistics</option>

                                                <option value="Marketing and Sales">Marketing and Sales</option>
                                                <option value="Others">Others</option>
                                            </select></td>'+

                                       '<td> <input type="text" class="Others" name="Others[]"></td>'+

                                       
                                    '<td>
                                     <select multiple name="audit_type[]" id="audit_type">
                                             <option value="">Enter Your Selection Here</option> 
                                            <option value="QA">QA</option>
                                            <option value="QC">QC</option>
                                            <option value="Manufacturing">Manufacturing</option>
                                            <option value="R&D">R&D</option>
                                            <option value="Supervisor">Supervisor</option>
                                            <option value="HOD">HOD</option>
                                            <option value="Lead">Lead Auditee</option>
                                            <option value="Initiator">Initiator</option>
                                            <option value="Audit">Audit Manager</option>
                                            <option value="Reviewer">Reviewer</option>
                                            <option value="Approval">Approval</option>
                                        </select>
                                    
                                    </td>'+

                                        '<td> <input type="text" class="Others" name="Others[]"</td>'+

                                        '<td> <input type="text" class="Processtitle" name="Processtitle[]">  
                                       </td>'+
                                      
                                       
                                      '<td> <select name="Application" id="Application">
                                                <option value="0">-- Select --</option>
                                                <option value="VidyaGxP-QMS">VidyaGxP-QMS</option>
                                                <option value="VidyaGxP-DMS">VidyaGxP-DMS</option>
                                                <option value="VidyaGxP--ERP">VidyaGxP-ERP</option>
                                                <option value="VidyaGxP--TMS">VidyaGxP-TMS</option>

                                                <option value="VidyaGxP-EBMR">VidyaGxP-EBMR</option>
                                                <option value="VidyaGxP-E-Logbook">VidyaGxP-E-Logbook</option>

                                            

                                            </select>
                                       </td>'+
                                       '<td> <select name="Role" id="Role">
                                                <option value="0">-- Select --</option>
                                                <option value="QAM">Quality Assurance Manager(QAM)</option>
                                                <option value="QCA">Quality Control Analyst(QCA)</option>
                                                <option value="CO">Compilance Officer(CO)</option>
                                                <option value="RAS">Regulatory Affairs Specialist(RAS)</option>
                                                <option value="DCS">Document Control Specialist(DCS)</option>
                                                <option value="DCM">Document Control Manager(DCM)</option>
                                                <option value="RC">Records Coordinator(RC)</option>
                                                <option value="IGA">Information Governance Analyst(IGA)</option>
                                                <option value="TC">Training Coordinator(TC)</option>
                                                <option value="LMS">Learning Management System (LMS)</option>
                                                <option value="Administrator">Administrator</option>
                                                <option value="TM">Training Manager(TM)</option>
                                                <option value="PO">Production Operator(PO)</option>
                                                <option value="DIA">Data Integrity Analyst(DIA)</option>
                                            </select>
                                       </td>'+
                                       '<td> <select name="Process_Title" id="Process_Title">
                                                <option value="0">-- Select --</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>

                                            </select>
                                       </td>'+
                                       
                                       '<td><div class="training_certificate">
                                                <div class="file-attachment-training_certificate" id="training_certificate"></div>
                                                <div class="add-btn">
                                                    
                                                    <input type="file" id="myfile" name="training_certificate[]"
                                                        oninput="addMultipleFiles(this, 'training_certificate')" multiple>
                                                </div></td>'+
                                        '<td> <select name="Is_tmp_user" id="Is_tmp_user">
                                                <option value="0">-- Select --</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select></td>'+
                                      '<td><input type="date" class="Period" name="Period[]"></td>'+
                                        
                                        '<td><div class="col-lg-6">
                                    <div class="group-input">
                                        <select name="Acces_provided_by" id="Acces_provided_by[]">
                                            <option value="">-- Select --</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div></td>'+

                                       
                                 '<td><input type="date" class="Access_provided_on" name="Access_provided_on[]"></td>'+
                                     '<td><input type="text" class="Remarks" name="Remarks[]"></td>'+
                                        
                                    '<td><div class="col-lg-6">
                                    <div class="group-input">
                                        <select name="Acces_provided_by" id="Acces_provided_by[]">
                                            <option value="">-- Select --</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div></td>'+
                                        
                                      '<td><input type="date" class="Document_Remarks" name="Document_Remarks[]"></td>'+
                                            '</tr>';

                
                 
                    return html;
                }

                var tableBody = $('#Access_Matrix_Details_Details tbody');
                var rowCount = tableBody.children('tr').length;
                var newRow = generateTableRow(rowCount + 1);
                tableBody.append(newRow);
            });
        });
    </script>
    
    <div class="form-field-head">

        <div class="division-bar">
            <strong>Site Division/Project</strong>:
            {{ Helpers::getDivisionName(session()->get('division')) }}/Deviation
        </div>
    </div>



    {{-- ======================================
                    DATA FIELDS
    ======================================= --}}

    <div id="change-control-fields"> 
        <div class="container-fluid">

            <!-- Tab links -->
            <div class="cctab">
                <button class="cctablinks active" onclick="openCity(event, 'CCForm1')">General Information</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm8')">HOD Review</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm2')">QA Initial Review</button>
                <button class="cctablinks " onclick="openCity(event, 'CCForm7')">CFT</button>

                <button class="cctablinks" onclick="openCity(event, 'CCForm3')">Investigation & CAPA</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm4')">QA Final Review</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm09')">Access Matrix</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm5')">QAH/Designee Approval</button>
                <button class="cctablinks" onclick="openCity(event, 'CCForm6')">Activity Log</button>





            </div>

            <form id="auditform" action="{{ route('deviationstore') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div id="step-form">

                    <!-- General information content -->
                    <div id="CCForm1" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="row">

                                @if (!empty($parent_id))
                                     <input type="hidden" name="parent_id" value="{{ $parent_id }}">
                                    <input type="hidden" name="parent_type" value="{{ $parent_type }}">
                                @endif
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="RLS Record Number"><b>Record Number</b></label>
                                        <input disabled type="text" name="record_number">
                                        {{-- value="{{ Helpers::getDivisionName(session()->get('division')) }}/DEV/{{ date('Y') }}/{{ $record_number }}"> --}}
                                        {{-- <div class="static">QMS-EMEA/CAPA/{{ date('Y') }}/{{ $record_number }}</div> --}}
                                    </div>
                                </div>
                                  <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Initiator"><b>Initiator</b></label>
                                        {{-- <div class="static">{{ Auth::user()->name }}</div> --}}
                                        <input disabled type="text" value="{{ Auth::user()->name }}">

                                    </div>
                                </div>

                                 <div class="col-lg-6">
                                            <div class="group-input ">
                                                <label for="Date Due"><b>Date of Initiation</b></label>
                                                <input readonly type="text" value="{{ date('d-M-Y') }}" name="intiation_date">
                                                <input type="hidden" value="{{ date('Y-m-d') }}" name="intiation_date">
                                            </div>
                                        </div>

                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Division Code"><b>Site/Location Code</b></label>
                                        <input readonly type="text" name="division_code"
                                            value="{{ Helpers::getDivisionName(session()->get('division')) }}">
                                        <input type="hidden" name="division_id" value="{{ session()->get('division') }}">
                                        </div>
                                     </div> 

                                        <div class="col-12">
                                                <div class="group-input">
                                                <label for="salutation">Salutation</label>
                                                <select id="salutation" name="salutation">
                                            <option value="Select">Select</option>
                                            <option value="Mr">Mr.</option>
                                            <option value="Mrs">Mrs.</option>
                                            <option value="Miss">Miss</option>

                                        </select>
                                    </div>
                                </div> 

                                 <div class="col-12">
                                    <div class="group-input">
                            <label for="Assigned_to">Assigned to</label>
                            <input type="text" id="Assigned_to" name="Assigned_to">
                                         </div>
                                </div>

                                 <div class="col-12">
                                    <div class="group-input">
                                        <label for="Short Description">Short Description<span
                                                class="text-danger">*</span></label><span id="rchars">255</span> Characters remaining
                                        <input id="docname" type="text" name="short_description" maxlength="255" required>
                                    </div>
                                </div>  

                                   {{-- <div class="group-input">
                                        <label for="audit-agenda-grid">
                                         Employee Grid <span id="asteriskInviDetails" style="display: none" class="text-danger">*</span>
                                            <button type="button" name="audit-agenda-grid"
                                                id="ReferenceDocument">+</button>
                                            <span class="text-primary" data-bs-toggle="modal"
                                                data-bs-target="#document-details-field-instruction-modal"
                                                style="font-size: 0.8rem; font-weight: 400; cursor: pointer;">
                                                (Launch Instruction)
                                            </span>

                                        </label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="ReferenceDocument_details"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 4%">Row#</th>
                                                        <th style="">Remarks</th>
                                                        <th style="">Category</th>
                                                        <th style="">Others</th>
                                                                                                               
                                                                                                         
                                                    </tr>
                                                </thead>
                                                <tbody>
                                        <td><input disabled type="text" name="serial[]" value="1"></td>
                                        <td><input type="text" class="numberDetail" name="Number[]"></td>
                                        <td><input type="text" class="ReferenceDocumentName" name="ReferenceDocumentName[]"></td>
                                        <td><input type="text" class="Document_Remarks" name="Document_Remarks[]"></td>
                                        
                       
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>

 --}}

                               
                                
                              

                                 
                                {{-- <div class="col-lg-6">
                                    <div class="group-input ">
                                        <label for="Date Due"><b>Date of Initiation</b></label>
                                        <input readonly type="text" value="{{ date('d-M-Y') }}" name="intiation_date">
                                        <input type="hidden" value="{{ date('Y-m-d') }}" name="intiation_date">
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 new-date-data-field">
                                    <div class="group-input input-date">
                                        <label for="Date Due">Due Date</label>
                                        <div><small class="text-primary">If revising Due Date, kindly mention revision reason in "Due Date Extension Justification" data field.</small>
                                        </div>
                                        <div class="calenderauditee">
                                            <input type="text" id="due_date" readonly
                                                placeholder="DD-MMM-YYYY" />
                                            <input type="date" name="due_date" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="hide-input"
                                            oninput="handleDateInput(this, 'due_date')"/>
                                        </div>
                                    </div>
                                </div> --}}
                               
                                    {{-- <?php
                                        // Calculate the due date (30 days from the initiation date)
                                        $initiationDate = date('Y-m-d'); // Current date as initiation date
                                        $dueDate = date('Y-m-d', strtotime($initiationDate . '+30 days')); // Due date
                                        ?> --}}

                                        {{-- <div class="col-lg-6">
                                            <div class="group-input">
                                                <label for="Date of Initiation"><b>Date of Initiation</b></label>
                                                <input readonly type="text" value="{{ date('d-M-Y') }}" name="initiation_date" id="initiation_date">
                                                <input type="hidden" value="{{ date('Y-m-d') }}" name="initiation_date_hidden">
                                            </div>
                                        </div> --}}
                                       

                                        {{-- <div class="col-lg-12 new-date-data-field">
                                            <div class="group-input input-date">
                                                <label for="Due Date">Due Date</label>
                                                <div><small class="text-primary">If revising Due Date, kindly mention revision reason in "Due Date Extension Justification" data field.</small></div>
                                                <div class="calenderauditee">
                                                    <input type="text" id="due_date" readonly placeholder="DD-MM-YYYY" />
                                                    <input type="date" name="due_date" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="hide-input" oninput="handleDateInput(this, 'due_date')" />
                                                </div>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-lg-12 new-date-data-field">
                                            <div class="group-input input-date">
                                                <label for="Date Due">Due Date</label>
                                                <div><small class="text-primary">If revising Due Date, kindly mention revision reason in "Due Date Extension Justification" data field.</small>
                                                </div>
                                                <div class="calenderauditee">
                                                    <input type="text" id="due_date" readonly
                                                        placeholder="DD-MMM-YYYY" />
                                                    <input type="date" name="due_date" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="hide-input"
                                                        oninput="handleDateInput(this, 'due_date')" />
                                                </div>
                                            </div>
                                        </div> --}}

                                        {{-- <script>
                                            // Format the due date to DD-MM-YYYY
                                            var dueDateFormatted = new Date("{{$dueDate}}").toLocaleDateString('en-GB', {
                                                day: '2-digit',
                                                month: '2-digit',
                                                year: 'numeric'
                                            }).split('/').join('-');

                                            // Set the formatted due date value to the input field
                                            document.getElementById('due_date').value = dueDateFormatted;
                                        </script> --}}

                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="deparment"><b>Department</b><span
                                            class="text-danger">*</span></label> 
                                        <select name="deparment" id="departmentSelect" required>
                                            <option value="">-- Select --</option>
                                            <option value="CQA" @if (old('deparment') == 'CQA') selected @endif>
                                                Corporate Quality Assurance</option>
                                            <option value="QAB" @if (old('deparment') == 'QAB') selected @endif>Quality
                                                Assurance Biopharma</option>
                                            <option value="CQC" @if (old('deparment') == 'CQC') selected @endif>Central
                                                Quality Control</option>
                                            <option value="MANU" @if (old('deparment') == 'MANU') selected @endif>
                                                Manufacturing</option>
                                            <option value="PSG" @if (old('deparment') == 'PSG') selected @endif>Plasma
                                                Sourcing Group</option>
                                            <option value="CS" @if (old('deparment') == 'CS') selected @endif>Central
                                                Stores</option>
                                            <option value="ITG" @if (old('deparment') == 'ITG') selected @endif>
                                                Information Technology Group</option>
                                            <option value="MM" @if (old('deparment') == 'MM') selected @endif>
                                                Molecular Medicine</option>
                                            <option value="CL" @if (old('deparment') == 'CL') selected @endif>Central
                                                Laboratory</option>

                                            <option value="TT" @if (old('deparment') == 'TT') selected @endif>Tech
                                                team</option>
                                            <option value="QA" @if (old('deparment') == 'QA') selected @endif>
                                                Quality Assurance</option>
                                            <option value="QM" @if (old('deparment') == 'QM') selected @endif>
                                                Quality Management</option>
                                            <option value="IA" @if (old('deparment') == 'IA') selected @endif>IT
                                                Administration</option>
                                            <option value="ACC" @if (old('deparment') == 'ACC') selected @endif>
                                                Accounting</option>
                                            <option value="LOG" @if (old('deparment') == 'LOG') selected @endif>
                                                Logistics</option>
                                            <option value="SM" @if (old('deparment') == 'SM') selected @endif>
                                                Senior Management</option>
                                            <option value="BA" @if (old('deparment') == 'BA') selected @endif>
                                                Business Administration</option>
                                        </select>
                                        @error('Initiator_Group')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="deparment">Department Code</label>
                                        <input type="text" name="deparment" id="deparmentCode"
                                            value="" readonly>
                                    </div>
                                </div>
                            
                               
{{-- // Description Add Flex Field --}}
                                  {{-- <div class="col-12">
                                    <div class="group-input">
                                        <label for="description">Description</label>                                     <input id="docname" type="text" name="employee_Code" maxlength="255" required>
                                    </div>
                                </div>   --}}
{{-- // Employee grid Add Grid --}}
                                  {{-- <div class="col-12">
                                    <div class="group-input">
                                        <label for="Emp_ID">Employee Grid</label>                                     <input id="docname" type="text" name="employee_Code" maxlength="255" required>
                                    </div>
                                </div>   --}}
                               
                                 <div class="sub-head">
                            Employee 
                           </div>

                                <div class="col-12">
                                    <div class="group-input">
                                        
                                        <label for="Employee Code/NT ID">Employee Code</label>                                     
                                        <input id="docname" type="text" name="employee_Code" maxlength="255" >
                                    </div>
                                </div>  

                                 <div class="col-12">
                                    <div class="group-input">
                                        <label for="Email ID">Email ID</label>                                     
                                        <input id="docname" type="text" name="email" maxlength="255" >
                                    </div>
                                </div>  


                                 <div class="col-12">
                                    <div class="group-input">
                                  <label for="designation">Designation</label>
                                  <select id="designation" name="designation">
                                <option value="Select">Select</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Quality Assurance (QA) Manager">Quality Assurance (QA) Manager</option>
                                <option value="Quality Control (QC) Analyst">Quality Control (QC) Analyst</option>
                                <option value="Regulatory Affairs Specialist">Regulatory Affairs Specialist</option>
                                <option value="Research & Development (R&D) Scientist">Research & Development (R&D) Scientist</option>
                                <option value="Production Supervisor">Production Supervisor</option>
                                <option value="Pharmacist">Pharmacist</option>
                                <option value="Clinical Research Coordinator">Clinical Research Coordinator</option>
                                <option value="Auditor">Auditor</option>
                                <option value="Other">Other</option>                                
                            </select>
                             </div>
                                </div> 
                            
                    
                                 <div class="col-12">
                                    <div class="group-input">
                                        <label for="Name of Reporting Person">Name of Reporting Person</label>                                     
                                        <input id="docname" type="text" name="name_reporting_person" maxlength="255">
                                    </div>
                                </div>  

                                 <div class="col-12">
                                    <div class="group-input">
                                        <label for="employee_Code">Emp.Code of Reporting Person</label>                                     
                                        <input id="docname" type="text" name="employee_Code_reporting_person" maxlength="255" >
                                    </div>
                                </div>
                                 <div class="col-12">
                                    <div class="group-input">
                                        <label for="name_reporting_person">Email ID of Reporting Person</label>                                     
                                        <input id="docname" type="text" name="email_reporting_person" maxlength="255">
                                    </div>
                                </div>

                             <div class="col-12">
                                    <div class="group-input">                                
                         <label for="is_help_desk">Is Help Desk?</label>
                            <select id="is_help_desk    " name="is_help_desk">
                                <option value="Select">Select</option>
                                <option value="yes">Yes</option>    
                                <option value="no">No</option>
                            </select>
                             </div>
                                </div>
                        <!-- Is Local Admin -->
                         <div class="col-12">
                                    <div class="group-input">
                            <label for="is_local_admin">Is Local Admin?</label>
                            <select id="is_local_admin" name="is_local_admin">
                                <option value="Select">Select</option>
                                <option value="yes">Yes</option>    
                                <option value="no">No</option>
                            </select>
                             </div>
                                </div>

                            <!-- Administrator -->


                                 <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Production_person">Production Person</label>
                                        <select name="Production_person" id="Production_person">
                                            <option value="">-- Select --</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                     <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Manager">Manager</label>
                                        <select name="Manager" id="Manager">
                                            <option value="">-- Select --</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- manager --}}

                             {{-- <div class="col-12">
                                    <div class="group-input">
                            <label for="administrator">Administrator</label>
                            <input type="text" id="administrator" name="administrator">
                                         </div>
                                </div> --}}

                                 <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Requestor_User_Comments">Requestor/User Comments <span
                                            class="text-danger">*</span></label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="Requestor_User_Comments[]" id="summernote-1" required>
                                    </textarea>
                                    </div>
                                </div>
                            <!-- Requestor/User Comments -->
                             
                            <!-- Training Evidences Required -->
                             <div class="col-12">
                                    <div class="group-input">
                            <label for="training_required">Training Evidences Required?</label>
                            <select id="training_required" name="training_required">
                                <option value="Select">Select</option>

                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select> </div>
                                </div>

                            <!-- Training Reference Number -->
                             <div class="col-12">
                                    <div class="group-input">
                            <label for="training_reference_number">Training Reference Number</label>
                            <input type="text" id="training_reference_number" name="training_reference_number">
                                </div>
                                </div>
                            <!-- Reference Attachments -->
                             

                                 <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="audit_ttachments">Reference Attachments</label>
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="Audit_file"></div>
                                            <div class="add-btn">
                                                <div>Add</div>
                                                <input type="file" id="HOD_Attachments" name="Audit_file[]"
                                                    oninput="addMultipleFiles(this, 'Audit_file')" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             

                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="no_training_justification">No Training Justification<span
                                            class="text-danger">*</span></label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="no_training_justification[]" id="summernote-1" required>
                                    </textarea>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="access_description*">Access Description<span
                                            class="text-danger">*</span></label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="access_description[]" id="summernote-1" required>
                                    </textarea>
                                    </div>
                                </div>



                                {{-- <div class="col-lg-6 new-date-data-field">
                                    <div class="group-input input-date">
                                        <label for="short_description_required">Nature of Repeat?<span
                                            class="text-danger">*</span></label>
                                        <select name="short_description_required" id="short_description_required" required>
                                            <option value="0">-- Select --</option>
                                            <option value="Recurring" @if (old('short_description_required') == 'Recurring') selected @endif>
                                                Recurring</option>
                                                <option value="Non_Recurring" @if (old('short_description_required') == 'Non_Recurring') selected @endif>
                                                    Non Recurring</option>
                                        </select>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-lg-6">
                                    <div class="group-input" id="nature_of_repeat">
                                        <label for="nature_of_repeat">Repeat Nature <span id="asteriskInviRecurring" style="display: none" class="text-danger">*</span></label>
                                        <textarea name="nature_of_repeat" class="nature_of_repeat"required></textarea>
                                    </div>
                                </div> --}}
                                <script>

                                    document.addEventListener('DOMContentLoaded', function () {
                                        var selectField = document.getElementById('short_description_required');
                                        var inputsToToggle = [];

                                        // Add elements with class 'facility-name' to inputsToToggle
                                        var facilityNameInputs = document.getElementsByClassName('nature_of_repeat');
                                        for (var i = 0; i < facilityNameInputs.length; i++) {
                                            inputsToToggle.push(facilityNameInputs[i]);
                                        }

                                                                        
                                        selectField.addEventListener('change', function () {
                                            var isRequired = this.value === 'Recurring';

                                            inputsToToggle.forEach(function (input) {
                                                input.required = isRequired;
                                                console.log(input.required, isRequired, 'input req');
                                            });

                                            // Show or hide the asterisk icon based on the selected value
                                            var asteriskIcon = document.getElementById('asteriskInviRecurring');
                                            asteriskIcon.style.display = isRequired ? 'inline' : 'none';
                                        });
                                    });
                                </script>
{{-- 
                                <script>
                                    $(document).ready(function () {
                                        $('#short_description_required').change(function () {
                                            var selectedValue = $(this).val();
                                            if (selectedValue === 'Recurring') {
                                                // $('#nature_of_repeat').show();
                                                $('textarea[name="nature_of_repeat"]').prop('required', true);
                                            } else {
                                                // $('#nature_of_repeat').hide();
                                                $('textarea[name="nature_of_repeat"]').prop('required', false);
                                            }
                                        });
                                
                                        // Trigger change event on page load if already selected value is "Recurring"
                                        $('#short_description_required').change();
                                    });
                                </script> --}}


                                 {{-- <div class="col-lg-6 new-date-data-field">
                                    <div class="group-input input-date">
                                        <label for="Deviation date">Deviation Observed On<span
                                            class="text-danger">*</span></label>
                                        <div class="calenderauditee">
                                             <input type="text" id="Deviation_date" readonly placeholder="DD-MMM-YYYY" /> 
                                            {{-- <td><input type="time" name="scheduled_start_time[]"></td> --}}
                                            {{-- <input  type="date"  name="Deviation_date" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="hide-input"
                                                oninput="handleDateInput(this, 'Deviation_date')"required />
                                        </div>
                                    </div>
                                </div>   --}}
                                                               
                                
                                {{-- <div class="col-lg-6 new-time-data-field">
                                    <div class="group-input input-time">
                                        <label for="deviation_time">Deviation Observed On (Time)<span
                                            class="text-danger">*</span></label>
                                        <input type="text" name="deviation_time" id="deviation_time"required>
                                    </div>
                                </div> --}}
                                
                                <script>
                                    flatpickr("#deviation_time", {
                                        enableTime: true,
                                        noCalendar: true,
                                        dateFormat: "h:i K", // Format time as 12-hour with AM/PM
                                        minuteIncrement: 1 // Set minute increment to 1

                                    });
                                </script>
                                {{-- <div class="col-lg-6">
                                    <div class="group-input">
                                        @php
                                            $users = DB::table('users')->get();
                                        @endphp
                                        <label for="If Other">Deviation Observed By<span class="text-danger d-none">*</span></label>
                                        <select  multiple name="Facility[]" placeholder="Select Facility Name"
                                            data-search="false" data-silent-initial-value-set="true" id="Facility">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach                                           
                                        </select>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-lg-6 new-date-data-field">
                                    <div class="group-input input-date">
                                        <label for="Audit Schedule End Date">Deviation Reported on<span
                                            class="text-danger">*</span></label>
                                        <div class="calenderauditee">
                                            <input type="text" id="Deviation_reported_date" readonly placeholder="DD-MMM-YYYY" />
                                            <input type="date"  name="Deviation_reported_date" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="hide-input"
                                                oninput="handleDateInput(this, 'Deviation_reported_date')"required />
                                        </div>
                                    </div>
                                </div> --}}
                                
                             
                                {{-- <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="audit type">Deviation Related To </label>
                                        <select multiple name="audit_type[]" id="audit_type">
                                            {{-- <option value="">Enter Your Selection Here</option> --}}
                                           {{-- <option value="Facility">Facility</option>
                                            <option value="Equipment/Instrument">Equipment/ Instrument </option>
                                            <option value="Documentationerror">Documentation error </option>
                                            <option value="STP/ADS_instruction">STP/ADS instruction </option>
                                            <option value="Packaging&Labelling">Packaging & Labelling  </option>
                                            <option value="Material_System">Material System  </option>
                                            <option value="Laboratory_Instrument/System"> Laboratory Instrument /System</option>
                                            <option value="Utility_System"> Utility System</option>
                                            <option value="Computer_System"> Computer System</option>
                                            <option value="Document">Document</option>
                                            <option value="Data integrity">Data integrity</option>
                                            <option value="SOP Instruction">SOP Instruction</option>
                                            <option value="BMR/ECR Instruction">BMR/ECR Instruction</option>
                                            <option value="Water System">Water System</option>
                                            <option value="Anyother(specify)">Any other (specify) </option>
                                        </select>
                                    </div>
                                </div> 
                                --}

                                
                                {{-- <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="audit type">Deviation Related To </label>
                                        <select name="audit_type[]" id="audit_type" multiple class="form-control">
                                            <option value="">Enter Your Selection Here</option>
                                            <option value="Facility">Facility</option>
                                            <option value="Equipment/Instrument">Equipment/ Instrument </option>
                                            <option value="Documentationerror">Documentation error </option>
                                            <option value="STP/ADS_instruction">STP/ADS instruction </option>
                                            <option value="Packaging&Labelling">Packaging & Labelling  </option>
                                            <option value="Material_System">Material System  </option>
                                            <option value="Laboratory_Instrument/System"> Laboratory Instrument /System</option>
                                            <option value="Utility_System"> Utility System</option>
                                            <option value="Computer_System"> Computer System</option>
                                            <option value="Document">Document</option>
                                            <option value="Data integrity">Data integrity</option>
                                            <option value="SOP Instruction">SOP Instruction</option>
                                            <option value="BMR/ECR Instruction">BMR/ECR Instruction</option>
                                            <option value="Water System">Water System</option>
                                            <option value="Anyother(specify)">Any other (specify) </option>
                                        </select>
                                    </div>
                                </div> --}}
                                
                                
                                 {{-- <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="others">Others <span id="asteriskInviothers" style="display: none" class="text-danger">*</span></label>
                                        <input type="text" id="others" name="others" class="others">
                                    </div>
                                </div>  --}}
                                <script>

                                    document.addEventListener('DOMContentLoaded', function () {
                                        var selectField = document.getElementById('audit_type');
                                        var inputsToToggle = [];

                                        // Add elements with class 'facility-name' to inputsToToggle
                                        var facilityNameInputs = document.getElementsByClassName('others');
                                        for (var i = 0; i < facilityNameInputs.length; i++) {
                                            inputsToToggle.push(facilityNameInputs[i]);
                                        }

                                                                        
                                        selectField.addEventListener('change', function () {
                                            var isRequired = this.value === 'Anyother(specify)';
                                            console.log(this.value, isRequired, 'value');

                                            inputsToToggle.forEach(function (input) {
                                                input.required = isRequired;
                                                console.log(input.required, isRequired, 'input req');
                                            });

                                            // Show or hide the asterisk icon based on the selected value
                                            var asteriskIcon = document.getElementById('asteriskInviothers');
                                            asteriskIcon.style.display = isRequired ? 'inline' : 'none';
                                        });
                                    });
                                </script>
                                {{-- {{-- <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="Facility/Equipment"> Facility/ Equipment/ Instrument/ System Details Required?<span
                                            class="text-danger">*</span></label>
                                        <select name="Facility_Equipment" id="Facility_Equipment"required>
                                            <option value="">--Select --</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>

                                        </select>
                                    </div>
                                </div> 
                                <div class="group-input">
                                        <label for="audit-agenda-grid">
                                        Facility/ Equipment/ Instrument/ System Details <span id="asteriskInvi" style="display: none" class="text-danger">*</span>
                                            <button type="button" name="audit-agenda-grid"
                                                id="ObservationAdd">+</button>
                                            <span class="text-primary" data-bs-toggle="modal"
                                                data-bs-target="#observation-field-instruction-modal"
                                                style="font-size: 0.8rem; font-weight: 400; cursor: pointer;">
                                                (Launch Instruction)
                                            </span>
                                        </label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="onservation-field-table"
                                                >
                                                <thead>
                                                    <tr>
                                                        <th style="width: 5%">Row#</th>
                                                        <th style="width: 12%">Name</th>
                                                        <th style="width: 16%"> ID Number</th>
                                                         <th style="width: 15%">Remarks</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <td><input disabled type="text" name="serial[]" value="1"></td>
                                                <td> <select  name="facility_name[]" id="facility_name" class="facility-name">  <option value="">-- Select --</option>  <option value="1">Facility</option>  <option value="2"> Equipment</option> <option value="3">Instrument</option></select> </td>
                                                <td><input type="text" name="IDnumber[]" class="id-number"></td>
                                                <td><input type="text" name="Remarks[]" class="remarks"></td>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div> --}}
                                    <script> 

                                        document.addEventListener('DOMContentLoaded', function () {
                                            var selectField = document.getElementById('Facility_Equipment');
                                            var inputsToToggle = [];

                                            // Add elements with class 'facility-name' to inputsToToggle
                                            var facilityNameInputs = document.getElementsByClassName('facility-name');
                                            for (var i = 0; i < facilityNameInputs.length; i++) {
                                                inputsToToggle.push(facilityNameInputs[i]);
                                            }

                                            // Add elements with class 'id-number' to inputsToToggle
                                            var idNumberInputs = document.getElementsByClassName('id-number');
                                            for (var j = 0; j < idNumberInputs.length; j++) {
                                                inputsToToggle.push(idNumberInputs[j]);
                                            }

                                            // Add elements with class 'remarks' to inputsToToggle
                                            var remarksInputs = document.getElementsByClassName('remarks');
                                            for (var k = 0; k < remarksInputs.length; k++) {
                                                inputsToToggle.push(remarksInputs[k]);
                                            }

                                                                            
                                            selectField.addEventListener('change', function () {
                                                var isRequired = this.value === 'yes';
                                                console.log(this.value, isRequired, 'value');

                                                inputsToToggle.forEach(function (input) {
                                                    input.required = isRequired;
                                                    console.log(input.required, isRequired, 'input req');
                                                });

                                                // Show or hide the asterisk icon based on the selected value
                                                var asteriskIcon = document.getElementById('asteriskInvi');
                                                asteriskIcon.style.display = isRequired ? 'inline' : 'none';
                                            });
                                        });
                                    </script>
                                    <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="document_details_required">Document Details Required?<span
                                            class="text-danger">*</span></label>
                                        <select name=" document_details_required" id="Document_Details_Required">
                                            <option value="">--Select --</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>

                                        </select>
                                    </div>
                                </div> 
                                    <div class="group-input">
                                        <label for="audit-agenda-grid">
                                         Document Details <span id="asteriskInviDetails" style="display: none" class="text-danger">*</span>
                                            <button type="button" name="audit-agenda-grid"
                                                id="Document_Details">+</button>
                                            <span class="text-primary" data-bs-toggle="modal"
                                                data-bs-target="#document-details_details-field-instruction-modal"
                                                style="font-size: 0.8rem; font-weight: 400; cursor: pointer;">
                                                (Launch Instruction)
                                            </span>
                                        </label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="Document_Details_Details"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 4%">Row#</th>
                                                        <th style="width: 12%">Number</th>
                                                        <th style="width: 16%"> Reference Document Name</th>
                                                        <th style="width: 16%"> Remarks</th>
                                                       
                                                                                                         
                                                    </tr>
                                                </thead>
                                                <tbody>
                                        <td><input disabled type="text" name="serial[]" value="1"></td>
                                        <td><input type="text" class="numberDetail" name="Number[]"></td>
                                        <td><input type="text" class="ReferenceDocumentName" name="ReferenceDocumentName[]"></td>
                                        <td><input type="text" class="Document_Remarks" name="Document_Remarks[]"></td>
                       
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <script>

                                        document.addEventListener('DOMContentLoaded', function () {
                                            // note-codable

                                            var selectField = document.getElementById('Document_Details_Required');
                                            var inputsToToggle = [];

                                            // Add elements with class 'facility-name' to inputsToToggle
                                            var facilityNameInputs = document.getElementsByClassName('numberDetail');
                                            for (var i = 0; i < facilityNameInputs.length; i++) {
                                                inputsToToggle.push(facilityNameInputs[i]);
                                            }
                                                
                                            // Add elements with class 'id-number' to inputsToToggle
                                            var idNumberInputs = document.getElementsByClassName('Document_Remarks');
                                            for (var j = 0; j < idNumberInputs.length; j++) {
                                                inputsToToggle.push(idNumberInputs[j]);
                                            }

                                            // Add elements with class 'remarks' to inputsToToggle
                                            var remarksInputs = document.getElementsByClassName('ReferenceDocumentName');
                                            for (var k = 0; k < remarksInputs.length; k++) {
                                                inputsToToggle.push(remarksInputs[k]);
                                            }

                                                                            
                                            selectField.addEventListener('change', function () {
                                                var isRequired = this.value === 'yes';
                                                console.log(this.value, isRequired, 'value');

                                                inputsToToggle.forEach(function (input) {
                                                    input.required = isRequired;
                                                    console.log(input.required, isRequired, 'input req');
                                                });

                                                // Show or hide the asterisk icon based on the selected value
                                                var asteriskIcon = document.getElementById('asteriskInviDetails');
                                                asteriskIcon.style.display = isRequired ? 'inline' : 'none';
                                            });
                                        });
                                    </script>
                                {{-- <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="Product Batch">Name of Product & Batch No<span
                                            class="text-danger">*</span></label>
                                        <input type="text" name="Product_Batch" id="Product_Batch"required>
                                        
                                            <!-- <p class="text-danger">this field is required</p> -->
                                    
                                    </div>
                          </div> --}}
                               <!-- <div class="col-lg-6">
                                    <div class="group-input" id="external_agencies_req">
                                        <label for="others">HOD / Designee<span class="text-danger d-none">*</span></label>
                                      <select name="hod_designee" id="">
                                        <option value="">-- Select --</option>
                                        <option value="person1">person 1</option>
                                        <option value="person2">person 2</option>
                                      </select>
                                        
                                            
                                    
                                    </div>
                               </div> -->
                      <!-- <div class="col-lg-6">
                                    <div class="group-input" id="external_agencies_req">
                                        <label for="others">Head QA / Designee<span class="text-danger d-none">*</span></label>
                                      <select name="hod_designee" id="">
                                        <option value="">-- Select --</option>
                                        <option value="person1">person 1</option>
                                        <option value="person2">person 2</option>
                                      </select>
                                        
                                           
                                    
                                    </div>
                               </div> -->
                      <!-- <div class="col-lg-6">
                                    <div class="group-input" id="external_agencies_req">
                                        <label for="others">QA<span class="text-danger d-none">*</span></label>
                                      <select name="hod_designee" id="">
                                        <option value="">-- Select --</option>
                                        <option value="person1">person 1</option>
                                        <option value="person2">person 2</option>
                                      </select>
                                        
                                    
                                    </div>
                               </div> -->
                      <!-- <div class="col-6">
                                    <div class="group-input">
                                        <label for="Facility Name">Notify To</label>
                                        <select multiple name="Facility[]" placeholder="Select Facility Name"
                                            data-search="false" data-silent-initial-value-set="true" id="Facility">
                                            <option value="Plant 1"> 1</option>
                                            <option value="Plant 1"> 2</option>
                                            <option value="Plant 1"> 3</option>
                                           
                                        </select>
                                    </div>
                                </div> -->
                                
                                {{-- <div class="col-6">
                                    <div class="group-input">
                                        <label for="Description Deviation">Description of Deviation</label>
                                        <textarea class="summernote" id="Description_Deviation" name="Description_Deviation[]"></textarea>
                                    </div>
                                </div> --}}
                               
                               
                                {{-- <div class="col-6">
                                <div class="group-input">
                                        <label for="ImmediateAction">Immediate Action (if any)</label>
                                        <textarea class="summernote" id="Immediate_Action" name="Immediate_Action[]"></textarea>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Immediate Action">Immediate Action (if any)<span
                                            class="text-danger">*</span></label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="Immediate_Action[]" id="summernote-2"required>
                                    </textarea>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-6">
                                <div class="group-input">
                                        <label for="Preliminary Impact">Preliminary Impact of Deviation</label>
                                        <textarea class="summernote" id="Preliminary_Impact" name="Preliminary_Impact[]"></textarea>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Preliminary Impact">Preliminary Impact of Deviation <span
                                            class="text-danger">*</span></label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="Preliminary_Impact[]" id="summernote-3" required>
                                    </textarea>
                                    </div>
                                </div> --}}
                                
                            </div>
                            <div class="button-block">
                                <button type="submit" id="ChangesaveButton001" onclick="handleClick001()" class="saveButton">Save</button>
                                <button type="button" id="ChangeNextButton" class="nextButton">Next</button>
                                <button type="button"> <a href="{{ url('rcms/qms-dashboard') }}" class="text-white">Exit</a> </button>
                            </div>
                        </div>
                    </div>
                    
                            
                    <!-- ----------hod Review-------- -->
                    <div id="CCForm8" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="row">
                            {{-- <div class="group-input">
                                        <label for="audit-agenda-grid">
                                       Product Details 
                                            <button type="button" name="audit-agenda-grid"
                                                id="ProductDetails">+</button>
                                            <span class="text-primary" data-bs-toggle="modal"
                                                data-bs-target="#product-details-field-instruction-modal"
                                                style="font-size: 0.8rem; font-weight: 400; cursor: pointer;">
                                                (Launch Instruction)
                                            </span>
                                        </label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="ProductDetails_details"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 4%">Row#</th>
                                                        <th style="width: 12%"> Product Name</th>
                                                        
                                                        <th style="width: 16%"> Batch No</th>
                                                        <th style="width: 16%"> Remarks</th>
                                                       
                                                                                                         
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <td><input disabled type="text" name="serial[]" value="1"></td>
                                                    <td><input type="text" name="Product_Name[]"></td>
                                                    <td><input type="text" name=" Batch_No[]"></td>
                                                    <td><input type="text" name="Remarks[]"></td>
                                                
                                                  
                                                    
                                                </tbody>

                                            </table>
                                        </div>
                                    </div> --}}
       
    
                               
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="HOD_Remarks">HOD Remarks</label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="HOD_Remarks" id="summernote-4">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="Audit Attachments">HOD Attachments</label>
                                        <div><small class="text-primary">Please Attach all relevant or supporting documents</small></div>
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="Audit_file"></div>
                                            <div class="add-btn">
                                                <div>Add</div>
                                                <input type="file" id="HOD_Attachments" name="Audit_file[]"
                                                    oninput="addMultipleFiles(this, 'Audit_file')" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                               
                            </div>
                            <div class="button-block">
                                <button type="submit" class="saveButton">Save</button>
                                    <a href="/rcms/qms-dashboard">
                                        <button type="button" class="backButton">Back</button>
                                    </a>
                                <button type="button" class="nextButton" onclick="nextStep()">Next</button>
                                <button type="button"> <a href="{{ url('rcms/qms-dashboard') }}" class="text-white"> Exit </a> </button>
                            </div>
                        </div>
                    </div>
                       <!-- QA Initial reVIEW -->
                       <div id="CCForm2" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="row">
                               
                                 <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="QA_Initial_Comments">QA Initial Comments</label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="QA_Initial_Comments" name="QA_Initial_Comments" id="QA_Initial_Comments">
                                    </textarea>
                                    </div>
                                </div>

                                 <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="QA Initial Attachments">QA Attachments</label>
                                        <div><small class="text-primary">Please Attach all relevant or supporting documents</small></div>
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="Initial_attachment"></div>
                                            <div class="add-btn">
                                                <div>Add</div>
                                                <input type="file" id="myfile" name="Initial_attachment[]"
                                                    oninput="addMultipleFiles(this, 'Initial_attachment')" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                   
                                
                                {{-- <div style="margin-bottom: 0px;" class="col-lg-12 new-date-data-field ">
                                    <div class="group-input input-date">
                                        <label for="Deviation category">Initial Deviation Category</label>
                                        <select name="Deviation_category" id="Deviation_category">
                                            <option value="0">-- Select -- </option>
                                            <option value="minor">Minor </option>
                                            <option value="major">Major </option>
                                            <option value="critical">Critical </option>
                                        </select>

                                    </div>
                                </div> --}}
                                {{-- <div class="col-lg-12 new-date-data-field">
                                    <div class="group-input input-date">
                                        <label class="mt-4"  for="Audit Schedule End Date">Justification for Categorization</label>
                                        <textarea class="summernote" name="Justification_for_categorization" id="" cols="30" ></textarea>

                                    </div>
                                </div> --}}
                                {{-- <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Justification for Categorization">Justification for Categorization</label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="Justification_for_categorization" id="summernote-5">
                                    </textarea>
                                    </div>
                                </div>
                                 --}}
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="Investigation_required">Investigation  Required ?</label>
                                        <select name="Investigation_required" id="Investigation_required">
                                            <option value="0">-- Select --</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                  
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Product/Material Name">Investigation Details </label>
                                        <textarea class="summernote" name="Investigation_Details" id="" cols="30" ></textarea>
                                  
                                    </div>
                                </div> --}}
                                <div class="col-md-12 mb-3">
                                    <div class="group-input" id="Investigations_details">
                                        <label for="Investigation_Details">Investigation Details<span class="text-danger">*</span></label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote Investigation_Details" name="Investigation_Details[]" id="summernote-6">
                                    </textarea>
                                    </div>
                                </div>
                                
                                {{-- <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Customer notification">Assets Required ?</label>
                                        <select name="Customer_notification" id="Customer_notification">
                                            <option value="0">-- Select --</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                            <option value="na">NA</option>
                                        </select>
                                    </div>  
                                </div>
                                <div class="col-5">
                                    <div class="group-input" id="customer_option">
                                        @php
                                            $customers = DB::table('customer-details')->get();
                                        @endphp
                                        <label for="Assets">Assets<span class="text-danger">*</span></label>
                                        <select name="Assets" id="Assets">
                                            <option value="0"> -- Select --</option>
                                            @foreach ($customers as $data)
                                            <option value="{{ $data->id }}">{{ $data->customer_name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="group-input">
                                        <!-- <label for="Comments(If Any)">Customers</label> -->
                                        <button style="margin-top: 21px; border: 1px solid gray; background: #6f81dd; color: #fff;" type="button" class="btn b" data-bs-toggle="modal" data-bs-target="#myModal">
                                              Asset
                                    </button>
                                    </div>
                                </div> --}}

                                {{-- <div class="col-12">
                                    <div class="group-input"> 
                                        <label for="related_records">Related Records</label>
                                        <select multiple name="related_records[]" placeholder="Select Reference Records"
                                            data-search="false" data-silent-initial-value-set="true" id="related_records">
                                            @foreach ($pre as $prix)
                                                <option value="{{ $prix->id }}">
                                                    {{ Helpers::getDivisionName($prix->division_id) }}/Change-Control/{{ Helpers::year($prix->created_at) }}/{{ Helpers::record($prix->record) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="related_records">Related Records</label>

                                        <select multiple name="related_records[]" placeholder="Select Reference Records"
                                            data-search="false" data-silent-initial-value-set="true"
                                            id="related_records">
                                            @foreach ($pre as $prix)
                                                <option value="{{ $prix->id }}">
                                                    {{ Helpers::getDivisionName($prix->division_id) }}/Deviation/{{ Helpers::year($prix->created_at) }}/{{ Helpers::record($prix->record) }}/{{$prix->short_description}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="col-12">
                                    <div class="group-input">
                                        <label for="Comments(If Any)">QA Initial Remarks</label>
                                      <textarea class="summernote" name="QAInitialRemark" id="" cols="30" ></textarea>
                                    </div>
                                </div> --}}
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="QAInitialRemark">QA Initial Remarks</label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="QAInitialRemark" id="summernote-7">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="QA Initial Attachments">QA Initial Attachments</label>
                                        <div><small class="text-primary">Please Attach all relevant or supporting documents</small></div>
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="Initial_attachment"></div>
                                            <div class="add-btn">
                                                <div>Add</div>
                                                <input type="file" id="myfile" name="Initial_attachments[]"
                                                    oninput="addMultipleFiles(this, 'Initial_attachment')" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="button-block">
                                <button type="submit" class="saveButton">Save</button>
                                    <a href="/rcms/qms-dashboard">
                                        <button type="button" class="backButton">Back</button>
                                    </a>
                                <button type="button" class="nextButton" onclick="nextStep()">Next</button>
                                <button type="button"> <a href="{{ url('rcms/qms-dashboard') }}" class="text-white"> Exit </a> </button>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $('#Deviation_category').change(function () {
                                if ($(this).val() === 'major') {
                                    $('#Investigation_required').val('yes').prop('disabled', true);
                                    $('#Investigations_details').show();
                                    $('textarea[name="Investigations_details"]').prop('required', true);

                                    $('#Customer_notification').val('yes').prop('disabled', true);
                                    $('#customer_option').show();
                                    $('textarea[name="customer_option"]').prop('required', true);
                                } else {
                                    $('#Customer_notification').prop('disabled', false);
                                    $('#customer_option').hide();
                                    $('textarea[name="customer_option"]').prop('required', false);
                                    $('#Investigation_required').prop('disabled', false);
                                    $('#Investigations_details').hide();
                                    $('textarea[name="Investigations_details"]').prop('required', false);
                                }
                                // if ($(this).val() === 'major') {
                                //     $('#Investigation_required').val('yes');
                                //     $('#Customer_notification').val('yes');
                                // }
                            });
                        });
                        $(document).ready(function () {
                            $('#Investigation_required').change(function () {
                                var selectedValue = $(this).val();
                                if (selectedValue === 'yes') {
                                    $('#Investigations_details').show();
                                    $('textarea[name="Investigations_details"]').prop('required', true);
                                } else {
                                    $('#Investigations_details').hide();
                                    $('textarea[name="Investigations_details"]').prop('required', false);
                                }
                            });
                    
                            // Trigger change event on page load if already selected value is "Recurring"
                            $('#Investigation_required').change();
                        });
                        $(document).ready(function () {
                            $('#Customer_notification').change(function () {
                                var selectedValue = $(this).val();
                                if (selectedValue === 'yes') {
                                    $('#customer_option').show();
                                    $('textarea[name="customer_option"]').prop('required', true);
                                } else {
                                    $('#customer_option').hide();
                                    $('textarea[name="customer_option"]').prop('required', false);
                                }
                            });
                    
                            // Trigger change event on page load if already selected value is "Recurring"
                            $('#Customer_notification').change();
                        });
                    </script>
                    {{-- <script>
                        $(document).ready(function () {
                            // Event listener for Investigation_required dropdown
                            $('#Investigation_required').change(function () {
                                if ($(this).val() === 'yes') {
                                    // If "Yes" is selected, make Investigation_Details field required
                                    $('.Investigation_Details').prop('required', true);
                                } else {
                                    // If "No" or any other option is selected, remove the required attribute
                                    $('.Investigation_Details').prop('required', false);
                                    // Hide error message when not required
                                    $('.error-message').hide();
                                }
                            });
                    
                            // Event listener for Investigation_Details field
                            $('.Investigation_Details').blur(function () {
                                // Check if the field is empty and required
                                if ($(this).prop('required') && $(this).val().trim() === '') {
                                    // Show error message if empty
                                    $('.error-message').show();
                                } else {
                                    // Hide error message if not empty
                                    $('.error-message').hide();
                                }
                            });
                    
                            // Initial check when page loads
                            if ($('#Investigation_required').val() === 'yes') {
                                $('.Investigation_Details').prop('required', true);
                            }
                        });
                    </script>
                    <script>
                        $(document).ready(function () {
                            // Event listener for Customer_notification dropdown
                            $('#Customer_notification').change(function () {
                                if ($(this).val() === 'yes') {
                                    // If "Yes" is selected, make Investigation_Details field required
                                    $('#customers').prop('required', true);
                                } else {
                                    // If "No" or any other option is selected, remove the required attribute
                                    $('#customers').prop('required', false);
                                    // Hide error message when not required
                                    $('.error-message').hide();
                                }
                            });
                    
                            // Event listener for Investigation_Details field
                            $('#customers').blur(function () {
                                // Check if the field is empty and required
                                if ($(this).prop('required') && $(this).val().trim() === '') {
                                    // Show error message if empty
                                    $('.error-message').show();
                                } else {
                                    // Hide error message if not empty
                                    $('.error-message').hide();
                                }
                            });
                    
                            // Initial check when page loads
                            if ($('#Customer_notification').val() === 'yes') {
                                $('#customers').prop('required', true);
                            }
                        });
                    </script> --}}
   <!-- CFT -->
                <div id="CCForm7" class="inner-block cctabcontent">
             <div class="inner-block-content">
                    <div class="row">
                            <div class="sub-head">
                            Production
                           </div>
                           <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Production Review">Production Review Required ?</label>
                                        <select name="Production_Review" id="Production_Review">
                                            <option value="0">-- Select --</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                            <option value="na">NA</option>

                                        </select>
                                  
                                    </div>
                                </div>
                                @php
                                    $division = DB::table('q_m_s_divisions')->where('name', Helpers::getDivisionName(session()->get('division')))->first();
                                    $userRoles = DB::table('user_roles')->where(['q_m_s_roles_id' => 22, 'q_m_s_divisions_id' => $division->id])->get();
                                    $userRoleIds = $userRoles->pluck('user_id')->toArray();
                                    $users = DB::table('users')->whereIn('id', $userRoleIds)->get(); // Fetch user data based on user IDs
                                @endphp

                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Production person">Production Person</label>
                                        <select name="Production_person" id="Production_person">
                                            <option value="">-- Select --</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Production assessment">Impact Assessment (By Production)</label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="Production_assessment" id="summernote-17">
                                    </textarea>
                                    </div>
                                </div>
                                 <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Production feedback">Production Feedback</label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="Production_feedback" id="summernote-18">
                                    </textarea>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="production attachment"> Production Attachments</label>
                                        <div><small class="text-primary">Please Attach all relevant or supporting documents</small></div>
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="production_attachment"></div>
                                            <div class="add-btn">
                                                <div>Add</div>
                                                <input type="file" id="myfile" name="production_attachment[]"
                                                    oninput="addMultipleFiles(this, 'production_attachment')" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <div class="col-md-6 mb-3"> 
                                    <div class="group-input">
                                        <label for="Production Review Completed By">Production Review Completed By</label>
                                        <input disabled type="text" name="production_by" id="production_by" >
                                    </div>
                                </div>
                                <div class="col-lg-6 new-date-data-field">
                                    <div class="group-input input-date">
                                        <label for="Production Review Completed On">Production Review Completed On</label>
                                        <div class="calenderauditee">
                                            <input type="text" id="production_on" readonly placeholder="DD-MMM-YYYY" />
                                            <input type="date"  name="production_on" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="hide-input"
                                                oninput="handleDateInput(this, 'production_on')" />
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-head">
                                Warehouse
                           </div>
                           <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Warehouse Review Required">Warehouse Review Required ?</label>
                                        <select name="Warehouse_review" id="Warehouse_review">
                                            <option value="0">-- Select --</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                            <option value="na">NA</option>

                                        </select>
                                  
                                    </div>
                                </div>
                                @php
                                    $division = DB::table('q_m_s_divisions')->where('name', Helpers::getDivisionName(session()->get('division')))->first();
                                    $userRoles = DB::table('user_roles')->where(['q_m_s_roles_id' => 23, 'q_m_s_divisions_id' => $division->id])->get();
                                    $userRoleIds = $userRoles->pluck('user_id')->toArray();
                                    $users = DB::table('users')->whereIn('id', $userRoleIds)->get(); // Fetch user data based on user IDs
                                @endphp
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Customer notification">Warehouse Person</label>
                                        <select name="Warehouse_notification" id="Warehouse_person">
                                            <option value="0">-- Select --</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Impact Assessment1">Impact Assessment (By Warehouse)</label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="Warehouse_assessment" id="summernote-19">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="productionfeedback">Warehouse Feedback</label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="Warehouse_feedback" id="summernote-20">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="Warehouse attachment"> Warehouse Attachments</label>
                                        <div><small class="text-primary">Please Attach all relevant or supporting documents</small></div>
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="Warehouse_attachment"></div>
                                            <div class="add-btn">
                                                <div>Add</div>
                                                <input type="file" id="myfile" name="Warehouse_attachment[]"
                                                    oninput="addMultipleFiles(this, 'Warehouse_attachment')" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="group-input">
                                        <label for="Warehousefeedback">Warehouse Review Completed By</label>
                                        <input disabled type="text"  name="Warehouse_by" id="Warehouse_by" >
                                    
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 new-date-data-field">
                                    <div class="group-input input-date">
                                        <label for="Warehouse Review Completed On">Warehouse Review Completed On</label>
                                        <div class="calenderauditee">
                                            <input type="text" id="Warehouse_on" readonly placeholder="DD-MMM-YYYY" />
                                            <input type="date"  name="Warehouse_on" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="hide-input"
                                                oninput="handleDateInput(this, 'Warehouse_on')" />
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-head">
                                Quality Control
                           </div>
                           <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Quality Control Review Required">Quality Control Review Required ?</label>
                                        <select name="Quality_review" id="Quality_review">
                                            <option value="0">-- Select --</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                            <option value="na">NA</option>

                                        </select>
                                  
                                    </div>
                                </div>
                                @php
                                    $division = DB::table('q_m_s_divisions')->where('name', Helpers::getDivisionName(session()->get('division')))->first();
                                    $userRoles = DB::table('user_roles')->where(['q_m_s_roles_id' => 24, 'q_m_s_divisions_id' => $division->id])->get();
                                    $userRoleIds = $userRoles->pluck('user_id')->toArray();
                                    $users = DB::table('users')->whereIn('id', $userRoleIds)->get(); // Fetch user data based on user IDs
                                @endphp
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Quality Control Person">Quality Control Person</label>
                                        <select name="Quality_Control_Person" id="Quality_Control_Person">
                                            <option value="0">-- Select --</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                        </select>
                                  
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Impact Assessment2">Impact Assessment (By Quality Control)</label>
                                        <textarea class="summernote" name="Quality_Control_assessment" id="summernote-21">
                                    </textarea>
                                    </div>
                                </div>  
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Quality Control Feedback">Quality Control Feedback</label>
                                        <textarea class="summernote" name="Quality_Control_feedback" id="summernote-22">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="Quality Control Attachments">Quality Control Attachments</label>
                                        <div><small class="text-primary">Please Attach all relevant or supporting documents</small></div>
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="Quality_Control_attachment"></div>
                                            <div class="add-btn">
                                                <div>Add</div>
                                                <input type="file" id="myfile" name="Quality_Control_attachment[]"
                                                    oninput="addMultipleFiles(this, 'Quality_Control_attachment')" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="group-input">
                                        <label for="productionfeedback">Quality Control Review Completed By</label>
                                        <input type="text" name="QualityAssurance__by" disabled>
                                    
                                    </div>
                                </div>
                                <div class="col-lg-6 new-date-data-field">
                                    <div class="group-input input-date">
                                        <label for="Quality Control Review Completed On">Quality Control Review Completed On</label>
                                        <div class="calenderauditee">
                                            <input type="text" id="Quality_Control_on" readonly placeholder="DD-MMM-YYYY" />
                                            <input type="date"  name="Quality_Control_on" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="hide-input"
                                                oninput="handleDateInput(this, 'Quality_Control_on')" />
                                        </div>
                                    </div>
                                </div>
                                  <div class="sub-head">
                                  Quality Assurance
                           </div>
                           <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Customer notification">Quality Assurance Review Required ?</label>
                                        <select name="Quality_Assurance" id="QualityAssurance_review">
                                            <option value="0">-- Select --</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                            <option value="na">NA</option>

                                        </select>
                                  
                                    </div>
                                </div>
                                @php
                                    $division = DB::table('q_m_s_divisions')->where('name', Helpers::getDivisionName(session()->get('division')))->first();
                                    $userRoles = DB::table('user_roles')->where(['q_m_s_roles_id' => 25, 'q_m_s_divisions_id' => $division->id])->get();
                                    $userRoleIds = $userRoles->pluck('user_id')->toArray();
                                    $users = DB::table('users')->whereIn('id', $userRoleIds)->get(); // Fetch user data based on user IDs
                                @endphp
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Quality Assurance Person">Quality Assurance Person</label>
                                        <select name="QualityAssurance_person" id="QualityAssurance_person">
                                            <option value="0">-- Select --</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                      </select>
                                  
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Impact Assessment3">Impact Assessment (By Quality Assurance)</label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="QualityAssurance_assessment" id="summernote-23">
                                    </textarea>
                                    </div>
                                </div>  
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Quality Assurance Feedback">Quality Assurance Feedback</label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="QualityAssurance_feedback" id="summernote-24">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="Quality Assurance Attachments">Quality Assurance Attachments</label>
                                        <div><small class="text-primary">Please Attach all relevant or supporting documents</small></div>
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="Quality_Assurance_attachment"></div>
                                            <div class="add-btn">
                                                <div>Add</div>
                                                <input type="file" id="myfile" name="Quality_Assurance_attachment[]"
                                                    oninput="addMultipleFiles(this, 'Quality_Assurance_attachment')" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="group-input">
                                        <label for="Quality Assurance Review Completed By">Quality Assurance Review Completed By</label>
                                        <input type="text" name="QualityAssurance_by" disabled>
                                    
                                    </div>
                                </div>
                                <div class="col-lg-6 new-date-data-field">
                                    <div class="group-input input-date">
                                        <label for="Quality Assurance Review Completed On">Quality Assurance Review Completed On</label>
                                        <div class="calenderauditee">
                                            <input type="text" id="QualityAssurance_on" readonly placeholder="DD-MMM-YYYY" />
                                            <input type="date"  name="QualityAssurance_on" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="hide-input"
                                                oninput="handleDateInput(this, 'QualityAssurance_on')" />
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-head">
                                Engineering
                           </div>
                           <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Engineering Review Required">Engineering Review Required ?</label>
                                        <select name="Engineering_review" id="Engineering_review">
                                            <option value="0">-- Select --</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                            <option value="na">NA</option>
                                        </select>
                                  
                                    </div>
                                </div>
                                @php
                                    $division = DB::table('q_m_s_divisions')->where('name', Helpers::getDivisionName(session()->get('division')))->first();
                                    $userRoles = DB::table('user_roles')->where(['q_m_s_roles_id' => 26, 'q_m_s_divisions_id' => $division->id])->get();
                                    $userRoleIds = $userRoles->pluck('user_id')->toArray();
                                    $users = DB::table('users')->whereIn('id', $userRoleIds)->get(); // Fetch user data based on user IDs
                                @endphp
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Engineering Person">Engineering Person</label>
                                        <select name="Engineering_person" id="Engineering_person">
                                            <option value="0">-- Select --</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                        </select>
                                  
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Impact Assessment4">Impact Assessment (By Engineering)</label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="Engineering_assessment" id="summernote-25">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="productionfeedback">Engineering  Feedback</label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="Engineering_feedback" id="summernote-26">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="Audit Attachments">Engineering  Attachments</label>
                                        <div><small class="text-primary">Please Attach all relevant or supporting documents</small></div>
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="Engineering_attachment"></div>
                                            <div class="add-btn">
                                                <div>Add</div>
                                                <input type="file" id="myfile" name="Engineering_attachment[]"
                                                    oninput="addMultipleFiles(this, 'Engineering_attachment')" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="group-input">
                                        <label for="Engineering Review Completed By">Engineering Review Completed By</label>
                                        <input type="text" name="Engineering_by" id="Engineering_by" disabled>
                                    
                                    </div>
                                </div>
                                <div class="col-lg-6 new-date-data-field">
                                    <div class="group-input input-date">
                                        <label for="Engineering Review Completed On">Engineering Review Completed On</label>
                                        <div class="calenderauditee">
                                            <input type="text" id="Engineering_on" readonly placeholder="DD-MMM-YYYY" />
                                            <input type="date"  name="Engineering_on" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="hide-input"
                                                oninput="handleDateInput(this, 'Engineering_on')" />
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-head">
                                Analytical Development Laboratory
                           </div>
                           <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Analytical Development Laboratory Review Required">Analytical Development Laboratory Review Required ?</label>
                                        <select name="Analytical_Development_review" id="Analytical_Development_review">
                                            <option value="0">-- Select --</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                            <option value="na">NA</option>

                                        </select>
                                  
                                    </div>
                                </div>
                                @php
                                $division = DB::table('q_m_s_divisions')->where('name', Helpers::getDivisionName(session()->get('division')))->first();
                                $userRoles = DB::table('user_roles')->where(['q_m_s_roles_id' => 27, 'q_m_s_divisions_id' => $division->id])->get();
                                $userRoleIds = $userRoles->pluck('user_id')->toArray();
                                $users = DB::table('users')->whereIn('id', $userRoleIds)->get(); // Fetch user data based on user IDs
                            @endphp
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Analytical Development Laboratory Person">Analytical Development Laboratory Person</label>
                                        <select name="Analytical_Development_person" id="Analytical_Development_person">
                                            <option value="0">-- Select --</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Impact Assessment5">Impact Assessment (By Analytical Development Laboratory)</label>
                                        <textarea class="summernote" name="Analytical_Development_assessment" id="summernote-27">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Analytical Development Laboratory Feedback"> Analytical Development Laboratory Feedback</label>
                                        <textarea class="summernote" name="Analytical_Development_feedback" id="summernote-28">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="Audit Attachments"> Analytical Development Laboratory Attachments</label>
                                        <div><small class="text-primary">Please Attach all relevant or supporting documents</small></div>
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="Analytical_Development_attachment"></div>
                                            <div class="add-btn">
                                                <div>Add</div>
                                                <input type="file" id="myfile" name="Analytical_Development_attachment[]"
                                                    oninput="addMultipleFiles(this, 'Analytical_Development_attachment')" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="group-input">
                                        <label for="Analytical Development Laboratory Review Completed By">Analytical Development Laboratory Review Completed By</label>
                                        <input type="text" name="Analytical_Development_by" id="Analytical_Development_by" disabled>
                                    
                                    </div>
                                </div>
                                {{-- <div class="col-md-6 mb-3">
                                    <div class="group-input">
                                        <label for="Analytical Development Laboratory Review Completed On">Analytical Development Laboratory Review Completed On</label>
                                        <input type="date" name="Analytical_Development_on" disabled>
                                    
                                    </div>
                                </div> --}}
                                <div class="col-lg-6 new-date-data-field">
                                    <div class="group-input input-date">
                                        <label for="Analytical Development Laboratory Review Completed On">Analytical Development Laboratory Review Completed On</label>
                                        <div class="calenderauditee">
                                            <input type="text" id="Analytical_Development_on" readonly placeholder="DD-MMM-YYYY" />
                                            <input type="date"  name="Analytical_Development_on" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="hide-input"
                                                oninput="handleDateInput(this, 'Analytical_Development_on')" />
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-head">
                                Process Development Laboratory / Kilo Lab
                           </div>
                           <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Process Development Laboratory"> Process Development Laboratory / Kilo Lab Review Required ?</label>
                                        <select name="Kilo_Lab_review" id="Kilo_Lab_review">
                                            <option value="0">-- Select --</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                            <option value="na">NA</option>

                                        </select>
                                  
                                    </div>
                                </div>
                                @php
                                    $division = DB::table('q_m_s_divisions')->where('name', Helpers::getDivisionName(session()->get('division')))->first();
                                    $userRoles = DB::table('user_roles')->where(['q_m_s_roles_id' => 28, 'q_m_s_divisions_id' => $division->id])->get();
                                    $userRoleIds = $userRoles->pluck('user_id')->toArray();
                                    $users = DB::table('users')->whereIn('id', $userRoleIds)->get(); // Fetch user data based on user IDs
                                @endphp
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Process Development Laboratory"> Process Development Laboratory / Kilo Lab  Person</label>
                                        <select name="Kilo_Lab_person" id="Kilo_Lab_person">
                                            <option value="0">-- Select --</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                           

                                        </select>
                                  
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Impact Assessment6">Impact Assessment (By Process Development Laboratory / Kilo Lab)</label>
                                        <textarea class="summernote" name="Kilo_Lab_assessment" id="summernote-29">
                                    </textarea>
                                    </div>
                                </div>  
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Kilo Lab Feedback"> Process Development Laboratory / Kilo Lab  Feedback</label>
                                        <textarea class="summernote" name="Kilo_Lab_feedback" id="summernote-30">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="Audit Attachments"> Process Development Laboratory / Kilo Lab Attachments</label>
                                        <div><small class="text-primary">Please Attach all relevant or supporting documents</small></div>
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="Kilo_Lab_attachment"></div>
                                            <div class="add-btn">
                                                <div>Add</div>
                                                <input type="file" id="myfile" name="Kilo_Lab_attachment[]"
                                                    oninput="addMultipleFiles(this, 'Kilo_Lab_attachment')" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="group-input">
                                        <label for="Kilo Lab Review Completed By">Process Development Laboratory / Kilo Lab Review Completed By</label>
                                        <input type="text" name="Kilo_Lab_attachment_by" id="Kilo_Lab_attachment_by" disabled>
                                    
                                    </div>
                                </div>
                                <div class="col-lg-6 new-date-data-field">
                                    <div class="group-input input-date">
                                        <label for="Kilo Lab Review Completed On">Process Development Laboratory / Kilo Lab Review Completed On</label>
                                        <div class="calenderauditee">
                                            <input type="text" id="Kilo_Lab_attachment_on" readonly placeholder="DD-MMM-YYYY" />
                                            <input type="date"  name="Kilo_Lab_attachment_on" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="hide-input"
                                                oninput="handleDateInput(this, 'Kilo_Lab_attachment_on')" />
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-head">
                                Technology Transfer / Design
                           </div>
                           <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Design Review Required">Technology Transfer / Design Review Required ?</label>
                                        <select name="Technology_transfer_review" id="Technology_transfer_review">
                                            <option value="0">-- Select --</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                            <option value="na">NA</option>

                                        </select>
                                  
                                    </div>
                                </div>
                                @php
                                    $division = DB::table('q_m_s_divisions')->where('name', Helpers::getDivisionName(session()->get('division')))->first();
                                    $userRoles = DB::table('user_roles')->where(['q_m_s_roles_id' => 29, 'q_m_s_divisions_id' => $division->id])->get();
                                    $userRoleIds = $userRoles->pluck('user_id')->toArray();
                                    $users = DB::table('users')->whereIn('id', $userRoleIds)->get(); // Fetch user data based on user IDs
                                @endphp
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Design Person"> Technology Transfer / Design  Person</label>
                                        <select name="Technology_transfer_person" id="Technology_transfer_person">
                                            <option value="0">-- Select --</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                           

                                        </select>
                                  
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Impact Assessment7">Impact Assessment (By Technology Transfer / Design)</label>
                                        <textarea class="summernote" name="Technology_transfer_assessment" id="summernote-31">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Design Feedback"> Technology Transfer / Design  Feedback</label>
                                        <textarea class="summernote" name="Technology_transfer_feedback" id="summernote-32">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="Audit Attachments"> Technology Transfer / Design Attachments</label>
                                        <div><small class="text-primary">Please Attach all relevant or supporting documents</small></div>
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="Technology_transfer_attachment"></div>
                                            <div class="add-btn">
                                                <div>Add</div>
                                                <input type="file" id="myfile" name="Technology_transfer_attachment[]"
                                                    oninput="addMultipleFiles(this, 'Technology_transfer_attachment')" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="group-input">
                                        <label for="Design Review Completed By">Technology Transfer / Design Review Completed By</label>
                                        <input type="text" name="Technology_transfer_by" disabled>
                                    
                                    </div>
                                </div>
                                <div class="col-lg-6 new-date-data-field">
                                    <div class="group-input input-date">
                                        <label for="Design Review Completed On">Technology Transfer / Design Review Completed On</label>
                                        <div class="calenderauditee">
                                            <input type="text" id="Technology_transfer_on" readonly placeholder="DD-MMM-YYYY" />
                                            <input type="date"  name="Technology_transfer_on" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="hide-input"
                                                oninput="handleDateInput(this, 'Technology_transfer_on')" />
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-head">
                                Environment, Health & Safety
                           </div>
                           <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Safety Review Required">Environment, Health & Safety Review Required ?</label>
                                        <select name="Environment_Health_review" id="Environment_Health_review">
                                            <option value="0">-- Select --</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                            <option value="na">NA</option>

                                        </select>
                                  
                                    </div>
                                </div>
                                @php
                                    $division = DB::table('q_m_s_divisions')->where('name', Helpers::getDivisionName(session()->get('division')))->first();
                                    $userRoles = DB::table('user_roles')->where(['q_m_s_roles_id' => 30, 'q_m_s_divisions_id' => $division->id])->get();
                                    $userRoleIds = $userRoles->pluck('user_id')->toArray();
                                    $users = DB::table('users')->whereIn('id', $userRoleIds)->get(); // Fetch user data based on user IDs
                                @endphp
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Safety Person"> Environment, Health & Safety  Person</label>
                                        <select name="Environment_Health_Safety_person" id="Environment_Health_Safety_person">
                                            <option value="0">-- Select --</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                        </select>
                                  
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Impact Assessment8">Impact Assessment (By Environment, Health & Safety)</label>
                                        <textarea class="summernote" name="Health_Safety_assessment" id="summernote-33">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="productionfeedback">Environment, Health & Safety  Feedback</label>
                                        <textarea class="summernote" name="Health_Safety_feedback" id="summernote-34">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="Audit Attachments"> Environment, Health & Safety Attachments</label>
                                        <div><small class="text-primary">Please Attach all relevant or supporting documents</small></div>
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="Environment_Health_Safety_attachment"></div>
                                            <div class="add-btn">
                                                <div>Add</div>
                                                <input type="file" id="myfile" name="Environment_Health_Safety_attachment[]"
                                                    oninput="addMultipleFiles(this, 'Environment_Health_Safety_attachment')" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="group-input">
                                        <label for="productionfeedback">Environment, Health & Safety Review Completed By</label>
                                        <input type="text" name="Environment_Health_Safety_by" id="Environment_Health_Safety_by"  disabled>
                                    
                                    </div>
                                </div>
                                <div class="col-lg-6 new-date-data-field">
                                    <div class="group-input input-date">
                                        <label for="Safety Review Completed On">Environment, Health & Safety Review Completed On</label>
                                        <div class="calenderauditee">
                                            <input type="text" id="Environment_Health_Safety_on" readonly placeholder="DD-MMM-YYYY" />
                                            <input type="date"  name="Environment_Health_Safety_on" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="hide-input"
                                                oninput="handleDateInput(this, 'Environment_Health_Safety_on')" />
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-head">
                                Human Resource & Administration
                           </div>
                           <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Administration Review Required">Human Resource & Administration Review Required ?</label>
                                        <select name="Human_Resource_review" id="Human_Resource_review">
                                            <option value="0">-- Select --</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                            <option value="na">NA</option>

                                        </select>
                                  
                                    </div>
                                </div>
                                @php
                                    $division = DB::table('q_m_s_divisions')->where('name', Helpers::getDivisionName(session()->get('division')))->first();
                                    $userRoles = DB::table('user_roles')->where(['q_m_s_roles_id' => 31, 'q_m_s_divisions_id' => $division->id])->get();
                                    $userRoleIds = $userRoles->pluck('user_id')->toArray();
                                    $users = DB::table('users')->whereIn('id', $userRoleIds)->get(); // Fetch user data based on user IDs
                                @endphp
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Administration Person"> Human Resource & Administration Person</label>
                                        <select name="Human_Resource_person" id="Human_Resource_person">
                                            <option value="0">-- Select --</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                           

                                        </select>
                                  
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Impact Assessment9">Impact Assessment (By Human Resource & Administration )</label>
                                        <textarea class="summernote" name="Human_Resource_assessment" id="summernote-35">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="productionfeedback">Human Resource & Administration  Feedback</label>
                                        <textarea class="summernote" name="Human_Resource_feedback" id="summernote-36">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="Audit Attachments"> Human Resource & Administration Attachments</label>
                                        <div><small class="text-primary">Please Attach all relevant or supporting documents</small></div>
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="Human_Resource_attachment"></div>
                                            <div class="add-btn">
                                                <div>Add</div>
                                                <input type="file" id="myfile" name="Human_Resource_attachment[]"
                                                    oninput="addMultipleFiles(this, 'Human_Resource_attachment')" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="group-input">
                                        <label for="Administration Review Completed By"> Human Resource & Administration Review Completed By</label>
                                        <input type="text" name="Human_Resource_by" id="Human_Resource_by" disabled>
                                    
                                    </div>
                                </div>
                                <div class="col-lg-6 new-date-data-field">
                                    <div class="group-input input-date">
                                        <label for="Administration Review Completed On">Human Resource & Administration Review Completed On</label>
                                        <div class="calenderauditee">
                                            <input type="text" id="Human_Resource_on" readonly placeholder="DD-MMM-YYYY" />
                                            <input type="date"  name="Human_Resource_on" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="hide-input"
                                                oninput="handleDateInput(this, 'Human_Resource_on')" />
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-head">
                                Information Technology
                           </div>
                           <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Information Technology Review Required"> Information Technology Review Required ?</label>
                                        <select name=" Information_Technology_review" id=" Information_Technology_review">
                                            <option value="0">-- Select --</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                            <option value="na">NA</option>

                                        </select>
                                  
                                    </div>
                                </div>
                                @php
                                $division = DB::table('q_m_s_divisions')->where('name', Helpers::getDivisionName(session()->get('division')))->first();
                                $userRoles = DB::table('user_roles')->where(['q_m_s_roles_id' => 32, 'q_m_s_divisions_id' => $division->id])->get();
                                $userRoleIds = $userRoles->pluck('user_id')->toArray();
                                $users = DB::table('users')->whereIn('id', $userRoleIds)->get(); // Fetch user data based on user IDs
                            @endphp
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Information Technology Person"> Information Technology Person</label>
                                        <select name=" Information_Technology_person" id=" Information_Technology_person">
                                            <option value="0">-- Select --</option> @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                        </select>
                                  
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Impact Assessment10">Impact Assessment (By Information Technology)</label>
                                        <textarea class="summernote" name="Information_Technology_assessment" id="summernote-37">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Information Technology Feedback"> Information Technology Feedback</label>
                                        <textarea class="summernote" name="Information_Technology_feedback" id="summernote-38">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="Audit Attachments"> Information Technology Attachments</label>
                                        <div><small class="text-primary">Please Attach all relevant or supporting documents</small></div>
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="Information_Technology_attachment"></div>
                                            <div class="add-btn">
                                                <div>Add</div>
                                                <input type="file" id="myfile" name="Information_Technology_attachment[]"
                                                    oninput="addMultipleFiles(this, 'Information_Technology_attachment')" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="group-input">
                                        <label for="Information Technology Review Completed By"> Information Technology Review Completed By</label>
                                        <input type="text" name="Information_Technology_by" disabled>
                                    
                                    </div>
                                </div>
                                <div class="col-lg-6 new-date-data-field">
                                    <div class="group-input input-date">
                                        <label for="Information Technology Review Completed On">Information Technology Review Completed On</label>
                                        <div class="calenderauditee">
                                            <input type="text" id="Information_Technology_on" readonly placeholder="DD-MMM-YYYY" />
                                            <input type="date"  name="Information_Technology_on" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="hide-input"
                                                oninput="handleDateInput(this, 'Information_Technology_on')" />
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-head">
                                Project Management
                           </div>
                           <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Project management Review Required"> Project management Review Required ?</label>
                                        <select name="Project_management_review" id="Project_management_review">
                                            <option value="0">-- Select --</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                            <option value="na">NA</option>

                                        </select>
                                  
                                    </div>
                                </div>
                                @php
                                    $division = DB::table('q_m_s_divisions')->where('name', Helpers::getDivisionName(session()->get('division')))->first();
                                    $userRoles = DB::table('user_roles')->where(['q_m_s_roles_id' => 33, 'q_m_s_divisions_id' => $division->id])->get();
                                    $userRoleIds = $userRoles->pluck('user_id')->toArray();
                                    $users = DB::table('users')->whereIn('id', $userRoleIds)->get(); // Fetch user data based on user IDs
                                @endphp
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Project management Person"> Project management Person</label>
                                        <select name="Project_management_person" id="Project_management_person">
                                            <option value="0">-- Select --</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                           

                                        </select>
                                  
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Impact Assessment11">Impact Assessment (By  Project management )</label>
                                        <textarea class="summernote" name="Project_management_assessment" id="summernote-39">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Project management Feedback"> Project management  Feedback</label>
                                        <textarea class="summernote" name="Project_management_feedback" id="summernote-40">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="Audit Attachments"> Project management Attachments</label>
                                        <div><small class="text-primary">Please Attach all relevant or supporting documents</small></div>
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="Project_management_attachment"></div>
                                            <div class="add-btn">
                                                <div>Add</div>
                                                <input type="file" id="myfile" name="Project_management_attachment[]"
                                                    oninput="addMultipleFiles(this, 'Project_management_attachment')" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="group-input">
                                        <label for="Project management Review Completed By"> Project management Review Completed By</label>
                                        <input type="text" name="Project_management_by"id="Project_management_by" disabled>
                                    
                                    </div>
                                </div>
                                <div class="col-lg-6 new-date-data-field">
                                    <div class="group-input input-date">
                                        <label for="Project management Review Completed On">Information Technology Review Completed On</label>
                                        <div class="calenderauditee">
                                            <input type="text" id="Project_management_on" readonly placeholder="DD-MMM-YYYY" />
                                            <input type="date"  name="Project_management_on" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="hide-input"
                                                oninput="handleDateInput(this, 'Project_management_on')" />
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-head">
                                    Other's 1 ( Additional Person Review From Departments If Required)
                               </div>
                               <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="Customer notification"> Other's 1 Review Required ?</label>
                                            <select name="Other1_review" id="Other1_review">
                                                <option value="0">-- Select --</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">NA</option>
    
                                            </select>
                                      
                                        </div>
                                    </div>
                                    @php
                                    $division = DB::table('q_m_s_divisions')->where('name', Helpers::getDivisionName(session()->get('division')))->first();
                                    $userRoles = DB::table('user_roles')->where(['q_m_s_roles_id' => 34, 'q_m_s_divisions_id' => $division->id])->get();
                                    $userRoleIds = $userRoles->pluck('user_id')->toArray();
                                    $users = DB::table('users')->whereIn('id', $userRoleIds)->get(); // Fetch user data based on user IDs
                                @endphp
                                    <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="Customer notification"> Other's 1 Person</label>
                                            <select name="Other1_person" id="Other1_person">
                                                <option value="0">-- Select --</option>
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach                                               
    
                                            </select>
                                      
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="group-input">
                                            <label for="Customer notification"> Other's 1 Department</label>
                                            <select name="Other1_Department_person" id="Other1_Department_person">
                                                <option value="0">-- Select --</option>
                                                <option value="Production">Production</option>
                                                <option value="Warehouse">Warehouse</option>
                                                <option value="Quality_Control">Quality Control</option>
                                                <option value="Quality_Assurance">Quality Assurance</option>
                                                <option value="Engineering">Engineering</option>
                                                <option value="Analytical_Development_Laboratory">Analytical Development Laboratory</option>
                                                <option value="Process_Development_Lab">Process Development Laboratory / Kilo Lab</option>
                                                <option value="Technology transfer/Design">Technology Transfer/Design</option>
                                                <option value="Environment, Health & Safety">Environment, Health & Safety</option>
                                                <option value="Human Resource & Administration">Human Resource & Administration</option>
                                                <option value="Information Technology">Information Technology</option>
                                                <option value="Project management">Project management</option>
                                                
    
    
                                            </select>
                                      
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="group-input">
                                            <label for="productionfeedback">Impact Assessment (By  Other's 1)</label>
                                            <textarea class="summernote" name="Other1_assessment" id="summernote-41">
                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="group-input">
                                            <label for="productionfeedback"> Other's 1 Feedback</label>
                                            <textarea class="summernote" name="Other1_feedback" id="summernote-42">
                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="group-input">
                                            <label for="Audit Attachments"> Other's 1 Attachments</label>
                                            <div><small class="text-primary">Please Attach all relevant or supporting documents</small></div>
                                            <div class="file-attachment-field">
                                                <div class="file-attachment-list" id="Other1_attachment"></div>
                                                <div class="add-btn">
                                                    <div>Add</div>
                                                    <input type="file" id="myfile" name="Other1_attachment[]"
                                                        oninput="addMultipleFiles(this, 'Other1_attachment')" multiple>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="group-input">
                                            <label for="productionfeedback"> Other's 1 Review Completed By</label>
                                            <input type="text" name="Other1_by" id="Other1_by" disabled>
                                        
                                        </div>
                                    </div>
                                    <div class="col-lg-6 new-date-data-field">
                                        <div class="group-input input-date">
                                            <label for="Review Completed On1">Other's 1 Review Completed On</label>
                                            <div class="calenderauditee">
                                                <input type="text" id="Other1_on" name="Other1_on" readonly placeholder="DD-MMM-YYYY" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sub-head">
                                    Other's 2 ( Additional Person Review From Departments If Required)
                               </div>
                               <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="Customer notification"> Other's 2 Review Required ?</label>
                                            <select name="Other2_review" id="Other2_review">
                                                <option value="0">-- Select --</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">NA</option>
    
                                            </select>
                                      
                                        </div>
                                    </div>
                                    @php
                                    $division = DB::table('q_m_s_divisions')->where('name', Helpers::getDivisionName(session()->get('division')))->first();
                                    $userRoles = DB::table('user_roles')->where(['q_m_s_roles_id' => 35, 'q_m_s_divisions_id' => $division->id])->get();
                                    $userRoleIds = $userRoles->pluck('user_id')->toArray();
                                    $users = DB::table('users')->whereIn('id', $userRoleIds)->get(); // Fetch user data based on user IDs
                                    @endphp
                                    <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="Customer notification"> Other's 2 Person</label>
                                            <select name="Other2_person" id="Other2_person">
                                                <option value="0">-- Select --</option>
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach                                               
    
                                            </select>
                                      
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="group-input">
                                            <label for="Customer notification"> Other's 2 Department</label>
                                            <select name="Other2_Department_person" id="Other2_Department_person">
                                                <option value="0">-- Select --</option>
                                                <option value="Production">Production</option>
                                                <option value="Warehouse">Warehouse</option>
                                                <option value="Quality_Control">Quality Control</option>
                                                <option value="Quality_Assurance">Quality Assurance</option>
                                                <option value="Engineering">Engineering</option>
                                                <option value="Analytical_Development_Laboratory">Analytical Development Laboratory</option>
                                                <option value="Process_Development_Lab">Process Development Laboratory / Kilo Lab</option>
                                                <option value="Technology transfer/Design">Technology Transfer/Design</option>
                                                <option value="Environment, Health & Safety">Environment, Health & Safety</option>
                                                <option value="Human Resource & Administration">Human Resource & Administration</option>
                                                <option value="Information Technology">Information Technology</option>
                                                <option value="Project management">Project management</option>
                                                
    
    
                                            </select>
                                      
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="group-input">
                                            <label for="Impact Assessment13">Impact Assessment (By  Other's 2)</label>
                                            <textarea class="summernote" name="Other2_Assessment" id="summernote-43">
                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="group-input">
                                            <label for="Feedback2"> Other's 2 Feedback</label>
                                            <textarea class="summernote" name="Other2_feedback" id="summernote-44">
                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="group-input">
                                            <label for="Audit Attachments"> Other's 2 Attachments</label>
                                            <div><small class="text-primary">Please Attach all relevant or supporting documents</small></div>
                                            <div class="file-attachment-field">
                                                <div class="file-attachment-list" id="Other2_attachment"></div>
                                                <div class="add-btn">
                                                    <div>Add</div>
                                                    <input type="file" id="myfile" name="Other2_attachment[]"
                                                        oninput="addMultipleFiles(this, 'Other2_attachment')" multiple>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="group-input">
                                            <label for="Review Completed By2"> Other's 2 Review Completed By</label>
                                            <input type="text" name="Other2_by" disabled>
                                        
                                        </div>
                                    </div>
                                    <div class="col-lg-6 new-date-data-field">
                                        <div class="group-input input-date">
                                            <label for="Review Completed On2">Other's 2 Review Completed On</label>
                                            <div class="calenderauditee">
                                                <input type="text" id="Other2_on" name="Other2_on" readonly placeholder="DD-MMM-YYYY" />
                                                {{-- <input type="date"  name="Other2_on" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="hide-input"
                                                    oninput="handleDateInput(this, 'Other2_on')" /> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sub-head">
                                    Other's 3 ( Additional Person Review From Departments If Required)
                               </div>
                               <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="Customer notification"> Other's 3 Review Required ?</label>
                                            <select name="Other3_review" id="Other3_review">
                                                <option value="0">-- Select --</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">NA</option>
    
                                            </select>
                                      
                                        </div>
                                    </div>
                                    @php
                                    $division = DB::table('q_m_s_divisions')->where('name', Helpers::getDivisionName(session()->get('division')))->first();
                                    $userRoles = DB::table('user_roles')->where(['q_m_s_roles_id' => 36, 'q_m_s_divisions_id' => $division->id])->get();
                                    $userRoleIds = $userRoles->pluck('user_id')->toArray();
                                    $users = DB::table('users')->whereIn('id', $userRoleIds)->get(); // Fetch user data based on user IDs
                                     @endphp
                                    <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="Customer notification"> Other's 3 Person</label>
                                            <select name="Other3_person" id="Other3_person">
                                                <option value="0">-- Select --</option>
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach                                               
    
                                            </select>
                                      
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="group-input">
                                            <label for="Customer notification"> Other's 3 Department</label>
                                            <select name="Other3_Department_person" id="Other3_Department_person">
                                                <option value="0">-- Select --</option>
                                                <option value="Production">Production</option>
                                                <option value="Warehouse">Warehouse</option>
                                                <option value="Quality_Control">Quality Control</option>
                                                <option value="Quality_Assurance">Quality Assurance</option>
                                                <option value="Engineering">Engineering</option>
                                                <option value="Analytical_Development_Laboratory">Analytical Development Laboratory</option>
                                                <option value="Process_Development_Lab">Process Development Laboratory / Kilo Lab</option>
                                                <option value="Technology transfer/Design">Technology Transfer/Design</option>
                                                <option value="Environment, Health & Safety">Environment, Health & Safety</option>
                                                <option value="Human Resource & Administration">Human Resource & Administration</option>
                                                <option value="Information Technology">Information Technology</option>
                                                <option value="Project management">Project management</option>
                                                
    
    
                                            </select>
                                      
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="group-input">
                                            <label for="productionfeedback">Impact Assessment (By  Other's 3)</label>
                                            <textarea class="summernote" name="Other3_Assessment" id="summernote-45">
                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="group-input">
                                            <label for="productionfeedback"> Other's 3 Feedback</label>
                                            <textarea class="summernote" name="Other3_feedback" id="summernote-46">
                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="group-input">
                                            <label for="Audit Attachments"> Other's 3 Attachments</label>
                                            <div><small class="text-primary">Please Attach all relevant or supporting documents</small></div>
                                            <div class="file-attachment-field">
                                                <div class="file-attachment-list" id="Other3_attachment"></div>
                                                <div class="add-btn">
                                                    <div>Add</div>
                                                    <input type="file" id="myfile" name="Other3_attachment[]"
                                                        oninput="addMultipleFiles(this, 'Other3_attachment')" multiple>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="group-input">
                                            <label for="productionfeedback"> Other's 3 Review Completed By</label>
                                            <input type="text" name="Other3_by" disabled>
                                        
                                        </div>
                                    </div>
                                    <div class="col-lg-6 new-date-data-field">
                                        <div class="group-input input-date">
                                            <label for="Review Completed On3">Other's 3 Review Completed On</label>
                                            <div class="calenderauditee">
                                                <input type="text" id="Other3_on" name="Other3_on" readonly placeholder="DD-MMM-YYYY" />
                                                {{-- <input type="date"  name="Other3_on" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="hide-input"
                                                    oninput="handleDateInput(this, 'Other3_on')" /> --}}
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="sub-head">
                                    Other's 4 ( Additional Person Review From Departments If Required)
                               </div>
                               <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="review4"> Other's 4 Review Required ?</label>
                                            <select name="Other4_review" id="Other4_review">
                                                <option value="0">-- Select --</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">NA</option>
    
                                            </select>
                                      
                                        </div>
                                    </div>
                                    @php
                                    $division = DB::table('q_m_s_divisions')->where('name', Helpers::getDivisionName(session()->get('division')))->first();
                                    $userRoles = DB::table('user_roles')->where(['q_m_s_roles_id' => 37, 'q_m_s_divisions_id' => $division->id])->get();
                                    $userRoleIds = $userRoles->pluck('user_id')->toArray();
                                     $users = DB::table('users')->whereIn('id', $userRoleIds)->get(); // Fetch user data based on user IDs
                                    @endphp
                                     <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="Person4"> Other's 4 Person</label>
                                            <select name="Other4_person" id="Other4_person">
                                                <option value="0">-- Select --</option>
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach                                               
    
                                            </select>
                                      
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="group-input">
                                            <label for="Department4"> Other's 4 Department</label>
                                            <select name="Other4_Department_person" id="Other4_Department_person">
                                                <option value="0">-- Select --</option>
                                                <option value="Production">Production</option>
                                                <option value="Warehouse">Warehouse</option>
                                                <option value="Quality_Control">Quality Control</option>
                                                <option value="Quality_Assurance">Quality Assurance</option>
                                                <option value="Engineering">Engineering</option>
                                                <option value="Analytical_Development_Laboratory">Analytical Development Laboratory</option>
                                                <option value="Process_Development_Lab">Process Development Laboratory / Kilo Lab</option>
                                                <option value="Technology transfer/Design">Technology Transfer/Design</option>
                                                <option value="Environment, Health & Safety">Environment, Health & Safety</option>
                                                <option value="Human Resource & Administration">Human Resource & Administration</option>
                                                <option value="Information Technology">Information Technology</option>
                                                <option value="Project management">Project management</option>
                                                
    
    
                                            </select>
                                      
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="group-input">
                                            <label for="Impact Assessment15">Impact Assessment (By  Other's 4)</label>
                                            <textarea class="summernote" name="Other4_Assessment" id="summernote-47">
                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="group-input">
                                            <label for="feedback4"> Other's 4 Feedback</label>
                                            <textarea class="summernote" name="Other4_feedback" id="summernote-48">
                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="group-input">
                                            <label for="Audit Attachments"> Other's 4 Attachments</label>
                                            <div><small class="text-primary">Please Attach all relevant or supporting documents</small></div>
                                            <div class="file-attachment-field">
                                                <div class="file-attachment-list" id="Other4_attachment"></div>
                                                <div class="add-btn">
                                                    <div>Add</div>
                                                    <input type="file" id="myfile" name="Other4_attachment[]"
                                                        oninput="addMultipleFiles(this, 'Other4_attachment')" multiple>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="group-input">
                                            <label for="Review Completed By4"> Other's 4 Review Completed By</label>
                                            <input type="text" name="Other4_by" disabled>
                                        
                                        </div>
                                    </div>
                                    <div class="col-lg-6 new-date-data-field">
                                        <div class="group-input input-date">
                                            <label for="Review Completed On4">Other's 4 Review Completed On</label>
                                            <div class="calenderauditee">
                                                <input type="text" id="Other4_on" name="Other4_on" readonly placeholder="DD-MMM-YYYY" />
                                                {{-- <input type="date"  name="Other4_on" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="hide-input"
                                                    oninput="handleDateInput(this, 'Other4_on')" /> --}}
                                            </div>
                                        </div>
                                    </div>
    
    
                                    <div class="sub-head">
                                    Other's 5 ( Additional Person Review From Departments If Required)
                               </div>
                               <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="review5"> Other's 5 Review Required ?</label>
                                            <select name="Other5_review" id="Other5_review">
                                                <option value="0">-- Select --</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value="na">NA</option>
    
                                            </select>
                                      
                                        </div>
                                    </div>
                                    @php
                                    $division = DB::table('q_m_s_divisions')->where('name', Helpers::getDivisionName(session()->get('division')))->first();
                                    $userRoles = DB::table('user_roles')->where(['q_m_s_roles_id' => 38, 'q_m_s_divisions_id' => $division->id])->get();
                                    $userRoleIds = $userRoles->pluck('user_id')->toArray();
                                    $users = DB::table('users')->whereIn('id', $userRoleIds)->get(); // Fetch user data based on user IDs
                                    @endphp
                                    <div class="col-lg-6">
                                        <div class="group-input">
                                            <label for="Person5">Other's 5 Person</label>
                                            <select name="Other5_person" id="Other5_person">
                                                <option value="0">-- Select --</option>
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach                                               
    
                                            </select>
                                      
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="group-input">
                                            <label for="Department5"> Other's 5 Department</label>
                                            <select name="Other5_Department_person" id="Other5_Department_person">
                                                <option value="0">-- Select --</option>
                                                <option value="Production">Production</option>
                                                <option value="Warehouse">Warehouse</option>
                                                <option value="Quality_Control">Quality Control</option>
                                                <option value="Quality_Assurance">Quality Assurance</option>
                                                <option value="Engineering">Engineering</option>
                                                <option value="Analytical_Development_Laboratory">Analytical Development Laboratory</option>
                                                <option value="Process_Development_Lab">Process Development Laboratory / Kilo Lab</option>
                                                <option value="Technology transfer/Design">Technology Transfer/Design</option>
                                                <option value="Environment, Health & Safety">Environment, Health & Safety</option>
                                                <option value="Human Resource & Administration">Human Resource & Administration</option>
                                                <option value="Information Technology">Information Technology</option>
                                                <option value="Project management">Project management</option>
                                                
    
    
                                            </select>
                                      
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="group-input">
                                            <label for="productionfeedback">Impact Assessment (By  Other's 5)</label>
                                            <textarea class="summernote" name="Other5_Assessment" id="summernote-49">
                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="group-input">
                                            <label for="productionfeedback"> Other's 5 Feedback</label>
                                            <textarea class="summernote" name="Other5_feedback" id="summernote-50">
                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="group-input">
                                            <label for="Audit Attachments"> Other's 5 Attachments</label>
                                            <div><small class="text-primary">Please Attach all relevant or supporting documents</small></div>
                                            <div class="file-attachment-field">
                                                <div class="file-attachment-list" id="Other5_attachment"></div>
                                                <div class="add-btn">
                                                    <div>Add</div>
                                                    <input type="file" id="myfile" name="Other5_attachment[]"
                                                        oninput="addMultipleFiles(this, 'Other5_attachment')" multiple>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="group-input">
                                            <label for="Review Completed By5"> Other's 5 Review Completed By</label>
                                            <input type="text" name="Other5_by" disabled>
                                        
                                        </div>
                                    </div>
                                    <div class="col-lg-6 new-date-data-field">
                                        <div class="group-input input-date">
                                            <label for="Review Completed On5">Other's 5 Review Completed On</label>
                                            <div class="calenderauditee">
                                                <input type="text" id="Other5_on" name="Other5_on" readonly placeholder="DD-MMM-YYYY" />
                                                {{-- <input type="date"  name="Other5_on" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="hide-input"
                                                    oninput="handleDateInput(this, 'Other5_on')" /> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="button-block">
                                    <button type="submit" id="ChangesaveButton" class="saveButton">Save</button>
                                        <a href="/rcms/qms-dashboard">
                                        <button type="button" class="backButton">Back</button>
                                    </a>
                                    <button type="button" id="ChangeNextButton" class="nextButton" onclick="nextStep()">Next</button>
                                    <button type="button"> <a href="{{ url('rcms/qms-dashboard') }}" class="text-white">
                                            Exit </a> </button>
                                </div>
                               
                             </div>
                         </div>
                     </div>
               
                 

                    <!-- investigation and capa -->
                    <div id="CCForm3" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="row">
                                {{-- <div class="col-12">
                                    <div class="group-input">
                                        <label class="mt-4"  for="Investigation Summary">Investigation Summary</label>
                                        <textarea class="summernote" name="Investigation_Summary" id="Investigation_Summary" cols="30" ></textarea>
                                    </div>
                                </div> --}}
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Investigation_Summary">Investigation Summary</label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="Investigation_Summary" id="summernote-8">
                                    </textarea>
                                    </div>
                                </div>
                                {{-- <div class="col-12">
                                    <div class="group-input">
                                        <label class="mt-4"  for="Impact assessment">Impact Assessment</label>
                                        <textarea class="summernote" name="Impact_assessment" id="Impact_assessment" cols="30" ></textarea>
                                    </div>
                                </div> --}}
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Impact Assessment">Impact Assessment</label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="Impact_assessment" id="summernote-9">
                                    </textarea>
                                    </div>
                                </div>
                                {{-- <div class="col-12">
                                    <div class="group-input">
                                        <label class="mt-4"  for="Root cause">Root Cause</label>
                                        <textarea class="summernote" name="Root_cause" id="Root_cause" cols="30" ></textarea>
                                    </div>
                                </div> --}}
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Root Cause">Root Cause</label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="Root_cause" id="summernote-10">
                                    </textarea>
                                    </div>
                                </div>
                                
                                
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="CAPA Rquired">CAPA Required ?</label>
                                      <select name="CAPA_Rquired" id="CAPA_Rquired">
                                        <option value="0"> -- Select --</option>
                                        <option value="yes">Yes</option>
                                        <option value="no"> No</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-input">
                                        <label for="capa type">CAPA Type?</label>
                                      <select name="capa_type" id="capa_type">
                                        <option value="0"> -- Select --</option>
                                        <option value="Corrective_Action">Corrective Action</option>
                                        <option value="Preventive_Action">Preventive Action</option>
                                        <option value="Corrective&Preventive">Corrective & Preventive Action both</option>
                                      </select>
                                    </div>
                                </div>
                                {{-- <div class="col-12">
                                    <div class="group-input">
                                        <label for="External Auditing Agency">CAPA Description</label>
                                        <textarea class="summernote" name="CAPA_Description"></textarea>
                                    </div>
                                </div> --}}
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="CAPA Description">CAPA Description</label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="CAPA_Description" id="summernote-11">
                                    </textarea>
                                    </div>
                                </div>
                                {{-- <div class="col-12">
                                    <div class="group-input">
                                        <label class="mt-4" for="External Auditing Agency ">Post Categorization Of Deviation</label>
                                        <textarea class="summernote" name="Post_Categorization"></textarea>
                                    </div>
                                </div> --}}
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Post Categorization Of Deviation">Post Categorization Of Deviation</label>
                                       <div><small class="text-primary">Please Refer Intial deviation category before updating.</small></div> 
                                        {{-- <textarea class="summernote" name="Post_Categorization" id="summernote-12"> --}}
                                            <select name="Post_Categorization" id="Post_Categorization">
                                                <option value=""> -- Select --</option>
                                                <option value="major">Major</option>
                                                <option value="minor">Minor</option>
                                                <option value="critical">Critical</option>
                                              </select>
                                    </textarea>
                                    </div>
                                </div>
                                {{-- <div class="col-12">
                                    <div class="group-input">
                                        <label class="mt-4"  for="External Auditing Agency">Investigation Of Revised Categorization</label>
                                        <textarea class="summernote" name="Investigation_Of_Review"></textarea>
                                    </div>
                                </div> --}}
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="Investigation Of Revised Categorization">Justification for Revised Category</label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="Investigation_Of_Review" id="summernote-13">
                                    </textarea>
                                    </div>
                                </div>
                                {{-- <div class="col-12">
                                    <div class="group-input">
                                        <label for="Investigatiom Attachment">Investigation Attachment </label>
                                        <div><small class="text-primary">Please Attach all relevant or supporting
                                                documents</small>
                                            
                                            
                                            </div>
                                       
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="Investigation_attachment"></div>
                                            <div class="add-btn">
                                                <div>Add</div>
                                                <input type="file" id="myfile" name="Investigation_attachment[]"
                                                    oninput="addMultipleFiles(this, 'Investigation_attachment')" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="Investigatiom Attachment">Investigation Attachment</label>
                                        <div><small class="text-primary">Please Attach all relevant or supporting documents</small></div>
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="Investigation_attachment"></div>
                                            <div class="add-btn">
                                                <div>Add</div>
                                                <input type="file" id="myfile" name="Investigation_attachment[]"
                                                    oninput="addMultipleFiles(this, 'Investigation_attachment')" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="capa_Attachments">CAPA Attachment </label>
                                        <div><small class="text-primary">Please Attach all relevant or supporting
                                                documents</small>
                                            </div>
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="Capa_attachment"></div>
                                            <div class="add-btn">
                                                <div>Add</div>
                                                <input type="file" id="myfile" name="Capa_attachment[]"
                                                    oninput="addMultipleFiles(this, 'Capa_attachment')" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                            
                            <div class="button-block">
                                <button type="submit" class="saveButton">Save</button>
                                        <a href="/rcms/qms-dashboard">
                                        <button type="button" class="backButton">Back</button>
                                    </a>
                                <button type="button" class="nextButton" onclick="nextStep()">Next</button>
                                <button type="button"> <a href="{{ url('rcms/qms-dashboard') }}" class="text-white">
                                        Exit </a> </button>
                            </div>
                        </div>
                    </div>

                    <!-- QA Final Review -->
                    <div id="CCForm4" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="row">
                                
                                
                            {{-- <div class="col-12">
                                    <div class="group-input">
                                        <label for="QA Feedbacks">QA Feedbacks</label>
                                        <textarea class="summernote" name="QA_Feedbacks"></textarea>
                                    </div>
                                </div> --}}
                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="QA Feedbacks">QA Feedbacks</label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="QA_Feedbacks" id="summernote-14">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="QA attachments">QA Attachments</label>
                                        <div><small class="text-primary">Please Attach all relevant or supporting
                                                documents</small></div>
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="QA_attachments"></div>
                                            <div class="add-btn">
                                                <div>Add</div>
                                                <input type="file" id="myfile" name="QA_attachments[]"
                                                    oninput="addMultipleFiles(this, 'QA_attachments')" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="button-block">
                                <button type="submit" class="saveButton">Save</button>
                                        <a href="/rcms/qms-dashboard">
                                        <button type="button" class="backButton">Back</button>
                                    </a>
                                <button type="button"  onclick="nextStep()">Next</button>
                                <button type="button"> <a href="{{ url('rcms/qms-dashboard') }}" class="text-white">
                                        Exit </a> </button>
                            </div>
                        </div>
                    </div>

                    <!-- QAH-->
                    <div id="CCForm5" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="row">
                                
                                <div class="col-12">
                                    <div class="group-input">
                                        <label  class="mt-4" for="Remarks">Closure Comments</label>
                                        <textarea class="summernote" name="Closure_Comments" id="summernote-15"></textarea>
                                    </div>
                                </div>
                                {{-- <div class="col-12">
                                    <div class="group-input">
                                        <label class="mt-4"  for="Audit Comments">Disposition of Batch</label>
                                        <textarea class="summernote" name="Disposition_Batch" id="summernote-16"></textarea>
                                    </div>
                                </div> --}}
                                <div class="col-12">
                                    <div class="group-input">
                                        <label for="closure attachment">Closure Attachments </label>
                                        <div><small class="text-primary">Please Attach all relevant or supporting
                                                documents</small>
                                            </div>
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="closure_attachment"></div>
                                            <div class="add-btn">
                                                <div>Add</div>
                                                <input type="file" id="myfile" name="closure_attachment[]"
                                                    oninput="addMultipleFiles(this, 'closure_attachment')" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="button-block">
                                <button type="submit" class="saveButton">Save</button>
<a href="/rcms/qms-dashboard">
                                        <button type="button" class="backButton">Back</button>
                                    </a>
                                <button type="button" class="nextButton" onclick="nextStep()">Next</button>
                                <button type="button"> <a href="{{ url('rcms/qms-dashboard') }}" class="text-white">
                                        Exit </a> </button>
                            </div>
                        </div>
                    </div>


 {{--    //////////////////Access Matrix///////////////// --}}
                     <div id="CCForm09" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="row">
                                 <div class="sub-head">
                            Access Rights Details
                           </div>
                               
                                    
                                        <div class="group-input">
                                        <label for="audit-agenda-grid">
                                         Access Matrix
                                             <span id="asteriskInviDetails" style="display: none" class="text-danger">*</span>
                                            <button type="button" name="audit-agenda-grid"
                                                id="Access_Matrix_Details">+</button>
                                            <span class="text-primary" data-bs-toggle="modal"
                                                data-bs-target="#document-details-field-instruction-modal"
                                                style="font-size: 0.8rem; font-weight: 400; cursor: pointer;">
                                                (Launch Instruction)
                                            </span>
                                        </label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="Access_Matrix_Details_Details"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 4%">Row#</th>

                                                        
                                                         <th style="">Membership Allocation Type</th>
                                                         <th style="">Site Name</th>
                                                         <th style="">Module</th>
                                                         <th style="">Module (Others)</th>

                                                         <th style="">User Roles/Group Category</th>
                                                         <th style="">Others</th>
                                                        
                                                         <th style="">Process Title</th>

                                                        <th style="">Application</th>
                                                        
                                                        <th style=""> Role</th>
                                                        <th style=""> Training Completed?</th>
                                                        <th style=""> Training Certificate</th>
                                                        <th style=""> Is Temporary User?</th>
                                                        <th style=""> Period From</th>
                                                        <th style=""> Period To</th>

                                                        <th style=""> Access Provided By</th>
                                                        <th style=""> Access Provided On</th>
                                                        
                                                        <th style=""> Access Revoked By</th>
                                                        <th style=""> Access Revoked On</th>
                                                        <th style=""> Remarks</th>

                                                       
                                                                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                        <td><input disabled type="text" name="serial[]" value="1"></td>
                                        <td><select name="Membership_Allocation_Type" id="Membership_Allocation_Type">
                                                <option value="0">-- Select --</option>
                                                <option value="Temporary">Temporary</option>
                                                <option value="Permanent">Permanent</option>

                                            </select></td>
                                            <td> <select name="SiteName" id="SiteName">
                                                <option value="0">-- Select --</option>
                                                <option value="yes">EU</option>
                                                <option value="yes">Asia</option>
                                                <option value="yes">Global</option>
                                                <option value="yes">HR-Headquarter</option>
                                                <option value="yes">IT-EMEA</option>
                                                <option value="yes">QMS-APAC</option>
                                                <option value="yes">QMS-North America</option>
                                                <option value="yes">RA-EMEA</option>
                                                <option value="yes">SQM-EMEA</option>

                                            </select>
                                       </td> 
                                        
                                             <td> <select name="Module" id="Module">
                                                <option value="0">-- Select --</option>
                                                <option value="QMS">QMS</option>
                                                <option value="DMS">DMS</option>
                                                <option value="HRMS">HRMS</option>
                                                <option value="R&D">R&D</option>
                                                <option value="IPQA">IPQA</option>
                                                <option value="Warehouse">Warehouse</option>
                                                <option value="Manufacturing">Manufacturing</option>
                                                <option value="SAP">SAP</option>
                                                <option value="Regulatory Affairs">Regulatory Affairs</option>

                                                <option value="Medical Affairs">Medical Affairs</option>

                                                <option value="Logistics">Logistics</option>

                                                <option value="Marketing and Sales">Marketing and Sales</option>
                                                <option value="Others">Others</option>
                                            </select></td>

                                        <td> <input type="text" class="Others" name="Others[]">   </td>

                                       
                                    <td>
                                     <select multiple name="audit_type[]" id="audit_type">
                                             <option value="">Enter Your Selection Here</option> 
                                            <option value="QA">QA</option>
                                            <option value="QC">QC</option>
                                            <option value="Manufacturing">Manufacturing</option>
                                            <option value="R&D">R&D</option>
                                            <option value="Supervisor">Supervisor</option>
                                            <option value="HOD">HOD</option>
                                            <option value="Lead">Lead Auditee</option>
                                            <option value="Initiator">Initiator</option>
                                            <option value="Audit">Audit Manager</option>
                                            <option value="Reviewer">Reviewer</option>
                                            <option value="Approval">Approval</option>
                                        </select>
                                    
                                    </td>

                                        <td> <input type="text" class="Others" name="Others[]">   </td>

                                        <td> <input type="text" class="Processtitle" name="Processtitle[]">  
                                       </td>
                                      
                                       
                                       <td> <select name="Application" id="Application">
                                                <option value="0">-- Select --</option>
                                                <option value="VidyaGxP-QMS">VidyaGxP-QMS</option>
                                                <option value="VidyaGxP-DMS">VidyaGxP-DMS</option>
                                                <option value="VidyaGxP--ERP">VidyaGxP-ERP</option>
                                                <option value="VidyaGxP--TMS">VidyaGxP-TMS</option>

                                                <option value="VidyaGxP-EBMR">VidyaGxP-EBMR</option>
                                                <option value="VidyaGxP-E-Logbook">VidyaGxP-E-Logbook</option>

                                            

                                            </select>
                                       </td>
                                        <td> <select name="Role" id="Role">
                                                <option value="0">-- Select --</option>
                                                <option value="QAM">Quality Assurance Manager(QAM)</option>
                                                <option value="QCA">Quality Control Analyst(QCA)</option>
                                                <option value="CO">Compilance Officer(CO)</option>
                                                <option value="RAS">Regulatory Affairs Specialist(RAS)</option>
                                                <option value="DCS">Document Control Specialist(DCS)</option>
                                                <option value="DCM">Document Control Manager(DCM)</option>
                                                <option value="RC">Records Coordinator(RC)</option>
                                                <option value="IGA">Information Governance Analyst(IGA)</option>
                                                <option value="TC">Training Coordinator(TC)</option>
                                                <option value="LMS">Learning Management System (LMS)</option>
                                                <option value="Administrator">Administrator</option>
                                                <option value="TM">Training Manager(TM)</option>
                                                <option value="PO">Production Operator(PO)</option>
                                                <option value="DIA">Data Integrity Analyst(DIA)</option>
                                            </select>
                                       </td>
                                        <td> <select name="Process_Title" id="Process_Title">
                                                <option value="0">-- Select --</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>

                                            </select>
                                       </td>
                                       
                                        <td><div class="training_certificate">
                                                <div class="file-attachment-training_certificate" id="training_certificate"></div>
                                                <div class="add-btn">
                                                    
                                                    <input type="file" id="myfile" name="training_certificate[]"
                                                        oninput="addMultipleFiles(this, 'training_certificate')" multiple>
                                                </div></td>
                                        <td> <select name="Is_tmp_user" id="Is_tmp_user">
                                                <option value="0">-- Select --</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select></td>
                                        <td><input type="date" class="Period" name="Period[]"></td>
                                        <td><input type="date" class="Period" name="Period[]"></td>
                                        <td><div class="col-lg-6">
                                    <div class="group-input">
                                        <select name="Acces_provided_by" id="Acces_provided_by[]">
                                            <option value="">-- Select --</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div></td>

                                       
                                 <td><input type="date" class="Access_provided_on" name="Access_provided_on[]"></td>
                                        
                                     <td><div class="col-lg-6">
                                    <div class="group-input">
                                        <select name="Acces_provided_by" id="Acces_provided_by[]">
                                            <option value="">-- Select --</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </td>
                                        
                                        <td><input type="date" class="Document_Remarks" name="Document_Remarks[]"></td>
                                     <td><input type="text" class="Remarks" name="Remarks[]"></td>

                                        </tbody></table>
                                        </div>
                                    </div>
                                    <script>

                                        document.addEventListener('DOMContentLoaded', function () {
                                            // note-codable

                                            var selectField = document.getElementById('Document_Details_Required');
                                            var inputsToToggle = [];

                                            // Add elements with class 'facility-name' to inputsToToggle
                                            var facilityNameInputs = document.getElementsByClassName('numberDetail');
                                            for (var i = 0; i < facilityNameInputs.length; i++) {
                                                inputsToToggle.push(facilityNameInputs[i]);
                                            }

                                            // Add elements with class 'id-number' to inputsToToggle
                                            var idNumberInputs = document.getElementsByClassName('Document_Remarks');
                                            for (var j = 0; j < idNumberInputs.length; j++) {
                                                inputsToToggle.push(idNumberInputs[j]);
                                            }

                                            // Add elements with class 'remarks' to inputsToToggle
                                            var remarksInputs = document.getElementsByClassName('ReferenceDocumentName');
                                            for (var k = 0; k < remarksInputs.length; k++) {
                                                inputsToToggle.push(remarksInputs[k]);
                                            }

                                                                            
                                            selectField.addEventListener('change', function () {
                                                var isRequired = this.value === 'yes';
                                                console.log(this.value, isRequired, 'value');

                                                inputsToToggle.forEach(function (input) {
                                                    input.required = isRequired;
                                                    console.log(input.required, isRequired, 'input req');
                                                });

                                                // Show or hide the asterisk icon based on the selected value
                                                var asteriskIcon = document.getElementById('asteriskInviDetails');
                                                asteriskIcon.style.display = isRequired ? 'inline' : 'none';
                                            });
                                        });
                                    </script>

                        

                                      
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Customer notification">Assets Required ?</label>
                                        <select name="Customer_notification" id="Customer_notification">
                                            <option value="0">-- Select --</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                            <option value="na">NA</option>
                                        </select>
                                  
                                    </div>
                                </div>
                             

                              


                     <div class="group-input">
                                        <label for="audit-agenda-grid">
                                         Assets
                                             <span id="asteriskInviDetails" style="display: none" class="text-danger">*</span>
                                            <button type="button" name="audit-agenda-grid"
                                                id="Access_Matrix_Details">+</button>
                                            <span class="text-primary" data-bs-toggle="modal"
                                                data-bs-target="#document-details-field-instruction-modal"
                                                style="font-size: 0.8rem; font-weight: 400; cursor: pointer;">
                                                
                                            </span>
                                        </label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="Access_Matrix_Details_Details"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 4%">Row#</th>

                                                        
                                                     <th style="">Laptop</th>
                                                            <th style="">Desktop Computer</th>
                                                            <th style="">Tablet</th>
                                                            <th style="">Smartphone</th>
                                                            <th style="">Monitor</th>
                                                            <th style="">Keyboard</th>
                                                            <th style="">Mouse</th>
                                                            <th style="">Printer</th>
                                                            <th style="">Scanner</th>
                                                            <th style="">Headset</th>
                                                            <th style="">Projector</th>
                                                            <th style="">Server</th>
                                                            <th style="">Network Switch</th>
                                                            <th style="">External Hard Drive</th>
                                                            <th style="">USB Flash Drive</th>
                                                            <th style="">Software Licenses</th>
                                                            <th style="">Access Card/Badge</th>
                                                            <th style="">Security Key/Token</th>
                                                            <th style="">Desk Phone</th>
                                                            <th style="">Company Vehicle</th>

                                                       
                                                                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                        <td><input disabled type="text" name="serial[]" value="1"></td>
                                        <td><select name="Membership_Allocation_Type" id="Membership_Allocation_Type">
                                                <option value="0">-- Select --</option>
                                                <option value="No">Yes</option>
                                                <option value="No">No</option>
                                            </select></td>

                                            <td><select name="Membership_Allocation_Type" id="Membership_Allocation_Type">
                                                <option value="0">-- Select --</option>
                                               <option value="No">Yes</option>
                                                <option value="No">No</option>
                                            </select></td>

                                            <td><select name="Membership_Allocation_Type" id="Membership_Allocation_Type">
                                                <option value="0">-- Select --</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select></td>

                                            <td><select name="Membership_Allocation_Type" id="Membership_Allocation_Type">
                                                <option value="0">-- Select --</option>
                                                 <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select></td>

                                            <td><select name="Membership_Allocation_Type" id="Membership_Allocation_Type">
                                                <option value="0">-- Select --</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select></td>

                                            <td><select name="Membership_Allocation_Type" id="Membership_Allocation_Type">
                                                <option value="0">-- Select --</option>
                                                 <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select></td>

                                            <td><select name="Membership_Allocation_Type" id="Membership_Allocation_Type">
                                                <option value="0">-- Select --</option>
                                                 <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select></td>

                                        <td><select name="Membership_Allocation_Type" id="Membership_Allocation_Type">
                                                <option value="0">-- Select --</option>
                                                 <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select></td>

                                            <td><select name="Membership_Allocation_Type" id="Membership_Allocation_Type">
                                                <option value="0">-- Select --</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select></td>

                                            <td><select name="Membership_Allocation_Type" id="Membership_Allocation_Type">
                                                <option value="0">-- Select --</option>
                                                 <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select></td>

                                            <td><select name="Membership_Allocation_Type" id="Membership_Allocation_Type">
                                                <option value="0">-- Select --</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select></td>

                                            <td><select name="Membership_Allocation_Type" id="Membership_Allocation_Type">
                                                <option value="0">-- Select --</option>
                                                 <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select></td>

                                            <td><select name="Membership_Allocation_Type" id="Membership_Allocation_Type">
                                                <option value="0">-- Select --</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select></td>

                                            <td><select name="Membership_Allocation_Type" id="Membership_Allocation_Type">
                                                <option value="0">-- Select --</option>
                                                 <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select></td>

                                            <td><select name="Membership_Allocation_Type" id="Membership_Allocation_Type">
                                                <option value="0">-- Select --</option>
                                                 <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select></td>

                                            <td><select name="Membership_Allocation_Type" id="Membership_Allocation_Type">
                                                <option value="0">-- Select --</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select></td>

                                            <td><select name="Membership_Allocation_Type" id="Membership_Allocation_Type">
                                                <option value="0">-- Select --</option>
                                                 <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select></td>

                                            <td><select name="Membership_Allocation_Type" id="Membership_Allocation_Type">
                                                <option value="0">-- Select --</option>
                                                 <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select></td>

                                            <td><select name="Membership_Allocation_Type" id="Membership_Allocation_Type">
                                                <option value="0">-- Select --</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select></td>

                                            <td><select name="Membership_Allocation_Type" id="Membership_Allocation_Type">
                                                <option value="0">-- Select --</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select></td>
                                           
                                        </tbody></table>
                                        </div>
                                    </div>
                                    <script>

                                        document.addEventListener('DOMContentLoaded', function () {
                                            // note-codable

                                            var selectField = document.getElementById('Document_Details_Required');
                                            var inputsToToggle = [];

                                            // Add elements with class 'facility-name' to inputsToToggle
                                            var facilityNameInputs = document.getElementsByClassName('numberDetail');
                                            for (var i = 0; i < facilityNameInputs.length; i++) {
                                                inputsToToggle.push(facilityNameInputs[i]);
                                            }

                                            // Add elements with class 'id-number' to inputsToToggle
                                            var idNumberInputs = document.getElementsByClassName('Document_Remarks');
                                            for (var j = 0; j < idNumberInputs.length; j++) {
                                                inputsToToggle.push(idNumberInputs[j]);
                                            }

                                            // Add elements with class 'remarks' to inputsToToggle
                                            var remarksInputs = document.getElementsByClassName('ReferenceDocumentName');
                                            for (var k = 0; k < remarksInputs.length; k++) {
                                                inputsToToggle.push(remarksInputs[k]);
                                            }

                                                                            
                                            selectField.addEventListener('change', function () {
                                                var isRequired = this.value === 'yes';
                                                console.log(this.value, isRequired, 'value');

                                                inputsToToggle.forEach(function (input) {
                                                    input.required = isRequired;
                                                    console.log(input.required, isRequired, 'input req');
                                                });

                                                // Show or hide the asterisk icon based on the selected value
                                                var asteriskIcon = document.getElementById('asteriskInviDetails');
                                                asteriskIcon.style.display = isRequired ? 'inline' : 'none';
                                            });
                                        });
                                    </script>

                        



                                    

                                 <div class="sub-head">
                            QA Approval
                           </div>

                            {{-- <div class="col-12">
                                    <div class="group-input">
                            <label for="qa_approver">QA Approver</label>
                            <input type="text" id="qa_approver" name="qa_approver">
                                         </div>
                                </div> --}}

                                <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="QA_app_comment">QA Approver's Comments</label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="QA_app_comment" id="summernote-5">
                                    </textarea>
                                    </div>
                                </div>

                                <div class="sub-head">
                            Administrator Section
                           </div>
                                  <div class="col-lg-12">
                                        <div class="group-input">
                                            <label for="is_admin">Is Admin?</label>
                                            <select name="is_admin" id="is_admin">
                                                <option value="0">-- Select --</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>

                                            </select>
                                        </div>
                                    </div>

                                     <div class="col-lg-12">
                                        <div class="group-input">
                                            <label for="Super_admin">Is Super Admin?</label>
                                            <select name="Super_admin" id="Super_admin">
                                                <option value="0">-- Select --</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="administrator_comment">Administrator Comments</label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="administrator_comment" id="administrator_comment-5">
                                    </textarea>
                                    </div>
                                </div>

                                 <div class="col-12">
                                    <div class="group-input">
                                        {{-- employe --}}
                            <label for="Employee">Employee</label>
                            <input type="text" id="Employee" name="Employee">
                                         </div>
                                </div>

                                 <div class="col-12">
                                    <div class="group-input">
                            <label for="login_username">Login Username</label>
                            <input type="text" id="login_username" name="login_username">
                                         </div>
                                </div>
                                        <div class="col-lg-12">
                                        <div class="group-input">
                                            <label for="temp_deact">Temporary Deactivated</label>
                                            <select name="temp_deact" id="temp_deact">
                                                <option value="0">-- Select --</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                     <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="Audit Attachments">Supporting Documents</label>
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="Audit_file"></div>
                                            <div class="add-btn">
                                                <div>Add</div>
                                                <input type="file" id="HOD_Attachments" name="Audit_file[]"
                                                    oninput="addMultipleFiles(this, 'Audit_file')" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                

                                {{-- <div style="margin-bottom: 0px;" class="col-lg-12 new-date-data-field ">
                                    <div class="group-input input-date">
                                        <label for="Deviation category">Initial Deviation Category</label>
                                        <select name="Deviation_category" id="Deviation_category">
                                            <option value="0">-- Select -- </option>
                                            <option value="minor">Minor </option>
                                            <option value="major">Major </option>
                                            <option value="critical">Critical </option>
                                        </select>

                                    </div>
                                </div> --}}
                                {{-- <div class="col-lg-12 new-date-data-field">
                                    <div class="group-input input-date">
                                        <label class="mt-4"  for="Audit Schedule End Date">Justification for Categorization</label>
                                        <textarea class="summernote" name="Justification_for_categorization" id="" cols="30" ></textarea>

                                    </div>
                                </div> --}}
                               
                                
                                {{-- <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="Investigation required">Investigation  Required ?</label>
                                        <select name="Investigation_required" id="Investigation_required">
                                            <option value="0">-- Select --</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                  
                                    </div>
                                </div> --}}
                                {{-- <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Product/Material Name">Investigation Details </label>
                                        <textarea class="summernote" name="Investigation_Details" id="" cols="30" ></textarea>
                                  
                                    </div>
                                </div> --}}
                              
                                {{-- <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Customer notification">Customer Notification Required ?</label>
                                        <select name="Customer_notification" id="Customer_notification">
                                            <option value="0">-- Select --</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                            <option value="na">NA</option>
                                        </select>
                                  
                                    </div>
                                </div> --}}
                                {{-- <div class="col-5">
                                    <div class="group-input" id="customer_option">
                                        @php
                                            $customers = DB::table('customer-details')->get();
                                        @endphp
                                        <label for="customers">Customers<span class="text-danger">*</span></label>
                                        <select name="customers" id="customers">
                                            <option value="0"> -- Select --</option>
                                            @foreach ($customers as $data)
                                            <option value="{{ $data->id }}">{{ $data->customer_name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-1">
                                    <div class="group-input">
                                        <!-- <label for="Comments(If Any)">Customers</label> -->
                                        <button style="margin-top: 21px; border: 1px solid gray; background: #6f81dd; color: #fff;" type="button" class="btn b" data-bs-toggle="modal" data-bs-target="#myModal">
                                              Customer
                                    </button>
                                    </div>
                                </div> --}}

                                {{-- <div class="col-12">
                                    <div class="group-input"> 
                                        <label for="related_records">Related Records</label>
                                        <select multiple name="related_records[]" placeholder="Select Reference Records"
                                            data-search="false" data-silent-initial-value-set="true" id="related_records">
                                            @foreach ($pre as $prix)
                                                <option value="{{ $prix->id }}">
                                                    {{ Helpers::getDivisionName($prix->division_id) }}/Change-Control/{{ Helpers::year($prix->created_at) }}/{{ Helpers::record($prix->record) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                
                                {{-- <div class="col-12">
                                    <div class="group-input">
                                        <label for="related_records">Related Records</label>

                                        <select multiple name="related_records[]" placeholder="Select Reference Records"
                                            data-search="false" data-silent-initial-value-set="true"
                                            id="related_records">
                                            @foreach ($pre as $prix)
                                                <option value="{{ $prix->id }}">
                                                    {{ Helpers::getDivisionName($prix->division_id) }}/Deviation/{{ Helpers::year($prix->created_at) }}/{{ Helpers::record($prix->record) }}/{{$prix->short_description}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-12">
                                    <div class="group-input">
                                        <label for="Comments(If Any)">QA Initial Remarks</label>
                                      <textarea class="summernote" name="QAInitialRemark" id="" cols="30" ></textarea>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-md-12 mb-3">
                                    <div class="group-input">
                                        <label for="QAInitialRemark">QA Initial Remarks</label>
                                        <div><small class="text-primary">Please insert "NA" in the data field if it does not require completion</small></div>
                                        <textarea class="summernote" name="QAInitialRemark" id="summernote-7">
                                    </textarea>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-lg-12">
                                    <div class="group-input">
                                       
                                        
                                        <div class="file-attachment-field">
                                            <div class="file-attachment-list" id="Initial_attachment"></div>
                                            <div class="add-btn">
                                                
                                                </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="button-block">
                                <button type="submit" class="saveButton">Save</button>
                                            <a href="/rcms/qms-dashboard">
                                        <button type="button" class="backButton">Back</button>
                                    </a>
                                <button type="button" class="nextButton" onclick="nextStep()">Next</button>
                                <button type="button"> <a href="{{ url('rcms/qms-dashboard') }}" class="text-white"> Exit </a> </button>
                            </div>
                        </div>
                    </div>
                    </div>
                                
                    <!-- Activity Log content -->
                    <div id="CCForm6" class="inner-block cctabcontent">
                        <div class="inner-block-content">
                            <div class="row">
                                <div class="sub-head">Submission</div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submit by">Submit By :-</label>
                                        <div class="static"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="submit on">Submit On :-</label>
                                        <div class="static"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="submit comment">Submit Comments :-</label>
                                        <div class="static"></div>
                                    </div>
                                </div>
                                <div class="sub-head">HOD Review Completed</div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="HOD Review Complete By">HOD Review Complete By :-</label>
                                        <div class="static"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="HOD Review Complete On">HOD Review Complete On :-</label>
                                        <div class="static"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="HOD Review Comments">HOD Review Comments :-</label>
                                        <div class="static"></div>
                                    </div>
                                </div>
                                

                                <div class="sub-head">QA Initial Review Completed</div> 
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="QA Initial Review Complete By">QA Initial Review Complete By :-</label>
                                        <div class="static"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="QA Initial Review Complete On">QA Initial Review Complete On :-</label>
                                        <div class="static"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="QA Initial Review Comments">QA Initial Review Comments:-</label>
                                        <div class="static"></div>
                                    </div>
                                </div>
                                <div class="sub-head">CFT Review Complete</div>

                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="CFT Review Complete By">CFT Review Complete By :-</label>
                                        <div class="static"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="CFT Review Complete On">CFT Review Complete On :-</label>
                                        <div class="static"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="CFT Review Comments">CFT Review Comments :-</label>
                                        <div class="static"></div>
                                    </div>
                                </div>
                                <div class="sub-head"> QA Final Review Completed</div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="QA Final Review Complete By"> QA Final Review Complete By :-</label>
                                        <div class="static"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="QA Final Review Complete On"> QA Final Review Complete On :-</label>
                                        <div class="static"></div>
                                    </div>
                                </div> <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="QA Final Review Comments"> QA Final Review Comments :-</label>
                                        <div class="static"></div>
                                    </div>
                                </div>
                                <div class="sub-head"> Approved</div>

                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Approved By">Approved By :-</label>
                                        <div class="static"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="group-input">
                                        <label for="Approved On">Approved On :-</label>
                                        <div class="static"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="group-input">
                                        <label for="Approved Comments">Approved Comments :-</label>
                                        <div class="static"></div>
                                    </div>
                                </div>
                                
                                
                                
                               
                                

                            </div>
                            <div class="button-block">
                                <button type="submit" class="saveButton">Save</button>
                                        <a href="/rcms/qms-dashboard">
                                        <button type="button" class="backButton">Back</button>
                                    </a>
                                <button type="submit">Submit</button>
                                <button type="button"> <a href="{{ url('rcms/qms-dashboard') }}" class="text-white">
                                        Exit </a> </button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>




    

    
<!-- -----------------------------------------------------------modal body---------------------- -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div style="background: #f7f2f" class="modal-header">
                    <h4 class="modal-title">Assets</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <!-- Form for adding new customer -->
                    <form method="POST" id="customerForm"> 
                        @csrf
<style>
    .validationClass{
        margin-left: 100px
    }
</style>
                        <div class="modal-sub-head">
                            <div class="sub-main-head">
                                <!-- Customer input fields -->
                                <!-- Left box -->
                                <div class="container">
                                    <div class="row g-2">
                                    <div class="col-6">
                                        <div class="Activity-type">
                                            <label  style="font-weight: bold;"  for="customer_name">Asset Name<span class="text-danger">*</span> :</label> <br>
                                            <input type="text" id="customer_name" name="customer_name"> 
                                        </div>
                                        <span id="customer_name_error" class="text-danger validationClass"></span>
                                    </div>
                                    <div class="col-6">
                                        <div class="Activity-type">
                                            <label  style="font-weight: bold;"  for="customer_name">Asset Type<span class="text-danger">*</span> :</label><br>
                                            <input type="text" id="customer_name" name="customer_name"> 
                                        </div>
                                        <span id="customer_name_error" class="text-danger validationClass"></span>
                                    </div>
                                    <div class="col-6">
                                        <div class="Activity-type">
                                            <label  style="font-weight: bold;"  for="customer_name">Asset ID<span class="text-danger">*</span> :</label><br>
                                            <input type="text" id="customer_name" name="customer_name"> 
                                        </div>
                                        <span id="customer_name_error" class="text-danger validationClass"></span>
                                    </div>
                                    <div class="col-6">
                                        <div class="Activity-type">
                                            <label  style="font-weight: bold;"  for="customer_name">Location<span class="text-danger">*</span> :</label><br>
                                            <input type="text" id="customer_name" name="customer_name"> 
                                        </div>
                                        <span id="customer_name_error" class="text-danger validationClass"></span>
                                    </div>
                                    <div class="col-6">
                                        <div class="Activity-type">
                                            <label  style="font-weight: bold;"  for="customer_name">Condition<span class="text-danger">*</span> :</label><br>
                                            <input type="text" id="customer_name" name="customer_name"> 
                                        </div>
                                        <span id="customer_name_error" class="text-danger validationClass"></span>
                                    </div>
                                    <div class="col-6">
                                        <div class="Activity-type">
                                            <label  style="font-weight: bold;"  for="customer_name">Assigned User<span class="text-danger">*</span> :</label><br>
                                            <input type="text" id="customer_name" name="customer_name"> 
                                        </div>
                                        <span id="customer_name_error" class="text-danger validationClass"></span>
                                    </div>
                                     <div class="col-6">
                                        <div class="Activity-type">
                                            <label  style="font-weight: bold;"  for="customer_name">Depreciation<span class="text-danger">*</span> :</label><br>
                                            <input type="text" id="customer_name" name="customer_name"> 
                                        </div>
                                        <span id="customer_name_error" class="text-danger validationClass"></span>
                                    </div>

                                     <div class="col-6">
                                        <div class="Activity-type">
                                            <label  style="font-weight: bold;"  for="customer_name">Disposition<span class="text-danger">*</span> :</label><br>
                                            <input type="text" id="customer_name" name="customer_name"> 
                                        </div>
                                        <span id="customer_name_error" class="text-danger validationClass"></span>
                                    </div>
                                     {{-- <div class="col-8">
                                        <div class="Activity-type">
                                            <label  style="font-weight: bold;"  for="customer_name">Warranty Information<span class="text-danger">*</span> :</label>
                                            <input type="text" id="customer_name" name="customer_name"> 
                                        </div>
                                        <span id="customer_name_error" class="text-danger validationClass"></span>
                                    </div> --}}


                                    {{-- <div class="col-4">
                                        <div class="Activity-type">
                                            <label  style="font-weight: bold;"  for="customer_name">History<span class="text-danger">*</span> :</label>
                                            <input type="text" id="customer_name" name="customer_name"> 
                                        </div>
                                        <span id="customer_name_error" class="text-danger validationClass"></span>
                                    </div>
                                </div>
                                </div> --}}

                               {{-- <div class="right-box">
                                    <!-- Customer Name -->
                                    
                                    <!-- Contact No -->
                                    <div class="Activity-type">
                                        <label style="font-weight: bold; margin-left: 36px;" for="contact_no">Asset Id<span class="text-danger">*</span> :</label>
                                        <input type="text" id="contact_no" name="contact_no">
                                    </div>
                                    <span id="contact_no_error" class="text-danger validationClass"></span>
                                    <!-- Industry -->
                                    <div class="Activity-type">
                                        <label style="font-weight: bold; margin-left: 57px;" for="industry">Manufacturer<span class="text-danger">*</span> :</label>
                                        <input type="text" id="industry" name="industry">
                                    </div>
                                    <span id="industry_error" class="text-danger validationClass"></span>
                                    <!-- Region -->
                                    <div class="Activity-type">
                                        <label style="font-weight: bold; margin-left: 66px; " for="region">Location<span class="text-danger">*</span> :</label>
                                        <input type="text" id="region" name="region">
                                    </div>
                                      <div class="Activity-type">
                                        <label style="font-weight: bold; margin-left: 66px; " for="region">Condition<span class="text-danger">*</span> :</label>
                                        <input type="text" id="region" name="region">
                                    </div>
                   <span id="region_id_error" class="text-danger validationClass"></span>
                                </div> --}}
                                <!-- Right box -->

                                

                                {{-- <div class="right-box">
                                    <!-- Customer Name -->
                                    
                                    <!-- Contact No -->
                                    <div class="Activity-type">
                                        <label style="font-weight: bold; margin-left: 36px;" for="contact_no">Warranty<span class="text-danger">*</span> :</label>
                                        <input type="text" id="contact_no" name="contact_no">
                                    </div>
                                    <span id="contact_no_error" class="text-danger validationClass"></span>
                                    <!-- Industry -->
                                    <div class="Activity-type">
                                        <label style="font-weight: bold; margin-left: 57px;" for="industry">Assigned User<span class="text-danger">*</span> :</label>
                                        <input type="text" id="industry" name="industry">
                                    </div>
                                    <span id="industry_error" class="text-danger validationClass"></span>
                                    <!-- Region -->
                                    <div class="Activity-type">
                                        <label style="font-weight: bold; margin-left: 66px; " for="region">Depreciation<span class="text-danger">*</span> :</label>
                                        <input type="text" id="region" name="region">
                                    </div>
                                    <div class="Activity-type">
                                        <label style="font-weight: bold; margin-left: 66px; " for="region">Disposition<span class="text-danger">*</span> :</label>
                                        <input type="text" id="region" name="region">
                                    </div>
                <span id="region_id_error" class="text-danger validationClass"></span>
                                </div> --}}
                            
                        <!-- Remarks -->
                        <div class="Activity-type">
                            <textarea style=" 126px; margin-top: 15px; width: 89%;" placeholder="Remarks" name="remarks" id="remarks" cols="30"></textarea>
                        </div>
                        <!-- Save button -->
                        <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 20px;">
                            <button type="button" onclick="submitForm()" class="saveButton">Save</button>
                        </div>
                        </div>
                        </div>
                    </form>

                    
                    <script>
                        function submitForm() {
                            document.querySelectorAll('.validationClass').forEach(span => {
                                span.textContent = '';
                            });

                            var formData = new FormData(document.getElementById('customerForm'));

                            // Perform basic validation
                            if (formData.get('customer_id').trim() === '') {
                                document.getElementById('customer_id_error').textContent = 'Customer ID is required.';
                                return;
                            }

                            if (formData.get('email').trim() === '') {
                                document.getElementById('email_error').textContent = 'Email is required.';
                                return;
                            }

                            if (formData.get('customer_type').trim() === '') {
                                document.getElementById('customer_type_error').textContent = 'Customer Type is required.';
                                return;
                            }
                            if (formData.get('status').trim() === '') {
                                document.getElementById('status_error').textContent = 'Status is required.';
                                return;
                            }
                            if (formData.get('customer_name').trim() === '') {
                                document.getElementById('customer_name_error').textContent = 'Customer Name is required.';
                                return;
                            }
                            if (formData.get('industry').trim() === '') {
                                document.getElementById('industry_error').textContent = 'Industry is required.';
                                return;
                            }
                            if (formData.get('contact_no').trim() === '') {
                                document.getElementById('contact_no_error').textContent = 'Contact Number is required.';
                                return;
                            }
                            if (formData.get('region').trim() === '') {
                                document.getElementById('region_error').textContent = 'Region is required.';
                                return;
                            }
                            // Send POST request to server
                            fetch("{{ route('customers.store') }}", {
                                method: "POST",
                                body: formData
                            })
                            .then(response => {
                                if (response.ok) {
                                    // Close modal
                                    var myModal = new bootstrap.Modal(document.getElementById('myModal'));
                                    myModal.hide();

            // Show toaster message
            toastr.success('Record is created Successfully');
                                    // Get form data
            var customerData = {
                customer_id: formData.get('customer_id'),
                customer_name: formData.get('customer_name'),
                email: formData.get('email'),
                customer_type: formData.get('customer_type'),
                status: formData.get('status'),
                contact_no: formData.get('contact_no'),
                industry: formData.get('industry'),
                region: formData.get('region'),
                remarks: formData.get('remarks')
            };
            
            // Append new row with form data to the table
            var newRow = `
                <tr>
                    <td>${customerData.customer_id}</td>
                    <td>${customerData.customer_name}</td>
                    <td>${customerData.email}</td>
                    <td>${customerData.customer_type}</td>
                    <td>${customerData.status}</td>
                    <td>${customerData.contact_no}</td>
                    <td>${customerData.industry}</td>
                    <td>${customerData.region}</td>
                    <td>${customerData.remarks}</td>
                </tr>
            `;
            
            document.querySelector('.table tbody').innerHTML += newRow;
                                } else {
                                    console.error('Failed to create customer');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                        }
                    </script>


                    @php
                        $customers = DB::table('customer-details')->get();
                    @endphp
                    <!-- Customer grid view -->
                    {{-- <div class="table-responsive">
                        <h5>Stored Customers</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Contact No</th>
                                    <th>Industry</th>
                                    <th>Region</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Check if customers array is empty or null -->
                                @if($customers && count($customers) > 0)
                                <!-- Iterate over stored customers and display them -->
                                    @foreach($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->customer_id }}</td>
                                        <td>{{ $customer->customer_name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->customer_type }}</td>
                                        <td>{{ $customer->status }}</td>
                                        <td>{{ $customer->contact_no }}</td>
                                        <td>{{ $customer->industry }}</td>
                                        <td>{{ $customer->region }}</td>
                                        <td>{{ $customer->remarks }}</td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9">No results available</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

{{-- working form  --}}
{{-- <form method="POST" action="{{ route('customers.store') }}">
    @csrf

    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div style="background: #f7f2f" class="modal-header">
                    <h4 class="modal-title">Customers</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div style="background: #e9e2e2;" class="modal-sub-head">
                        <div class="sub-main-head">

                            <div class="left-box">

                                <div class="Activity-type">
                                    <label style="font-weight: bold;" for="customer_id">Customer ID :</label>
                                    <input type="text" id="customer_id" name="customer_id">
                                </div>
                                <div class="Activity-type">
                                    <label style="font-weight: bold; margin-left: 30px;" for="email">Email ID :</label>
                                    <input type="text" id="email" name="email">
                                </div>
                                <div class="Activity-type">
                                    <label style="font-weight: bold; margin-left: -20px;" for="customer_type">Customer Type :</label>
                                    <input type="text" id="customer_type" name="customer_type">
                                </div>
                                <div class="Activity-type">
                                    <label style="font-weight: bold; margin-left: 42px;" for="status">Status :</label>
                                    <input type="text" id="status" name="status">
                                </div>
                            </div>

                            <div class="right-box">

                                <div class="Activity-type">
                                    <label style="font-weight: bold;" for="customer_name">Customer Name :</label>
                                    <input type="text" id="customer_name" name="customer_name">
                                </div>

                                <div class="Activity-type">
                                    <label style="font-weight: bold; margin-left: 36px;" for="contact_no">Contact No :</label>
                                    <input type="text" id="contact_no" name="contact_no">
                                </div>
                                <div class="Activity-type">
                                    <label style="font-weight: bold; margin-left: 57px;" for="industry">Industry :</label>
                                    <input type="text" id="industry" name="industry">
                                </div>
                                <div class="Activity-type">
                                    <label style="font-weight: bold; margin-left: 66px; " for="region">Region :</label>
                                    <input type="text" id="region" name="region">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="Activity-type">
                        <textarea style="margin-left: 126px; margin-top: 15px; width: 79%;" placeholder="Remarks" name="remarks" id="remarks" cols="30"></textarea>
                    </div>
                </div>
                <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 20px;">
                    <button type="submit" class="saveButton">Save</button>
                </div>
            </div>
        </div>
    </div>
</form> --}}


{{-- grid modal  --}}
{{-- <div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div style="background: #f7f2f" class="modal-header">
                <h4 class="modal-title">Customers</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <!-- Form for adding new customer -->
                 <form method="POST" id="customerForm"> 
                    @csrf

                    <div class="modal-sub-head">
                        <div class="sub-main-head">
                            <!-- Customer input fields -->
                            <!-- Left box -->
                            <div class="left-box">
                                <!-- Customer ID -->
                                <div class="Activity-type">
                                    <label style="font-weight: bold;" for="customer_id">Customer ID :</label>
                                    <input type="text" id="customer_id" name="customer_id">
                                </div>
                                <!-- Email -->
                                <div class="Activity-type">
                                    <label style="font-weight: bold; margin-left: 30px;" for="email">Email ID :</label>
                                    <input type="text" id="email" name="email">
                                </div>
                                <!-- Customer Type -->
                                <div class="Activity-type">
                                    <label style="font-weight: bold; margin-left: -20px;" for="customer_type">Customer Type :</label>
                                    <input type="text" id="customer_type" name="customer_type">
                                </div>
                                <!-- Status -->
                                <div class="Activity-type">
                                    <label style="font-weight: bold; margin-left: 42px;" for="status">Status :</label>
                                    <input type="text" id="status" name="status">
                                </div>
                            </div>

                            <!-- Right box -->
                            <div class="right-box">
                                <!-- Customer Name -->
                                <div class="Activity-type">
                                    <label style="font-weight: bold;" for="customer_name">Customer Name :</label>
                                    <input type="text" id="customer_name" name="customer_name">
                                </div>
                                <!-- Contact No -->
                                <div class="Activity-type">
                                    <label style="font-weight: bold; margin-left: 36px;" for="contact_no">Contact No :</label>
                                    <input type="text" id="contact_no" name="contact_no">
                                </div>
                                <!-- Industry -->
                                <div class="Activity-type">
                                    <label style="font-weight: bold; margin-left: 57px;" for="industry">Industry :</label>
                                    <input type="text" id="industry" name="industry">
                                </div>
                                <!-- Region -->
                                <div class="Activity-type">
                                    <label style="font-weight: bold; margin-left: 66px; " for="region">Region :</label>
                                    <input type="text" id="region" name="region">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Remarks -->
                    <div class="Activity-type">
                        <textarea style="margin-left: 126px; margin-top: 15px; width: 79%;" placeholder="Remarks" name="remarks" id="remarks" cols="30"></textarea>
                    </div>
                    <!-- Save button -->
                    <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 20px;">
                        <button type="button" onclick="submitForm()" class="saveButton">Save</button>
                    </div>
                </form>
                <script>
                    function submitForm() {
                        var formData = new FormData(document.getElementById('customerForm'));
                
                        // Send POST request to server
                        fetch("{{ route('customers.store') }}", {
                            method: "POST",
                            body: formData
                        })
                        .then(response => {
                            if (response.ok) {
                                // Clear the form fields
                                document.getElementById('customerForm').reset();
                                
                                // Hide the modal
                                var myModal = new bootstrap.Modal(document.getElementById('myModal'));
                                myModal.hide();
                            } else {
                                console.error('Failed to create customer');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                    }
                </script>
                @php
                    $customers = DB::table('customer-details')->get();
                @endphp
                <!-- Customer grid view -->
                <div class="table-responsive">
                    <h5>Stored Customers</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Contact No</th>
                                <th>Industry</th>
                                <th>Region</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Iterate over stored customers and display them -->
                            @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->customer_id }}</td>
                                <td>{{ $customer->customer_name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->customer_type }}</td>
                                <td>{{ $customer->status }}</td>
                                <td>{{ $customer->contact_no }}</td>
                                <td>{{ $customer->industry }}</td>
                                <td>{{ $customer->region }}</td>
                                <td>{{ $customer->remarks }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}






<!-- -----------------------------------------------------end---------------------- -->
    <style>
        #step-form>div {
            display: none
        }

        #step-form>div:nth-child(1) {
            display: block;
        }
    </style>
    <script>

const saveButton = document.getElementById("ChangeSaveButton001");

    // Add a click event listener to the button
    saveButton.addEventListener("click", function() {
    // Handle the click event here
    document.getElementById("ChangesaveButton001").disabled = true;
    console.log("Save Changes button clicked");
 
});

            function handleClick001() {
                // Disable the button to prevent multiple clicks
                document.getElementById("ChangesaveButton001").disabled = true;

                .then(() => {
                    // Re-enable the button after the action is completed
                    document.getElementById("ChangesaveButton001").disabled = false;
                })
                .catch(error => {
                    // Re-enable the button if an error occurs
                    document.getElementById("ChangesaveButton001").disabled = false;
                    console.error('An error occurred:', error);
                });
            }  

        document.getElementById('myfile').addEventListener('change', function() {
            var fileListDiv = document.querySelector('.file-list');
            fileListDiv.innerHTML = ''; // Clear previous entries

            for (var i = 0; i < this.files.length; i++) {
                var file = this.files[i];
                var listItem = document.createElement('div');
                listItem.textContent = file.name;
                fileListDiv.appendChild(listItem);
            }
        });
    </script>

 <script>
        VirtualSelect.init({
            ele: '#reference_record, #notify_to'
        });

        $('#summernote').summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear', 'italic']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        $('.summernote').summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear', 'italic']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        let referenceCount = 1;

        function addReference() {
            referenceCount++;
            let newReference = document.createElement('div');
            newReference.classList.add('row', 'reference-data-' + referenceCount);
            newReference.innerHTML = `
            <div class="col-lg-6">
                <input type="text" name="reference-text">
            </div>
            <div class="col-lg-6">
                <input type="file" name="references" class="myclassname">
            </div><div class="col-lg-6">
                <input type="file" name="references" class="myclassname">
            </div>
        `;
            let referenceContainer = document.querySelector('.reference-data');
            referenceContainer.parentNode.insertBefore(newReference, referenceContainer.nextSibling);
        }
    </script>

    <script>
        VirtualSelect.init({
            ele: '#Facility, #Group, #Audit, #Auditee ,#related_records ,#audit_type'
        });

        function openCity(evt, cityName) {
            var i, cctabcontent, cctablinks;
            cctabcontent = document.getElementsByClassName("cctabcontent");
            for (i = 0; i < cctabcontent.length; i++) {
                cctabcontent[i].style.display = "none";
            }
            cctablinks = document.getElementsByClassName("cctablinks");
            for (i = 0; i < cctablinks.length; i++) {
                cctablinks[i].className = cctablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }



        function openCity(evt, cityName) {
            var i, cctabcontent, cctablinks;
            cctabcontent = document.getElementsByClassName("cctabcontent");
            for (i = 0; i < cctabcontent.length; i++) {
                cctabcontent[i].style.display = "none";
            }
            cctablinks = document.getElementsByClassName("cctablinks");
            for (i = 0; i < cctablinks.length; i++) {
                cctablinks[i].className = cctablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";

            // Find the index of the clicked tab button
            const index = Array.from(cctablinks).findIndex(button => button === evt.currentTarget);

            // Update the currentStep to the index of the clicked tab
            currentStep = index;
        }

        const saveButtons = document.querySelectorAll(".saveButton");
        const nextButtons = document.querySelectorAll(".nextButton");
        const form = document.getElementById("step-form");
        const stepButtons = document.querySelectorAll(".cctablinks");
        const steps = document.querySelectorAll(".cctabcontent");
        let currentStep = 0;

        function nextStep() {
            // Check if there is a next step
            if (currentStep < steps.length - 1) {
                // Hide current step
                steps[currentStep].style.display = "none";

                // Show next step
                steps[currentStep + 1].style.display = "block";

                // Add active class to next button
                stepButtons[currentStep + 1].classList.add("active");

                // Remove active class from current button
                stepButtons[currentStep].classList.remove("active");

                // Update current step
                currentStep++;
            }
        }

        function previousStep() {
            // Check if there is a previous step
            if (currentStep > 0) {
                // Hide current step
                steps[currentStep].style.display = "none";

                // Show previous step
                steps[currentStep - 1].style.display = "block";

                // Add active class to previous button
                stepButtons[currentStep - 1].classList.add("active");

                // Remove active class from current button
                stepButtons[currentStep].classList.remove("active");

                // Update current step
                currentStep--;
            }
        }
    </script>
         <script>
            function removeHtmlTags() {
                var textarea = document.getElementById("summernote-1");
                var cleanValue = textarea.value.replace(/<[^>]*>?/gm, ''); // Remove HTML tags
                textarea.value = cleanValue;
            }
        </script>
          <script>
            function removeHtmlTags() {
                var textarea = document.getElementById("summernote-2");
                var cleanValue = textarea.value.replace(/<[^>]*>?/gm, ''); // Remove HTML tags
                textarea.value = cleanValue;
            }
        </script>
    
    <script>
        function removeHtmlTags() {
            var textarea = document.getElementById("summernote-3");
            var cleanValue = textarea.value.replace(/<[^>]*>?/gm, ''); // Remove HTML tags
            textarea.value = cleanValue;
        }
    </script>
    <script>
        function removeHtmlTags() {
            var textarea = document.getElementById("summernote-15");
            var cleanValue = textarea.value.replace(/<[^>]*>?/gm, ''); // Remove HTML tags
            textarea.value = cleanValue;
        }
    </script>
    <script>
        function removeHtmlTags() {
            var textarea = document.getElementById("summernote-16");
            var cleanValue = textarea.value.replace(/<[^>]*>?/gm, ''); // Remove HTML tags
            textarea.value = cleanValue;
        }
    </script>

    
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const addRowButtons = document.querySelectorAll('.add-row');
        addRowButtons.forEach(button => {
            button.addEventListener('click', function() {
                const row = this.parentNode.parentNode; // Get the parent tr of the button
                
                const department = row.querySelector('td:first-child').innerText.trim(); // Get the department name
                const department1 = row.querySelector('td:first-child').nextElementSibling.querySelector('textarea').getAttribute('name'); // Get the department name
                
                // Create a new row and insert it after the current row
                const newRow = document.createElement('tr');
                newRow.innerHTML = `<td style="background: #e1d8d8">${department}</td>
                                    <td><textarea name="${department1}_Person"></textarea></td>
                                    <td><textarea name="${department1}_Impect_Assessment"></textarea></td>
                                    <td><textarea name="${department1}_Comments"></textarea></td>
                                    <td><textarea name="${department1}_sign&date"></textarea></td>
                                    <td><textarea name="${department1}_Remarks"></textarea></td>`;
                    
                // Insert the new row after the current row
                row.parentNode.insertBefore(newRow, row.nextSibling);
            });
        });
    });
    </script> --}}
    
    
                                             
                                            
                                        
                                    
                                
                            
                        
                    
                
            
        
    




        {{-- // document.addEventListener('DOMContentLoaded', function() {
        //     document.getElementById('type_of_audit').addEventListener('change', function() {
        //         var typeOfAuditReqInput = document.getElementById('type_of_audit_req');
        //         if (typeOfAuditReqInput) {
        //             var selectedValue = this.value;
        //             if (selectedValue == 'others') {
        //                 typeOfAuditReqInput.setAttribute('required', 'required');
        //             } else {
        //                 typeOfAuditReqInput.removeAttribute('required');
        //             }
        //         } else {
        //             console.error("Element with id 'type_of_audit_req' not found");
        //         }
        //     });
        // }); --}}
    
    <script>
        document.getElementById('departmentSelect').addEventListener('change', function() {
            var selectedValue = this.value;
            document.getElementById('deparmentCode').value = selectedValue;
        });
    </script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const select = document.getElementById('audit_type');
            select.addEventListener('change', function() {
                const selectedOptions = Array.from(select.selectedOptions).map(option => option.value);
                console.log(selectedOptions); // You can do whatever you need with the selected options here
            });
        });
    </script>
    
     <script>
        var maxLength = 255;
        $('#docname').keyup(function() {
            var textlen = maxLength - $(this).val().length;
            $('#rchars').text(textlen);});


            
    </script>


@endsection
