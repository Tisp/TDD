<?php
namespace CDC\Loja\RH;

use CDC\Loja\RH\Funcionario,
    CDC\Loja\RH\CalculoSalarioFuncionario;

class CalculadoraDeSalarioDBA implements CalculoSalarioFuncionario
{
    private $funcionario;

    public function __construct(Funcionario $funcionario) 
    {
        $this->funcionario = $funcionario;
    }

    public function calcula() 
    {
        $salario = $this->funcionario->getSalario();
        if($salario > 2500.0) {
            return $salario * 0.75;
        }
        return $salario * 0.85;
    }
}