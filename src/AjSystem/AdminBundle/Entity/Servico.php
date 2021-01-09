<?php

namespace AjSystem\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Servico
 *
 * @ORM\Table(name="servicos")
 * @ORM\Entity(repositoryClass="AjSystem\AdminBundle\Repository\ServicoRepository")
 */
class Servico
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="nome", type="string", length=100, nullable=true)
     */
    private $nome;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(name="tipo", type="string", length=100)
     */
    private $tipo;

    /**
     * @var float
     * @ORM\Column(name="valor", type="decimal", precision=8, scale=2)
     * @Assert\NotBlank
     */
    protected $valor;

    /**
     * @ORM\Column(name="solicitante", type="string", length=100, nullable=true)
     */
    private $solicitante;

    /**
     * @ORM\Column(name="updated_at", type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @ORM\Column(name="data_finalizacao", type="datetime", nullable=true)
     * @var \DateTime
     */
    private $dataFinalizacao;

    /**
     * @var Funcionario
     * @ORM\ManyToOne(targetEntity="AjSystem\AdminBundle\Entity\Funcionario", inversedBy="servico")
     * @ORM\JoinColumn(name="responsavel_id", referencedColumnName="id")
     **/
    private $responsavel;

    /**
     * @var Cliente
     * @ORM\ManyToOne(targetEntity="AjSystem\AdminBundle\Entity\Cliente", inversedBy="servico")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id", nullable=true)
     */
    private $cliente;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get nome
     * @return string
     */
    public function getNome(){
        return $this->nome;
    }

    /**
     * Set nome
     * @param string $nome
     * @return Servico
     */
    public function setNome($nome){
        $this->nome = $nome;
        $this->createdAt = new \DateTime();
        return $this;
    }

    /**
     * @return boolean
     */
    public function isStatus()
    {
        return $this->status;
    }

    /**
     * @param boolean $status
     * @return Servico
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get tipo
     * @return string
     */
    public function getTipo(){
        return $this->tipo;
    }

    /**
     * Set tipo
     * @param string $tipo
     * @return Servico
     */
    public function setTipo($tipo){
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * Set valor
     *
     * @param float $valor
     *
     * @return Servico
     */
    public function setValor($valor){

        $this ->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     * @return float
     *
     */
    public function getValor(){

        return (strpos($this->valor, 'R$') === true) ? 'R$' . number_format($this->valor, 2, ',', '.') : $this->valor;
    }

    /**
     * Get solicitante
     * @return string
     */
    public function getSolicitante(){
        return $this->solicitante;
    }

    /**
     * Set solicitante
     * @param string $solicitante
     * @return Servico
     */
    public function setSolicitante($solicitante){
        $this->solicitante = $solicitante;
        return $this;
    }

    /**
     * Get createdAt
     * @return \DateTime
     */
    public function getCreatedAt(){

        return $this->createdAt;
    }

    /**
     * Get dataFinalizacao
     * @return \DateTime
     */
    public function getDataFinalizacao(){

        return $this->dataFinalizacao;
    }

    /**
     * Set dataFinalizacao
     * @param \DateTime $dataFinalizacao
     *
     * @return Servico
     */
    public function seDataFinalizacaor($dataFinalizacao){

        $this ->dataFinalizacao = $dataFinalizacao;

        return $this;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function setUpdate(){

        $this->updatedAt = new \DateTime();
    }

    /**
     * @param mixed $responsavel
     * @return Servico
     */
    public function setResponsavel($responsavel)
    {
        $this->responsavel = $responsavel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResponsavel()
    {
        return $this->responsavel;
    }

    /**
     * @return mixed
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $cliente
     * @return Servico
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
        return $this;
    }
}
