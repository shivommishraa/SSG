function productInquiry(id)
{
    $.ajax({
                type: "POST",
                                                                 
                url: baseURL+'Nice_website/Website_Controller/product_inquiry',
                
                data: "pro_id="+id,
                success: function (response) {
                $(".displaycontent").html(response);
                  
                }
            });
}


function product_Inquiryadmin(id)
{
	$.ajax({

			type: "POST",
			url: baseURL+'Product/Tbl_productController/product_Inquiry',
			data: "inquiry_id="+id,
			success: function (response)
			{
				$(".displaycontent").html(response);
			}
	});


}



function status_inquiry(id)
{
	$.ajax({

			type: "POST",
			url: baseURL+'Product/Tbl_productController/status_inquiry',
			data: "inquiry_id="+id,
			success: function (response)
			{
				$(".displaycontent").html(response);
			}
	});


}