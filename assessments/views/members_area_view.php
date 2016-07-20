<?php  
@session_start();
require_once("../lib/view.php");

class Members_area_view extends View {

	public function __construct() {
		parent::View();
	}

	public function Login() {
		$html = '
			<form action="" method="POST">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" name="username" />
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" />
				</div>
				<input class="btn btn-success" type="submit" value="Login" />
			</form>
		';

		return $html;
	}

	public function Guidelines() {
		$html = 'ini content untuk guidelines coming soon!!!';
		return $html;
	}

}
?>