$(function(){
			var uname=$('#login_username').val();
	
			$("#sign_btn").bind("click",function(){
				$("#login").modal("toggle");
			});

			$('#return_login').bind('click',function(){
				$('#signup').modal('toggle');
				$('#login').addClass('overhidden');
			});
			// 解决双滚动条bug
			$("#login_btn").bind('click',function(){
				$("login").removeClass('overhidden');
			});
			
			// 注册请求
			$('#soon_sign').bind('click',function(event){
				// alert($("#sign_form").serialize())
				event.preventDefault();
				$.ajax({
					url: 'signup.php',
					type: 'POST',
					cache:false,
					contentType : "application/x-www-form-urlencoded;charset=utf-8",
					data: $("#sign_form").serialize(),
					success:function(result){
						$('#sname_warm').html(result);


					},error:function(){
						alert('asas');
					}
				});

			});

			$('#soon_login').bind('click',function(event){
				event.preventDefault();
				// alert($("#login_form").serialize());

				$.ajax({
					url: 'login.php',
					type: 'POST',
					cache:false,
					contentType : "application/x-www-form-urlencoded;charset=utf-8",
					data: $("#login_form").serialize(),
					success:function(result){
						alert(result);

					},error:function(){
						alert('asas');
					}
				});
					
			});


		});