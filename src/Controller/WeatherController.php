<?php

namespace App\Controller;

use App\Entity\Location;
use App\Repository\LocationRepository;
use App\Repository\MeasurementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class WeatherController extends AbstractController
{
    #[Route('/weather/{name}/{country}', name: 'app_weather')]
    public function city(string $name,string $country, MeasurementRepository $repository): Response
    {
        $measurements = $repository->findByName($name, $country);

        return $this->render('weather/city.html.twig', [
            'location' => $name,
            'country' => $country,
            'measurements' => $measurements,
        ]);
    }
}
