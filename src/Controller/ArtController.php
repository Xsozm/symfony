<?php

namespace App\Controller ;
use Symfony\Component\HttpFoundation\Response; // response

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;



class ArtController extends AbstractController{

    /**
     * Matches /show exactly
     *
     *   @Route("task/show", name="show",methods={"GET"})
     */
    public function index(){
        $a = 5; $b = 'cool';
        swap($a,$b);
        return $this->render('base.html.twig');
    }


    /**
     * Matches /show exactly
     *
     *   @Route("task/swap", name="swap",methods={"GET"})
     */
    public function swap(){
        $x = 5; $y = 'cool';
        $temp =$x;
        $x=$y;
        $y=$temp;
        return new Response($y);

    }

    /**
     * Matches /show exactly
     *
     *   @Route("task/sum", name="sum",methods={"GET"})
     */
    function sumVectors() {
        $vectors = [['x' => 3, 'y' => -5], ['x' => 2, 'y' => 8], ['x' => 0, 'y' => 4]]; //-> [5, 7], that is x = 3 + 2 + 0, y = -5 + 8 + 4
        $x=0;
        $y=0;
        foreach ($vectors as $vector){
            $x+=$vector['x'];
            $y+=$vector['y'];
        }

        return new Response($y);

    }


    /**
     * Matches /show exactly
     *
     *   @Route("task/digit", name="sum",methods={"GET"})
     */
    function digit() {
        $numberdigits=1133621;
        $number = (string)$numberdigits;

        $ans = array_fill(0, 10, 0);
        for ($i=0;$i<strlen($number);$i++)
             $ans[$number[$i]]++;
        $max=-1;
        $digit=0;
        for ($i=9;$i>=0;$i--){
            if($ans[$i]>$max){
                $max=$ans[$i];
                $digit= $i;
            }
        }

        return new Response($digit);

    }

    /**
     * Matches /show exactly
     *
     *   @Route("task/check", name="check",methods={"GET"})
     */
    function checkLetters() {
        $checkWord = 'row'; $referenceWord = 'warrior'; //-> TRUE because "r", "o", and "w" are found in "warrior".
        $exists=true;

        for ($i=0;$i<strlen($checkWord);$i++)
        {
            $found =false;
            for ($j=0;$j<strlen($referenceWord);$j++)
                if($checkWord[$i]==$referenceWord[$j])
                    $found=true;
            if(!$found)
                $exists&=false;

        }

        return new Response($exists?"1":0);


    }



    /**
     *
     *   @Route("home", name="home",methods={"GET"})
     */
    function lol() {



        return new Response("Welcome to our Home");


    }

}