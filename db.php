<?php

    class db
    {
        public $conn;
        private $db = 'crud_simples';
        private $host = 'localhost';
        private $user = 'root';
        private $pass = '';

        function __construct()
        {
            try
            {
                $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db, $this->user, $this->pass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(Exception $e)
            {
                die('Nao foi possivel realizar a conexao com o Banco de Dados!!!');
            }
        }
    }