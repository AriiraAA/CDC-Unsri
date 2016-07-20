<?php
abstract class View{
	var $jsDateValidator;
	var $jsNumericalValidator;
	var $jsCurrencyMask;
	var $dao;
	
	public function View(){
		$this->jsDateValidator = "
		<script>
			$('.tanggal').inputmask('yyyy-mm-dd', {'placeholder': 'yyyy-mm-dd'});
			$('.tanggal').datepicker({
	            isRTL: false,
	            format: 'yyyy-mm-dd',
	            autoclose:true,
	            language: 'id'
	        });
		</script>";
		$this->jsNumericalValidator = "
		<script>
			$('.numerical').keydown(function (e) {
				if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
					(e.keyCode == 65 && e.ctrlKey === true) || 
					(e.keyCode >= 35 && e.keyCode <= 39)) {
						 return;
				}
				if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
					e.preventDefault();
				}
			});
		</script>";
		$this->jsCurrencyMask = "
		<script>
		     $(\".currency\").inputmask(\"decimal\",{
				 radixPoint:\".\", 
				 groupSeparator: \",\", 
				 digits: 2,
				 autoGroup: true,
				 prefix: \"$\"
			 });
		</script>";
	}
	
	protected function getJSTablePaginationWithoutShortNoFilter($divid){
		$js ="
			<script>
			$('#".$divid."').dataTable({
				'bPaginate': true,
				'bLengthChange': false,
				'bFilter': false,
				'bSort': false,
				'bInfo': false,
				'bAutoWidth': false
			});
			</script>";
		return $js;	
	}
	protected function getJSTablePaginationWithoutShort($divid){
		$js ="
			<script>
			$('#".$divid."').dataTable({
				'bPaginate': true,
				'bLengthChange': false,
				'bFilter': true,
				'bSort': false,
				'bInfo': false,
				'bAutoWidth': false
			});
			</script>";
		return $js;	
	}
	protected function getJSTablePaginationWithFilterNoPaginationNoSort($divid){
		$js ="
			<script>
			$('#".$divid."').dataTable({
				'bPaginate': false,
				'bLengthChange': false,
				'bFilter': true,
				'bSort': false,
				'bInfo': false,
				'bAutoWidth': false
			});
			</script>";
		return $js;	
	}
	protected function getJSTablePaginationWithoutFilterNoPaginationNoSort($divid){
		$js ="
			<script>
			$('#".$divid."').dataTable({
				'bPaginate': false,
				'bLengthChange': false,
				'bFilter': false,
				'bSort': false,
				'bInfo': false,
				'bAutoWidth': false
			});
			</script>";
		return $js;	
	}
	
	protected function getJSTablePaginationWithShort($divid){
		$js ="
			<script>
			$('#".$divid."').dataTable({
				'bPaginate': true,
				'bLengthChange': false,
				'bFilter': false,
				'bSort': true,
				'bInfo': true,
				'bAutoWidth': false
			});
			</script>";
		return $js;	
	}
	protected function getJSTablePaginationWithAllFunction($divid){
		$js ="
			<script>
			$('#".$divid."').dataTable({
				'bPaginate': true,
				'bLengthChange': true,
				'bFilter': true,
				'bSort': true,
				'bInfo': true,
				'bAutoWidth': true
			});
			</script>";
		return $js;	
	}
	protected function getJSTablePagination($divid){
		$js ="
			<script>
			$('#".$divid."').dataTable();
			</script>";
		return $js;	
	}
	protected function getJS_Load_Page($divid_target,$url_target){
		$js="<script>		
			$('#".$divid_target."').load('".$url_target."');
			</script>
			";
		return $js;
	}
	protected function getJS_isValidated_Function(){
		$js="<script>		
				function isValidated(fields){
					var retval=true;
						for (var i = 0; i < fields. length; i++) {
							x=$('#'+fields[i]).val();
							if(x==''){
								retval=false;
								break;
							}
						}
					return retval;
				}
			</script>
			";
		return $js;
	}
	protected function getYearComboBoxHTML(){
		$html="<select id='tahun' class='form-control'>";
					$startTahun = 2015;
					$currentTahun = date('Y');
					for($i=$startTahun;$i<$currentTahun;$i++){
						$html .= "<option value='".$i."'>".$i."</option>";
					}	
					$html .= "<option selected value='".$currentTahun."'>".$currentTahun."</option>";
				$html .= "</select>
			";
		return $html;
	}
	public function getComboBoxAutoCompleteStyle($id){
		$html="
			<style>
		  .custom-combobox {
		    position: relative;
		    display: inline-block;
		  }
		  .custom-combobox-toggle {
		    position: absolute;
		    top: 0;
		    bottom: 0;
		    margin-left: -1px;
		    padding: 0;
		  }
		  .custom-combobox-input {
		    margin: 0;
		    padding: 5px 10px;
		  }
		  </style>
		  <script>
		
		 
		  $(function() {
		    $( '#".$id."' ).autocomplete();
		  });
		  </script>
		";

		return $html;
	}
	protected function getJSClassTablePaginationWithAllFunction($classid){
		$js ="
			<script>
			$('.".$classid."').dataTable({
				'bPaginate': true,
				'bLengthChange': true,
				'bFilter': true,
				'bSort': true,
				'bInfo': true,
				'bAutoWidth': true
			});
			</script>";
		return $js;	
	}
}
?>