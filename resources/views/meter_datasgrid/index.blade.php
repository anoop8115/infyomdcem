@extends('layouts.app')
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

 <style>
        .grid-block{
            border-radius: 6px;
            padding: 0px;
            align-items: center;
        },
        .td{
            border: 2 px solid #ccc;
        }
     .users-item_name{
      font-weight: 600;
    font-size: 18px;
    line-height: 1.4;
    letter-spacing: -.3px;
    color: #171717;
     }    
       
    
    </style>
</head>
@section('content')
   
    <div class="content px-3">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1>Meter Datas</h1>
                </div>
                  <div class="col-sm-6" style="text-align-last: end;">
                     <a style="width:120px;" class="btn btn-info "  href="{{ route('data.logs') }}">Export Logs</a> </div>
            </div>
               </div>
            <!-- show button in left align -->
            <div class="row mb-1">
              
           </div>    
            
        </div>
    </section>
        <div class="sort-bar">
             <!-- search box -->
            <div class="row ml-2">
                <div class="col-sm-4" style="display: inline-flex">
                     <form action="{{ route('meterDatas.grid') }}" method="GET">
                    <div class="input-group">
                       
                        <input type="text" class="form-control" name="search" placeholder="Search Deviceid" id="search">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        
                    </div>
                     </form>
                      <form action="{{ route('meterDatas.grid') }}" method="GET">
                      <button class="btn btn-primary ml-2" type="submit">
                                <i class="fa fa-refresh"></i>
                            </button>
                            </form>
                           
                </div>
            </div>
             <!-- button for all logs -->
         
            <div class="sort-bar-end">
            
            </div>

        </div>
            <div class="container" style="margin-top: 20px;">
                <div class="row" >
                    @foreach($rodata as $key1 => $ro_data)
                         
                        <div class="col-md-6 col-lg-6 col-xl-6" style="margin-top: 10px;">
                            <article class="shadow-lg p-3 mb-5 bg-white rounded">
                                <div class="users-item-body">
                                     <a href="{{route('ro-data.view',$ro_data['device_id'])}}">
                                        <p class="users-item__name" style="text-align:center;font-weight:bold"> SAP ID :30:64:5B:60:56:36 D-id:{{$ro_data['device_id']}}</p> 
                                    </a>
                                       <button style="border:none;position:absolute;right:7;top:7;"> <a href="{{route('ro-data.view',$ro_data['device_id'])}}" class="btn btn-secondary">view</a></button>
                                        
                                       <br>
                                 
                                    <div class="container">
                                        <div class="row g-2">
                                          @php  $i=0;      @endphp
                                            @foreach($ro_data as $key => $value)
                                                @if(!empty($value) && $key != 'id' && $key != 'created_at' && $key != 'updated_at' && $key != 'device_id' && $key != 'sap_id' && $key != 'mac_address')
                                              <div class="col-md-3" style="margin-bottom: 5px">
                                                 
                                                    <div class=" grid-block shadow-sm"  style="background-color: {{\App\Helpers\Helper::getRandomBGColor()}}">
                                                      <div>  
                                                    <p style="text-align:center;font-size: 15px;text-transform: capitalize;" class=""><b>{{$fields[$i++]}}</b><br>
                                                {{$value}}
                                                </p>
                                                      
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                @endif
                                           @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- <button class="dropdown-btn  transparent-btn" type="button" title="More info">
                                    <div class="sr-only">More info</div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal" aria-hidden="true"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </button>
                                <ul class="users-item-dropdown dropdown">
                                   
                                </ul> -->
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
      
     
          <div class="links">

         {!! $paginated->links() !!}
        </div>
    </div>
@endsection

<script type="text/javascript">

    // setTimeout(function () { 
    //   location.reload();
    // }, 60 * 100);
    
moment.locale('pt-br')

     
// $.get( "http://galler22.ssdemo.xyz/api/rodata", function( data ) {
 
//   console.log( data ); // HTML content of the jQuery.ajax page
//         data.map(function (item) {
                                 
//                                 var t= moment(item.updated_at)
                               
//                                  var curr= moment(new Date())
                               
//                                var ms =curr.diff(t);
//                                 var d = moment.duration(ms);
                            
//                                 var hours = Math.floor(d.asHours());
//                                  var mins = Math.floor(d.asMinutes()) - hours * 60;
//                                  console.log(mins)
                               
//                                 if(mins > 5)
//                                 {
//                                         var device_id = item.device_id;
//                                         //   $.get( "http://galler22.ssdemo.xyz/api/add?cf1=0.0&cf2=0.0&cf3=0.0&device_id="+device_id+"&cf4=0.0&cf5=0.0&cf6=0.0&cf7=0.0&cf8=0.0&cf9=0.0&cf10=0.0&cf11=0.0&cf12=0.0&cf13=0.0&cf14=0.0&cf15=0.0&cf16=0.0", function( data ) {
//                                       console.log(data)
//                                     //   });
//                                 }
                                 
//                                 })
  
  
// });
      
  
    
</script>

