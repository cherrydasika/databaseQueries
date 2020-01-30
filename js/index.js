$(document).ready(function(){
    

$("#summary-form").submit(function(e){
    e.preventDefault();  
    
    let start = $('#start').val();
    let end =  $('#end').val();
    console.log(start);
    $.post("includes/summary.inc.php",{
        start:start,
        end:end 
        },
        function(data, status){
            console.log(status);
            let str="";
            let arr_rows = JSON.parse(data);
            
            arr_rows.forEach(myOutput);
            console.log(str);
            $('.index-table tbody').append(str);

            function myOutput(item){
                str +="<tr><td>"+ item["MEID"] +"</td><td>"+ item["COOLINGMODE"] +"</td><td>"+ item["PLATETHICK"] +"</td><td>"+ item["PLATEWIDTH"] +"</td><td>"+ item["PLATELENGTH"] +"</td><td>"+ item["PLATESPEED"] +"</td></tr>"; 
            }   
        });
})


});