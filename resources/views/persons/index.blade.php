@extends('layouts.app')
<link href="{{ URL::to('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet"> 
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
        <div class="col-md-12 col-sm-12 col-xs-12" role="main">
          <div class="">
            <div class="row">
                <div class="col-md-7 col-sm-7 col-xs-12 form-group pull-left">
                    <h3><i class="fa fa-user"></i> Persons <small>  </small></h3>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search text-right">
                    <div class="btn-group"  id="toptools">
                       
                            <a href="{{Request::path()}}/create">
                               <button type="button" class="btn btn-default"><i class="fa fa-plus"></i>   New register</button>
                            </a>         
                    
                    </div>
                    <div class="btn-group"  id="toptools">
                        <a href="{{ route('persons.export') }}" target="_blank"> <button type="button" class="btn btn-default"><i class="fa fa-refresh"></i> Export </button></a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="row x_title">
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group pull-left">
                          <div class="">
                            <h2>Persons <small>List of all</small></h2>
                            <div class="clearfix"></div>
                          </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group pull-left">
                            <ul class="nav navbar-right panel_toolbox">
                                <li style="width:320px;" class="top_search">
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="buscador">
                                    <span class="input-group-btn">
                                              <button class="btn btn-default" type="button">search!</button>
                                              <button class="btn btn-default" type="button" id="btn_filtros" >filters</button>
                                          </span>
                                  </div>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div id="filters" class="text-right pull-right" style="display:none">
                        <div id="search-form" class="form-inline" role="form">
                            <div class="form-group">
                                <label for="name"></label>
                                <input type="text" class="form-control input-sm" name="dni" id="dni" placeholder="Search more by name" autocomplete="off">
                            </div>
                            <button type="button" id="reset" class="btn btn-default btn-sm">Clear</button>
                        </div>
                    </div>

                    <div class="x_content">
                        <table class="table table-bordered table-hover table-striped table-condensed" id="datatable" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>code</th>
                                    <th>Name</th>
                                    <th>Lastname</th>  
                                    <th>gender</th>
                                    <th>birth</th>
                                    <th>age</th>
                                    <th>created</th>  
                                    <th width="15%">actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- Modal -->
        <div class="modal fade" id="myModale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Item preview</h4>
                    </div>

                    <div class="modal-body"></div>

                    <div class="modal-footer">
                        <div class="btn-group"> 
                            <a class="btn btn-default btn-primary" href="" id="btn_ingress"><i class="fa fa-edit" ></i> edit</a>
                            <a class="btn btn-default btn-success" href="" id="btn_profile"><i class="fa fa-list" ></i> view profile</a>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    @endsection
    @push('scripts')
    <script src="{{ URL::asset('js/moment.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ URL::asset('js/es.js') }}"></script>
    <script>
    $(function() {
        var oTable = $('#datatable').DataTable({
            "sDom": "<'row'<'col-md-6'><'col-md-6'>r>t<'row'<'col-md-8'l i><'col-md-4'p>>",
            processing: true,
            serverSide: true,
            order: [ [2, 'asc'] ],
            ajax: {
                url: '{!! route('person.data') !!}',
                data: function (d) {
                    d.name = $('input[name=name]').val();
                    d.dni = $('input[name=dni]').val();
                    d.fecha = $('input[name=fecha]').val();
                    d.estado = $('input[name=estado]').val();
                }
            },
            columns: [
                { data: 'id', name: 'id' , visible: false},
                { data: 'code', name: 'code' },
                { data: 'name', name: 'name' },
                { data: 'lastname', name: 'lastname' },
                { data: 'gender', name: 'gender' , visible: false },
                { data: 'birth', name: 'birth' },
                { data: 'age', name: 'age', orderable: false, searchable: false },
                { data: 'created_at', name: 'created_at', orderable: false, searchable: false },
                { data: 'id', name: 'id' },       
            ],
            "aoColumnDefs": [{
                "aTargets": [8],
                "orderable": false,
                "searchable": false,  
                "mRender": function (data) {          
                    return '<div class="btn-group"> <a class="btn btn-default  btn-xs" onClick="viewOptions('+JSON.stringify(data)+')"> <i class="fa fa-info"></i> info </a>   <a href="{!!url("person")!!}/'+data+'/edit" class="btn btn-default  btn-xs"> <i class="glyphicon glyphicon-edit"></i> edit  </a> <a class="btn btn-default  btn-xs" onclick="personDelete('+data+')"> <i class="glyphicon glyphicon-trash"></i> del</a> </div>';
                }
            }]
        });

        $("#btn_filtros").click(function() {
            $('#filters').toggle('fast');
        });
        $('#search-form').on('input', function(e) {
            oTable.draw();
            e.preventDefault();
        });
        $("#reset").click(function() {
            $(this).closest('#search-form').find("input[type=text], input[type=hidden], textarea").val("");
            $('#selestado').prop('selectedIndex',0);
            oTable.draw();  
        });
        $('#selestado').change(function(){
          if($(this).val() < 0){ // or this.value == 'volvo'
            $(this).closest('#search-form').find("input[type=text], input[type=hidden], textarea").val("");
            $('#selestado').prop('selectedIndex',0);
            oTable.draw();
          }else{
            $('#estado').val($(this).val());
            oTable.draw();
          };
        });
        $("#buscador").bind('input', function () {
           var stt = $(this).val();
           $("#dni").val(stt);
            oTable.draw();
        });
    });
    </script>

    <script type="text/javascript">
        $(function () {
            $('#fecha_nac').datetimepicker({
              format: 'DD/MM/YYYY',
              locale: 'es'
            });
            $('#fecha_ing').datetimepicker({
              format: 'DD/MM/YYYY HH:mm',
              locale: 'es'
            });
        });
    </script>

    <script type="text/javascript">
    function viewOptions(id){

        $('#btn_options').attr('link', id);
        $('#btn_ingress').attr('href', "person/"+id+"/edit");
        $('#btn_profile').attr('href', "person/"+id);

        $.get('person/'+id+'/options', function(data){
            $('#myModale .modal-body').html(data);
            $('#myModale').modal('show', {backdrop: 'static'});
            $('#myModale').find('.modal-body').html(data);
        })
    }

    function personDelete(id){
        if (confirm('Are you sure?')) {
            $.ajax({
                url: "{{ url('/person')}}/"+id,
                data: { "_token": "{{ csrf_token() }}" },
                type: 'DELETE',
                success: function(response) {
                    if (response == 1) {
                        location.reload();
                    };
                }
            });
        };
      }
    </script>

    @if (Session::get('insertedId'))
        <script type="text/javascript">
            var id = <?php echo json_encode(Session::get('insertedId'), JSON_HEX_TAG); ?>;
            $.get('person/'+id+'/options', function(data){
                $('#myModale .modal-body').html(data);
                $('#myModale').modal('show', {backdrop: 'static'});
                $('#myModale').find('.modal-body').html(data);
                var urlNext = "{{ url('person/') }}/";
                $('#myModale .modal-footer').html('<a class="btn btn-success btn-block" href="'+urlNext+id+'" id="btn_cito"><i class="fa fa-list" ></i> View Person</a>');
                $('#registros').hide();
            })
        </script>
    @endif
@endpush