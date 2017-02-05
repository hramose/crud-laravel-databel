@extends('layouts.app')

@section('content')

  @if(Session::has('message-ok'))
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Exito!</strong> {{ Session::get('message-ok') }}
  </div>
  @endif
  @if(Session::has('message-error'))
  <div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Advertencia!</strong> {{ Session::get('message-error') }}
  </div>
  @endif


  <?php 
    $mes_act = date('Y-m', strtotime('+0 months'));
    $ano_ley = explode('-', $mes_act)
  ?>


  <div class="row">
    <div class="col-md-7 col-sm-7 col-xs-12 form-group pull-left">
      <h3><i class="fa fa-home"></i> Welcome <small> to Admin Panel </small></h3>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-search"></i> Search Persons<small> search by number of Id </small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li> 
                <a href="{{ url('person/create') }}"> 
                    <button type="button" class="btn btn-xs btn-success"> <i class="fa fa-plus"></i> new register  </button>
                </a>
              </li>
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-6 col-sm-6 col-xs-12 form-group" style="width:100%">
              <input type="text" class="form-control has-feedback-left" id="qp" style="width:100%; font-size:2em;padding:20px">
              <button type="button" id="qp_btn_detail" link="" class="btn btn-sm btn-success btn-block" style="display:none"> <i class="fa fa-list"></i> Ver detalles  </button>   
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2><i class="fa fa-pie-chart"></i> Latest data  {{ $ano_ley[0] }} <small> items/persons </small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <li><a class="close-link"><i class="fa fa-close"></i></a></li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div>
                <canvas id="lineChart" style="max-height:350px"></canvas>
              </div>
            </div>
          </div>
        </div>
    </div>
  @endsection

  <?php $array_total_meses = implode(',',$total_meses); ?>
  <?php $array_total_meses_f = implode(',',$total_meses_f); ?>

  @push('scripts')
    <script src="{{ URL::asset('js/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- Chart.js -->
    <script>
      Chart.defaults.global.legend = {
        enabled: false
      };

      // Line chart
      var ctx = document.getElementById("lineChart");
      var lineChart = new Chart(ctx, {
        type: 'line',
         responsive: true,
    maintainAspectRatio: true,
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
            label: "Persons",
            backgroundColor: "rgba(38, 185, 154, 0.31)",
            borderColor: "rgba(38, 185, 154, 0.7)",
            pointBorderColor: "rgba(38, 185, 154, 0.7)",
            pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointBorderWidth: 1,
            data: [<?php echo $array_total_meses; ?>]
          }, {
            label: "Females",
            backgroundColor: "rgba(3, 88, 106, 0.3)",
            borderColor: "rgba(3, 88, 106, 0.70)",
            pointBorderColor: "rgba(3, 88, 106, 0.70)",
            pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(151,187,205,1)",
            pointBorderWidth: 1,
            data: [<?php echo $array_total_meses_f; ?>]
          }]
        },
      }

      );
    </script>
    <!-- /Chart.js -->

    <script type="text/javascript">
        $(function()
        {
          $( "#qp" ).autocomplete({
            source: "{{URL::to('person/autocomplete/q')}}",
            minLength: 1,
            select: function(event, ui) {
              $('#qp_btn_detail').attr("link", ui.item.label);
              //$('#qp_btn_detail').show("slow");
              var url = "{{URL::to('person/')}}/" + ui.item.id;
              window.location = url;
            }
          });
        });
    </script>
@endpush