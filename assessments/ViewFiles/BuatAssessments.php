<button class="btn btn-success" id="BuatAssessmentsButton"><i class="fa fa-plus"></i> Buat Assessments</button>
<script type="text/javascript">
	//$(document).ready(function() {
		$("#BuatAssessmentsButton").click(function() {
			$.ajax({
				url: "controllers/members_area_controller.php?action=BuatAssessments",
				success: function(response) {
					$("#title").text("Buat Assessments");
					$("#content").html(response);
				},
				error: function() {
					alert("Error njing");
				}
			});
		});
	//});
</script>