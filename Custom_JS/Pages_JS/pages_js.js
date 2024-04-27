function load_marks(id)
{
    $.ajax({
                type: "POST",
                url: baseURL+'Pages/Tbl_pagesController/pagesdata',
                
                data: "page_id="+id,
                success: function (response) {
                $(".displaycontent").html(response);
                  
                }
            });
}

