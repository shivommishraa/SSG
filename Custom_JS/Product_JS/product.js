function load_marks(id)
{
    $.ajax({
                type: "POST",
                url: baseURL+'Product/Tbl_productController/productdata',
                
                data: "product_id="+id,
                success: function (response) {
                $(".displaycontent").html(response);
                  
                }
            });
}

