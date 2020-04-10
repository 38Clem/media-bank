<?php


namespace App\Form;


class Form
{
    protected array $error;


    protected function __construct()
    {
        $this->error = [];

    }


    /**
     * @return array
     */
    public function getError(): array
    {
        return $this->error;
    }

    /**
     * @param array $error
     */
    public function setError(array $error): void
    {
        $this->error = $error;
    }




}