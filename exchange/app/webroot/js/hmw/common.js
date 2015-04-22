function HMWProcess(path, form)
{
	
	
	if(typeof(form)==='undefined') form = 'hmw-form';
	
	$.jCryption.getKeys("hmw/main.php?validation=call",function(keys) {
		$.jCryption.encrypt($('#'+form).serialize(),keys,function(encrypted) {
			var dataStr ='HMWCall='+encrypted;
			
			$.ajax({
				type:'post',
				url:'call/'+path+'.php' ,
				data:dataStr,
				success:function(response) 
				{
					ajaxResponse(response);
				}
			});
		});
	});
}