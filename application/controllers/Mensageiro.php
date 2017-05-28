<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensageiro extends CI_Controller {

	public function index()
	{
		$this->load->view('mensageiro/mensagem');
	}

	public function mensagem()
	{
		$this->load->helper('Mensageiro_helper');

		$service_port = getservbyname('www', 'tcp');
		$address = gethostbyname('api.totalvoice.com.br');
		$socket = criarSocket($address, $service_port);

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

		$headers = "POST /sms HTTP/1.1\r\n";
		$headers .= "Host: api.totalvoice.com.br\r\n";
		$headers .= "Connection: keep-alive\r\n";
		$headers .= "Content-Length: ".strlen($content)."\r\n";
		$headers .= "Access-Token:".$token."\r\n";
		$headers .= "Accept: application/json\r\n";
		$headers .= "Content-Type: application/json\r\n\r\n";
		$headers .= $content;

		$resposta = enviarMensagem($socket, $headers);

		if (strpos($resposta, '"sucesso":true') !== false)
			$dados['status'] = "Mensagem enviada com sucesso!";
		else
			$dados['status'] = "Falha ao enviar a mensagem :(";

		
		$dados['resposta'] = $resposta;

		$this->load->view('mensageiro/retorno', $dados);
	}

}
