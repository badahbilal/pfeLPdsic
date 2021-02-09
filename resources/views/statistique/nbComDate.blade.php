
@extends('admin2.index')

@section('content')
<?php

$dataPoints1 = $dataPoints;

?>


<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Nombre de commande par jours"
            },
            axisY: {
                title: "Nombre de commande"
            },
            data: [{
                type: "column",
                yValueFormatString: "#,##0.## commandes",
                dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    }
</script>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="{{asset('/js/canvas.js')}}"></script>

@endsection




