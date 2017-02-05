@extends('layouts.app')
 <link href="{{ URL::to('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet"> 
<link href="{{ URL::to('css/select2.min.css') }}" rel="stylesheet">
<style type='text/css'>
.fullscreen {
    width: 100% !important;
    height: 100% !important;
    
    top: 0;
    left: 0;
}

.modal-body {
    padding: 0px;
    max-height: calc(100% - 120px);
    overflow-y: hidden;
}

.modal-dialog,
.modal-content {
    margin: 5px;
    height: 95%;
}

#mapCanvasModal {
  margin: 0;
  padding: 0;
  height: 100% !important;
  width: 100%;
}
</style>

@section('content')

    <div class="container body">
      <div class="main_container">

        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <strong>Error!</strong> Some error happend.<br><br>
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <!-- page content -->
        <div class="col-md-12 col-sm-12 col-xs-12" role="main">
            <div class="row">
                <div class="col-md-7 col-sm-7 col-xs-12 form-group pull-left">
                  <h3><i class="fa fa-user"></i> Person <small> New Form </small></h3>
                </div>
        
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Register Person <small>Type all inputs</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="x_content">   
                    {!! Form::model($item, ['method' => 'PATCH','route' => ['persons.update', $item->id]]) !!}
                                
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <label>CODE </label>
                        {!! Form::text('code', null, array('placeholder' => 'Code','class' => 'form-control')) !!}
                        <span class="fa fa-book form-control" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-3 col-sm-3 col-xs-12 form-group">
                         <label>Birth date </label>
                        <input type="text" class="form-control" name="birth" id="birth" placeholder="Birth date">
                        <span class="fa fa-calendar form-control" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-3 col-sm-3 col-xs-12 form-group ">
                         <label>Age </label>
                        <input type="text" class="form-control" name="age" id="age" placeholder="Age">
                        <span class="fa fa-calendar form-control" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group">                   
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        <span class="fa fa-user form-control" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group">                   
                        {!! Form::text('lastname', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
                        <span class="fa fa-user form-control" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <label>Email <i class="fa fa-envelope"></i></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{$item->email}}">
                        <span class="fa fa-phone form-control" aria-hidden="true"></span>
                      </div>

                                <div class="col-md-4 col-sm-4 col-xs-12">
                                   <label>Gender </label>
                                  <div class="radio">
                                    <label>
                                      <input type="radio" @if($item->gender == "f") checked="checked" @endif value="f" id="optionsRadios1" name="gender">Female
                                    </label>
       
                                    <label>
                                      <input type="radio" @if($item->gender == "m") checked="checked" @endif value="m" id="optionsRadios2" name="gender"> Male
                                     
                                    </label>
                                  </div>
                                </div>






                      <div class="col-md-12 col-sm-12 col-xs-12 form-group">                   
                        {!! Form::text('city', null, array('placeholder' => 'City','class' => 'form-control')) !!}
                        <span class="fa fa-user form-control" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{$item->address}}">
                        <span class="fa fa-map-marker form-control" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                        <label>Comments</label>
                  
                        {!! Form::textarea('comments', null, array('placeholder' => 'comments','class' => 'form-control','style'=>'height:100px')) !!}
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                        <a href="{{url('/person')}}"><button type="button" class="btn btn-default"><i class="fa fa-arrow-left"></i> Cancel</button></a>
                        <button type="submit" class="btn btn-primary">Register</button>
                      </div>

                  {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
        
        </div>
        <!-- /page content -->


@endsection

@push('scripts')
<script src="{{ URL::asset('js/nprogress/nprogress.js') }}"></script>
<script src="{{ URL::asset('js/moment.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-datetimepicker.min.js') }}"></script>


<script type="text/javascript">
    $(function () {
      $('#birth').datetimepicker({
              format: 'DD/MM/YYYY',
              maxDate: moment()
          }).on ("dp.change", function(e) {
              var dateselect = $('#birth').val();
              var newdate = dateselect.split("/").reverse().join("-");
              var years = moment().diff(newdate, 'years');
              $('#age').val(years);
      });
    });
</script>

@endpush