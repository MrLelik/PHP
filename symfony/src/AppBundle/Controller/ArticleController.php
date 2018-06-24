<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Article controller.
 *
 * @Route("article")
 */
class ArticleController extends Controller
{
	/**
	 * Lists all article entities.
	 *
	 * @Route("/", name="article_index")
	 * @Method({"GET", "POST"})
	 * @param Request $request
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

	    $form = $this->createForm('AppBundle\Form\SearchType');

        $articles = $em->getRepository('AppBundle:Article')->findAll();

	    $form->handleRequest($request);

	    if ($form->isSubmitted() && $form->isValid()) {
		    $search = $form->getData();

	    	return $this->redirectToRoute('article_search', array('word' => $search['search']));
	    }

        return $this->render('@Blog/CRUD/article_list.html.twig', array(
            'articles' => $articles,
            'form' => $form->createView(),
        ));
    }


	/**
	 * Lists all article entities.
	 *
	 * @Route("/search/{word}", name="article_search")
	 * @Method({"GET", "POST"})
	 * @param null $word
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function searchAction($word = null)
	{
//		$em = $this->getDoctrine()->getManager();
		$form = $this->createForm('AppBundle\Form\SearchType');
		$repos = $this->getDoctrine()->getRepository('AppBundle:Article');

//		$articles = $em->getRepository('AppBundle:Article')->findAll();

		$articles = $repos->getSearch($word);

		return $this->render('@Blog/CRUD/article_list.html.twig', array(
			'articles' => $articles,
			'form' => $form->createView(),
		));
	}

    /**
     * Creates a new article entity.
     *
     * @Route("/new", name="article_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm('AppBundle\Form\ArticleType', $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('article_show', array('id' => $article->getId()));
        }

        return $this->render('@Blog/CRUD/new_blog_article.html.twig', array(
            'article' => $article,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a article entity.
     *
     * @Route("/{id}", name="article_show")
     * @Method("GET")
     */
    public function showAction(Article $article)
    {
        $deleteForm = $this->createDeleteForm($article);

        return $this->render('article/show.html.twig', array(
            'article' => $article,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing article entity.
     *
     * @Route("/{id}/edit", name="article_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Article $article)
    {
        $deleteForm = $this->createDeleteForm($article);
        $editForm = $this->createForm('AppBundle\Form\ArticleType', $article);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('article_edit', array('id' => $article->getId()));
        }

        return $this->render('article/edit.html.twig', array(
            'article' => $article,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a article entity.
     *
     * @Route("/{id}", name="article_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Article $article)
    {
        $form = $this->createDeleteForm($article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($article);
            $em->flush();
        }

        return $this->redirectToRoute('article_index');
    }

    /**
     * Creates a form to delete a article entity.
     *
     * @param Article $article The article entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Article $article)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('article_delete', array('id' => $article->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
