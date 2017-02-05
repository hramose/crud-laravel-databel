@extends('layouts.app')
@section('content')
    <div class="container body">
      <div class="main_container">

        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <!-- page content -->
        <div class="col-md-12 col-sm-12 col-xs-12 hidden-print" role="main">
          <div class="no-print">
            <div class="row">
              <div class="col-md-7 col-sm-7 col-xs-12 form-group pull-left">
                <h3><i class="fa fa-codebar"></i> Person <small> Details </small></h3>
              </div>
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search text-right">
					      <div class="btn-group"  id="btnprint" style="margin-top:20px;">
                  <a class="btn btn-primary btn-sm" href="{{ url('/person') }}"><i class="fa fa-chevron-left"></i> Back</a>
                  <a class="btn btn-default  btn-sm" href="{!!url('person')!!}/{{ $item->id }}/edit"> <i class="glyphicon glyphicon-edit"></i> edit </a>
                  <button type="button" onclick="window.print();" class="btn btn-default  btn-sm"><i class="fa fa-print"></i> Imprimir </button>
                  <a href="#"><button class="btn btn-default  btn-sm"><i class="fa fa-download"></i> PDF</button></a>
				        </div>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <!-- /page content -->
        <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="padding-top:0">
                  <div class="x_title">
                      <div class="row">
                        <div class="col-xs-12 invoice-header"  style="padding: 10px 10px 0 0;">
                          <table width="100%">
                          <tr>
                            <td>
                              <div class="pull-left">
                                <img src="{{ url('/images/logo_print.png')}}" style="width:240px;-webkit-filter: hue-rotate(240deg) background: rgba(0,0,250, 0.5);"> 
                              </div> 
                            </td>
                            <td style="text-align:right;font-size:10px;">            
                              <strong>PERSONAL DETAILS</strong>
                              <br><font size="1">Personal Information<br> and credits</font>
                            </td>
                          </tr>
                          </table>
                        </div>
                      </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content" style="display: block;">
                    <section class="content invoice">
                      <div class="row">
                        <div class="col-xs-12">
                          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                           <strong style="font-size:1.4em"> <strong> {{ $item->name }} {{ $item->lastname }}</strong>  </strong> <br>
                            Personal Code {{ $item->code }}
                          </p>
                        </div>
                      </div>
                      <!-- Table row -->
                      <div class="row">
                        <div class="col-sm-4 table">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th colspan="3"> Personal Details</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr><td width="5%"><b>Address:</b></td> <td>{{$item->address}} </td></tr>
                              <tr><td><b>City:</b></td> <td>{{$item->city}} </td></tr>
                              <tr><td><b>Gender:</b></td> <td>{{$item->gender}} </td></tr>
                              <tr><td width="5%"><b>Date of Birth:</b></td> <td>{{$item->birth}} </td></tr>
                              <tr><td><b>email:</b></td> <td>{{$item->email}} </td></tr>
                              <tr><td><b>Comments:</b></td> <td>{{$item->comments}} </td></tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!-- /.row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header"  style="padding: 10px 10px 0 0;">
                          <small class="pull-left">
                            <address>
                              Register information: <strong> Crearted at: {{ $item->created_at }}</strong> 
                              <br> Updated at: <strong>{{ $item->updated_at }}</strong>
                            </address>
                          </small>       
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>

@endsection