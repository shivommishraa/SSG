function load_status(id)
{

    $.ajax({
                type: "POST",
                url: baseURL+'Invoice/InvoiceController/status_data',
                
                data: "inc_id="+id,
                success: function (response) {
                $(".displaycontent").html(response);
                  
                }
            });
}


function inc_cancel(id)
{
	
    $.ajax({
                type: "POST",
                url: baseURL+'Invoice/InvoiceController/inc_cancelconfirmation',
                
                data: "inc_id="+id,
                success: function (response) {
                $(".displaycontent").html(response);
                  
                }
            });
}

