<?php


namespace Workouse\PopupPlugin\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Workouse\PopupPlugin\Entity\Popup;

class PopupController extends AbstractController
{
    public function indexAction()
    {
        /** @var Popup $popup */
        $popup = $this->getDoctrine()->getRepository(Popup::class)->findOneBy([
            'enabled' => true
        ]);
        return $this->render('@WorkousePopupPlugin/shop/index.html.twig', [
            'popup' => $popup
        ]);
    }
}
