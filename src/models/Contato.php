<?php
    
public class Contato {

    private $nome;
    private $email;
    private $mensagem;

    public function setNome($nome) {
        $this->name = $nome;
    } 

    public function getNome() {
        return $this->nome;
    } 

    public function setEmail($email) {
        $this->email = $email;
    } 

    public function getEmail() {
        return $this->email;
    } 

    public function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    } 

    public function getMensagem() {
        return $this->mensagem;
    } 