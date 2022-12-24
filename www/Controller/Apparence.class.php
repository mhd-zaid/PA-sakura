<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Apparence as ApparenceModel;

class Apparence
{
    public function index()
    {
        $v = new View("Page/Apparence", "Back");
        $css =  json_decode(file_get_contents(__DIR__ . "/../Public/css/site.json"));
        // var_dump($css);
        $selectorsWithValues = ["paragraph" => [], "titre" => [], "body" => [], "nav" => []];
        if (isset($_POST['submit'])) {
            $selectorsWithValues[".paragraph"] = ["color" => $_POST["paragraphe-color"], "font-family" => $_POST["paragraphe-font-family"]];
            $selectorsWithValues[".titre"] = ["color" => $_POST["titre-color"], "font-family" => $_POST["titre-font-family"]];
            $selectorsWithValues["body"] = ["background-color" => $_POST["body-background-color"]];
            $selectorsWithValues["nav"] = ["background-color" => $_POST["nav-background-color"], "color" => $_POST["nav-color"]];

            $this->changeValueCss($css, $selectorsWithValues);
        }
    }

    public function changeValueCss($cssJson, $selectorsWithNewValues)
    {
        //obliger de pointer sur themes pour faire fonctionner la boucle
        foreach($cssJson as $selectorJsonCss=>$valueJsonCss){ // boucle sur les selecteurs du json
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
        file_put_contents(__DIR__."/../site.json",json_encode($cssJson));
        $this->generateCss($cssJson);
        return $cssJson;
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


    // Fonction seulement pour h1
    public function edit($tabJson)
    {
        $tabJson["paragraph"]="";

        $tabJson =  json_decode(file_get_contents(__DIR__ . "/../Public/css/site.json"));

        header("Location: /apparence");
    }



    public function generateCss($json)
    {
        $json = str_replace(["\"", "},", ",", ":{"], ["", "\n}\n", ";\n\t", "{\n\t"], substr(json_encode($json), 1, -1));
        $filename = "site-theme-x.css";

        \file_put_contents(__DIR__ . "/../Public/css/$filename", $json);
    }
}
