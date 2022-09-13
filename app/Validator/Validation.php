<?php

namespace App\Validator;

/**
 * Validation
 */
class Validation
{
    public array $patterns = array(
        'uri' => '[A-Za-z0-9-\/_?&=]+',
        'url' => '[A-Za-z0-9-:.\/_?&=#]+',
        'alpha' => '[\p{L}]+',
        'words' => '[\p{L}\s]+',
        'alphanumeric' => '[\p{L}0-9]+',
        'int' => '[0-9]+',
        'float' => '[0-9\.,]+',
        'tel' => '[0-9+\s()-]+',
        'text' => '[\p{L}0-9\s-.,;:!"%&()?+\'°#\/@]+',
        'file' => '[\p{L}\s0-9-_!%&()=\[\]#@,.;+]+\.[A-Za-z0-9]{2,4}',
        'folder' => '[\p{L}\s0-9-_!%&()=\[\]#@,.;+]+',
        'address' => '[\p{L}0-9\s.,()°-]+',
        'date_dmy' => '[0-9]{1,2}\-[0-9]{1,2}\-[0-9]{4}',
        'date_ymd' => '[0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2}',
        'email' => '[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+[.]+[a-z-A-Z]'
    );

    public array $errors = array();
    private string $name;
    private string $value;
    private Validation $file;

    public function name(string $name): Validation
    {
        $this->name = $name;
        return $this;
    }

    public function value($value): Validation
    {
        $this->value = $value;
        return $this;
    }

    public function file($value): Validation
    {
        $this->file = $value;
        return $this;
    }

    public function pattern($name): Validation
    {
        if ($name === 'array') {
            if (!is_array($this->value)) {
                $this->errors[] = 'Format campo ' . $this->name . ' non valid.';
            }
        } else {
            $regex = '/^(' . $this->patterns[$name] . ')$/u';
            if ($this->value !== '' && !preg_match($regex, $this->value)) {
                $this->errors[] = 'Format campo ' . $this->name . ' non valid.';
            }
        }
        return $this;
    }

    public function customPattern($pattern): Validation
    {
        $regex = '/^(' . $pattern . ')$/u';
        if ($this->value !== '' && !preg_match($regex, $this->value)) {
            $this->errors[] = 'Format campo ' . $this->name . ' non valid.';
        }
        return $this;
    }

    public function required(): Validation
    {
        if ((isset($this->file) && $this->file['error'] === 4) || ($this->value === '' || $this->value = null)) {
            $this->errors[] = 'Campo ' . $this->name . ' obligatory.';
        }
        return $this;
    }

    public function min($length): Validation
    {
        if (is_string($this->value)) {
            if (strlen($this->value) < $length) {
                $this->errors[] = 'Valor campo ' . $this->name . ' inferior al valor minim';
            }
        } else {
            if ($this->value < $length) {
                $this->errors[] = 'Valor campo ' . $this->name . ' inferior al valor minim';
            }
        }
        return $this;
    }

    public function max($length): Validation
    {
        if (is_string($this->value)) {
            if (strlen($this->value) > $length) {
                $this->errors[] = 'Valor campo ' . $this->name . ' superior al valor massimo';
            }
        } elseif  ($this->value > $length){

                $this->errors[] = 'Valor campo ' . $this->name . ' superior al valor massimo';
        }
        return $this;

    }

    public function equal($value): Validation
    {
        if ($this->value != $value) {
            $this->errors[] = 'Valor campo ' . $this->name . ' non correspondent.';
        }
        return $this;
    }

    public function maxSize($size): Validation
    {
        if ($this->file['error'] !== 4 && $this->file['size'] > $size) {
            $this->errors[] = 'Il file ' . $this->name . ' super la dimension massive di ' . number_format($size / 1048576, 2) . ' MB.';
        }
        return $this;
    }

    public function ext($extension): Validation
    {
        if ($this->file['error'] !== 4 && pathinfo($this->file['name'], PATHINFO_EXTENSION) !== $extension && strtoupper(pathinfo($this->file['name'], PATHINFO_EXTENSION)) !== $extension) {
            $this->errors[] = 'Il file ' . $this->name . ' non è un ' . $extension . '.';
        }
        return $this;

    }

    public function purify($string): string
    {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

    public function isSuccess()
    {
        if (empty($this->errors))
            return true;
    }

    public function getErrors()
    {
        if (!$this->isSuccess()) return $this->errors;
    }

    public function displayErrors(): string
    {
        $html = '<ul>';
        foreach ($this->getErrors() as $error) {
            $html .= '<li>' . $error . '</li>';
        }
        $html .= '</ul>';
        return $html;
    }

    public function result()
    {
        if (!$this->isSuccess()) {
            foreach ($this->getErrors() as $error) {
                echo "$error\n";
            }
            exit;
        }
        return true;

    }

    public static function is_int($value)
    {
        if (filter_var($value, FILTER_VALIDATE_INT)) return true;
    }

    public static function is_float($value)
    {
        if (filter_var($value, FILTER_VALIDATE_FLOAT)) return true;
    }

    public static function is_alpha($value)
    {
        if (filter_var($value, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => "/^[a-zA-Z]+$/")))) return true;
    }

    public static function is_alphanum($value)
    {
        if (filter_var($value, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => "/^[a-zA-Z0-9]+$/")))) return true;
    }

    public static function is_url($value)
    {
        if (filter_var($value, FILTER_VALIDATE_URL)) return true;
    }

    public static function is_uri($value)
    {
        if (filter_var($value, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => "/^[A-Za-z0-9-\/_]+$/")))) return true;
    }

    public static function is_bool($value)
    {
        if (is_bool(filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE))) return true;
    }

    public static function is_email($value)
    {
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) return true;
    }

}