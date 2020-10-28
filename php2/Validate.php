<?php

const ErrorMax = 'Максимальное кол-в 20 символа';
const ErrorMin = 'Минимальное кол-в 3 символа';
const ErrorPhone = 'Не валидный номер телефона';
const ErrorExist = 'Поле обязательно для сохранения';

/**
 * Class Validate
 */
class Validate
{

    private $args;
    private $post;

    /**
     * Validate constructor.
     * @param $args
     * @param $post
     */
    public function __construct($args, $post)
    {
        $this->args = $args;
        $this->post = $post;
    }


    /**
     */
    public function validate()
    {
        $errors = [];

        foreach ($this->args as $key => $value){
            foreach ($value  as $param){
                switch ($param){
                    case 'max':
                        if ($this->checkMaxValue($this->post[$key])){
                            array_push($errors, [
                                'type' => 'max',
                                'error' => ErrorMax
                            ]);
                        }
                        break;
                    case 'min':
                        if ($this->checkMinValue($this->post[$key])){
                            array_push($errors, [
                                'type' => 'min',
                                'error' => ErrorMin
                            ]);
                        }
                        break;
                    case 'phone':
                        if ($this->checkPhone($this->post[$key])){
                            array_push($errors, [
                                'type' => 'phone',
                                'error' => ErrorPhone
                            ]);
                        }
                        break;
                }
            }
        }

        return $errors;
    }

    /**
     * Проверяем максимальное кол-во символов в строке
     * @param $value
     * @return boolean
     */
    private function checkMaxValue($value)
    {
        return  false;
    }

    /**
     * Проверяем минимальное кол-во символов в строке
     * @param $value
     * @return boolean
     */
    private  function checkMinValue($value)
    {
        return  false;
    }

    /**
     * Проверяем телефон ли это
     * @param $value
     * @return boolean
     */
    private function checkPhone($value)
    {
        //регулярка возвращаем true or false
        return  false;
    }

}