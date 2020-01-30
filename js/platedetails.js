$(document).ready(function(){
    

$("#plateid-form").submit(function(e){
    e.preventDefault();  
    
    let plateId = $('#plate-id').val();
    if(plateId===''||plateId===null){
        console.log("I:Input empty or undefined");
        
    }
    else
    {        
        $.post("includes/platedetails.inc.php",{
        id:plateId        
        },
        function(data, status){
            console.log(status);
            let str="";
            let arr_rows = JSON.parse(data);
            
            arr_rows.forEach(myOutput);
            console.log(str);
            $('.index-table tbody').append(str);

            function myOutput(item){
                str +="<tr><td>"+ item["MEID"] +"</td><td>"+ item["PLATETHICK"] +"</td><td>"+ item["PLATEWIDTH"] +"</td><td>"+ item["PLATELENGTH"] +"</td><td>"+ item["MN"] +"</td><td>"+ item["CU"] +"</td><td>"+ item["AL"] +"</td></tr>"; 
            }   
        });
    }
    
})


});