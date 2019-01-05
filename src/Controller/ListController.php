<?php
namespace App\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ListController extends Controller
{
    /**
     * @Route("/welcome", name="welcome")
     */
    public function showAction(Request $request)
    {
        $characters = [
            'Burger lover' => 'Tess Hsu',
            'Pasta lover'           => 'Anais siah',
            'Arya Stark'         => 'Maisie Williams',
            'Melisandre'         => 'Carice van Houten',
            'Khal Drogo'         => 'Jason Momoa',
            'Tyrion Lannister'   => 'Peter Dinklage',
            'Ramsay Bolton'      => 'Iwan Rheon',
            'Petyr Baelish'      => 'Aidan Gillen',
            'Brienne of Tarth'   => 'Gwendoline Christie',
            'Lord Varys'         => 'Conleth Hill'
        ];

        return $this->render('default/index.html.twig', array('character' => $characters));
    }
}