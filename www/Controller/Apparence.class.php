<?php

namespace App\Controller;

use App\Core\View;

class Apparence{
    public function index(){
        $v = new View("Page/Apparence", "Back");
        $css =  json_decode(file_get_contents(__DIR__."/../Public/css/site.json"));
        $cssTheme = $css->themes[0];
        // $selectorsWithValues = ["h1" => ["color" => "blue"]];
        $selectorsWithValues = ["h1" => ["color" => "blue", "font-size" => "120px"]];
        $this->changeValueCss($cssTheme, $selectorsWithValues);
        // var_dump($this->changeValueCss($cssTheme, $selectorsWithValues));
        // die;
    }

    public function changeValueCss($css, $selectorsWithNewValues){
        foreach($css as $selectorJsonCss=>$valueJsonCss){ // boucle sur les selecteurs du json
            foreach($selectorsWithNewValues as $selectors=>$newValue){ // boucle sur les selecteurs à modifiés
                if($selectorJsonCss == $selectors){ // si le selecteur existe dans le json
                    foreach ($valueJsonCss as $keyJson=>&$valueJson ) {  // boucle sur les valeurs du json
                        foreach ($newValue as $keyCss => $newValueCss) { // boucle sur les valeurs à modifier
                            if($keyJson == $keyCss){
                                $valueJson = $newValueCss;
                            }
                        }
                    }
                }
            }
        }
        $this->generateCss($css);
        return $css; 
    }

    public function generateCss($json) {
        $json = str_replace(["\"","},",",",":{"],["","\n}\n",";\n\t","{\n\t"],substr(json_encode($json),1,-1));
        
        $filename = "site-theme-x.css";

        \file_put_contents(__DIR__."/../Public/css/$filename",$json);
    }
}