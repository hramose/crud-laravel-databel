@extends('layouts.app')

@section('content')

  <?php 
    $meses = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dec");
    $mes_act = date('Y-m', strtotime("+0 months", strtotime($mes))); 
    $mes_ant = date('Y-m', strtotime("-1 months", strtotime($mes))); 
    $mes_sig = date('Y-m', strtotime("+1 months", strtotime($mes))); 
    $ano_ley = explode('-', $mes_act)
  ?>

  <div class="row" style="display">
    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
      <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-arrow-down"></i> Total Persons</span>
          <div class="count">{!! $total !!}</div>
          <span class="count_bottom"><i class="green">Mes de {{ $meses[$ano_ley[1]-1] }} </i> {{$ano_ley[0]}}</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-heartbeat"></i> Total females</span>
          <div class="count">{!! $total_f !!}</div>
          <span class="count_bottom"><i class="green">Mes de {{ $meses[$ano_ley[1]-1] }} </i> {{$ano_ley[0]}}</span>
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-heartbeat"></i> Total Males</span>
          <div class="count">{!! $total - $total_f !!}</div>
          <span class="count_bottom"><i class="green">Mes de {{ $meses[$ano_ley[1]-1] }} </i> {{$ano_ley[0]}}</span>
        </div>

      </div>
    </div>
  </div>
 
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><i class="fa fa-pie-chart"></i> Reporte Ingresos/Obitos Anual {{ $ano_ley[0] }} <small> Evolucion </small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li>
              <div class="btn-group  btn-group-sm">
                 <a class="btn btn-default" href="{{ url('reportes') }}/{{$mes_ant}}"> <i class="fa fa-arrow-left"></i> Prev Month</a>
                <a class="btn btn-default" href="{{ url('reportes') }}/{{date('Y-m', strtotime('+0 months'))}}">  Actual Month</a>
                  <a class="btn btn-default" href="{{ url('reportes') }}/{{$mes_sig}}">  Next Month <i class="fa fa-arrow-right"></i></a>
              </div>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div>
          <div class="x_content">
            <div>
              <canvas id="lineChart" style="max-height:450px"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
  <?php $total_meses = implode(',',$total_meses); ?>
  <?php $total_f_array = implode(',',$total_f_array); ?>

  @endsection
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
          labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
          datasets: [{
            label: "Male",
            backgroundColor: "rgba(38, 185, 154, 0.31)",
            borderColor: "rgba(38, 185, 154, 0.7)",
            pointBorderColor: "rgba(38, 185, 154, 0.7)",
            pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointBorderWidth: 1,
            data: [<?php echo $total_meses; ?>]
          }, {
            label: "Female",
            backgroundColor: "rgb(181, 34, 23, 0.3)",
            borderColor: "rgba(3, 88, 106, 0.70)",
            pointBorderColor: "rgba(3, 88, 106, 0.70)",
            pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(151,187,205,1)",
            pointBorderWidth: 1,
            data: [<?php echo $total_f_array; ?>]
          }]
        },
      }
      );
    </script>
    <!-- /Chart.js -->
@endpush