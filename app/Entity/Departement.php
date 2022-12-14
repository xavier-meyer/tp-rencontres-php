<?php
namespace App\Entity;

abstract class Departement
{
    public static function getDepartement(): array
    {
        return [
            '01' => '01 - Ain',
            '02' => '02 - Aisne',
            '03' => '03 - Allier',
            '04' => '04 - Alpes-de-Haute-Provence',
            '05' => '05 - Hautes-Alpes',
            '06' => '06 - Alpes-Maritimes',
            '07' => '07 - Ardèche',
            '08' => '08 - Ardennes',
            '09' => '09 - Ariège',
            '10' => '10 - Aube',
            '11' => '11 - Aude',
            '12' => '12 - Aveyron',
            '13' => '13 - Bouches-du-Rhône',
            '14' => '14 - Calvados',
            '15' => '15 - Cantal',
            '16' => '16 - Charente',
            '17' => '17 - Charente-Maritime',
            '18' => '18 - Cher',
            '19' => '19 - Corrèze',
            '2A' => '2A - Corse-du-Sud',
            '2B' => '2B - Haute-Corse',
            '21' => '02 - Côte-d\'Or',
            '22' => '02 - Côtes-d\'Armor',
            '23' => '02 - Creuse',
            '24' => '02 - Dordogne',
            '25' => '02 - Doubs',
            '26' => '02 - Drôme',
            '27' => '02 - Eure',
            '28' => '02 - Eure-et-Loir',
            '29' => '02 - Finistère',
            '30' => '02 - Gard',
            '31' => '02 - Haute-Garonne',
            '32' => '02 - Gers',
            '33' => '02 - Gironde',
            '34' => '02 - Hérault',
            '35' => '02 - Ille-et-Vilaine',
            '36' => '02 - Indre',
            '37' => '02 - Indre-et-Loire',
            '38' => '02 - Isère',
            '39' => '02 - Jura',
            '40' => '02 - Landes',
            '41' => '02 - Loir-et-Cher',
            '42' => '02 - Loire',
            '43' => '02 - Haute-Loire',
            '44' => '02 - Loire-Atlantique',
            '45' => '02 - Loiret',
            '46' => '02 - Lot',
            '47' => '02 - Lot-et-Garonne',
            '48' => '02 - Lozère',
            '49' => '02 - Maine-et-Loire',
            '50' => '02 - Manche',
            '51' => '02 - Marne',
            '52' => '02 - Haute-Marne',
            '53' => '02 - Mayenne',
            '54' => '02 - Meurthe-et-Moselle',
            '55' => '02 - Meuse',
            '56' => '02 - Morbihan',
            '57' => '02 - Moselle',
            '58' => '02 - Nièvre',
            '59' => '02 - Nord',
            '60' => '02 - Oise',
            '61' => '02 - Orne',
            '62' => '02 - Pas-de-Calais',
            '63' => '02 - Puy-de-Dôme',
            '64' => '02 - Pyrénées-Atlantiques',
            '65' => '02 - Hautes-Pyrénées',
            '66' => '02 - Pyrénées-Orientales',
            '67' => '02 - Bas-Rhin',
            '68' => '02 - Haut-Rhin',
            '69' => '02 - Rhône',
            '70' => '02 - Haute-Saône',
            '71' => '02 - Saône-et-Loire',
            '72' => '02 - Sarthe',
            '73' => '02 - Savoie',
            '74' => '02 - Haute-Savoie',
            '75' => '02 - Paris',
            '76' => '02 - Seine-Maritime',
            '77' => '02 - Seine-et-Marne',
            '78' => '02 - Yvelines',
            '79' => '02 - Deux-Sèvres',
            '80' => '02 - Somme',
            '81' => '02 - Tarn',
            '82' => '02 - Tarn-et-Garonne',
            '83' => '02 - Var',
            '84' => '02 - Vaucluse',
            '85' => '02 - Vendée',
            '86' => '02 - Vienne',
            '87' => '02 - Haute-Vienne',
            '88' => '02 - Vosges',
            '89' => '02 - Yonne',
            '90' => '02 - Territoire de Belfort',
            '91' => '02 - Essonne',
            '92' => '02 - Hauts-de-Seine',
            '93' => '02 - Seine-Saint-Denis',
            '94' => '02 - Val-de-Marne',
            '95' => '95 - Val-d\'Oise',
            '971' => '971 - Guadeloupe',
            '972' => '972 - Martinique',
            '973' => '973 - Guyane',
            '974' => '974 - La Réunion',
            '975' => '975 - Saint-Pierre-et-Miquelon',
            '976' => '976 - Mayotte',
            '977' => '977 - Saint-Barthélemy',
            '978' => '978 - Saint-Martin',
            '986' => '986 - Wallis-et-Futuna',
            '987' => '987 - Polynésie française',
            '988' => '988 - Nouvelle-Calédonie',
            '989' => '989 - Île de Clippertoon',
        ];
    }
}