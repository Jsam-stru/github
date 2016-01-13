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
						// alert(result);
						alert(uname+'你好,登录/注册后台还未完全完善,敬请期待!');

					},error:function(){
						alert('asas');
					}
				});
					
			});

			// 验证
			function checkNull(id1,id2){
				var ltxt=$('#'+id1).val();
				if(ltxt=''||!ltxt){
					$('#'+id2).addClass('p_red');
					$('#'+id2).html('不能为空!');
				}else{
					$('#'+id2).html('');
				}
			}

			$('#login_username').blur(function(event) {
				checkNull('login_username','uname_warming');
			});
			$('#login_pwd').blur(function(event) {
				/* Act on the event */
				checkNull('login_pwd','upwd_warming');
			});
			// 
			var pwd1;
			var pwd2;
			var reg=/^[0-9a-zA-Z_]{6,20}/;
			$('#sign-pwd1').blur(function(event) {
				/* Act on the event */
				// alert($(this).val());
				pwd1=$(this).val();
				if(!pwd1||pwd1==''){
					$('#pwd_warm1').addClass('p_red').html('不能为空!');
				}else{
					$('#pwd_warm1').addClass('p_red').html('');

				}
			});
			$('#sign-pwd2').blur(function(event) {
				/* Act on the event */
				pwd2=$(this).val();
				if(!pwd2||pwd2==''){
					$('#pwd_warm2').addClass('p_red').html('不能为空!');
				}else{
					
					if(pwd1===pwd2){
						// alert('ok');
						$('#pwd_warm2').addClass('p_green').html('密码确认正确!');
					}else{
						$('#pwd_warm2').addClass('p_red').html('密码确认错误,请重新输入!');
					}

				}

			});
		});