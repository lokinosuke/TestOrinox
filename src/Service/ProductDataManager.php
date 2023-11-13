<?php

namespace App\Service;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProductDataManager
{
    private $dataFile;

    public function __construct(string $dataFile)
    {
        $this->dataFile = $dataFile;
    }

    public function loadData(): array
    {
        // Charger les données depuis le fichier JSON
        $data = file_get_contents($this->dataFile);
        return json_decode($data, true) ?? [];
    }

    public function saveData(array $data): void
    {
        // Sauvegarder les données dans le fichier JSON
        file_put_contents($this->dataFile, json_encode($data, JSON_PRETTY_PRINT));
    }
}
