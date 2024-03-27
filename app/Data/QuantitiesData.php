<?php

namespace App\Data;

class QuantitiesData
{
    public function quantities()
    {
        return [
            // Quantités d'ingrédients pour la recette "Salade mechouia"
            [
                "quantity" => 1, // Quantité de sel
                "id_unit" => 6,
                "id_ingredient" => 79, // ID de l'ingrédient Sel
                "id_recipe" => 1, // ID de la recette "Salade mechouia"
            ],
            [
                "quantity" => 50, // Quantité d'huile d'olive
                "id_unit" => 8,
                "id_ingredient" => 82, // ID de l'ingrédient Huile d'olive
                "id_recipe" => 1,
            ],
            [
                "quantity" => 1, // Quantité de poivre
                "id_unit" => 6,
                "id_ingredient" => 114, // ID de l'ingrédient Poivre
                "id_recipe" => 1,
            ],
        
            [
                'quantity' => 4, // Poivron vert
                'id_unit' => 4, // Pièce
                "id_ingredient" => 28,
                "id_recipe" => 1,
            ],
            [
                'quantity' => 2, // Tomate ronde
                'id_unit' => 4, // Pièce
                "id_ingredient" => 1,
                "id_recipe" => 1,
            ],
            [
                'quantity' => 1, // Ail
                'id_unit' => 9, 
                "id_ingredient" => 64,
                "id_recipe" => 1,
            ],
            [
                'quantity' => 1, // Vinaigre
                'id_unit' => 8, // Cuillère à soupe
                "id_ingredient" => 117,
                "id_recipe" => 1,
            ],
            [
                'quantity' => 1, // Piment
                'id_unit' => 6, // Pincée
                "id_ingredient" => 78,
                "id_recipe" => 1,
            ],

            // Quantités d'ingrédients pour la recette "Tajine d'agneau aux pruneaux et aux amandes"
                [
                    'quantity' => 800, // Agneau
                    'id_unit' => 1, // Gramme
                    "id_ingredient" => 87, // Viande de mouton
                    "id_recipe" => 2,
                ],
                [
                    'quantity' => 2, // Huile d'olive
                    'id_unit' => 8, // Cuillère à soupe
                    "id_ingredient" => 82, // Huile d'olive
                    "id_recipe" => 2,
                ],
                [
                    'quantity' => 1, // Oignons
                    'id_unit' => 4, // Pièce
                    "id_ingredient" => 5, // Oignon jaune
                    "id_recipe" => 2,
                ],
                [
                    'quantity' => 1, // Cannelle
                    'id_unit' => 6, // Pincée
                    "id_ingredient" => 118, 
                    "id_recipe" => 2,
                ],
                [
                    'quantity' => 1, // Gingembre
                    'id_unit' => 6, // Pincée
                    "id_ingredient" => 80, 
                    "id_recipe" => 2,
                ],
                [
                    'quantity' => 1, // Safran
                    'id_unit' => 6, // Pincée
                    "id_ingredient" => 119,
                    "id_recipe" => 2,
                ],
                [
                    'quantity' => 3, // Sel
                    'id_unit' => 6, // Pincée
                    "id_ingredient" => 79, 
                    "id_recipe" => 2,
                ],
                [
                    'quantity' => 1, // Poivre
                    'id_unit' => 6, // Pincée
                    "id_ingredient" => 114, 
                    "id_recipe" => 2,
                ],
                [
                    'quantity' => 0.5, // Eau
                    'id_unit' => 3, // Litre
                    "id_ingredient" => 120,
                    "id_recipe" => 2,
                ],
                [
                    'quantity' => 15, // Pruneaux
                    'id_unit' => 4, // Pièce
                    "id_ingredient" => 121,
                    "id_recipe" => 2,
                ],
                [
                    'quantity' => 50, // Amandes
                    'id_unit' => 1, // Gramme
                    "id_ingredient" => 60, // Amande
                    "id_recipe" => 2,
                ],
          
            // Mhalbi Recipe (ID 3) Ingredients Quantities
            [
                "quantity" => 1,
                "id_unit" => 6, // litre
                "id_ingredient" => 79, // lait
                "id_recipe" => 3,
            ],
            [
                "quantity" => 50,
                "id_unit" => 1, // gramme
                "id_ingredient" => 103, // sucre
                "id_recipe" => 3,
            ],
            [
                "quantity" => 15,
                "id_unit" => 8, // cuillère à soupe
                "id_ingredient" => 115, // maïzena
                "id_recipe" => 3,
            ],

            // Quantités d'ingrédients pour la recette "Chorba frik"
            [
                "quantity" => 250, // Quantité de viande de mouton
                "id_unit" => 1,
                "id_ingredient" => 87, // ID de l'ingrédient Viande de mouton
                "id_recipe" => 4, // ID de la recette "Chorba frik"
            ],
            [
                "quantity" => 1, // Quantité de tomate ronde
                "id_unit" => 4,
                "id_ingredient" => 1, // ID de l'ingrédient Tomate ronde
                "id_recipe" => 4,
            ],
            [
                "quantity" => 1, // Quantité de tomate grappe
                "id_unit" => 4,
                "id_ingredient" => 42, // ID de l'ingrédient Tomate grappe
                "id_recipe" => 4,
            ],
            [
                "quantity" => 1, // Quantité de céleri-rave
                "id_unit" => 4,
                "id_ingredient" => 62, // ID de l'ingrédient Céleri-rave
                "id_recipe" => 4,
            ],
            [
                "quantity" => 2, // Quantité d'ail
                "id_unit" => 4,
                "id_ingredient" => 64, // ID de l'ingrédient Ail
                "id_recipe" => 4,
            ],
            [
                "quantity" => 2, // Quantité de carotte
                "id_unit" => 4,
                "id_ingredient" => 33, // ID de l'ingrédient Carotte
                "id_recipe" => 4,
            ],
            [
                "quantity" => 2, // Quantité d'oignon jaune
                "id_unit" => 4,
                "id_ingredient" => 5, // ID de l'ingrédient Oignon jaune
                "id_recipe" => 4,
            ],
            [
                "quantity" => 1, // Quantité de sel
                "id_unit" => 6,
                "id_ingredient" => 79, // ID de l'ingrédient Sel
                "id_recipe" => 4,
            ],
            [
                "quantity" => 1, // Quantité de poivre
                "id_unit" => 6,
                "id_ingredient" => 114, // ID de l'ingrédient Poivre
                "id_recipe" => 4,
            ],
            [
                "quantity" => 1, // Quantité de bouillon
                "id_unit" => 6,
                "id_ingredient" => 80, // ID de l'ingrédient Bouillon
                "id_recipe" => 4,
            ],
            // Quantités d'ingrédients pour la recette "Couscous aux sept légumes"
            [
                "quantity" => 1, // Quantité d'huile d'olive
                "id_unit" => 4,
                "id_ingredient" => 82, // ID de l'ingrédient Huile d'olive
                "id_recipe" => 5, // ID de la recette "Couscous aux sept légumes"
            ],
            [
                "quantity" => 300, // Quantité de viande de poulet
                "id_unit" => 1,
                "id_ingredient" => 88, // ID de l'ingrédient Viande de poulet
                "id_recipe" => 5,
            ],
            [
                "quantity" => 2, // Quantité d'oignon jaune
                "id_unit" => 4,
                "id_ingredient" => 5, // ID de l'ingrédient Oignon jaune
                "id_recipe" => 5,
            ],
            [
                "quantity" => 1, // Quantité de carotte
                "id_unit" => 4,
                "id_ingredient" => 33, // ID de l'ingrédient Carotte
                "id_recipe" => 5,
            ],
            [
                "quantity" => 1, // Quantité de courgette
                "id_unit" => 4,
                "id_ingredient" => 50, // ID de l'ingrédient Courgette
                "id_recipe" => 5,
            ],
            [
                "quantity" => 1, // Quantité de navet
                "id_unit" => 4,
                "id_ingredient" => 49, // ID de l'ingrédient Navet
                "id_recipe" => 5,
            ],
            [
                "quantity" => 1, // Quantité de poivron rouge
                "id_unit" => 4,
                "id_ingredient" => 78, // ID de l'ingrédient Poivron rouge
                "id_recipe" => 5,
            ],
            [
                "quantity" => 1, // Quantité de poivron vert
                "id_unit" => 4,
                "id_ingredient" => 28, // ID de l'ingrédient Poivron vert
                "id_recipe" => 5,
            ],
            [
                "quantity" => 1, // Quantité de pois chiches
                "id_unit" => 4,
                "id_ingredient" => 7, // ID de l'ingrédient Pois chiches
                "id_recipe" => 5,
            ],
            [
                "quantity" => 2, // Quantité de tomate ronde
                "id_unit" => 4,
                "id_ingredient" => 1, // ID de l'ingrédient Tomate ronde
                "id_recipe" => 5,
            ],
            // Quantités d'ingrédients pour la recette "Thé à la menthe marocain"
            [
                "quantity" => 6, // Quantité de branches de menthe
                "id_unit" => 10,
                "id_ingredient" => 48, // ID de l'ingrédient Menthe
                "id_recipe" => 6, // ID de la recette "Thé à la menthe marocain"
            ],
            [
                "quantity" => 1, // Quantité d'eau
                "id_unit" => 1,
                "id_ingredient" => 86, // ID de l'ingrédient Eau
                "id_recipe" => 6,
            ],
            [
                "quantity" => 1, // Quantité de thé vert
                "id_unit" => 4,
                "id_ingredient" => 6, // ID de l'ingrédient Thé vert
                "id_recipe" => 6,
            ],
            [
                "quantity" => 1, // Quantité de sucre
                "id_unit" => 4,
                "id_ingredient" => 81, // ID de l'ingrédient Sucre
                "id_recipe" => 6,
            ],
            // Quantités d'ingrédients pour la recette "Basboussa (gâteau de semoule)"
            [
                "quantity" => 300, // Quantité de semoule fine
                "id_unit" => 1,
                "id_ingredient" => 111, // ID de l'ingrédient Semoule fine
                "id_recipe" => 7, // ID de la recette "Basboussa (gâteau de semoule)"
            ],
            [
                "quantity" => 200, // Quantité de sucre
                "id_unit" => 1,
                "id_ingredient" => 81, // ID de l'ingrédient Sucre
                "id_recipe" => 7,
            ],
            [
                "quantity" => 125, // Quantité de noix de coco râpée
                "id_unit" => 1,
                "id_ingredient" => 93, // ID de l'ingrédient Noix de coco râpée
                "id_recipe" => 7,
            ],
            [
                "quantity" => 1, // Quantité de levure chimique
                "id_unit" => 7,
                "id_ingredient" => 104, // ID de l'ingrédient Levure chimique
                "id_recipe" => 7,
            ],
            [
                "quantity" => 250, // Quantité de yaourt nature
                "id_unit" => 1,
                "id_ingredient" => 113, // ID de l'ingrédient Yaourt nature
                "id_recipe" => 7,
            ],
            [
                "quantity" => 3, // Quantité d'oeufs
                "id_unit" => 4,
                "id_ingredient" => 102, // ID de l'ingrédient Oeuf
                "id_recipe" => 7,
            ],
            [
                "quantity" => 1, // Quantité d'huile d'arachide
                "id_unit" => 4,
                "id_ingredient" => 83, // ID de l'ingrédient Huile d'arachide
                "id_recipe" => 7,
            ],
            [
                "quantity" => 1, // Quantité d'eau de fleur d'oranger
                "id_unit" => 1,
                "id_ingredient" => 97, // ID de l'ingrédient Eau de fleur d'oranger
                "id_recipe" => 7,
            ],
            // Quantités d'ingrédients pour la recette "Jus d'orange à la fleur d'oranger"
            [
                "quantity" => 6, // Quantité d'oranges
                "id_unit" => 4,
                "id_ingredient" => 40, // ID de l'ingrédient Orange
                "id_recipe" => 8, // ID de la recette "Jus d'orange à la fleur d'oranger"
            ],
            [
                "quantity" => 2, // Quantité de citrons verts
                "id_unit" => 4,
                "id_ingredient" => 59, // ID de l'ingrédient Citron vert
                "id_recipe" => 8,
            ],
            [
                "quantity" => 1, // Quantité d'eau de fleur d'oranger
                "id_unit" => 1,
                "id_ingredient" => 97, // ID de l'ingrédient Eau de fleur d'oranger
                "id_recipe" => 8,
            ],
            [
                "quantity" => 50, // Quantité de sucre
                "id_unit" => 1,
                "id_ingredient" => 81, // ID de l'ingrédient Sucre
                "id_recipe" => 8,
            ],
            // Quantités d'ingrédients pour la recette "Briks à la viande hachée"
            [
                "quantity" => 250, // Quantité de viande de boeuf
                "id_unit" => 1,
                "id_ingredient" => 86, // ID de l'ingrédient Viande de boeuf
                "id_recipe" => 9, // ID de la recette "Briks à la viande hachée"
            ],
            [
                "quantity" => 100, // Quantité d'oignons
                "id_unit" => 1,
                "id_ingredient" => 5, // ID de l'ingrédient Oignon jaune
                "id_recipe" => 9,
            ],
            [
                "quantity" => 2, // Quantité de gousses d'ail
                "id_unit" => 2,
                "id_ingredient" => 64, // ID de l'ingrédient Ail
                "id_recipe" => 9,
            ],
            [
                "quantity" => 2, // Quantité de tomates
                "id_unit" => 4,
                "id_ingredient" => 1, // ID de l'ingrédient Tomate ronde
                "id_recipe" => 9,
            ],
            [
                "quantity" => 1, // Quantité de persil frais
                "id_unit" => 1,
                "id_ingredient" => 58, // ID de l'ingrédient Persil
                "id_recipe" => 9,
            ],
            [
                "quantity" => 1, // Quantité de coriandre fraîche
                "id_unit" => 1,
                "id_ingredient" => 68, // ID de l'ingrédient Coriandre
                "id_recipe" => 9,
            ],
            [
                "quantity" => 100, // Quantité de fromage râpé
                "id_unit" => 1,
                "id_ingredient" => 103, // ID de l'ingrédient Fromage râpé
                "id_recipe" => 9,
            ],
            [
                "quantity" => 10, // Quantité de feuilles de brick
                "id_unit" => 1,
                "id_ingredient" => 107, // ID de l'ingrédient Farine de blé
                "id_recipe" => 9,
            ],            // Quantités d'ingrédients pour la recette "Couscous royal"
            [
                "quantity" => 500, // Quantité de viande de mouton
                "id_unit" => 1,
                "id_ingredient" => 87, // ID de l'ingrédient Viande de mouton
                "id_recipe" => 10, // ID de la recette "Couscous royal"
            ],
            [
                "quantity" => 500, // Quantité de viande de boeuf
                "id_unit" => 1,
                "id_ingredient" => 86, // ID de l'ingrédient Viande de boeuf
                "id_recipe" => 10,
            ],
            [
                "quantity" => 500, // Quantité de poulet
                "id_unit" => 1,
                "id_ingredient" => 110, // ID de l'ingrédient Poulet
                "id_recipe" => 10,
            ],
            [
                "quantity" => 500, // Quantité d'oignons
                "id_unit" => 1,
                "id_ingredient" => 5, // ID de l'ingrédient Oignon jaune
                "id_recipe" => 10,
            ],
            [
                "quantity" => 2, // Quantité de carottes
                "id_unit" => 4,
                "id_ingredient" => 33, // ID de l'ingrédient Carotte
                "id_recipe" => 10,
            ],
            [
                "quantity" => 2, // Quantité de navets
                "id_unit" => 4,
                "id_ingredient" => 49, // ID de l'ingrédient Navet
                "id_recipe" => 10,
            ],
            [
                "quantity" => 500, // Quantité de courgettes
                "id_unit" => 1,
                "id_ingredient" => 50, // ID de l'ingrédient
                "id_recipe" => 10,
            ],
            // Quantités d'ingrédients pour la recette "Tajine d'agneau aux pruneaux et aux amandes"
            [
                "quantity" => 800, // Quantité d'épaule d'agneau
                "id_unit" => 4,
                "id_ingredient" => 110, // ID de l'ingrédient Agneau
                "id_recipe" => 11, // ID de la recette "Tajine d'agneau aux pruneaux et aux amandes"
            ],
            [
                "quantity" => 200, // Quantité de pruneaux
                "id_unit" => 1,
                "id_ingredient" => 95, // ID de l'ingrédient Pruneaux
                "id_recipe" => 11,
            ],
            [
                "quantity" => 100, // Quantité d'amandes émondées
                "id_unit" => 1,
                "id_ingredient" => 60, // ID de l'ingrédient Amande
                "id_recipe" => 11,
            ],
            [
                "quantity" => 4, // Quantité d'oignons
                "id_unit" => 4,
                "id_ingredient" => 5, // ID de l'ingrédient Oignon jaune
                "id_recipe" => 11,
            ],
            [
                "quantity" => 2, // Quantité de cannelle
                "id_unit" => 7,
                "id_ingredient" => 114, // ID de l'ingrédient Cannelle
                "id_recipe" => 11,
            ],
            [
                "quantity" => 1, // Quantité de sucre
                "id_unit" => 4,
                "id_ingredient" => 81, // ID de l'ingrédient Sucre
                "id_recipe" => 11,
            ],
            [
                "quantity" => 2, // Quantité de sel
                "id_unit" => 6,
                "id_ingredient" => 79, // ID de l'ingrédient Sel
                "id_recipe" => 11,
            ],
            [
                "quantity" => 1, // Quantité de poivre
                "id_unit" => 6,
                "id_ingredient" => 114, // ID de l'ingrédient Poivre
                "id_recipe" => 11,
            ],
            [
                "quantity" => 1, // Quantité de gingembre
                "id_unit" => 6,
                "id_ingredient" => 76, // ID de l'ingrédient Gingembre
                "id_recipe" => 11,
            ],
            [
                "quantity" => 2, // Quantité d'huile d'olive
                "id_unit" => 3,
                "id_ingredient" => 82, // ID de l'ingrédient Huile d'olive
                "id_recipe" => 11,
            ],

        ];
    }
}
