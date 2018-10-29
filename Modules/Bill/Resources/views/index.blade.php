@extends('bill::layouts.master')

@section('content')




<div class="container" >            
    <div class="col-md-6">
        <nav class="navbar navbar-default" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" >

                <div class="logo grid">
                    <div class="grid__item color-3">
                        <h1><a class="link link--nukun" href="index.html"><i></i>Floren<span>z</span>e</a></h1>        
                    </div>
                </div>


            </div>
        </nav>
    </div> 
    <div class="col-md-6" id="inline_florenze" class="inline_above_button">


        <a href="#" id="picture_id"  data-toggle="modal" data-target="#profile_picture_Modal">
            <div id="bill_profile_picture">
                @if(!empty($profile_pic))
                <img src="/florenze/public/profile_images/{{$profile_pic}}" alt="..." class="img-circle profile_img">
                @else 
                <img src="/" class="img-circle profile_img glyphicon glyphicon-user"">
                @endif
            </div>    
        </a>



        <input type="button" value="update" name="update" class="btn btn-success" id="update_button" data-toggle="modal" data-target="#update_profile_modal"/>
        <input type="button" value="reset passward" name="resetpassward" class="btn btn-success" id="reset_passward_button" data-toggle="modal" data-target="#passward_reset_modal"/>
        <a href="bill/logout"><input type="button" value="Logout" name="update" class="btn btn-success" id="logout_button"/></a>

        <!--
        <button type="button" name="update" class="btn btn-success" id="update_button" data-toggle="modal" data-target="#update_profile_modal"></button>
        <button type="button"  name="resetpassward" class="btn btn-success" id="reset_passward_button" data-toggle="modal" data-target="#passward_reset_modal"></button>
        <button type="button"  name="logout" class="btn btn-success" id="logout_button"></button>
        
        -->
    </div>
</div>

</br><br>

