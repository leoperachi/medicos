<?php
function isCadastro()
{
    return \Request::is('perfil') ? true : false;
}

function isCadastroTabela()
{
    return \Request::is('tabela-valor') ? true : false;
}