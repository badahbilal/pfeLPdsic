
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
                text: "Qauntité du produit en stock"
            },
            axisY: {
                title: "Qantite (en Unité)"
            },
            data: [{
                type: "column",
                yValueFormatString: "#,##0.## U",
                dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    }
</script>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="{{asset('/js/canvas.js')}}"></script>

@endsection






{{--
@extends('admin2.index')

@section('content')

    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title:{
                    text: "Gold Reserves"
                },
                axisY: {
                    title: "Gold Reserves (in tonnes)"
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.## tonnes",
                    dataPoints: {{ json_encode($dataPoints, JSON_NUMERIC_CHECK)}}
                }]
            });
            chart.render();

        }
    </script>
    <div class="box box-primary" style="    padding-bottom: 3px"><h3 class="text-center">listes des produits</h3></div>

    <div class="box box-primary" style="    padding-bottom: 3px">
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>

    </div>


    @endsection--}}
