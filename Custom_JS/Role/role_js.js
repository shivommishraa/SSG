function load_role(id)
{
    $.ajax({
                type: "POST",
                url: baseURL+'Admin/Role_Controller/View_roledata',
                
                data: "role_id="+id,
                success: function (response) {
                $(".displaycontent").html(response);
                  
                }
            });
}
