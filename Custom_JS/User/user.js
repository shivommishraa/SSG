function adminviewdata(id)
{
    $.ajax({
                type: "POST",
                url: baseURL+'Admin/User_Controller/View_User',
                
                data: "admin_id="+id,
                success: function (response) {
                $(".displaycontent").html(response);
                  
                }
            });
}


function change_password(id)
{

	 $.ajax({
                type: "POST",
                url: baseURL+'Admin/User_Controller/change_password',
                
                data: "admin_id="+id,
                success: function (response) {
                $(".displaycontent").html(response);
                  
                }
            });
	
}


function admincompaign(id)
{
    $.ajax({
                type: "POST",
                url: baseURL+'Admin/User_Controller/admincompaign',
                
                data: "admin_id="+id,
                success: function (response) {
                $(".displaycontent").html(response);
                }
            });
            
}


function addteam(id,role)
{
    $.ajax({
                type: "POST",
                url: baseURL+'Admin/User_Controller/addteam',
                
                data:{admin_id:id,role_id:role},
                success: function (response) {
                $(".displaycontent").html(response);
                }
            });
            
}