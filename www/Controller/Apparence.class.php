<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Apparence as ApparenceModel;

class Apparence
{
    public function index()
    {
        $apparence = new ApparenceModel();
        $css =  json_decode(file_get_contents(__DIR__ . "/../Public/css/site.json"));
        $selectorsWithValues = [".paragraph" => [], ".titre" => [], ".body" => [], ".nav" => []];
        if (isset($_POST['submit'])) {
            $selectorsWithValues[".paragraph"] = ["color" => $_POST["paragraphe-color"], "font-family" => $_POST["paragraphe-font-family"]];
            $selectorsWithValues[".titre"] = ["color" => $_POST["titre-color"], "font-family" => $_POST["titre-font-family"]];
            $selectorsWithValues[".body"] = ["background-color" => $_POST["body-background-color"]];
            $selectorsWithValues[".header"] = ["background-color" => $_POST["header-background-color"]];
            $selectorsWithValues[".footer"] = ["background-color" => $_POST["footer-background-color"]];
            $selectorsWithValues[".nav"] = ["color" => $_POST["nav-color"]];
            $this->changeValueCss($css, $selectorsWithValues);
            $apparence->setId(1);
            $apparence->setCss(file_get_contents(__DIR__ . "/../Public/css/site-theme-x.css"));
            $apparence->setActive(1);
            $apparence->save();
            $apparence->updateActive(1);
            $_SESSION["flash-success"] = "Thèmes mis à jour avec succés. Visualisez les modifications sur votre site.";
        }
        
        if(isset($_POST["electro"])){
            $apparence->setId(2);
            $apparence->setCss("electro");
            $apparence->setActive(1);
            $apparence->save();
            $apparence->updateActive(2);
            $_SESSION["flash-success"] = "Thèmes mis à jour avec succés. Visualisez les modifications sur votre site.";
        }
        if(isset($_POST["music"])){
            $apparence->setId(3);
            $apparence->setCss("music");
            $apparence->setActive(1);
            $apparence->save();
            $apparence->updateActive(3);
            $_SESSION["flash-success"] = "Thèmes mis à jour avec succés. Visualisez les modifications sur votre site.";
        }

        $v = new View("Page/Apparence", "Back");
        $v->assign("css", get_object_vars($css));
        $v->assign("apparenceData", $apparence->select());
    }

    public function changeValueCss($cssJson, $selectorsWithNewValues)
    {
        //obliger de pointer sur themes pour faire fonctionner la boucle
        foreach($cssJson as $selectorJsonCss=>$valueJsonCss){ // boucle sur les selecteurs du json
            foreach($selectorsWithNewValues as $selectors=>$newValue){ // boucle sur les selecteurs à modifiés
                if($selectorJsonCss == $selectors){ // si le selecteur existe dans le json
                    foreach ($valueJsonCss as $keyJson=>&$valueJson ) {  // boucle sur les valeurs du json
                        foreach ($newValue as $keyCss => $newValueCss) { // boucle sur les valeurs à modifier
                            if(($keyJson == $keyCss)&&(!empty($newValueCss))){
                                if ($newValueCss != "" ) {
                                    $valueJson = $newValueCss;
                                }
                            }
                        }
                    }
                }
            }
        }
        file_put_contents(__DIR__."/../Public/css/site.json",json_encode($cssJson));
        $this->generateCss($cssJson);
        return $cssJson;
    }

    public function generateCss($json)
    {
        $json = str_replace(["\"", "},", ",", ":{"], ["", "\n}\n", ";\n\t", "{\n\t"], substr(json_encode($json), 1, -1));
        $filename = "site-theme-x.css";

        \file_put_contents(__DIR__ . "/../Public/css/$filename", $json);
    }
}
