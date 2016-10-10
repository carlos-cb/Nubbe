<?php

namespace NubbeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use NubbeBundle\Entity\Stock;
use NubbeBundle\Form\StockType;

/**
 * Stock controller.
 *
 */
class StockController extends Controller
{
    /**
     * Lists all Stock entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $stocks = $em->getRepository('NubbeBundle:Stock')->findAll();

        return $this->render('stock/index.html.twig', array(
            'stocks' => $stocks,
        ));
    }

    /**
     * Creates a new Stock entity.
     *
     */
    public function newAction(Request $request)
    {
        $stock = new Stock();
        $form = $this->createForm('NubbeBundle\Form\StockType', $stock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stock);
            $em->flush();

            return $this->redirectToRoute('stock_show', array('id' => $stock->getId()));
        }

        return $this->render('stock/new.html.twig', array(
            'stock' => $stock,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Stock entity.
     *
     */
    public function showAction(Stock $stock)
    {
        $deleteForm = $this->createDeleteForm($stock);

        return $this->render('stock/show.html.twig', array(
            'stock' => $stock,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Stock entity.
     *
     */
    public function editAction(Request $request, Stock $stock)
    {
        $deleteForm = $this->createDeleteForm($stock);
        $editForm = $this->createForm('NubbeBundle\Form\StockType', $stock);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stock);
            $em->flush();

            return $this->redirectToRoute('stock_edit', array('id' => $stock->getId()));
        }

        return $this->render('stock/edit.html.twig', array(
            'stock' => $stock,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Stock entity.
     *
     */
    public function deleteAction(Request $request, Stock $stock)
    {
        $form = $this->createDeleteForm($stock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($stock);
            $em->flush();
        }

        return $this->redirectToRoute('stock_index');
    }

    /**
     * Creates a form to delete a Stock entity.
     *
     * @param Stock $stock The Stock entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Stock $stock)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('stock_delete', array('id' => $stock->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
