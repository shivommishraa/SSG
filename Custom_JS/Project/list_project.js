function taskdetails(ta_id,pr_id)
{
    $.ajax({
                type: "POST",
           
                url:baseURL+'Project/ProjectController/single_task_detail',
                data:{task_id:ta_id,project_id:pr_id},
                success: function (response) {
                $(".displaycontent").html(response);
                  
                }
            });
}



function projectstatus(pr_id)
{
    $.ajax({
                type: "POST",
                url: baseURL+'Project/ProjectController/projectstatus',
                
                data: "project_id="+pr_id,
                success: function (response) {
                $(".displaycontent").html(response);
                  
                }
            });
}



function miledetails(ta_id,pr_id)
{
    $.ajax({
                type: "POST",
           
                url:baseURL+'Project/ProjectController/single_mail_detail',
                data:{mile_id:ta_id,project_id:pr_id},
                success: function (response) {
                $(".displaycontent").html(response);
                  
                }
            });
}


