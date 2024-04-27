function meeting_comment(m_id,ad_id,role)
{

    $.ajax({

                type: "POST",
                url: baseURL+'Meeting/Meeting_Controller/meeting_comment',
                
                data:{meeting_id:m_id,admin_id:ad_id,role_id:role},
                success: function (response) {
                $(".displaycontent").html(response);
                }
            });
            
}