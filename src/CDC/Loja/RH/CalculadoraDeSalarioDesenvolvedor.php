<?php
namespace CDC\Loja\RH;

use CDC\Loja\RH\Funcionario,
    CDC\Loja\RH\ISalarioFuncionario;

class CalculadoraDeSalarioDesenvolvedor implements CalculoSalarioFuncionario
{

    private $funcionario;

    public function __construct(Funcionario $funcionario) 
    {
        $this->funcionario = $funcionario;
    }

    public function calcula() 
    {
        $salario = $this->funcionario->getSalario();
        if($salario > 3000.0) {
            return $salario * 0.8;
        }
        return $salario * 0.9;
    }
}
