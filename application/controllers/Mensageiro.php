<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensageiro extends CI_Controller {

	public function index()
	{
		$this->load->view('mensageiro/mensagem');
	}

	public function mensagem()
	{
		$service_port = getservbyname('www', 'tcp');
		$address = gethostbyname('api.totalvoice.com.br');

		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket === false) {
			$dados['status'] = "Falha ao enviar a mensagem :(";
			$dados['resposta'] = "Não foi possível criar o socket:<br>".socket_strerror(socket_last_error());
			$this->load->view('mensageiro/retorno', $dados);
			die();
		}

		$result = socket_connect($socket, $address, $service_port);
		if ($result === false) {
			$dados['status'] = "Falha ao enviar a mensagem :(";
			$dados['resposta'] = "Não foi possível conectar ao socket:<br>".socket_strerror(socket_last_error($socket));
			$this->load->view('mensageiro/retorno', $dados);
			die();
		}

		$token = $_POST['token'];
		$fone = $_POST['fone'];
		$msg = $_POST['msg'];

		$content = '
			{  
			   "numero_destino": "'.$fone.'",
			   "mensagem": "'.$msg.'",
			   "resposta_usuario":false,
			   "multi_sms":false
			}
		';

		$in = "POST /sms HTTP/1.1\r\n";
		$in .= "Host: api.totalvoice.com.br\r\n";
		$in .= "Connection: keep-alive\r\n";
		$in .= "Content-Length: ".strlen($content)."\r\n";
		$in .= "Access-Token:".$token."\r\n";
		$in .= "Accept: application/json\r\n";
		$in .= "Content-Type: application/json\r\n\r\n";

		$in .= $content;

		$output= '';

		socket_write($socket, $in, strlen($in));
		while ($out = socket_read($socket, 2048)) {
		    $output .= $out;
		}

		socket_close($socket);

		if (strpos($output, '"sucesso":true') !== false)
			$dados['status'] = "Mensagem enviada com sucesso!";
		else
			$dados['status'] = "Falha ao enviar a mensagem :(";

		
		$dados['resposta'] = $output;

		$this->load->view('mensageiro/retorno', $dados);
	}

}
