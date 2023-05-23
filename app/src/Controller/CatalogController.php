<?php
/**
 * Task controller.
 */

namespace App\Controller;

use App\Entity\Catalogs;
use App\Repository\CatalogsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CatalogController.
 */
#[Route('/catalogs')]
class CatalogController extends AbstractController
{
    /**
     * Index action.
     *
     * @param CatalogsRepository $catalogRepository
     * @return Response HTTP response
     */
    #[Route(
        name: 'catalogs_index',
        methods: ['GET']
    )]
    public function index(CatalogsRepository $catalogRepository): Response
    {
        $catalogs = $catalogRepository->findAll();

        return $this->render(
            'catalogs/index.html.twig',
            ['catalogs' => $catalogs]
        );
    }

    /**
     * Show action.
     *
     * @param Catalogs $catalog Catalog entity
     *
     * @return Response HTTP response
     */
    #[Route(
        '/{id}',
        name: 'catalogs_show',
        requirements: ['id' => '[1-9]\d*'],
        methods: ['GET']
    )]
    public function show(Catalogs $catalog): Response
    {
        return $this->render(
            'catalogs/show.html.twig',
            ['catalog' => $catalog]
        );
    }
}

