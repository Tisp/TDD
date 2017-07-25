<?php
namespace CDC\Loja\RH;

require "./vendor/autoload.php";

use PHPUnit_Framework_TestCase as PHPUnit;
use CDC\Loja\RH\CalculadoraDeSalario,
    CDC\Loja\RH\Funcionario;

class CalculadoraDeSalarioTest extends PHPUnit
{
    public function testCalculoSalarioDesenvolvedoresComSalarioAbaixoDoLimite() 
    {
        $desenvolvedor  = new Funcionario("Andre", 1500.0, 'desenvolvedor');
        $calculadora = new CalculadoraDeSalario();
        $salario = $calculadora->calculaSalario($desenvolvedor);
        $this->assertEquals(1500.0 * 0.9, $salario, null, 0.000001);
    }

    public function testCalculoSalarioDesenvolvedoresComSalarioAcimaDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor  = new Funcionario("Andre", 4000.0, 'desenvolvedor');
        $salario = $calculadora->calculaSalario($desenvolvedor);
        $this->assertEquals(4000.0 * 0.8, $salario, null, 0.000001);
    }

    public function testCalculoSalarioDBAComSalarioAcimaDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $dba  = new Funcionario("Andre", 500.0, 'dba');
        $salario = $calculadora->calculaSalario($dba);
        $this->assertEquals(500.0 * 0.85, $salario, null, 0.000001);
    }

}