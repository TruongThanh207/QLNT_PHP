$(document).ready(function () {
	flag =0;
	$('#khachthue').click(function(){
		if(flag==0)
		{
			$('#user').hide();
			$('#pass').hide();
			$(this).text('Bạn là quản trị?');
			flag = 1;
		}
		else
		{
			$('#user').show();
			$('#pass').show();
			$(this).text('Bạn là khách thuê?');
			flag = 0;
		}
		

	})

});
