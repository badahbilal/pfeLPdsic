
@extends('admin2.index')

@section('content')
<?php

$dataPoints1 = $dataPoints;

?>

    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: "Somme total des commandes par jour"
                },
                axisY: {
                    title: "mantant en DH"
                },
                data: [{
                    type: "line",
                    yValueFormatString: "#,##0.## DH",
                    dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="{{asset('/js/canvas.js')}}"></script>

@endsection