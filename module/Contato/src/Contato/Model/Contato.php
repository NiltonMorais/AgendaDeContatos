<?php
namespace Contato\Model;
 
// imports Zend\InputFilter
use Zend\InputFilter\InputFilterAwareInterface,
    Zend\InputFilter\InputFilter,
    Zend\InputFilter\InputFilterInterface;


 // Representa a nossa tabela contatos do banco de dados, tenta simular uma tabela

class Contato implements InputFilterAwareInterface
{
    
    public $id;
    public $nome;
    public $telefone_principal;
    public $telefone_secundario;
    public $data_criacao;
    public $data_atualizacao;
    protected $inputFilter;




    public function exchangeArray($data)
    {
        $this->id                   = (!empty($data['id'])) ? $data['id'] : null;
        $this->nome                 = (!empty($data['nome'])) ? $data['nome'] : null;
        $this->telefone_principal   = (!empty($data['telefone_principal'])) ? $data['telefone_principal'] : null;
        $this->telefone_secundario  = (!empty($data['telefone_secundario'])) ? $data['telefone_secundario'] : null;
        $this->data_criacao         = (!empty($data['data_criacao'])) ? $data['data_criacao'] : null;
        $this->data_atualizacao     = (!empty($data['data_atualizacao'])) ? $data['data_atualizacao'] : null;
    }
    
    
    
    
    
    ////////  FILTROS DE VALIDAÇÕES DO FORMULÁRIO ContatoForm.php
    
    
    /**
     * Método obrigatório de implementação da interface InputFilterAwareInterface
     * Não ultilizaremos esse método para nada, logo lançamos uma excepition em caso de uso deste
     */
    public function setInputFilter(InputFilterInterface $inputFilter) 
       {
        throw new Exception('Não utilizado.');
       }
    
    
       
    /**
     * Método obrigatório de implementação da interface InputFilterAwareInterface
     * Aqui colocamos todas as REGRAS DE VALIDAÇÕES E FILTROS para nossos campos input
     * @return InputFIlter
     */
      public function getInputFilter() 
        {
                
            if(!$this->inputFilter){
                $inputFilter = new InputFilter();
                
                
                // input filter para campo de id
                $inputFilter->add(array(
                    'name' => 'id',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'Int'),  // transforma string para inteiro
                    ),
                ));
                
                
                
                // input filter para campo de nome
                $inputFilter->add(array(
                    'name' => 'nome',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'StripTags'),  // remove xml e html da string
                        array('name' => 'StringTrim'),  // remove os espaços do início e final da string
                        array('name' => 'StringToUpper'),  // transforma string para maiúsculo
                         ),
                         'validators' => array(
                             array(
                                 'name' => 'NotEmpty',
                                 'options' => array(
                                     'messages' => array(
                                          \Zend\Validator\NotEmpty::IS_EMPTY => 'Campo obrigatório.'
                                     ),
                                 ),
                             ),
                             array(
                                 'name' => 'StringLength',
                                 'options' => array(
                                     'encoding' => 'UTF-8',
                                     'min' => 3,
                                     'max' => 70,
                                     'messages' => array(
                                        \Zend\Validator\StringLength::TOO_SHORT => 'Mínimo de caracteres aceitáveis %min%.',
                                        \Zend\Validator\StringLength::TOO_LONG => 'Máximo de caracteres aceitáveis %max%.',
                                     ),
                                 ),
                             ),
                         ),
                      ));
                
                
                // input filter para campo de telefone_principal
                $inputFilter->add(array(
                    'name' => 'telefone_principal',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'StripTags'),  // remove xml e html da string
                        array('name' => 'StringTrim'),  // remove os espaços do início e final da string
                         ),
                         'validators' => array(
                             array(
                                 'name' => 'NotEmpty',
                                 'options' => array(
                                     'messages' => array(
                                          \Zend\Validator\NotEmpty::IS_EMPTY => 'Campo obrigatório.'
                                     ),
                                 ),
                             ),
                             array(
                                 'name' => 'StringLength',
                                 'options' => array(
                                     'encoding' => 'UTF-8',
                                     'min' => 8,
                                     'max' => 15,
                                     'messages' => array(
                                        \Zend\Validator\StringLength::TOO_SHORT => 'Mínimo de caracteres aceitáveis %min%.',
                                        \Zend\Validator\StringLength::TOO_LONG => 'Máximo de caracteres aceitáveis %max%.',
                                     ),
                                 ),
                             ),
                         ),
                      ));
                
                
                
                // input filter para campo de telefone_secundario
                $inputFilter->add(array(
                    'name' => 'telefone_secundario',
                    'required' => false,
                    'filters' => array(
                        array('name' => 'StripTags'),  // remove xml e html da string
                        array('name' => 'StringTrim'),  // remove os espaços do início e final da string
                         ),
                         'validators' => array(
                             array(
                                 'name' => 'StringLength',
                                 'options' => array(
                                     'encoding' => 'UTF-8',
                                     'min' => 8,
                                     'max' => 15,
                                     'messages' => array(
                                        \Zend\Validator\StringLength::TOO_SHORT => 'Mínimo de caracteres aceitáveis %min%.',
                                        \Zend\Validator\StringLength::TOO_LONG => 'Máximo de caracteres aceitáveis %max%.',
                                     ),
                                 ),
                             ),
                         ),
                      ));
                
                $this->inputFilter = $inputFilter;
                
            }  // if
            
                return $this->inputFilter;
            
        } // getInputFilter
       
} // Contato