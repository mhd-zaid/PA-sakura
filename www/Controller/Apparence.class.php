<?php

namespace App\Controller;

use App\Core\View;

class Apparence{
    public function index(){
        $v = new View("Page/Apparence", "Back");
        $css =  json_decode(file_get_contents(__DIR__."/../Public/css/site.json"));
        $cssTheme = $css->themes[0];
        $selectorsWithValues = ["h2" => ["color" => "pink", "font-size" => "120px"], "h1" => ["color" => "blue"]];
        // $this->changeValueCss($cssTheme, $selectorsWithValues);
        die;
    }

    public function changeValueCss($css, $selectorsWithNewValues){
        //obliger de pointer sur themes pour faire fonctionner la boucle
        foreach($css->themes as $differentThemes=>$valueThemeCss){ // boucle sur les selecteurs du json
            foreach($selectorsWithNewValues[0] as $selectors=>$newValue){ // boucle sur les selecteurs à modifiés, $selectorsWithNewValues[0] -> pour boucler sur les nouvelles données
                if($differentThemes === $selectorsWithNewValues["theme-choice"]){ // On vérifie quel theme est choisie 
                    $themeChoiced = $differentThemes; //On sauvegarde la valeur du theme choisis
                    foreach($valueThemeCss as $selectorJsonCss => $valueJsonCss){ // On récupere les sélecteurs Json
                        if($selectorJsonCss === $selectors){// si le selecteur existe dans le json
                            foreach ($valueJsonCss as $keyValueCss => &$valueCss) {  // boucle sur les valeurs du json
                                foreach ($newValue as $keyNewValue => $newValueSend) {// boucle sur les valeurs à modifier
                                    if($keyValueCss === $keyNewValue){
                                        if(!empty($newValueSend)){
                                            $valueCss = $newValueSend;
                                        }
                                    }                                
                                }                            
                            }
                        }
                    }
                }
            }
        }
        
        $this->generateCss($css->themes[$themeChoiced]);
        return $css; 
    }

    // public function changeValueCss($css, $selectorsWithNewValues){
    //     foreach($css as $selectorJsonCss=>$valueJsonCss){ // boucle sur les selecteurs du json
    //         foreach($selectorsWithNewValues as $selectors=>$newValue){ // boucle sur les selecteurs à modifiés
    //             if($selectorJsonCss == $selectors){ // si le selecteur existe dans le json
    //                 foreach ($valueJsonCss as $keyJson=>&$valueJson ) {  // boucle sur les valeurs du json
    //                     foreach ($newValue as $keyCss => $newValueCss) { // boucle sur les valeurs à modifier
    //                         if($keyJson == $keyCss){
    //                             $valueJson = $newValueCss;
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     }
    //     print_r($css);
    //     $this->generateCss($css);
    //     return $css; 
    // }
    

    //Fonction seulement pour h1
    public function editH1(){
        $selectorWithNewValues = [
                                    "theme-choice"=>0,
                                    [
                                        "h1" => 
                                        [
                                        "color" => $_POST["h1-color"], 
                                        "font-size" => $_POST["h1-font-size"],  
                                        "font-weight" => $_POST["h1-font-weight"],  
                                        "font-family" => $_POST["h1-font-family"]
                                        ]
                                    ]
                                ]; 
        
        $css =  json_decode(file_get_contents(__DIR__."/../Public/css/site.json"));

        $this->changeValueCss($css,$selectorWithNewValues);

        header("Location: /apparence");
                            
    }



    public function generateCss($json) {
        $json = str_replace(["\"","},",",",":{"],["","\n}\n",";\n\t","{\n\t"],substr(json_encode($json),1,-1));
        
        $filename = "site-theme-x.css";

        \file_put_contents(__DIR__."/../Public/css/$filename",$json);
    }
}