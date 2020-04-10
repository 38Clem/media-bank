<?php


namespace App\Form;


interface FormInterface
{

    const ERROR_FORMAT_NAME = "Your pseudo must be between 3 and 12 characters";
    const ERROR_PASSWORD = "Your password must be between 6 and 24 characters";
    const ERROR_CONFIRM_PASSWORD = "Doesn't match with Password";
    const ERROR_EMAIL = "Invalid email adress";
    const ERROR_BLANK = "Field must not be empty";

    /**
     * @return false if form is not submitted and errors are not false,
     * otherwise true
     */
    public function isValid():bool;

}