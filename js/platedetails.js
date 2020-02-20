$(document).ready(function(){
    $.getScript("js/plateDetailsFunctions.js", function() {});
    if(localStorage.getItem("plateId")!=null){$('#plateId').val(localStorage.getItem("plateId"));}

    function getDatafromDb(url,functionType,plateId){
    
        var jqXHR = $.ajax({
            url: url,
            type: 'POST',
            async: false,
            data: { plateId: plateId, functionType: functionType},
            success: function(response) {                              
            },
            error: function(textStatus, errorThrown){
            alert(textStatus, errorThrown);
            }  
        });
    
        return jqXHR.responseText;
    }

    function apiEdgeMask(plateId){
        
        let url = "http://localhost:8085/restAPI/edgemask/index.php?plateId=" + plateId;
        var jqXHR = $.ajax({
            url: url,
            type: 'POST',
            async: false,
            data: { },
            success: function(response) {                              
            },
            error: function(textStatus, errorThrown){
            alert(textStatus, errorThrown);
            }  
        });
        return jqXHR.responseText;
    }

    function apiPlateTemperature(plateId){

        let url = "http://localhost:8085/restAPI/temperaturedata/index.php?plateId=" + plateId;
        var jqXHR = $.ajax({
            url: url,
            type: 'POST',
            async: false,
            data: { },
            success: function(response) {                              
            },
            error: function(textStatus, errorThrown){
            alert(textStatus, errorThrown);
            }  
        });    
        return jqXHR.responseText;      
    }


    function apiWeather(cityName){
        /*let weatherObj ={
            coord: {lon: -0.13, lat: 51.51},
            weather: {id: 804, main: "Clouds", description: "overcast clouds", icon: "04d"},
            base: "stations",
            main: {temp: 9.65, feels_like: 3.81, temp_min: 8.33, temp_max: 11, pressure: 1007, humidity: 81},
            visibility: 10000,
            wind: {speed: 7.2, deg: 220, gust: 12.3},
            clouds: {all: 90},
            dt: 1582197246,
            sys: {type: 1, id: 1414, country: "GB", sunrise: 1582182365, sunset: 1582219373},
            timezone: 0,
            id: 2643743,
            name: "London",
            cod: 200
        }*/
        let appId = "c07c5209b12bc9269024ca58882b8ae1";
        let fullUrl = "http://api.openweathermap.org/data/2.5/weather?q=" + cityName + "&units=metric&appid=" + appId;
        
        var jqXHR = $.ajax({
            url: fullUrl,
            type: 'POST',
            async: false,
            data: { },
            success: function(response) {                              
            },
            error: function(textStatus, errorThrown){
            alert(textStatus, errorThrown);
            }  
        });    
        return jqXHR.responseText; 
        //console.log(weatherObj.weather.description);
        //console.log(weatherObj[wind][speed]);
    }

   
    

    

    $("#plateDetails").click(function(){
        let plateId = $("#plateId").val();
        let cityName = "paris";
        $("#detailReportTables").show();
        let url = "includes/platedetails.inc.php";
        if(plateId!=""){
            localStorage.setItem("plateId", plateId);

            let summary = getDatafromDb(url,1,plateId);
            populateBasicSummary(summary);

            let composition = getDatafromDb(url,2,plateId);
            populateComposition(composition);
            
            let waterFlowRate = getDatafromDb(url,3,plateId);
            populateWaterFlowRate(waterFlowRate);

            let edgeMask = apiEdgeMask(plateId);
            populateEdgeMask(edgeMask);

            let plateTemperature = apiPlateTemperature(plateId);
            populatePlateTemperature(plateTemperature);

            
            
        }
    })

    $("#cityWeather").click(function(){
        let cityName = $("#cityName").val();
        console.log(cityName);
        let weatherDetails = apiWeather(cityName);
        populateWeather(weatherDetails);
    })


});