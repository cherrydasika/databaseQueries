/* This is a function to validate the PRT ID from the database
and on successful validation show the parameters on the page
to make any changes as needed. */

$(document).ready(function(){
    

$("#edmask_id").on('keyup',function(e){
    e.preventDefault();      
    let prtId = $('#edmask_id').val();

    if(prtId.length>1){
      
        $.post ("includes/prtdetails.inc.php",
        {id:prtId},
        function(data){
            if(data)
            {
                $('.edmask-options').html("");    
                let str="";
                let arr_rows = JSON.parse(data);
                console.log(arr_rows);
                arr_rows.forEach(myPrtArray);

                $('.edmask-options').append(str);

                function myPrtArray(item){
                    str+="<li>"+ item['prtindex'] +"</li>"
                }

                $('.edmask-options li').click(function(){
                    console.log($(this).text());
                    $('#edmask_id').val($(this).text());
                    $('.edmask-options').html("");
                }); 

            }
        });
    }
    
})


});