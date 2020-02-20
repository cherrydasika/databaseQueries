function populateBasicSummary(results){
    let rows = JSON.parse(results);       
    let str="";
    $(".table-plateSummary1 tbody").html("");
    $(".table-plateSummary2 tbody").html("");
    $(".table-plateSummary3 tbody").html("");
    
    var row = Object.values(rows[0]);
    
    str+="<tr><th>PlateId</th><td>"+row[0]+"</td><th>Width (mm)</th><td>"+row[5]+"</td></tr>";
    str+="<tr><th>Mode</th><td>"+row[3]+"</td><th>Length (mm)</th><td>"+row[6]+"</td></tr>";
    str+="<tr><th>Thickness (mm)</th><td>"+row[4]+"</td><th>Speed (mm)</th><td>"+row[7]+"</td></tr>";
    $(".table-plateSummary1 tbody").append(str);

    str="";
    str+="<tr><th>Change Product </th><td>"+row[20]+"</td><th>Testing Plate</th><td>"+row[21]+"</td></tr>";
    $(".table-plateSummary2 tbody").append(str);

    str="";
    str+="<tr><th>Start Temp (°C )</th><td>"+row[8]+"</td><td>"+row[11]+"</td><td>"+row[14]+"</td></tr>";
    str+="<tr><th>Finish Temp (°C )</th><td>"+row[9]+"</td><td>"+row[12]+"</td><td>"+row[15]+"</td></tr>";
    str+="<tr><th>Cooling Rate (°C/s )</th><td>"+row[10]+"</td><td>"+row[13]+"</td><td>"+row[16]+"</td></tr>";
    str+="<tr><th>Speed (m/s)</th><td></td><td>"+row[17]+"</td><td>"+row[18]+"</td></tr>";
    $(".table-plateSummary3 tbody").append(str);

}


function populateComposition(results){
    let rows = JSON.parse(results);
    let str="";
    $(".table-plateComposition tbody").html("");
    var row = Object.values(rows[0]);
    str+="<tr><th>Carbon C</th><td>"+row[1]+"</td><th>Aluminum AL</th><td>"+row[6]+"</td></tr>";
    str+="<tr><th>Manganese MN</th><td>"+row[2]+"</td><th>Copper Cu</th><td>"+row[7]+"</td></tr>";
    str+="<tr><th>Silicon SI</th><td>"+row[3]+"</td><th>Niobium Nb</th><td>"+row[8]+"</td></tr>";
    str+="<tr><th>Chromium CR</th><td>"+row[4]+"</td><th>Molybdenum Mo</th><td>"+row[9]+"</td></tr>";
    str+="<tr><th>Sulphur S</th><td>"+row[5]+"</td><th>Vanadium V</th><td>"+row[10]+"</td></tr>";
    $(".table-plateComposition tbody").append(str);
}


function populateEdgeMask(results){
                  
    let rows = JSON.parse(results);     
    let rowLength = rows.length;
    let edarray=[];
         
    //Check if the results has any error codes
    if('code' in rows ){console.log("Error in EdgeMask data");}
    else
    {    
        $(".table-plateEdgeMask tbody").html("");
        var str="";
        for(var i=0; i<rowLength; i++){
            var row = Object.values(rows[0]);
            edarray.push(row[3],row[4]);
            
        }
        str+="<tr><th>Bank A</th><td>"+edarray[0]+"</td><td>"+edarray[1]+"</td><td>"+edarray[2]+"</td><td>"+edarray[3]+"</td></tr>";
        str+="<tr><th>Bank B</th><td>"+edarray[4]+"</td><td>"+edarray[5]+"</td><td>"+edarray[6]+"</td><td>"+edarray[7]+"</td></tr>";
        str+="<tr><th>Bank C</th><td>"+edarray[8]+"</td><td>"+edarray[9]+"</td><td>"+edarray[10]+"</td><td>"+edarray[11]+"</td></tr>";
        str+="<tr><th>Bank D</th><td>"+edarray[12]+"</td><td>"+edarray[13]+"</td><td>"+edarray[14]+"</td><td>"+edarray[15]+"</td></tr>";
        $(".table-plateEdgeMask tbody").append(str);
    }

}


function populatePlateTemperature(results)
   {
    let rows = JSON.parse(results);     
    let rowLength = rows.length;
    let count = 0;
    var i;

    //Check if the results has any error codes
    if('code' in rows ){console.log("Error in EdgeMask data");}
    else
    {    
        $(".table-plateTemperature tbody").html("");
        var str="";
        for(i=0; i<rowLength; i++){
            
            var row = Object.values(rows[i]);           
            if(i % 3 < 1){if(i<47){str+="<tr><th>DriveSide</th>";}else{str+="<tr><th>OperatorSide</th>";}}
            count++;
            str+="<td>"+row[5]+"</td><td>"+row[6]+"</td><td>"+row[7]+"</td>";       
            if(count % 9 < 1){
                str+="</tr>"; count = 0;
            } 
        }
        $(".table-plateTemperature tbody").append(str);
    }
   }


   function populateWaterFlowRate(results){
    let rows = JSON.parse(results);     
    let rowLength = rows.length;
    let str=str1=str2="";
    let count = 0;
    $(".table-plateWaterFlowRate tbody").html("");
    for(i=0; i<9; i++){
        var row = Object.values(rows[0]);
        if(i<=5){str1+="<td>"+row[4]+"</td><td>"+row[5]+"</td>";}
        else{
            if(i==6){str2+="<tr><th>Bank B</th>";}
            else if(i==7){str2+="<tr><th>Bank c</th>";}
            else if(i==8){str2+="<tr><th>Bank D</th>";}
            str2+='<td colspan="6">'+row[4]+'</td><td colspan="6">'+row[5]+'</td></tr>';
        }
    }
    str +="<tr><th>Bank A</th>" + str1 + "</tr>";
    str +=str2;
    var row = Object.values(rows[0]);
    //console.log(rows);
   
    $(".table-plateWaterFlowRate tbody").append(str);
}

function populateWeather(results){
    console.log(results);
    let weatherObj = JSON.parse(results); 
    console.log(weatherObj);
    
    let str="";
    $(".table-weather tbody").html("");
    str+="<tr><th>Latitude:</th><td>"+weatherObj.coord.lat+"</td><th>Longitude:</th><td>"+weatherObj.coord.lon+"</td></tr>";
	str+="<tr><th>Sky:</th><td>"+weatherObj.weather[0].main+"</td><th>Description:</th><td>"+weatherObj.weather[0].description+"</td></tr>";
	str+="<tr><th>Temperature:</th><td>"+weatherObj.main.temp+"</td><th>Feels Like:</th><td>"+weatherObj.main.feels_like+"</td></tr>";
	str+="<tr><th>Minimum Temp:</th><td>"+weatherObj.main.temp_min+"</td><th>Max Temp:</th><td>"+weatherObj.main.temp_max+"</td></tr>";
	str+="<tr><th>Pressure:</th><td>"+weatherObj.main.pressure+"</td><th>Humidity:</th><td>"+weatherObj.main.humidity+"</td></tr>";
    str+="<tr><th>Wind Speed:</th><td>"+weatherObj.wind.speed+"</td><th>Degrees:</th><td>"+weatherObj.wind.deg+"</td></tr>";
    
    $(".table-weather tbody").append(str);
}