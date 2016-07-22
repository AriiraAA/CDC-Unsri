<?php  
@session_start();
require_once("../lib/view.php");
require_once("../models/members_area_model.php");

class Members_area_view extends View {

	var $model;

	public function __construct() {
		parent::View();
		$this->model = new Members_area_model();
	}

	public function Login() {
		$html = '
			<form id="MemberLogin">
				<div class="form-group">
					<label for="id_member">ID Member</label>
					<input type="text" class="form-control" name="id_member" id="id_member" />
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" id="password" />
				</div>
				<input id="LoginButton" class="btn btn-success" type="submit" value="Login" onclick="return false;" />
			</form>
			<script>
				$("#LoginButton").click(function() {
					var form_data = "id_member=" + $("#id_member").val() + "&password=" + $("#password").val();

					$.ajax({
						url 		: "controllers/members_area_controller.php?action=MemberLogin",
						type 		: "POST",
						data 		: form_data,
						error 		: function() {
							            alert("Error di ajax!!!");
							        },
						success 	: function(response) {
										$("#title").text("Assessments");
										$("#content").html(response);
									}
					});

					return false;
				});
			</script>
		';

		return $html;
	}

	public function GagalLogin() {
		$html = "<h1>Login gagal! Mohon klik tombol login kembali</h1>";
		return $html;
	}

	public function BuatAssessments($id_member) {
		$html = file_get_contents("../ViewFiles/BuatAssessments.php");
		return $html;
	}

	public function Assessments() {
		$html = file_get_contents("../ViewFiles/Assessments.php");
		return $html;
	}

	public function ProfileSettings() {
		$html = file_get_contents("../ViewFiles/ProfileSettings.php");
		return $html;
	}

	public function Guidelines() {
		$html = 'ini content untuk guidelines coming soon!!!';
		return $html;
	}

}
?>