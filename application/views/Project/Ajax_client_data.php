<?php $i=1;
if(!empty($client)){
	foreach ($client as $c){

		?>
		<div class="row">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2" >
				<span style="cursor: pointer; color: green;" id="client" onclick="javascript:clientdata(<?php echo $c->cus_id; ?>)" value="<?php echo $c->cus_id; ?>"><?php echo $i.'. '.$c->cus_name.' (' .$c->cus_mobile.')' ?></span>


			</div>
		</div>              

		<?php    $i++; }}else{   } ?> 
		<div id="classes"class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2" ></div>

<!-- =========================== Start code for after Click the client name  ================= -->


		<script type="text/javascript">

			function clientdata(id)
			{

				$.ajax({

					type: "POST",
					url: baseURL+'Project/ProjectController/findclientdatabyid',
					data: "client_id="+id,
					success: function(classes) 
					{ 

						if(!$.trim(classes)){

							$('#classes').html("");
							$("#grades").val("");
						}else{

							$('#classes').html(classes);
						 	$('#client_id').val(id); 
						 	document.getElementById("classes").style.backgroundColor="";

document.getElementById("alertdiv").style.visibility = "hidden";


						}
					}  
				});


			}
		</script>

<!-- =========================== End code for after Click the client name ================= -->
