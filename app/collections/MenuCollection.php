<?php

use Biome\Core\Collection\RequestCollection;

class MenuCollection extends RequestCollection
{
	protected $map = array(
		'sideMenu' => array()
	);

	public function getSideMenu()
	{
		if(empty($this->sideMenu))
		{
			$this->sideMenu = array(
				array(
					'url' => URL::fromRoute(),
					'icon' => 'fa fa-fw fa-dashboard',
					'title' => 'Dashboard',
				),
				array(
					'url' => URL::fromRoute('showcase'),
					'icon' => 'fa fa-fw fa-caret-square-o-right ',
					'title' => 'Showcase',
				),
				array(
					'icon' => 'fa fa-fw fa-wrench',
					'title' => 'Parameters',
					'submenu' => array(
						array(
							'url' => URL::fromRoute('user'),
							'title' => 'Users',
							'icon' => 'fa fa-fw fa-users',
						),
						array(
							'url' => URL::fromRoute('role'),
							'title' => 'Roles',
							'icon' => 'fa fa-fw fa-sitemap',
						),
					)
				),
			);
		}
		return $this->sideMenu;
	}
}
