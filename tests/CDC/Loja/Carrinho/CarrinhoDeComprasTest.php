<?php

namespace CDC\Loja\Carrinho;

use CDC\Loja\Test\TestCase,
    CDC\Loja\Carrinho\CarrinhoDeCompras,
    CDC\Loja\Carrinho\MaiorPreco,
    CDC\Loja\Produto\Produto;
       
class CarrinhoDeComprasTest extends TestCase
{
    private $carrinho;

    protected function setUp()
    {
        $this->carrinho = new CarrinhoDeCompras();
        parent::setUp();
    }

    public function testDeveRetornarZeroSeCarrinhoVazio()
    {
        $valor = $this->carrinho->maiorValor();
        $this->assertEquals(0, $valor, null, 0.00001);
    }

    public function testDeveRetornarValorDoItemSeCarrinhoCom1Elemento()
    {

        $this->carrinho->adiciona(new Produto("Geladeira", 900.00, 1));
        $valor = $this->carrinho->maiorValor();

        $this->assertEquals(900.00, $valor, null, 0,00001);
    }

    public function testDeveRetornarMaiorValorSeCarrinhoComMuitosElementos()
    {
        $this->carrinho->adiciona(new Produto("Geladeira", 900.00, 1));
        $this->carrinho->adiciona(new Produto("Fogão", 1500.00, 1));
        $this->carrinho->adiciona(new Produto("Máquina de Lavar", 750.00, 1));

        $valor = $this->carrinho->maiorValor();

        $this->assertEquals(1500.00, $valor, null, 0,00001);        
    }

    public function testListaDeProdutos()
    {
        $lista = (new CarrinhoDeCompras())
                 ->adiciona(new Produto("Jogo de Jantar", 200.00, 1))
                 ->adiciona(new Produto("Jogo de Pratos", 200.00, 1));

        //Testa total na lista
        $this->assertEquals(2, count($lista->getProdutos()));

        //Testa valor unitario do primeiro produto
        $this->assertEquals(200.0, $lista->getProdutos()[0]->getValorUnitario());

        //Testa valor unitario do segundo produto
        $this->assertEquals(200.0, $lista->getProdutos()[1]->getValorUnitario());

    }
}