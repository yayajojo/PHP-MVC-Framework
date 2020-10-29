<?php

namespace app\core;

abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';

    // abstact class => preventing the commonly used data 
    public function loadData(array $data)
    {
        foreach ($data as $attribute => $value) {
            if (property_exists($this, $attribute)) {
                $this->{$attribute} = $value;
            }
        }
    }
    abstract public function rules();
    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules) {
            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (is_array($rule)) {
                    $ruleName = $rule[0];
                }
                $value = $this->{$attribute};

                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addErrors($attribute, $ruleName);
                } 
                if ($ruleName === self::RULE_EMAIL && !filter_var($this->{$attribute}, FILTER_VALIDATE_EMAIL)) {
                    $this->addErrors($attribute, $ruleName);
                } 
                
                if ($ruleName === self::RULE_MIN && (strlen($value) < $rule[$ruleName])) {
                    $this->addErrors($attribute, $ruleName, $rule);
                } 
                if ($ruleName === self::RULE_MAX && strlen($value) > $rule[$ruleName]) {
                    $this->addErrors($attribute, $ruleName, $rule);
                } 
                if ($ruleName === self::RULE_MATCH && $this->{$attribute} !== $this->{$rule[$ruleName]}) {
                    $this->addErrors($attribute, $ruleName, $rule);
                }
            }
        }
        return empty($this->errors);
    }
    protected function addErrors($attribute, $ruleName, $rule= [])
    {
        $errorMessage = $this->errorMessages($ruleName) ?? '';
        if (!empty($rule)) {
            $value = $rule[$ruleName];
            $errorMessage = str_replace("{{$ruleName}}", $value, $errorMessage);
        }
        $this->errors[$attribute][] = $errorMessage;
    }

    protected function errorMessages($ruleName)
    {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_EMAIL => 'This must be a valid email',
            self::RULE_MIN => 'Min length of this field must be {min}',
            self::RULE_MAX => 'Max length of this field must be {max}',
            self::RULE_MATCH => 'This field must be as same as {match}'
        ][$ruleName];
    }

    public function hasError($attribute)
    {
      return (bool) $this->errors[$attribute]??false;
    }

    public function getFirstError($attribute)
    {
        return $this->errors[$attribute][0];
    }
}
