<?php

namespace CDC\Loja\RH;

use CDC\Loja\RH\Funcionario;

interface CalculoSalarioFuncionario
{
    public function __construct(Funcionario $funcionario);
    public function calcula();
}