</div> <!--end container-f;uid-->
<br /><br />
<div class="footer">&copy; Copyright 2018-2025 shopquanao.vn</div>



<script>
	function updateSizes(){
			var sizeString = '';
			for(var i=1;i<=9;i++)
			{
				if(jQuery('#size'+i).val() !=''){
					sizeString+=jQuery('#size'+i).val()+':'+jQuery('#quantity'+i).val()+',';
				}
			}
			jQuery('#sizes').val(sizeString);		
		}

	function get_child_options(){
			var parentID=jQuery('#parent').val();
			jQuery.ajax({
				url: '/shopquanao.vn/admin/parsers/child_categories.php',
				type:'POST',
				data:{parentID:parentID},
				success: function(data){
						jQuery('#child').html(data);
					},
					error:function(){alert("Có sự cố với tùy chọn loại sản phẩm!")},

				});
		}
		jQuery('select[name="parent"]').change(get_child_options);
</script>
</body>
</html>