$(document).ready(function(){
    
if(localStorage.getItem("startDate")!=null){$('#start-date').val(localStorage.getItem("startDate"));}
if(localStorage.getItem("endDate")!=null){$('#end-date').val(localStorage.getItem("endDate"));}

function getDatafromDb(url,functionType,start, end, pageNo){
    
    var jqXHR = $.ajax({
        url: url,
        type: 'POST',
        async: false,
        data: { start: start, end:end, functionType: functionType, pageNo:pageNo},
        success: function(response) {                
        },
        error: function(textStatus, errorThrown){
        alert(textStatus, errorThrown);
        }  
    });

    return jqXHR.responseText;
}

function populateTable(results){
    let rows = eval(results);
    let totalRows =  rows.length;
    let str="";
    $(".table-plateSummary tbody").html("");
    for(var i=0; i<totalRows; i++)
    {
        var row = Object.values(rows[i]);
        str+="<tr><td>"+row[0]+"</td><td>"+row[1]+"</td><td>"+row[2]+"</td><td>"+row[3]+"</td><td>"+row[4]+"</td><td>"+row[5]+"</td><td>"+row[6]+"</td><td>"+row[7]+"</td></tr>"
    }
    $(".table-plateSummary tbody").append(str);
}



$("#form-submit").click(function(e){
    e.preventDefault();  
    let start = $('#start-date').val();
    let end =  $('#end-date').val();
    let url = "includes/summary.inc.php";
    let results ="";
    let pageNo = 0;
    if(start !="")
    {
        localStorage.setItem("startDate", start);
        if(end!=""){localStorage.setItem("endDate", end);}
        results = getDatafromDb(url,1,start, end, pageNo );
        populateTable(results);

    }

    $(".pagination li").on("click",function(){
        let pageNum;
        if($(this).index() > 0 && $(this).index() < 4)
        {
            $(this).addClass("active").siblings().removeClass("active");
            pageNum = $(this).index() - 1;
            results = getDatafromDb(url,1,start, end, pageNum);
            populateTable(results);
        }
        
        
    })
    
    
})





});