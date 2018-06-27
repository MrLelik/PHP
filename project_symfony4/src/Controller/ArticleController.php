<?php
/**
 * Created by PhpStorm.
 * User: lelik
 * Date: 26.06.18
 * Time: 18:23
 */


namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ArticleController
{
	/**
	 * @return Response
	 *
	 * @Route("/")
	 */
	public function homepage()
	{
		return new Response('OMG! My first page already! WOOO!');
	}

	/**
	 * @Route("/news/{slug}")
	 * @param $slug
	 *
	 * @return Response
	 */
	public function show($slug)
	{
		return new Response(sprintf(
			'Future page to show the article: "%s"',
			$slug
			));
	}
}