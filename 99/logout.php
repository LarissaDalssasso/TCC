<?php
session_start();

// Destrua a sessão
session_destroy();

// Redirecione o usuário para a página de login
header("Location: login.html");
exit();