<div>
    <div class="container florenze-panel">
        <div class="container">
            <div class="col-md-10">
                <h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;Patient details</h2>
            </div>
        </div>
        
            <div class="container" style="height: 150px;"> 
            <div class="col-md-6">
                <form name="firstform" >
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="text">Appoinment No:</label>
                            </div>
                            <div class="col-md-5">		   
                                <input type="text" class="form-control" id="app_no" placeholder="Appoinment no">
                            </div>
                            
                             
                             <div class="col-md-4">
                                <label for="text">Doctor:</label>
                            </div>
                            <div class="col-md-5" style="margin-bottom: 5px">		                   
                                <select class="form-control" id="app_doctor">
                                    <option value="-1" disabled selected>Select Doctor</option>
                                    @foreach ($doctors as $doc)
                                        <option value="{{$doc->id}}">{{ $doc->employee->user->fname }} {{ $doc->employee->user->lname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            </br></br>
                            <div class="col-md-4">
                                <label for="text">Date:</label>
                            </div>
                            <div class="col-md-5">		   
                                <input type="date" class="form-control" id="app_date">
                            </div>
                            
                            
                        </div>
                        </br>

                        <input type="button" class="btn btn-success" id="appNo" value="View Details"/> 
                    </div>  
                </form>


            </div>
                
            <div class="col-md-6">
                <div id="clock-container" style="background: white; width: 340px; position: absolute; right: 0; margin-right: 40px; margin-top: 30px;">
                    <div id="clock" class="light">
                        <div class="display">
                            <div class="weekdays"></div>
                            <div class="ampm"></div>
                            <div class="digits"></div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </br></br>

    <div class="container florenze-panel"> 
        <div class="col-md-12  ">
            <form id="form2" class="" name="form2" action="#" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="text" id="tmp">First Name:</label>
                            </div>
                            <div class="col-md-3">		   
                                <input type="text" class="form-control" id="fname" placeholder="First name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="text">Last Name:</label>
                            </div>
                            <div class="col-md-3">		   
                                <input type="text" class="form-control" id="lname" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="text">Gender:</label>
                            </div>
                            <div class="col-md-3">	
                                <!--
                                   <input type="radio" name="radio1" id="bill_male" placeholder="Gender">
                                       <label for="text">Male</label>
                                   <input type="radio" name="radio1" id="bill_femail" placeholder="Gender">
                                       <label for="text">Female</label>
                                -->
                                <input type="text" class="form-control" id="gender" placeholder="gender">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="text">Date of Birth</label>
                            </div>
                            <div class="col-md-3">		   
                                <input type="date" class="form-control" id="dob" placeholder="Date of Birth">
                            </div>
                        </div>
                        	
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="text">Address:</label>
                            </div>
                            <div class="col-md-3">		   
                                <input type="text" class="form-control" id="address" placeholder="Address">
                            </div>
                        </div>	
                        <div class="row">
                            <div class="col-md-3">
                                <label for="text">Tele No:</label>
                            </div>
                            <div class="col-md-3">		   
                                <input type="text" class="form-control" id="tel_no" placeholder="Tele no">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="text">Email:</label>
                            </div>
                            <div class="col-md-3">		   
                                <input type="text" class="form-control" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="text">Patient ID:</label>
                            </div>
                            <div class="col-md-3">		   
                                <input type="text" class="form-control" id="patient_id" placeholder="Patient ID">
                            </div>
                        </div>
                    </div>
                </div>


                </br></br>

                <div class="row">
                    <div class="col-md-4">
                        <label for="text">Visit Date:</label>

                        <!--
                        <select>
                                                                <option default>DD</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                                <option value="13">13</option>
                                                                <option value="14">14</option>
                                                                <option value="15">15</option>
                                                                <option value="16">16</option>
                                                                <option value="17">17</option>
                                                                <option value="18">18</option>
                                                                <option value="19">19</option>
                                                                <option value="20">20</option>
                                                                <option value="21">21</option>
                                                                <option value="22">22</option>
                                                                <option value="23">23</option>
                                                                <option value="24">24</option>
                                                                <option value="25">25</option>
                                                                <option value="26">26</option>
                                                                <option value="27">27</option>
                                                                <option value="28">28</option>
                                                                <option value="29">29</option>
                                                                <option value="30">30</option>
                                                                <option value="31">31</option>
                    </select>
                        <select>
                                                                <option default>MM</option>
                                                                <option value="1">January</option>
                                                                <option value="2">February</option>
                                                                <option value="3">March</option>
                                                                <option value="4">April</option>
                                                                <option value="5">May</option>
                                                                <option value="6">June</option>
                                                                <option value="7">July</option>
                                                                <option value="8">August</option>
                                                                <option value="9">September</option>
                                                                <option value="10">October</option>
                                                                <option value="11">November</option>
                                                                <option value="12">December</option>
                                                                </select>
                                                                
                        <select>
                                                                <option default>YYYY</option>
                                                                <option value="1">1960</option>
                                                                <option value="2">1961</option>
                                                                <option value="3">1962</option>
                                                                <option value="4">1963</option>
                                                                <option value="5">1964</option>
                                                                <option value="6">1965</option>
                                                                <option value="7">1966</option>
                                                                <option value="8">1967</option>
                                                                <option value="9">1968</option>
                                                                <option value="10">1969</option>
                                                                <option value="11">1970</option>
                                                                <option value="12">1971</option>
                                                                </select>
                        -->
                        <input type="date" name=="visit_date" id="visit_date" placeholder="visit date" style="text-align: center;">       
                    </div>
                    <div class="col-md-4">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="text">Visit Time:</label>
                        <input type="time" id="visit_time" placeholder="Visit Time" style="text-align: center;">
                    </div>

                    <!--
                   <script type="text/javascript">
                       var timenow=new date();
                       timenow.format("UTC:h:MM:ss:TTz");
                       document.getElementById("visit_time").value=new Date().toUTCString();
                   </script>>
                    -->   
                </div>

                </br></br>

            </form>
        </div>
    </div>

    </br></br>

    <div class="container florenze-panel">
        <div class="col-md-10">
            <h2>Bill Details</h2>
        </div>
        <div class="container ">
            <div class="row ">
                <form id="form3">
                    <div id="bill_details1" class="col-md-4">
                        <div class="row">
                            <div class="col-md-5">
                                <label for="text">Basic Amount:</label>
                            </div>
                            <div class="col-md-5">		   
                                <input type="text" class="form-control" id="basic_amount" placeholder="Rs">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="text">Service Charges:</label>
                            </div>
                            <div class="col-md-5">		   
                                <input type="text" class="form-control" id="service_charges" value="{{$service_charge->charge}}" placeholder="Rs">
                            </div>
                        </div>

                    </div>
                    <div id="bill_details1" class="col-md-4">

                        <div class="row">
                            <div class="col-md-5">
                                <label for="text">Laboratory fees:</label>
                            </div>
                            <div class="col-md-5">		   
                            <!--    <input type="text" class="form-control" id="laboratory_fees" placeholder="Rs">  -->
                                <select  class="form-control" id="laboratory_fees">
                                    <option value="0" disabled selected>Select Test</option>
                                    @foreach ($lab_charges as $lab)
                                        <option value="{{$lab->charge}}">{{ $lab->sub_category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="text">X ray Fees:</label>
                            </div>
                            <div class="col-md-5">		   
                                <!--<input type="text" class="form-control" id="xray_fees" placeholder="Rs"> -->
                                <select class="form-control" id="xray_fees">
                                    <option value="0" disabled selected>Select Type</option>
                                    @foreach ($xray_charges as $xray)
                                        <option value="{{$xray->charge}}">{{ $xray->sub_category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="text">Concession:</label>
                            </div>
                            <div class="col-md-5">		   
                                <input type="text" class="form-control" id="concessions" placeholder="Rs">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-5">
                                <input type="button" class="btn btn-info" id="fullamount" value="full Amount">
                            </div>
                            <div class="col-md-5">		   
                                <input type="text" class="form-control" id="fullamount123" placeholder="Rs">
                            </div>
                        </div>  
                    </div>
                </form>

            </div>
        </div>
    </div>

    </br></br></br>
    <!-- data-toggle="modal" data-target="#print-preview-modal" -->
    <div class="container florenze-panel btn-danger-size">            
        <div class="col-xs-4">
            <button class="btn btn-success" id="print" data-toggle="modal" data-target="#print-preview-modal" ><i class="fa fa-print"></i>&nbsp;&nbsp;Print</button>
            <!--<button class="btn btn-success" id="print" data-toggle="modal" data-target="#print-preview-modal" onclick="PrintDoc()">Print</button>-->
        </div>
        <div class="col-xs-4">
            <button class="btn btn-success" id="print_preview" data-toggle="modal" data-target="#print-preview-modal" ><i class="fa fa-eraser"></i>Print Preview</button>
        </div>	  
        <div class="col-xs-4">
            <button class="btn btn-success" id="bill-clear" type="reset" ><i class="fa fa-eraser"></i>&nbsp;&nbsp;Clear</button>
        </div> 
        <!--
        <div class="col-xs-3">
            <button class="btn btn-success" id="bill-exit" type="close"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Exit</button>
        </div>
        -->
    </div>
</div>







<!--
<input type="text" class="form-control" id="fu" placeholder="Rs">
  <script>
      function myFunction1(){
          document.getElementById('fu').value=Date();
      }
  </script>
 

 
  <input type="text" class="form-control" id="bat">
  
  <script>
      function myFunction(){
          $(document).ready(function(){
              $('#bat').attr("placeholder",Date());
          });
      }
  </script>
 
-->
</br></br>



<!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
<!--print preview window-->









<div id="print-preview-modal" class="modal" role="dialog">
    <!--    
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('../Modules/Bill/Assets/css/swipebox.css')}}">
    <link href="{{ asset('../Modules/Bill/Assets/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('../Modules/Bill/Assets/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('../Modules/Bill/Assets/css/print.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('../Modules/Bill/Assets/css/printstyle.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('../Modules/Bill/Assets/css/form-chamidu.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('../Modules/Bill/Assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" media="all"><!--small icon display-->




    <div class="my-modal">
        <div class="modal-content" style="background-color:#F1F9FB">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-header">

            </div>

            <div class="modal-body">
                <div id="print_preview">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row inlinetagmy">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-heartbeat" style="font-size:48px;color:red"></i>
                                <h3>Care</h3>	
                            </div>
                            <div class="row inlinetagmy">
                                <p>Kids Foundamantal clinic</p>
                                <p>78/A Nawala Road</p>
                                <p>Hawlok Town</p>

                                </br></br>

                                <p>Registration No:2452356A</p>
                                <p>Email:-kidscare@gmail.com</p>
                            </div>
                        </div>			
                        <div class="col-md-6">
                            <table id="table1feature" class="inlinetagmy">
                                <tr id="visa_manual_payment">
                                    <td><i class="fa fa-cc-visa" style="font-size:30px;color:blue"></i><h4>VISA</h4></td>
                                    <td><i class="fa fa-cc-discover" style="font-size:30px;color:red"></i><h4>Manual payment</h4></td>
                                </tr>
                                <tr id="secondrow">
                                    <td colspan="2" height="40">SIGNATURE:-</td>
                                </tr>
                                <tr>
                                    <td align="center" height="5" style="font-size:10px;color:#3A5572;" bgcolor="#FF5733">Service Date</td>
                                    <td align="center" height="5" style="font-size:10px;color:#3A5572;" bgcolor="#FF5733">Full Amount</td>
                                </tr>
                                <tr>                      
                                    <td align="center" height="8"><a id="model_servicedate" style="border:0px solid;text-align:center;color: black;"></a></input></td>
                                    <td id="model_fullamount" align="center" height="8" style="text-align: center;"></td>
                                </tr>                       
                                <tr>
                                    <td align="center" height="5" style="font-size:10px;color:#3A5572;" bgcolor="#FF5733">Patient Name</td>
                                    <td align="center" height="5" style="font-size:10px;color:#3A5572;" bgcolor="#FF5733">Appoinment no</td>
                                </tr>        
                                <tr>
                                    <td id="secondtable_patientfirstname" align="center">&nbsp</td> 
                                    <td id="secondtable_appoinmentno" align="center"></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    </br></br>



                    <div class="col-md-12 table_middle">
                        <table>
                            <tr>
                                <td width="25%"><label for="text" id="tmp">First Name:</label></td>
                                <td width="25%"><a id="model_fname" placeholder="First name" style="width:150px;"></a></td>
                                <td width="25%"><label for="text">Tele No:</label></td> 
                                <td width="25%"><a id="model_tel_no" placeholder="TEle no" style=""width="150px;"></a></td>
                            </tr>
                            <tr>
                                <td><label for="text">Last Name:</label></td>
                                <td><a id="model_lname" placeholder="Last Name"style="width:150px;" ></a></td>
                                <td><label for="text">Email:</label></td>
                                <td><a id="model_email" placeholder="Email" style="width:150px;"></a></td>
                            </tr>
                            <tr>
                                <td><label for="text">Gender:</label></td>
                                <td><a id="model_gender" placeholder="Gender" style="width:150px;"></a></td>
                                <td><label for="text">Address:</label></td>
                                <td><a id="model_address" placeholder="Address" style="width:150px;"></a></td>
                            </tr>
                            <tr>
                                <td><label for="text">Date of Birth:</label></td>
                                <td><a id="model_dob" placeholder="Date of Birth" style="width:150px;"></a></td>
                                <td><label for="text">Doctor Name:</label></td>
                                <td><a id="model_doctor_name" placeholder="Doctor Name" style="width:150px;"></a></td>
                            </tr>
                        </table>
                    </div>

                    </br>
                    <!--
                    
                    <div class="row inlinetagmy">
                        <label for="text" id="tmp">First Name &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <a id="model_fname" placeholder="First name" style="width:150px;"></a>
                        
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="text">Tele No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <a id="model_tel_no" placeholder="Tele no" style="width:150px;"></a>
                    </div>
                    <div class="row inlinetagmy">
                        <label for="text">Last Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <a id="model_lname" placeholder="Last Name"style="width:150px;" ></a>
                  
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="text">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <a id="model_email" placeholder="Email" style="width:150px;"></a>
                    </div>
                    <div class="row inlinetagmy">
                        <label for="text">Gender &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <a id="model_gender" placeholder="Gender" style="width:150px;"></a>
                  
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="text">Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <a id="model_address" placeholder="Address" style="width:150px;"></a>
                    </div>
                    <div class="row inlinetagmy">
                        <label for="text">Date of Birth &nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <a id="model_dob" placeholder="Date of Birth" style="width:150px;"></a>
                    </div>
                    -->

                    </br>
                    <div>

                    </div>

                    <!--second table-->

                    <div class="row secondtable">
                        <div class="col-md-12">
                            <table>
                                <div class="watermark">kids clinic</div>
                                <tr>
                                    <th height="20" width="13.89%" style="font-size:10px;color:#3A5572;" bgcolor="#FF5733">Patient Id</th>
                                    <th height="20" width="13.89%" style="font-size:10px;color:#3A5572;" bgcolor="#FF5733">Basic Amount</th>
                                    <th height="20" width="13.89%" style="font-size:10px;color:#3A5572;" bgcolor="#FF5733">Laboratory Fees</th>
                                    <th height="20" width="13.89%" style="font-size:10px;color:#3A5572;" bgcolor="#FF5733">X ray Fees</th>
                                    <th height="20" width="13.89%" style="font-size:10px;color:#3A5572;" bgcolor="#FF5733">Concession</th>
									<th height="20" width="13.89%" style="font-size:10px;color:#3A5572;" bgcolor="#FF5733">Service Charges</th>
                                    <th height="20" width="13.89%" style="font-size:10px;color:#3A5572;" bgcolor="#FF5733">Full Amount</th>
                                </tr>
                                <tr>
                                    <td id="secondtable_patienid" style="font-size:10px;color:#3A5572;" bgcolor="#fabfe8" height="200"></td>
                                    <td id="secondtable_basicamount" style="font-size:10px;color:#3A5572;" bgcolor="#fabfe8" height="200"></td>
                                    <td id="secondtable_laboratoryfees" style="font-size:10px;color:#3A5572;" bgcolor=" #fabfe8 " height="200"></td>
                                    <td id="secondtable_xrayfees" style="font-size:10px;color:#3A5572;" bgcolor=" #fabfe8 " height="200"></td>
                                    <td id="secondtable_concession" style="font-size:10px;color:#3A5572;" bgcolor=" #fabfe8 " height="200"></td>
                                    <td id="secondtable_servicecharges" style="font-size:10px;color:#3A5572;" bgcolor=" #fabfe8 " height="200"></td>
                                    <td id="secondtable_fullamount" style="font-size:10px;color:#3A5572;" bgcolor=" #fabfe8 " height="200"></td>
                                </tr>
                                <tr>
                                    <td colspan="7" height="150"><p>Thank you for chossing kids clinic for your health care needs.You may pay your balance by manually.
                                            You may be eligible for financial assistance under the terms and conditions the hospital offers to qualified patients.
                                            For additional information,contact the clinic patient Account Representative or visit our web site.
                                            Patient Account Representative available at 1-844-750-8950 or 205-638-5600,Mon-Friday 8am-4.30pm.                 
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-7">
                                <div id="rectangular fff">
                                    <p><img src="{{asset('../Modules/Bill/Assets/images/bg2.jpg')}}" atl="picture" width="300" height="55"></p>                    
                                </div>                         
                            </div>

                            <div class="col-md-5 lasttextbox">                         
                                <div class="rectangular2">
                                    <div clas="row inlinetagmy">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="text" style=""><font color="white">Total</font></label>
                                        &nbsp;&nbsp;&nbsp;<input type="text" id="model_finalfullamount" style="width:150px;text-align: center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>     
            </div>     
        </div>
    </div>
</div>          


























<!--

<script type="text/javascript">

/*--This JavaScript method for Print command--*/

    function PrintDoc() {

        var toPrint = document.getElementById('print-priview-model');

        var popupWin = window.open('', '_blank', 'width=800,height=500,location=no,left=200px');

        popupWin.document.open();

        popupWin.document.write('<html><title>::Preview::</title><link rel="stylesheet" type="text/css" href="print.css" /></head><body onload="window.print()">');

        popupWin.document.write(toPrint.innerHTML);

        popupWin.document.write('</html>');

        popupWin.document.close();

    }

/*--This JavaScript method for Print Preview command--*/

    function PrintPreview() {

        var toPrint = document.getElementById('print-priview-model');

        var popupWin = window.open('', '_blank', 'width=800,height=500,location=no,left=200px');

        popupWin.document.open();

        popupWin.document.write('<html><title>::Print Preview::</title><link rel="stylesheet" type="text/css" href="Print.css" media="screen"/></head><body">');

        popupWin.document.write(toPrint.innerHTML);

        popupWin.document.write('</html>');

        popupWin.document.close();

    }

</script>


-->







@stop



<!--eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee-->



<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 ////////////////////////////////////////////////////////////////////////////////////-->


<div id="update_profile_modal" class="modal fade" role="dialog">
    <div class="modal-content"  style="background-color: #F1F9FB">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 id="h3_update_profile" align="center">Update Profile</h3>
        </div>
        <div class="modal-body" id="update_profile_modal_body">    


            <form id="update_profile_form" action="bill/update" method="get">
                <table>
                    <tr>
                        <td><input type="text" id="update_profile_fname" name="fname" placeholder="First Name"/></td>
                        <td><input type="text" id="update_profile_lname" name="lname" placeholder="Last Name"/></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="gender" class="update_profile_gender" value="m" checked/><label class="styled-label">Male</label>
                            <input type="radio" name="gender" class="update_profile_gender" value="f" /><label class="styled-label">Female</label>
                        </td>
                        <td>
                            <input type="date" id="update_profile_dob" name="dob"/>
                        </td>
                    </tr>
                    <tr>
                        
                        
                        
                    </tr>
                    <tr>
                        <td colspan="2"><input type="text" id="update_profile_street" name="street" placeholder="Street"/></td>
                    </tr>
                    <tr>
                        <td><input id="update_profile_city" type="text" name="city" placeholder="city"/></td>
                        <td><select id="update_profile_state" name="state">
                                <option value="-1" disabled selected>province</option>
                                @foreach ($states as $state)
                                    <option value="{{$state->id}}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="update_profile_email" id="update_profile_email" name="email" placeholder="E mail"/></td>
                    </tr>
                    <tr>
                        <td><input type="tel" id="update_profile_phone" name="phone" placeholder="Phone"/></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input  type="reset" class="btn btn-info" id="update_profile_reset" value="Reset" /> </td>
                        <td><input type="submit" class="btn btn-info" id="update_profile_confirm" value="Confirm"></td>
                    </tr>
                </table>
            </form>

        </div>
    </div>
</div>


<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////-->



<div id="passward_reset_modal" class="modal fade" role="dialog">

    <div class="modal-content" style="background-color: #F1F9FB">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 id="h3_passward_reset" align="center">Passward Reset Profile</h3>
        </div>

        <div class="modal-body" id="passward_reset_modal_body">  

            <div id="passward_reset_profile">

                <form id="pass-reset-form" action='bill/resetPassword' method='GET'>
                    <table>
                        <tr>
                            <td colspan="2"><input type="text" id="passward_reset_username" name="email" placeholder="User Name"/></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" id="passward_reset_current_passward" name="CurrentPassword" placeholder="current passward"/></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" id="NewPassword" name="NewPassword" placeholder="new passward"/></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" id="passward_reset_confirm_passward"  name="ConfirmPassword" placeholder="confirm passward"/></td>   
                        </tr>
                        <tr>
                            <td><input type="reset" value="reset" id="passward_reset_reset_button" class="btn btn-info" /></td>
                            <td><input type="submit" value="confirm" id="passward_reset_confirm_button" class="btn btn-info" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////--> 


<div class="modal fade" id="profile_picture_Modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="background-color: #F1F9FB">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">

                <form id="update-reception-form" action="{{ url('bill/updateProfilePic') }}" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <input type="file" name="image" />
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>
                    </div>
                </form>


            </div>
            <div class="modal-footer" id="upload_picture_footer">
              <!--  <button type="reset" class="btn btn-info">change</button> -->
            </div>
        </div>
    </div>
</div>
