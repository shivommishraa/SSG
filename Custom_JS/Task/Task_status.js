function task_status(id,p_id)
{
	$.ajax({
		type: "POST",
		url: baseURL+'Task/Task_Controller/task_status',
		
		data:{task_id:id,pr_id:p_id},
		success: function (response) {
			$(".displaycontent").html(response);
			
		}
	});
}

function task_status2(id,p_id)
{
	$.ajax({
		type: "POST",
		url: baseURL+'Task/Task_Controller/task_statusforview',
		
		data:{task_id:id,pr_id:p_id},
		success: function (response) {
			$(".displaycontent").html(response);
			
		}
	});
}


function mile_status(id,p_id)
{
	$.ajax({
		type: "POST",
		url: baseURL+'Task/Task_Controller/mile_statusforview',
		
		data:{mile_id:id,pr_id:p_id},
		success: function (response) {
			$(".displaycontent").html(response);
			
		}
	});
}
