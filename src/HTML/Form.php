<?php
namespace App\HTML;

class Form{
    public function input(string $type, string $name, string $placeHolder): string
    {
        return <<<HTML
        <div class="mb-3 ">
            <input type="{$type}" class="form-control"   name="{$name}" placeholder="{$placeHolder}">
        </div>
HTML;
    }

    public function boutton(string $type, string $name, string $value): string 
    {
        return <<<HTML
          <input type="{$type}" class="btn btn-primary mt-2"  name="{$name}" value="{$value}">
HTML;
    }
  
}


/**
  
 */