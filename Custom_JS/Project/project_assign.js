function assign_project(id)
{
	$.ajax({

			type: "POST",
			url: baseURL+'Project/ProjectController/assign_project',
			data: "admin_id="+id,
			success: function (response)
			{
				$(".displaycontent").html(response);
			}
	});


}