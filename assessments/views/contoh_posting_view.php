<?php
@session_start();
require_once("../lib/view.php");
class Contoh_posting_view extends View{
	
	public function __construct(){
		parent::View();
	}

	public function Test() {
		return "<h1>Aku Ganteng</h1>";
	}

	public function Home($resultNewsFeeds,$resultJobSeekers){
		$html="";

		$html.="
			<div class='portlet light'>
				<div class='portlet-body'>
					<div class='row'>
						<div class='col-md-12 news-page'>
							<h1 style='margin-top:0'>Home</h1>
							<div class='row'>							
								<!--news feeds headliners-->
								<div class='col-md-6'>
									<div class='top-news'>
										<a href='javascript:;' class='btn purple'>
										<span>
										News Feeds </span>
										<em>
										<i class='fa fa-tags'></i>
										Headliners </em>
										<i class='fa fa-globe top-news-icon'></i>
										</a>
									</div>";
		$k=0;
		while($row=mysql_fetch_assoc($resultNewsFeeds)){
			$jumlah_comment = $row['jumlah_comment']*1;
			$date = date_create($row['posting_date']);
			$fileImage = "".$row['posting_image'];
			//$fileImage = $row['image'];
			if($row['posting_image']!=""&&file_exists("../../userfiles/image/posting/".$fileImage)){
				$view_image= "<img src='./userfiles/image/posting/".$fileImage."' alt='' class='img-responsive'>";
			}
			else{
				$view_image = $fileImage;
				//$view_image= "<img src='".$fileImage."' alt='' class='img-responsive'>";
			}

			$content = $row['posting_content'];
			$words = explode(" ",$content);
			$nbmax=50;
			if(sizeof($words)>$nbmax){
				$content = "";
				for($i=0;$i<$nbmax;$i++){
					$content.=$words[$i]." ";
				}
				if(sizeof($words)>$nbmax){
					$content.=$words[$i]."...";
				}
				
			}


			$html.="
									<div class='news-blocks'>
										<h3>
										<a href='javascript:;' class='postingDetail' value='".$row['posting_id']."'>
										".$row['posting_title']." </a>
										</h3>
										<div class='news-block-tags'>
											<ul class='list-inline'>
												<li>
													<i class='fa fa-calendar'></i>
													<a href='javascript:;'>
													".date_format($date,'M d, Y')." </a>
												</li>
												<li>
													<i class='fa fa-comments'></i>
													<a href='javascript:;'>
													".$jumlah_comment." Comments </a>
												</li>
												<li>
													<i class='fa fa-binoculars'></i>
													<a href='javascript:;'>
													".$row['posting_hits']." Hits </a>
												</li>
											</ul>											
										</div>
										
										<p>
											<!--<img class='news-block-img pull-right' src='./userfiles/image/posting/".$fileImage."' alt=''>-->".$content."
										</p>
										<a href='javascript:;' class='news-block-btn postingDetail' value='".$row['posting_id']."'>
										Read more <i class='m-icon-swapright m-icon-black'></i>
										</a>
									</div>
			";
			$k++;		
		}
		$html.="
								</div>
								<div class='space20'>
								</div>
								<!--job seekers vacancies and fairs-->
								<div class='col-md-6'>
									<div class='top-news'>
										<a href='javascript:;' class='btn green'>
										<span>
										Job Seekers </span>
										<em>
										<i class='fa fa-tags'></i>
										Vacancies and Job Fairs </em>
										<i class='fa fa-beaker top-news-icon'></i>
										</a>
									</div>
		";

		$k=0;
		while($row=mysql_fetch_assoc($resultJobSeekers)){
			$jumlah_comment = $row['jumlah_comment']*1;
			$date = date_create($row['posting_date']);
			$fileImage = "".$row['posting_image'];
			//$fileImage = $row['image'];
			if($row['posting_image']!=""&&file_exists("../../userfiles/image/posting/".$fileImage)){
				$view_image= "<img src='./userfiles/image/posting/".$fileImage."' alt='' class='img-responsive'>";
			}
			else{
				$view_image = $fileImage;
				//$view_image= "<img src='".$fileImage."' alt='' class='img-responsive'>";
			}

			$content = $row['posting_content'];
			$words = explode(" ",$content);
			$nbmax=50;
			if(sizeof($words)>$nbmax){
				$content = "";
				for($i=0;$i<$nbmax;$i++){
					$content.=$words[$i]." ";
				}
				if(sizeof($words)>$nbmax){
					$content.=$words[$i]."...";
				}
				
			}


			$html.="
									<div class='news-blocks'>
										<h3>
										<a href='javascript:;' class='postingDetail' value='".$row['posting_id']."'>
										".$row['posting_title']." </a>
										</h3>
										<div class='news-block-tags'>
											<ul class='list-inline'>
												<li>
													<i class='fa fa-calendar'></i>
													<a href='javascript:;'>
													".date_format($date,'M d, Y')." </a>
												</li>
												<li>
													<i class='fa fa-comments'></i>
													<a href='javascript:;'>
													".$jumlah_comment." Comments </a>
												</li>
												<li>
													<i class='fa fa-binoculars'></i>
													<a href='javascript:;'>
													".$row['posting_hits']." Hits </a>
												</li>
											</ul>											
										</div>
										<p>
											<!--<img class='news-block-img pull-right' src='./userfiles/image/posting/".$fileImage."' alt=''>-->".$content."
										</p>
										<a href='javascript:;' class='news-block-btn postingDetail' value='".$row['posting_id']."'>
										Read more <i class='m-icon-swapright m-icon-black'></i>
										</a>
									</div>
			";
			$k++;		
		}							
									
		$html.="									
									
								</div>
							</div>
							<div class='space20'>
							</div>";
		$html.="			<div class='col-md-4'>
								<div class='top-news'>
									<a href='http://tracerstudy.unsri.ac.id' class='btn yellow'>
									<span>
									Alumni </span>
									<i class='fa fa-graduation-cap top-news-icon'></i>
									</a>
								</div>
							</div>
							<div class='col-md-4'>
								<div class='top-news'>
									<a href='javascript:;' class='btn blue'>
									<span>
									Assesments </span>
									<i class='fa fa-book top-news-icon'></i>
									</a>
								</div>
							</div>
							<div class='col-md-4'>
								<div class='top-news'>
									<a href='javascript:;' class='btn red'>
									<span>
									Memberships </span>
									<i class='fa fa-user top-news-icon'></i>
									</a>
								</div>
							</div>";
							
		$html.="			<!--<h3>Info</h3>-->
						</div>	
					</div>
				</div>
			</div>
		";

		$html.="
			<script>
				$('html, body').animate({scrollTop: 0}, 1000);
				$( '.postingDetail' ).click(function() {
					var value = $(this).attr('value');
				  	$( '#contents' ).load('applications/controllers/posting_controller.php?action=PostingDetail&posting_id='+value);
				});
			</script>
		";

		return $html;
	}
	public function About(){
		$html="";

		$html.="
			<div class='portlet light'>
				<div class='portlet-body'>
					<div class='row'>
						<div class='col-md-12'>
							<h1 style='margin-top:0'>About Us</h1>
							<div class='tabbable-line'>
								<ul class='nav nav-tabs'>
									<li class='active'>
										<a href='#profile' data-toggle='tab'>
										Profile </a>
									</li>
									<li>
										<a href='#visions_missions' data-toggle='tab'>
										Visions and Missions </a>
									</li>
									<li>
										<a href='#organizations' data-toggle='tab'>
										Organizations </a>
									</li>
									<li>
										<a href='#contactus' data-toggle='tab'>
										Contact Us </a>
									</li>
								</ul>
							</div>
							<div class='tab-content'>
								<div class='tab-pane active' id='profile'>
									<br>
									<div class='news-blocks'>
									<strong>Gambaran Umum</strong><br/>
									<p align='justify'>CDC-Unsri dibentuk tahun 2013 dengan SK Rektor no. 326//UN9/KM.Kep/2013 tanggal 1 Desember 2013 dan direvisi dengan SK Rektor no. 09/UN9/KM.Kep/2015 tanggal 15 Januari 2015. Setelah keluar Permenristekdikti no. 12 Tahun 2015 tentang Organisasi Tata Kelola Unsri, maka CDC-Unsri ditetapkan sebagai Unit Pelaksana Teknis (UPT) Pengembangan Karakter dan Karir. UPT ini sedang dalam penataan bersamaan dengan unit-unit lain yang mengalami perubahan status berdasarkan permenristekdikti tersebut.</p>
									<p align='justify'>Penyelenggaraan career development center (CDC) di perguruan tinggi khususnya di Universitas Sriwijaya  merupakan bagian integral dari sistem pendidikan, demi mencerdaskan kehidupan bangsa melalui berbagai pelayanan bagi peserta didik untuk mengembangkan potensi mereka seoptimal mungkin. Kehadiran career development center di Universitas Sriwijaya sudah memiliki landasan yuridis formal dimana pemerintah telah menyediakan payung hukum terhadap keberadaan bimbingan karir/konseling di perguruan tinggi. </p>
									<br>
									<strong>Penerima Manfaat</strong><br/>
									<p align='justify'>Penerima manfaat adalah: mahasiswa, alumni dan institusi Universitas Sriwijaya. Bagi mahasiswa, kegiatan ini membantu pengembangan softskill dan kepercayaa diri mahasiswa untuk menghadapi dunia kerja setelah lulus. Bagi alumni, pusat bimbingan karir akan menjadi pusat informasi lapangan kerja karena akan  berfungsi sebagai jembatan antara dunia kerja dan dunia kampus. Bagi institusi, pusat karir sebagai pelaksana tracer study di Unsri akan membantu menyediakan data terkait alumni yang dibutuhkan untuk mengisi borang akreditasi.</p>
									</div>
								</div>
								<div class='tab-pane' id='visions_missions'>
									<br>
									<div class='news-blocks'>
									<strong>Visi</strong><br/>
									<p align='justify'>Menjadi lembaga terpercaya dalam mempersiapkan alumni yang sesuai dengan tuntutan dunia kerja.</p>
									<br>
									<strong>Misi</strong><br/>
									<ol>
										<li>Memberikan dukungan kepada universitas dalam pengembangan karir mahasiswa dan alumni serta menjalin kerjasama dengan dunia industri.
										<li>Memberikan layanan pengembangan karir bagi mahasiswa dan alumni melalui informasi lowongan kerja/job fair, konsultasi karir, dan pelatihan-pelatihan untuk membangun karakter yang lebih kompeten memasuki dunia kerja.
										<li>Menyelenggarakan tracer study di tingkat universitas dengan kualitas dan metode yang tepat dan benar. 
										<li>Membangun organisasi yang mengedepankan inovasi, profesionalisme dan saling menghargai.
									</ol>
									</div>
								</div>
								<div class='tab-pane' id='organizations'>
								<br>
									<!--<div class='scroller' style='height:300px' data-rail-visible='1' data-rail-color='yellow' data-handle-color='#a1b2bd'>-->

									<div class='col-md-3'>
										<div class='news-blocks'>
										<strong>Penasehat</strong><br/>
										<p>Rektor Universitas Sriwijaya</p>
										<br>
										<strong>Pengarah</strong><br/>
										<p>Wakil Rektor I, II, dan IV</p>
										<br>
										<strong>Penanggung Jawab</strong><br/>
										<p>Wakil Rektor III</p>
										<br>
										</div>
									</div>
									<div class='col-md-3'>
										<div class='news-blocks'>
										<strong>Ketua</strong><br/>
										<p>Prof. Dr. Ir. Nuni Gofar, MS.</p>
										<br>
										<strong>Sekretaris</strong><br/>
										<p>Prahady Susmanto, ST., MT</p>
										<br>
										</div>
									</div>
									<div class='col-md-3'>
										<div class='news-blocks'>
										<strong>Bidang Seminar dan Training</strong><br/>
										<p>Dewi Anggraini, S.Psi., MA.</p>
										<p>Ayu Purnamasari, S.Psi., Psikolog.</p>
										<br>
										<strong>Bidang Bimbingan dan Konseling</strong><br/>
										<p>Emeldah, M.Psi</p>
										<br>
										<strong>Bidang Tracer Study</strong><br/>
										<p>Fitra Yosi, S.Pt., M.S., M.I.L</p>
										<p>Husnul Hidayat, ST., M.Sc</p>
										<br>
										<strong>Bidang Job Expo/Karir</strong><br/>
										<p>Tanbiyaskur, S.Pi., M.Si</p>
										<br>
										<strong>Bidang Pengelolaan Web</strong><br/>
										<p>M. Fachrurrozi, S.Si., M.T.</p>
										<br>
										</div>
									</div>
									<div class='col-md-3'>
										<div class='news-blocks'>
										<strong>Sekretariat</strong><br/>
										<p>Baharuddin, SE, Ak</p>
										<p>Andi Rosadi, SE, M.Si</p>
										<p>Desriani Dewi Puspita, A.Md</p>
										<p>Burhanuddin, SE</p>
										<p>Maison, S.Sos</p>
										<br>
										</div>
									</div>
									<div class='col-md-12'>
										<font size=-2><strong><i>Sumber :  Surat Keputusan Rektor Unsri No. 09/UN9/KM.Kep/2015 tanggal 9 Januari 2015</i></strong></font>
									</div>
									<!--<div>-->
								</div>
								<div class='tab-pane' id='contactus'>
									<br>
									<div class='news-blocks'>
									<strong>Sekretariat Career Development Center Universitas Sriwijaya (CDC-UNSRI)</strong><br>
									<p>Gedung Rektorat Universitas Sriwijaya, Lantai 3<br>Jln. Raya Palembang - Prabumulih Km. 32 Indralaya, OI, Sumatera Selatan, kodepos 30662.<br></p>
									
										<label class='fa fa-envelope-o'> cdc@unsri.ac.id</label><br>
										<label class='fa fa-twitter'> @cdcunsri</label><br>
										<label class='fa fa-facebook-official'> cdcunsripalembang</label><br>
										<label > Line 081279061265</label><br>
										<label class='fa fa-whatsapp'> 089624404711</label><br>
										<label > BBM 5B75CAFB</label><br>
									</div>
								</div>
							</div>
						</div>
					<div>
				</div>
			</div>
		";
		$html.="
			<script>
				$('html, body').animate({scrollTop: 0}, 1000);
			</script>
		";

		return $html;
	}
	public function LoadListPosting($result){
		$html="";
		
		$k=0;
		while($row=mysql_fetch_assoc($result)){
			$jumlah_comment = $row['jumlah_comment']*1;
			$date = date_create($row['posting_date']);
			$fileImage = "".$row['posting_image'];
			//$fileImage = $row['image'];
			if($row['posting_image']!=""&&file_exists("../../userfiles/image/posting/".$fileImage)){
				$view_image= "<img src='./userfiles/image/posting/".$fileImage."' alt='' class='img-responsive'>";
			}
			else{
				$view_image = $fileImage;
				//$view_image= "<img src='".$fileImage."' alt='' class='img-responsive'>";
			}

			$content = $row['posting_content'];
			$words = explode("\n",$content);
			$nbmax=1;
			if(sizeof($words)>$nbmax){
				$content = "";
				for($i=0;$i<$nbmax;$i++){
					$content.=$words[$i]." ";
				}
				$content.=$words[$i]."...";
			}


			$html.="
				<tr><td>
				<div class='col-md-12'>
					<div class='col-md-3 blog-img blog-tag-data'>
						<!--<img src='".$fileImage."' alt='' class='img-responsive'> -->
						".$view_image."
						
					</div>
					<div class='col-md-9 blog-article news-blocks'>
						<h3>
						<a href='javascript:;' class='postingDetail' value='".$row['posting_id']."'>
						".$row['posting_title']." </a>
						</h3>
	
							 ".$content." 
						
						<div class='pull-right'>
							<ul class='list-inline'>
								<li>
									<i class='fa fa-calendar'></i>
									<a href='javascript:;'>
									".date_format($date,'M d, Y')." </a>
								</li>
								<li>
									<i class='fa fa-comments'></i>
									<a href='javascript:;'>
									".$jumlah_comment." Comments </a>
								</li>
								<li>
									<i class='fa fa-binoculars'></i>
									<a href='javascript:;'>
									".$row['posting_hits']." Hits </a>
								</li>
							</ul>	
						</div>
						<div><a class='btn blue postingDetail' href='javascript:;' value='".$row['posting_id']."'>
						Read more <i class='m-icon-swapright m-icon-white'></i>
						</a></div>
					</div>
				</div>
				</td></tr>
			";
			$k++;		
		}

		$html.="
			<script>
				$( '.postingDetail' ).click(function() {
					var value = $(this).attr('value');
				  	$( '#contents' ).load('applications/controllers/posting_controller.php?action=PostingDetail&posting_id='+value);
				});
			</script>
		";

		return $html;
	}
	public function NewsFeeds($result){
		$html="";

		$html.="
			<div class='portlet light'>
				<div class='portlet-body'>
					<div class='row'>
						<div class='col-md-12 news-page'>
							<!--<h1 style='margin-top:0'>NewsFeeds</h1>-->
							<div class='row'>							
								<!--news feeds headliners-->
								<div class='col-md-12'>
									<div class='top-news'>
										<a href='javascript:;' class='btn purple'>
										<span>
										News Feeds </span>
										<em>
										<i class='fa fa-tags'></i>
										Headliners </em>
										<i class='fa fa-globe top-news-icon'></i>
										</a>
									</div>
								</div>
								<table id='table_posting'><tr><td></td></tr>";

		$html.=$this->LoadListPosting($result);
		$html.="
								</table>
							</div>
							<a href='javascript:;' class='btn default btn-block' id='btn_load_more'><span class='md-click-circle md-click-animate' style='height: 458px; width: 458px; top: -226px; left: 27px;'></span>Load more...  </a>
						</div>	
					</div>
				</div>
			</div>
		";

		$html.="
			<script>
				
				$( '#btn_load_more' ).click(function() {
					var nbRow = $('#table_posting').find('tr').length;
					
					var awal = nbRow-1;
					$.ajax({
			            type: 'post',
			            url: 'applications/controllers/posting_controller.php?action=LoadListPosting',
			            data: {awal:awal},
			            beforeSubmit: function() {
				         	
				      	},
				      	success: function(html) {
				      		//alert(feedback);
				  			$('#table_posting tr:last').after(html);
				        },
				       	error: function (xhr, ajaxOptions, thrownError) {
				        	//$('#form_messages').html('error! '+xhr.status+' '+thrownError);
				       	}
			          });
					
				});
			</script>
		";
		$html.="
			<script>
				$('html, body').animate({scrollTop: 0}, 1000);
			</script>
		";

		return $html;
	}
	public function PostingDetail($detailPosting, $resultListComments,$resultListTags){
		$date = date_create($detailPosting->getPosting_date());
		$fileImage = "./userfiles/image/posting/".$detailPosting->getPosting_image();
		$html="";

		$html.="
			<div class='portlet light'>
				<div class='portlet-body'>
					<div class='row'>
						<div class='col-md-12 news-page blog-page'>
							<div class='row'>
								<div class='col-md-8 blog-tag-data'>
									<h3 style='margin-top:0'>".$detailPosting->getPosting_title()."</h3>
									<img src='".$fileImage."' class='img-responsive' alt=''>
									<div class='row'>
										<div class='col-md-6'>
											<ul class='list-inline blog-tags'>
												<li><i class='fa fa-tags'></i>";
												while($row=mysql_fetch_assoc($resultListTags)){
													$html.="<a href='javascript:;'>".$row['posting_tag']." </a>";
												}
													
										$html.="</li>
											</ul>
										</div>
										<div class='col-md-6 blog-tag-data-inner'>
											<ul class='list-inline'>
												<li>
													<i class='fa fa-calendar'></i>
													<a href='javascript:;'>
													".date_format($date,'M d, Y')." </a>
												</li>
												<li>
													<i class='fa fa-comments'></i>
													<a href='javascript:;'>
													".mysql_num_rows($resultListComments)." Comment(s) </a>
												</li>
												<li>
													<i class='fa fa-binoculars'></i>
													<a href='javascript:;'>
													".$detailPosting->getPosting_hits()." Hits </a>
												</li>
											</ul>
										</div>
									</div>
									<div class='news-item-page'>
										<p align='justify'>
											 ".$detailPosting->getPosting_content()."
										</p>
										<!--
										<p><strong>Share Link: </strong></p>
										<p><strong>Lampiran:</strong></p>
										<ul>
											<li> <a href='javascript:;'>Lampiran 1</a>
											<li> <a href='javascript:;'>Lampiran 2</a>
										</ul>
										-->
									</div>
									<hr>
									<div class='col-md-4'>
										<div class='top-news'>
											<a href='http://tracerstudy.unsri.ac.id' class='btn yellow'>
											<span>
											Alumni </span>
											<i class='fa fa-graduation-cap top-news-icon'></i>
											</a>
										</div>
									</div>
									<div class='col-md-4'>
										<div class='top-news'>
											<a href='javascript:;' class='btn blue'>
											<span>
											Assesments </span>
											<i class='fa fa-book top-news-icon'></i>
											</a>
										</div>
									</div>
									<div class='col-md-4'>
										<div class='top-news'>
											<a href='javascript:;' class='btn red'>
											<span>
											Memberships </span>
											<i class='fa fa-user top-news-icon'></i>
											</a>
										</div>
									</div>
								</div>
								<div class='col-md-4'>
									<div class='media'>
										<h3>".mysql_num_rows($resultListComments)." Comment(s)</h3>
										<div class='media-body'>";
										while($row=mysql_fetch_assoc($resultListComments)){
											$html.="
											<h4 class='media-heading'><span>".$row['comment_date']."</span></h4>
											<i>".$row['comment_content']."</i><hr>";
											
										}

										
								$html.="</div>	
									</div>
									<!--end media-->
									<hr>
									<div class='post-comment'>
										<h3>Leave a Comment</h3>
										<form role='form' action='#' id='form_comment'>
											<div class='form-group'>
												<label class='control-label'>Name <span class='required'>
												* </span>
												</label>
												<input type='hidden' class='form-control' name='posting_id' value='".$detailPosting->getPosting_id()."'>
												<input type='text' class='form-control' name='name' required>
											</div>
											<div class='form-group'>
												<label class='control-label'>Email <span class='required'>
												* </span>
												</label>
												<input type='email' class='form-control' name='email' required>
											</div>
											<div class='form-group'>
												<label class='control-label'>Message <span class='required'>
												* </span>
												</label>
												<textarea class='col-md-10 form-control' rows='8' name='content' required></textarea>
											</div>
											<button class='margin-top-20 btn blue' type='submit'>Post a Comment</button>
										</form>
									</div>
								<div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		";

		$html.="
			<script>
				$('html, body').animate({scrollTop: 0}, 1000);
				$(function () {
			        $('#form_comment').on('submit', function (e) {
			          	e.preventDefault();
				         $.ajax({
				            type: 'post',
				            url: 'applications/controllers/comment_controller.php?action=SaveObject',
				            data: $('form').serialize(),
				            beforeSubmit: function() {
					         	
					      	},
					      	success: function(feedback) {
					      		alert(feedback);
					         	if(data=='0'){
					       			
					       		}
					       		else if(data=='-1'){
					       			
					       		}	
					       		else{
					       			
					       		}
					        },
					       	error: function (xhr, ajaxOptions, thrownError) {
					        	$('#form_messages').html('error! '+xhr.status+' '+thrownError);
					       	}
				          });
			        });
		      	});
			</script>
		";

		return $html;
	}	
	public function JobSeekersPage($resultJobVacancies,$resultJobFairs){
		$html="";

		$html.="
			<div class='portlet light'>
				<div class='portlet-body'>
					<div class='row'>
						<div class='col-md-12'>
							<h1 style='margin-top:0'>JobSeekers</h1>
							<div class='tabbable-line'>
								<ul class='nav nav-tabs'>
									<li class='active'>
										<a href='#job_vacancies' data-toggle='tab'>
										Job Vacancies </a>
									</li>
									<li>
										<a href='#job_fairs' data-toggle='tab'>
										Job Fairs</a>
									</li>
								</ul>
							</div>
							<div class='tab-content'>
								<div class='tab-pane active' id='job_vacancies'>
									<br>
									<table id='table_posting_1'><tr><td></td></tr>";

		$html.=$this->LoadListPosting($resultJobVacancies);
		$html.="
									</table>
									<a href='javascript:;' class='btn default btn-block' id='btn_load_more_1'><span class='md-click-circle md-click-animate' style='height: 458px; width: 458px; top: -226px; left: 27px;'></span>Load more...  </a>	
								</div>
								<div class='tab-pane' id='job_fairs'>
									<br>
									<table id='table_posting_2'><tr><td></td></tr>";

		$html.=$this->LoadListPosting($resultJobFairs);
		$html.="
									</table>	
									<a href='javascript:;' class='btn default btn-block' id='btn_load_more_2'><span class='md-click-circle md-click-animate' style='height: 458px; width: 458px; top: -226px; left: 27px;'></span>Load more...  </a>	
								</div>
								
							</div>
						</div>
					<div>
				</div>
			</div>
		";
		$html.="
			<script>
				$( '#btn_load_more_1' ).click(function() {
					var nbRow = $('#table_posting_1').find('tr').length;
					var awal = nbRow-1;
					$.ajax({
			            type: 'post',
			            url: 'applications/controllers/posting_controller.php?action=LoadListJobVacancies',
			            data: {awal:awal},
			            beforeSubmit: function() {
				         	
				      	},
				      	success: function(html) {
				      		//alert(feedback);
				  			$('#table_posting_1 tr:last').after(html);
				        },
				       	error: function (xhr, ajaxOptions, thrownError) {
				        	//$('#form_messages').html('error! '+xhr.status+' '+thrownError);
				       	}
			          });
				});
				$( '#btn_load_more_2' ).click(function() {
					var nbRow = $('#table_posting_2').find('tr').length;
					var awal = nbRow-1;
					$.ajax({
			            type: 'post',
			            url: 'applications/controllers/posting_controller.php?action=LoadListJobFairs',
			            data: {awal:awal},
			            beforeSubmit: function() {
				         	
				      	},
				      	success: function(html) {
				      		//alert(feedback);
				  			$('#table_posting_2 tr:last').after(html);
				        },
				       	error: function (xhr, ajaxOptions, thrownError) {
				        	//$('#form_messages').html('error! '+xhr.status+' '+thrownError);
				       	}
			          });
				});
			</script>
		";
		$html.="
			<script>
				$('html, body').animate({scrollTop: 0}, 1000);
			</script>
		";
		return $html;
	}
	public function Charts(){
		$html="";
		$html.="
			<div class='portlet light'>
				<div class='portlet-body'>
					<div class='row'>
						<div class='col-md-12 news-page'>
							<!--<h1 style='margin-top:0'>Report Charts</h1>-->
							<div class='row'>							
								<div class='col-md-12'>
									<div class='top-news'>
										<a href='javascript:;' class='btn blue'>
										<span>
										Report Charts </span>
										<em>
										<i class='fa fa-tags'></i>
										Tracerstudy Alumni </em>
										<i class='fa fa-globe top-news-icon'></i>
										</a>
									</div>
									<div class='col-md-3'>
										<div class='panel panel-info'>
											<div class='panel-heading'>
												<h3 class='panel-title'>Tracerstudy 2 (dua) tahun setelah kelulusan</h3>
											</div>
											<div class='panel-body'>
												 <p align='center'>
													<a class='btn red' href='javascript:;'>
													View Reports </a>
													
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>	

					</div>
				</div>
			</div>
		";
		$html.="
			<script>
				$('html, body').animate({scrollTop: 0}, 1000);
			</script>
		";
		return $html;

	}
	public function Trainings($result){
		$html="";
		$html.="
			<div class='portlet light'>
				<div class='portlet-body'>
					<div class='row'>
						<div class='col-md-12 news-page'>
							<!--<h1 style='margin-top:0'>Trainings</h1>-->
							<div class='row'>							
								<!--news feeds headliners-->
								<div class='col-md-12'>
									<div class='top-news'>
										<a href='javascript:;' class='btn blue'>
										<span>
										Trainings </span>
										<em>
										<i class='fa fa-tags'></i>
										News and Registration </em>
										<i class='fa fa-globe top-news-icon'></i>
										</a>
									</div>
								</div>
								<table id='table_posting' width='100%'><tr><td></td></tr>";

		$html.=$this->LoadListPosting($result);
		$html.="
								</table>
							</div>
							<a href='javascript:;' class='btn default btn-block' id='btn_load_more'><span class='md-click-circle md-click-animate' style='height: 458px; width: 458px; top: -226px; left: 27px;'></span>Load more...  </a>
						</div>	
					</div>
				</div>
			</div>
		";

		$html.="
			<script>
				
				$( '#btn_load_more' ).click(function() {
					var nbRow = $('#table_posting').find('tr').length;
					
					var awal = nbRow-1;
					$.ajax({
			            type: 'post',
			            url: 'applications/controllers/posting_controller.php?action=LoadListTrainings',
			            data: {awal:awal},
			            beforeSubmit: function() {
				         	
				      	},
				      	success: function(html) {
				      		//alert(feedback);
				  			$('#table_posting tr:last').after(html);
				        },
				       	error: function (xhr, ajaxOptions, thrownError) {
				        	//$('#form_messages').html('error! '+xhr.status+' '+thrownError);
				       	}
			          });
					
				});
			</script>
		";
		$html.="
			<script>
				$('html, body').animate({scrollTop: 0}, 1000);
			</script>
		";
		return $html;

	}
	public function Counselings($result){
		$html="";
		$html.="
			<div class='portlet light'>
				<div class='portlet-body'>
					<div class='row'>
						<div class='col-md-12 news-page'>
							<!--<h1 style='margin-top:0'>Counselings</h1>-->
							<div class='row'>							
								<!--news feeds headliners-->
								<div class='col-md-12'>
									<div class='top-news'>
										<a href='javascript:;' class='btn blue'>
										<span>
										Counselings </span>
										<em>
										<i class='fa fa-tags'></i>
										News and Registration </em>
										<i class='fa fa-globe top-news-icon'></i>
										</a>
									</div>
								</div>
								<table id='table_posting' width='100%'><tr><td></td></tr>";

		$html.=$this->LoadListPosting($result);
		$html.="
								</table>
							</div>
							<a href='javascript:;' class='btn default btn-block' id='btn_load_more'><span class='md-click-circle md-click-animate' style='height: 458px; width: 458px; top: -226px; left: 27px;'></span>Load more...  </a>
						</div>	
					</div>
				</div>
			</div>
		";

		$html.="
			<script>
				
				$( '#btn_load_more' ).click(function() {
					var nbRow = $('#table_posting').find('tr').length;
					
					var awal = nbRow-1;
					$.ajax({
			            type: 'post',
			            url: 'applications/controllers/posting_controller.php?action=LoadListCounselings',
			            data: {awal:awal},
			            beforeSubmit: function() {
				         	
				      	},
				      	success: function(html) {
				      		//alert(feedback);
				  			$('#table_posting tr:last').after(html);
				        },
				       	error: function (xhr, ajaxOptions, thrownError) {
				        	//$('#form_messages').html('error! '+xhr.status+' '+thrownError);
				       	}
			          });
					
				});
			</script>
		";
		$html.="
			<script>
				$('html, body').animate({scrollTop: 0}, 1000);
			</script>
		";
		return $html;

	}
	public function Consultings($result){
		$html="";
		$html.="
			<div class='portlet light'>
				<div class='portlet-body'>
					<div class='row'>
						<div class='col-md-12 news-page'>
							<!--<h1 style='margin-top:0'>Consultings</h1>-->
							<div class='row'>							
								<!--news feeds headliners-->
								<div class='col-md-12'>
									<div class='top-news'>
										<a href='javascript:;' class='btn blue'>
										<span>
										Consultings </span>
										<em>
										<i class='fa fa-tags'></i>
										News and Registration </em>
										<i class='fa fa-globe top-news-icon'></i>
										</a>
									</div>
								</div>
								<table id='table_posting' width='100%'><tr><td></td></tr>";

		$html.=$this->LoadListPosting($result);
		$html.="
								</table>
							</div>
							<a href='javascript:;' class='btn default btn-block' id='btn_load_more'><span class='md-click-circle md-click-animate' style='height: 458px; width: 458px; top: -226px; left: 27px;'></span>Load more...  </a>
						</div>	
					</div>
				</div>
			</div>
		";

		$html.="
			<script>
				
				$( '#btn_load_more' ).click(function() {
					var nbRow = $('#table_posting').find('tr').length;
					
					var awal = nbRow-1;
					$.ajax({
			            type: 'post',
			            url: 'applications/controllers/posting_controller.php?action=LoadListConsultings',
			            data: {awal:awal},
			            beforeSubmit: function() {
				         	
				      	},
				      	success: function(html) {
				      		//alert(feedback);
				  			$('#table_posting tr:last').after(html);
				        },
				       	error: function (xhr, ajaxOptions, thrownError) {
				        	//$('#form_messages').html('error! '+xhr.status+' '+thrownError);
				       	}
			          });
					
				});
			</script>
		";
		$html.="
			<script>
				$('html, body').animate({scrollTop: 0}, 1000);
			</script>
		";
		return $html;

	}
	public function Memberships(){
		$html="";
		$html.="
			<div class='portlet light'>
				<div class='portlet-body'>
					<div class='row'>
						<div class='col-md-12'>
							<h1 style='margin-top:0'>Memberships</h1>
							<div class='tabbable-line'>
								<ul class='nav nav-tabs'>
									<li class='active'>
										<a href='#benefits' data-toggle='tab'>
										Benefits </a>
									</li>
									<li>
										<a href='#new_member' data-toggle='tab'>
										New Registration </a>
									</li>
									<li>
										<a href='#member_signin' data-toggle='tab'>
										Sign In </a>
									</li>
								</ul>
							</div>
							<div class='tab-content'>
								<div class='tab-pane active' id='benefits'>
									<br>
									<strong>Benefits</strong>
									<h3>Coming Soon</h3>
								</div>
								<div class='tab-pane' id='new_member'>
									<br>
									<strong>New Member Registration</strong>
									<h3>Coming Soon</h3>
								</div>
								<div class='tab-pane' id='member_signin'>
									<br>
									<!--<div class='scroller' style='height:300px' data-rail-visible='1' data-rail-color='yellow' data-handle-color='#a1b2bd'>-->								
									<!--<div>-->
									<strong>Member Sign In</strong>
									<h3>Coming Soon</h3>
								</div>
								
							</div>
						</div>
					<div>
				</div>
			</div>
		";
		
		$html.="
			<script>
				$('html, body').animate({scrollTop: 0}, 1000);
			</script>
		";
		return $html;

	}
	public function Surveys(){
		$html="";
		$html.="
			<div class='portlet light'>
				<div class='portlet-body'>
					<div class='row'>
						<div class='col-md-12 news-page'>
							<!--<h1 style='margin-top:0'>Surveys</h1>-->
							<div class='row'>							
								<div class='col-md-12'>
									<div class='top-news'>
										<a href='javascript:;' class='btn green'>
										<span>
										Surveys </span>
										<em>
										<i class='fa fa-tags'></i>
										General </em>
										<i class='fa fa-globe top-news-icon'></i>
										</a>
									</div>
									<div class='col-md-4'>
										<div class='panel panel-success'>
											<div class='panel-heading'>
												<h3 class='panel-title'>Survei Kepuasan Layanan Kemahasiswaan Unsri</h3>
											</div>
											<div class='panel-body'>
												 <p align='center'>
													<a class='btn red' href='https://docs.google.com/forms/d/e/1FAIpQLSfNsQqszN3Qi5gLQ93hVkCHhe5tmr79QqHIAk10inQj6YrJMA/viewform' target='_blank'>
													Respon </a>
													<a class='btn blue' href='https://drive.google.com/file/d/0BxjxzYYjNUWyZWNqQ3VhbU1jeVVMbDlLamxQREhOUVhWVFVB/view?usp=sharing' target='_blank'>
													View Reports </a>
													
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>	

					</div>
				</div>
			</div>
		";
		$html.="
			<script>
				$('html, body').animate({scrollTop: 0}, 1000);
			</script>
		";
		return $html;

	}
	public function Links(){
		$html="";
		$html.="<h2>Links is Coming Soon</h2>";
		$html.="
			<script>
				$('html, body').animate({scrollTop: 0}, 1000);
			</script>
		";
		return $html;

	}
	public function Tips(){
		$html="";
		$html.="<h2>Tips is Coming Soon</h2>";
		$html.="
			<script>
				$('html, body').animate({scrollTop: 0}, 1000);
			</script>
		";
		return $html;

	}
	public function Galleries(){
		$html="";
		$html.="<h2>Galleries is Coming Soon</h2>";
		$html.="
			<script>
				$('html, body').animate({scrollTop: 0}, 1000);
			</script>
		";
		return $html;

	}
}


?>