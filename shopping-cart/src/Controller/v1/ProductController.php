<?php
namespace App\Controller\v1;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/v1")
 */
class ProductController extends AbstractController
{
    protected $response = [
        'errors' => [],
        'data' => [],
        'time' => ""
    ];

    protected $statusCode = 200;

    /**
     * @Route("/products", methods={"GET"})
     */
    public function getProducts()
    {
        $em = $this->getDoctrine()->getManager();
        $this->setResponse($em->getRepository(Product::class)->findAll());

        return $this->sendResponse();
    }

    /**
     * @Route("/products/{slug}", methods={"GET"})
     */
    public function getProduct(string $slug)
    {
        $em = $this->getDoctrine()->getManager();
        $this->setResponse($em->getRepository(Product::class)->findOneBy(['slug' => $slug]));

        return $this->sendResponse();
    }



    private function sendResponse()
    {
        $this->response['time'] = time();

        return $this->json($this->getResponse());
    }

    private function getResponse(): ?array
    {
        return $this->response;
    }

    private function setResponse($data)
    {
        $this->response['data'] = $data;
    }

    public function getResponseStatusCode (): int
    {
        return $this->statusCode;
    }

    public function setResponseStatusCode (int $statusCode)
    {
        $this->statusCode = $statusCode;
    }
}