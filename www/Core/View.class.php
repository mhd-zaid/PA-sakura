<?php

namespace App\Core;

use App\Model\User;
use App\Model\Page;
use App\Model\Menu;
use App\Model\Site;

class View
{

	private $template;
	private $view;
	private $data = [];

	public function __construct(String $view, String $template = "Back")
	{
		$this->setTempalte($template);
		$this->setView($view);
		switch ($template) {
			case 'Back':
				$this->assign('User', new User());
			case 'Front2':
				$menu = new Menu();
				$page = new Page();
				$site = new Site();
				$site = $site->select();
				$menu = $menu->getMainMenu();
				$this->assign('User', new User());
				$this->assign('menu', $menu);
				$this->assign('page', $page);
				$this->assign('site', $site);
			default:

				break;
		}
	}

	//"Auth/Register"
	public function setView(String $view): void
	{

		$view = "View/" . $view . ".view.php";
		if (!file_exists($view)) {
			die("La vue " . $view . " n'existe pas");
		}
		$this->view = $view;
	}

	public function setTempalte(String $template): void
	{

		$template = "View/" . $template . ".tpl.php";
		if (!file_exists($template)) {
			die("Le template " . $template . " n'existe pas");
		}
		$this->template = $template;
	}


	public function assign(String $key, $value): void
	{
		$this->data[$key] = $value;
	}

	public function includeComponent(String $component = "form", array $config): void
	{
		$component = "View/Components/" . $component . ".php";
		if (!file_exists($component)) {
			die("Le composant " . $component . " n'existe pas");
		}
		include $component;
	}


	public function __destruct()
	{
		extract($this->data);
		require $this->template;
	}
}
