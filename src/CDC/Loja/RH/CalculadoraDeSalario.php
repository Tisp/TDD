<?php

namespace CDC\Loja\RH;

use CDC\Loja\RH\CalculoSalarioFuncionario;

class CalculadoraDeSalario
{
    public function calculaSalario(CalculoSalarioFuncionario $calculoSalarioFuncionario)
    {
        return $calculoSalarioFuncionario->calcula();
    }
}