<?php 

/**
 * Função de criação do corpo do formulário.
 */

function the_contact_form()
{
?>

	<div id="form">

		<form action="<?php echo URL; ?>/contato" method="POST">

			<p><input type="text" name="nome" id="nome" placeholder="seu nome..."></p>

			<p><input type="text" name="email" id="email" placeholder="seu email..."></p>

			<p><textarea name="mensagem" id="mensagem" placeholder="sua mensagem..."></textarea></p>

			<p><input type="button" id="enviar" value="Enviar"></p>

			<p id="response"></p>

		</form>

	</div>

<?php
}

/**
 * Função de submissão de formulário.
 */

function the_form_submit($address)
{

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		
		$form['nome'] = trim($_POST['nome']);
		$form['email'] = trim($_POST['email']);
		$form['mensagem'] = trim($_POST['mensagem']);

		$validation['not_ok'][] = 0;
		$validation['ok'][] = 0;

		foreach($form as $key => $val)
		{
			if(empty($form[$key]) || ($key=='email' && !is_valid_email($form['email'])))
				$validation['not_ok'][] = $key;
			else
				$validation['ok'][] = $key;
		}

		if(count($validation['not_ok'])>1)
		{
			$json['status'] = '0';
			$json['field'] = $validation;
			$json['texto'] = 'Campos não preenchidos ou inválidos!';
			echo json_encode($json);
		}
		else 
		{
			require('./wp-includes/class-phpmailer.php');

			$mail = new PHPMailer();
			$mail->From = $form['email'];
			$mail->FromName = $form['nome'];
			$mail->AddAddress($address);
			$mail->isHTML(true); 
			$mail->Subject = 'Contato via Website | '.NAME;
			$mail->Body    = $form['mensagem'];

			if($mail->send()) 
			{
			    $json['status'] = '1';
				$json['texto'] = 'Mensagem enviada com sucesso!';
				echo json_encode($json);
			}
			else 
			{
				$json['status'] = '1';
				$json['texto'] = $mail->ErrorInfo;
				echo json_encode($json);
			}

		}

		die();

	}

}

/**
 * Função de validação de email.
 */

function is_valid_email($email)
{

    $er = "/^(([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}){0,1}$/";
    if (preg_match($er, $email))
    	return true;
	else
    	return false;

}

