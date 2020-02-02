$(document).ready(function(){
    

$("#edmask_id").on('keyup',function(e){
    e.preventDefault();      
    let prtId = $('#edmask_id').val();

    if(prtId.length>2){
      
        $.post ("includes/prtdetails.inc.php",
        {id:prtId},
        function(data){
            let str="";
            let arr_rows = JSON.parse(data);
            arr_rows.foreach(myPrtArray);

            $('.edmask-options').append(str);

            function myPrtArray(item){
                str+="<li>"+ item['prtindex'] +"</li>"
            }
        });
    }
    
})


});