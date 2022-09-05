@extends('layouts.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<head>
<style>
th, td {
  border: 1px solid black;
}
</style>
</head>
@section('content')


<div class="container">
      @if(@$device)
  <h2 class="main-title">Device Information</h2> 
    <br>
  
 
  <a style="width:140px;" class="btn btn-primary"  href="{{ route('data.devicelogs',$device->device_id) }}">Export Logs</a>

   <table class="table table-striped table-sm col-6" style="margin-left:20%; border:1px solid">
  <thead>
    <!--<tr>-->
    <!--  <th scope="col">Mac Address</th>-->
    
    <!--</tr>-->
  </thead>
  <tbody>
    
    <tr>
     <td scope="col" style="border:1px solid black;"><b>Sap Id</b></td>
      <td scope="col" style="border:1px solid black;">{{ $device->sap_id}}</td>
    </tr>
  
  </tbody>
</table>
 <table class="table table-sm table-striped col-6" style="margin-left:20% ; border:1px solid">
  <thead style="border:1px solid black;">
    <tr>
     
      <th scope="col" >Board</th>
      <th scope="col">Mac Address</th>
    
    </tr>
  </thead>
  <tbody>
    <tr>
     
      <td>{{ $device->board}}</td>
      <td>{{ $device->mac_address}}</td>
   
    </tr>
       <tr>
     
      <th scope="col">Firmware Version</th>
      <th scope="col">Total Power Outage</th>
    
    </tr>
  </thead>
  <tbody>
    <tr>
     
      <td>{{ $device->firmware}}</td>
      <td>{{ $device->total_power_outage}}</td>
   
    </tr>
     <tr>
     
      <th scope="col">System Date</th>
      <th scope="col">System Time</th>
    
    </tr>
  </thead>
  <tbody>
    <tr>
     
      <td>{{ $device->system_date}}</td>
      <td>{{ $device->system_time}}</td>
   
    </tr>
  </tbody>
</table>
@else 
<P text-align="center" >No device information found!!</P>
@endif
<br>

<h5><b>Alarm Status</b></h5>
  <br>
  @if(@$alarm)
  <table class="table table-striped table-sm col-8" style="margin-left:15%">
  <thead>
    <tr>
    
      <th scope="col" style="border:1px solid black;">Channel NO</th>
      <th scope="col"style="border:1px solid black;">Description</th>
      <th scope="col"style="border:1px solid black;">Config</th>
        <th scope="col"style="border:1px solid black;">Status</th>
    </tr>
  </thead>
  <tbody>
     <?php foreach($alarm as $val)  { ?>
    <tr>
    
      <td>{{$val->channel}}</td>
      <td>{{$val->description}}</td>
      <td>{{@$val->config}}</td>
      @if($val->status == 'on')
      <td><div style="height:15px; width: 15px;background-color: green; border-radius: 50%;"></div></td>
      @else
       <td><div style="height:15px; width: 15px;background-color: orange; border-radius: 50%;"></div></td>
       @endif
    </tr>
   <?php } ?>
  </tbody>
</table>
@else
<P text-align="center" >No device alarm found!!</P>
@endif
</div>


@endsection


<script type="text/javascript">

    setTimeout(function () { 
      location.reload();
    }, 60 * 100);
    
    </script>