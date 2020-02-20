$(document).ready(function(){
    function getPassRate() {

        var chart = new CanvasJS.Chart("chartContainer2", {       
            animationEnabled: true,
            title: {
                text: "Product pass rate in percentage (%)"
            },
            axisX:{
                minimum: 5,
                maximum: 95
            },
            data: [{
                type: "column",
                dataPoints: [
                    { x: 10, y: 71 },
                    { x: 20, y: 55 },
                    { x: 30, y: 50 },
                    { x: 40, y: 65 },
                    { x: 50, y: 95 },
                    { x: 60, y: 68 },
                    { x: 70, y: 28 },
                    { x: 80, y: 34 },
                    { x: 90, y: 14 }
                ]
            }]
        });
        chart.render();
        
        var xSnapDistance = chart.axisX[0].convertPixelToValue(chart.get("dataPointWidth")) / 2;
        var ySnapDistance = 3;
        
        var xValue, yValue;
        
        var mouseDown = false;
        var selected = null;
        var changeCursor = false;
        
        var timerId = null;
        
        function getPosition(e) {
            var parentOffset = $("#chartContainer2 > .canvasjs-chart-container").offset();          	
            var relX = e.pageX - parentOffset.left;
            var relY = e.pageY - parentOffset.top;
            xValue = Math.round(chart.axisX[0].convertPixelToValue(relX));
            yValue = Math.round(chart.axisY[0].convertPixelToValue(relY));
        }
        
        function searchDataPoint() {
            var dps = chart.data[0].dataPoints;
            for(var i = 0; i < dps.length; i++ ) {
                if( (xValue >= dps[i].x - xSnapDistance && xValue <= dps[i].x + xSnapDistance) && (yValue >= dps[i].y - ySnapDistance && yValue <= dps[i].y + ySnapDistance) ) 
                {
                    if(mouseDown) {
                        selected = i;
                        break;
                    } else {
                        changeCursor = true;
                        break; 
                    }
                } else {
                    selected = null;
                    changeCursor = false;
                }
            }
        }
        
        jQuery("#chartContainer2 > .canvasjs-chart-container").on({
            mousedown: function(e) {
                mouseDown = true;
                getPosition(e);  
                searchDataPoint();
            },
            mousemove: function(e) {
                getPosition(e);
                if(mouseDown) {
                    clearTimeout(timerId);
                    timerId = setTimeout(function(){
                        if(selected != null) {
                            chart.data[0].dataPoints[selected].y = yValue;
                            chart.render();
                        }   
                    }, 0);
                }
                else {
                    searchDataPoint();
                    if(changeCursor) {
                        chart.data[0].set("cursor", "n-resize");
                    } else {
                        chart.data[0].set("cursor", "default");
                    }
                }
            },
            mouseup: function(e) {
                if(selected != null) {
                    chart.data[0].dataPoints[selected].y = yValue;
                    chart.render();
                    mouseDown = false;
                }
            }
        });
        
        }
    

    function getTemperature() {

            var chart = new CanvasJS.Chart("chartContainer1", {
            animationEnabled: true,
            title:{
                text: "Temperature error at recorded at MULPIC"
            },
            axisX: {
                valueFormatString: "DD MMM,YY"
            },
            axisY: {
                title: "Temperature (in °C)",
                includeZero: false,
                suffix: " °C"
            },
            legend:{
                cursor: "pointer",
                fontSize: 16,
                itemclick: toggleDataSeries
            },
            toolTip:{
                shared: true
            },
            data: [{
                name: "Entry",
                type: "spline",
                yValueFormatString: "#0.## °C",
                showInLegend: true,
                dataPoints: [
                    { x: new Date(2017,6,24), y: 8 },
                    { x: new Date(2017,6,25), y: 2 },
                    { x: new Date(2017,6,26), y: 7 },
                    { x: new Date(2017,6,27), y: 9 },
                    { x: new Date(2017,6,28), y: 11 },
                    { x: new Date(2017,6,29), y: 4 },
                    { x: new Date(2017,6,30), y: 13 }
                ]
            },
            {
                name: "Center",
                type: "spline",
                yValueFormatString: "#0.## °C",
                showInLegend: true,
                dataPoints: [
                    { x: new Date(2017,6,24), y: 13 },
                    { x: new Date(2017,6,25), y: 9 },
                    { x: new Date(2017,6,26), y: 10 },
                    { x: new Date(2017,6,27), y: 7 },
                    { x: new Date(2017,6,28), y: 9 },
                    { x: new Date(2017,6,29), y: 11 },
                    { x: new Date(2017,6,30), y: 9 }
                ]
            },
            {
                name: "Exit",
                type: "spline",
                yValueFormatString: "#0.## °C",
                showInLegend: true,
                dataPoints: [
                    { x: new Date(2017,6,24), y: 16 },
                    { x: new Date(2017,6,25), y: 18},
                    { x: new Date(2017,6,26), y: 14 },
                    { x: new Date(2017,6,27), y: 16 },
                    { x: new Date(2017,6,28), y: 13 },
                    { x: new Date(2017,6,29), y: 15 },
                    { x: new Date(2017,6,30), y: 12 }
                ]
            }]
        });
        chart.render();
        
        function toggleDataSeries(e){
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            }
            else{
                e.dataSeries.visible = true;
            }
            chart.render();
        }
        
        }

        $("#plateTemperature").click(function(){
            getTemperature();
        
        })

        $("#platePassRate").click(function(){
            getPassRate();
        
        })

        
})

