<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Apparence as ApparenceModel;
use App\Model\Site;

class Apparence
{
    public function index()
    {
        $apparence = new ApparenceModel();
        $site = new Site();
        $css =  json_decode(file_get_contents(__DIR__ . "/../Public/css/site.json"));
        $selectorsWithValues = [".paragraph" => [], ".titre" => [], ".body" => [], ".nav" => []];
        $configFormErrors = [];
        if(!empty($_POST)){
            if(count($_POST) !== 9) $configFormErrors[] = 'Tentative de hack';
            $color = [];
            isset($_POST['titre-color']) ? array_push($color, $_POST['titre-color']) : '';
            isset($_POST['paragraphe-color']) ? array_push($color, $_POST['paragraphe-color']) : '';
            isset($_POST['nav-color']) ? array_push($color, $_POST['nav-color']) : '';
            isset($_POST['body-background-color']) ? array_push($color, $_POST['titre-color']) : '';
            isset($_POST['header-background-color']) ? array_push($color, $_POST['header-background-color']) : '';
            isset($_POST['footer-background-color']) ? array_push($color, $_POST['footer-background-color']) : '';
            if(count($color)!== 6) $configFormErrors[] = 'Couleurs manquantes.';

            foreach($color as $col){
                if (!preg_match("/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/", $col)) {
                    $configFormErrors[] = "La couleur $col n'est pas valide.";
                }
            }

            $fonts = ["arial", "helvetica", "cambria", "courier", "georgia", "optima", "palatino", "tahoma", "times", "verdana"];
            $fontsCompare = [];
            isset($_POST['titre-font-family']) ? array_push($fontsCompare, $_POST['titre-font-family']) : '';
            isset($_POST['paragraphe-font-family']) ? array_push($fontsCompare, $_POST['paragraphe-font-family']) : '';

            if(count($fontsCompare)!== 2) $configFormErrors[] = 'Fonts manquantes.';
            foreach($fontsCompare as $font){
                if(!in_array($font, $fonts)){
                    $configFormErrors[] = "Fonts inconnus $font";
                }
            }

            if(empty($configFormErrors)){
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
            }
        }
        
        if(isset($_POST["electro"])){
            $apparence->setId(2);
            $apparence->setCss("electro");
            $apparence->setActive(1);
            $apparence->save();
            $apparence->updateActive(2);
            $this->applyTheme("electro",$css);
            $_SESSION["flash-success"] = "Thèmes mis à jour avec succés. Visualisez les modifications sur votre site.";
        }
        if(isset($_POST["music"])){
            $apparence->setId(3);
            $apparence->setCss("music");
            $apparence->setActive(1);
            $apparence->save();
            $apparence->updateActive(3);
            $this->applyTheme("music",$css);
            $_SESSION["flash-success"] = "Thèmes mis à jour avec succés. Visualisez les modifications sur votre site.";
        }
        if(isset($_POST["sakura"])){
            $apparence->setId(4);
            $apparence->setCss("sakura");
            $apparence->setActive(1);
            $apparence->save();
            $apparence->updateActive(4);
            $this->applyTheme("sakura",$css);
            $_SESSION["flash-success"] = "Thèmes mis à jour avec succés. Visualisez les modifications sur votre site.";
        }

        $v = new View("Page/Apparence", "Back");
        $v->assign("css", get_object_vars($css));
        $v->assign("apparenceData", $apparence->select());
        $v->assign("site", $site->select());
        $v->assign("configFormErrors", $configFormErrors??[]);
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

    public function applyTheme($theme,$json)
    {
        switch ($theme) {
            case 'electro':
                $selectorsWithValues = [
                    ".paragraph" => ["color" => "#F4CFDF","font-family"=>"Verdana, Geneva, Tahoma, sans-serif"], 
                    ".titre" => ["color" => "#F7F6CF","font-family"=>"'Courier New', Courier, monospace"], 
                    ".body" => ["background-color"=>"#5784BA"], 
                    ".nav" => ["color"=>"#000000"],
                    ".header" => ["background-color"=>"#B6D8F2"],
                    ".footer" => ["background-color"=>"#B6D8F2"] ];
                $this->changeValueCss($json,$selectorsWithValues);
                break;
            case 'music':
                $selectorsWithValues = [
                    ".paragraph" => ["color" => "#D6955B","font-family"=>"'Times New Roman', Times, serif"], 
                    ".titre" => ["color" => "#FEEAA1","font-family"=>"Helvetica, sans-serif"], 
                    ".body" => ["background-color"=>"#226D68"], 
                    ".nav" => ["color"=>"#ECF8F6"],
                    ".header" => ["background-color"=>"#18534F"],
                    ".footer" => ["background-color"=>"#18534F"] ];
                $this->changeValueCss($json,$selectorsWithValues);
                break;
                case 'sakura':
            $selectorsWithValues = [
                ".paragraph" => ["color" => "#000000","font-family"=>"Cambria, Cochin, Georgia, Times, 'Times New Roman', serif"], 
                ".titre" => ["color" => "#ff66c4","font-family"=>"Verdana, Geneva, Tahoma, sans-serif"], 
                ".body" => ["background-color"=>"#ffffff"], 
                ".nav" => ["color"=>"#ffffff"],
                ".header" => ["background-color"=>"#0F056B"],
                ".footer" => ["background-color"=>"#0F056B"] ];
                $this->changeValueCss($json,$selectorsWithValues);
                break;
            default:
                
                break;
        }
    }
}
