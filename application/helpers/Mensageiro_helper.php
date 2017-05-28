<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function criarSocket($address, $service_port)
{
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

	return $socket;
}

function enviarMensagem($socket, $headers)
{
	$output = '';

	socket_write($socket, $headers, strlen($headers));
	while ($out = socket_read($socket, 2048)) {
	    $output .= $out;
	}

	socket_close($socket);

	return $output;
}
