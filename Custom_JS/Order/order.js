function load_marks(id)
{
    $.ajax({
                type: "POST",
                url: baseURL+'Order/OrderController/viewOrder',
                
                data: "id="+id,
                success: function (response) {
                $(".displaycontent").html(response);
                  
                }
            });
}

