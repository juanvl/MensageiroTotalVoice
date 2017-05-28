<?php

class Mensageiro_test extends TestCase
{

	public function test_index()
	{
		$this->request('GET', 'Mensageiro');
		$this->assertResponseCode(200);
	}

	public function test_mensagem_falha()
	{
		$postValues = [
            "token" => 'aaa',
            "fone" => 'aaa',
            "msg" => 'aaa'
        ];

		$output = $this->request('POST', 'Mensageiro/mensagem', $postValues);

		$this->assertContains('Falha ao enviar a mensagem', $output);
	}

	public function test_mensagem_sucesso()
	{
		$postValues = [
            "token" => '53168495464ac935c76967d32d9b3396',
            "fone" => '48991510718',
            "msg" => 'testando phpunit'
        ];

		$output = $this->request('POST', 'Mensageiro/mensagem', $postValues);

		$this->assertContains('Mensagem enviada com sucesso', $output);
	}


}