   @extends('layout.layout')
 
     @section('content')
     <a href="{{url('/hosts')}}" class="btn btn-success">Home</a>
 <div id="container"></div>
<script>
     Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Sapid v/s Response time'
    },
    
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Response Time'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Response Time: <b>{point.y:.1f} ms</b>'
    },
    series: [{
        name: 'Population',
        data: [<?php echo join($res, ',') ?>],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
</script>

 @endsection
 
