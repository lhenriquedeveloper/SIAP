 <title>Login</title>

<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="../../../img/icone/foto"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../../../vendor/bootstrapl/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../../../vendor/animate/animate.css">
<!--===============================================================================================-->	
<link rel="stylesheet" type="text/css" href="../../../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../../../vendor/select2/select2.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../../../assests/css/util.css">
<link rel="stylesheet" type="text/css" href="../../../assests/css/main.css">
<!--===============================================================================================-->




<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
                                    <img src="../../../assests/img/img-01.png" alt="IMG">
				</div>

                            <form method="post" action="../../functions/loga.php">
					<span class="login100-form-title">
						Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valide seu email: ex@abc.xyz">
                                            <input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Senha é necessária">
						<input class="input100" type="password" name="senha" placeholder="Senha">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "CPF do filho é necessário">
                                            <input class="input100" type="number" name="cpf" placeholder="CPF/FILHO">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Esqueceu seu(a)
						</span>
						<a class="txt2" href="#">
							Email / Senha?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Crie sua conta
						<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

<!--===============================================================================================-->	
<script src="../../../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="../../../vendor/bootstrap/js/popper.js"></script>
<script src="../../../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="../../../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="../../../vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
<script src="../../../assests/js/main.js"></script>