function load_marks(id)
{
    $.ajax({
                type: "POST",
                url: baseURL+'Query/Query/querydata',
                
                data: "contact_id="+id,
                success: function (response) {
                $(".displaycontent").html(response);
                  
                }
            });
}




function status_inquiry(id)
{
	$.ajax({

			type: "POST",
			url: baseURL+'Query/Query/status_inquiry',
			data: "contact_id="+id,
			success: function (response)
			{
				$(".displaycontent").html(response);
			}
	});
}


