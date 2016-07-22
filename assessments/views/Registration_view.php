<?php  
@session_start();
require_once("../lib/view.php");

class Registration_view extends View {

	public function __construct() {
		parent::View();
	}

	public function Registration() {
		$html = '
			<form action="" method="POST">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" name="username" />
				</div>
				<div class="form-group">
					<label for="Password">Password</label>
					<input type="password" class="form-control" name="password" />
				</div>
				<div class="form-group">
					<label for="nama">Nama Lengkap</label>
					<input type="text" class="form-control" name="nama" />
				</div>
				<div class="form-group">
					<label for="nim">NIM</label>
					<input type="text" class="form-control" name="nim" />
				</div>
				<div class="form-group">
					<label for="prodi">Program Studi</label>
					<input type="text" class="form-control" name="prodi" />
				</div>
				<div class="form-group">
					<label for="tlahir">Tempat Lahir</label>
					<input type="text" class="form-control" name="tlahir" />
				</div>
				<div class="form-group">
					<label for="tgl_lahir">Tanggal Lahir</label>
					<input type="text" class="form-control" name="tgl_lahir" />
				</div>
				<div class="form-group">
					<label for="gender">Jenis Kelamin</label>
					<input type="text" class="form-control" name="gender" />
				</div>
				<div class="form-group">
					<label for="alamat">Alamat</label>
					<input type="text" class="form-control" name="alamat" />
				</div>
				<div class="form-group">
					<label for="asal">Kota Asal</label>
					<input type="text" class="form-control" name="asal" />
				</div>
				<div class="form-group">
					<label for="telepon">Telepon</label>
					<input type="text" class="form-control" name="telepon" />
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control" name="email" />
				</div>
				<div align="center">
					<input class="btn btn-success" type="submit" value="Registration" />
				</div>
			</form>
		';

		return $html;
	}

	public function Guidelines() {
		$html = 'COMING SOON !!!';
		return $html;
	}

}
?>