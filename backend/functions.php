<?php 

    // function __autoload($class) {
    //     $class = strtolower($class);
    //     $path = "includes/{$class}.php";

    //     if(file_exists($path)) {
    //         require_once $path;
    //     } else {
    //         die("This file named {$class}.php was not found");
    //     }
    // }

    function my_autoloader($class) {
        $class = strtolower($class);
        $path = MODELS . "{$class}.php";

        // include $path;

        if(is_file($path) && !class_exists($class)) {
            include $path;
        } else {
            die("The file named {$class}.php was not found");
        }
    }
    
    spl_autoload_register('my_autoloader');

    function redirect($location) {
        header("Location: {$location}");
    }

    function responseHeader() {
        header("Content-type: application/json; charset=utf-8");
        header("Access-Control-Allow-Origin: *");
    }

    // PRINT FUNCTIONS

    function printInput($idAttr, $text, $inputType) {
        $out = "
            <div class='form-group'>
                <label for='seats'>$text</label>
                
                <input type='" . $inputType . "' class='form-control' name='$idAttr' id='$idAttr' />

                <small id='" . $idAttr . "Err' class='form-text text-danger error-field'>Valid format: </small>
            </div>
        ";

        echo $out;
    }

    function printChbs($data, $idProp, $valueProp, $text) {
        $out = "
            <div class='form-group'>
                <p>$text</p>
        ";

        $nameAttr = explode(" " , $text)[1];

        for ($i = 0; $i < count($data); $i++) { 
            
            $out .= "
                <div class='custom-control custom-radio'>
                    <input type='radio' class='custom-control-input' id='customRadio$i' name='" . $nameAttr . "' value='" .$data[$i][$idProp] . "' />
                    <label class='custom-control-label' for='customRadio$i'>" . $data[$i][$valueProp] . "</label>
                    
                </div>
            ";
        }

        $out .= "
                <small id='" . str_replace(" ", "", $text) . "Err' class='form-text text-danger error-field'>Select one option</small>
            </div>
        ";

        echo $out;
    }


    // CHECK FORM ELEMENTS
    
    function checkInput($el) {
        global $greske;

        if(!preg_match($el['regex'], $el['value'])) {
            $greske[] = "Valid format: " + $el['example'];
        }
    }

    function checkNumber($el) {
        global $greske;

        if($el['type'] == "ddl" || $el['type'] == "number") {
            if(!isset($el['value']) || $el['value'] < 1) {
                $greske[] = $el['error'];
            }
        } else {
            if(!isset($el['value']) || $el['value'] < 10 || $el['value'] > 500) {
                $greske[] = $el['error'];
            }
        }

    }

    function checkInputPass($el) {
        if($el['value'] == "" || strlen($el['value']) <= 4) {
            $greske[] = $el['error'];
        }
    }

    function checkInputDate($el) {
        $selectedTmp = strtotime($el['value']);
        $nowTmp = time();

        if($selectedTmp > $nowTmp) {
            $greske[] = $el['example'];
        }
    }

    function checkTextarea($el) {
        global $greske;

        if(!isset($el['value']) || strlen($el['value']) < 10) {
            $greske[] = $el['error'];
        }
    }


?>