<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style>
a:hover, a:visited, a:link, a:active {
    text-decoration: none !important;
}
</style>

<div class="container">    
	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
		<div class="panel panel-info" >
			<div class="panel-heading">
				<div class="panel-title"><b>Bem-vindo(a) ao Mensageiro SMS TotalVoice!</b></div>
			</div>     

			<div style="padding-top:30px" class="panel-body" >

				<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

				<form id="loginform" class="form-horizontal" role="form" method="post" action="index.php/Mensageiro/mensagem">

					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="login-username" type="text" class="form-control" name="token" value="" placeholder="Seu Access-Token" required="required" />
					</div>
					<div class="pull-right" style="margin-top:-20px;">
						<a href="https://api.evoline.com.br/painel/" target="blank">Pegue o seu aqui!</a>
					</div><br>

					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
						<input id="login-password" class="form-control" name="fone" placeholder="Telefone Ex. 4899110066" required="required"/>
					</div>

					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
						<textarea id="login-password" class="form-control" name="msg" placeholder="Sua mensagem de texto" rows="3" required="required"></textarea>
					</div>


					<div style="margin-top:10px" class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12 controls">
							<button id="btn-login" href="#" class="btn btn-primary col-md-12 col-sm-12 col-xs-12" style="height:50px;">
								<b style="font-size:22px">Enviar!</b>
							</button>
						</div>
					</div>


				</form>     

			</div>                     
		</div>  
	</div>
</div>