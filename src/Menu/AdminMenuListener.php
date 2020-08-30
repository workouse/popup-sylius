<?php

declare(strict_types=1);

namespace Workouse\PopupPlugin\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

class AdminMenuListener
{
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $newSubmenu = $menu
            ->addChild('index')
            ->setLabel('workouse_popup_plugin.ui.popups');

        $newSubmenu
            ->addChild('index', ['route' => 'workouse_popup_plugin_admin_popup_index'])
            ->setLabel('workouse_popup_plugin.ui.popups')
            ->setLabelAttribute('icon', 'star');
    }
}
