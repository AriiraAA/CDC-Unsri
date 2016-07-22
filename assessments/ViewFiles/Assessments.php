<div class="form-group">
	<label for="deskripsi">Deskripsi</label>
	<textarea class="form-control" id="deskripsi" name="deskripsi" rows="5"></textarea>
</div>
<div class="form-group">
	<label for="petunjuk_umum">Petunjuk Umum</label>
	<textarea class="form-control" id="petunjuk_umum" name="petunjuk_umum" rows="5"></textarea>
</div>
<button id="TambahPertanyaan" class="btn btn-danger"><i class="fa fa-plus"></i> Tambah Pertanyaan</button>
<div id="TambahPertanyaanContent">
	
</div>



<script>$("#sidebar").html('<li class="active"><a id="assessments"><i class="icon-list"></i> <span class="title">Assessments</span></a></li><li><a id="profile_settings"><i class="icon-gear"></i> <span class="title">Profile Settings</span></a></li><li><a id="logout"><i class="icon-gear"></i> <span class="title">Logout</span></a></li>');</script>
<script>
				$("#profile_settings").click(function() {
					$.ajax({
						url: "controllers/members_area_controller.php?action=ProfileSettings",
						success: function(response) {
							$("#title").text("Profile Settings");
							$("#content").html(response);
						}
					});
				});

				$("#logout").click(function() {
					var form_data = "id_member=" + $("#id_member").val() + "&password=" + $("#password").val();

					$.ajax({
						url 		: "controllers/members_area_controller.php?action=MemberLogout",
						type 		: "POST",
						data 		: form_data,
						error 		: function() {
							            alert("Error di ajax!!!");
							        },
						success 	: function(response) {
										$("#title").text("Login");
										$("#sidebar").html('<li><a id="guidelines"><i class="icon-list"></i><span class="title">Guidelines</span></a></li><li class="active"><a id="login"><i class="icon-home"></i><span class="title">Login</span></a></li><li><a href="javascript:;"><i class="icon-folder"></i><span class="title">Multi Level Menu</span><span class="arrow "></span></a><ul class="sub-menu"><li><a href="javascript:;"><i class="icon-settings"></i> Item 1 <span class="arrow"></span></a><ul class="sub-menu"><li><a href="javascript:;"><i class="icon-user"></i>Sample Link 1 <span class="arrow"></span></a><ul class="sub-menu"><li><a href="#"><i class="icon-power"></i> Sample Link 1</a></li><li><a href="#"><i class="icon-paper-plane"></i> Sample Link 1</a></li><li><a href="#"><i class="icon-star"></i> Sample Link 1</a></li></ul></li><li><a href="#"><i class="icon-camera"></i> Sample Link 1</a></li><li><a href="#"><i class="icon-link"></i> Sample Link 2</a></li><li><a href="#"><i class="icon-pointer"></i> Sample Link 3</a></li></ul></li><li><a href="javascript:;"><i class="icon-globe"></i> Item 2 <span class="arrow"></span></a><ul class="sub-menu"><li><a href="#"><i class="icon-tag"></i> Sample Link 1</a></li><li><a href="#"><i class="icon-pencil"></i> Sample Link 1</a></li><li><a href="#"><i class="icon-graph"></i> Sample Link 1</a></li></ul></li><li><a href="#"><i class="icon-bar-chart"></i>Item 3 </a></li></ul></li>');
										$("#content").html(response);
									}
					});

					return false;
				});

				var pertanyaan = 0;

				$("#TambahPertanyaan").click(function() {
					$("#TambahPertanyaanContent").append('<div class="form-group"><label for="pertanyaan">Pertanyaan ' + ++pertanyaan +'</label><input class="form-control" type="text" name="pertanyaan[]" /></div>');
				});
			</script>