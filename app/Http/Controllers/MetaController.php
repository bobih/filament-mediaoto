<?php

namespace App\Http\Controllers;

use App\Models\Carmodel;
use Illuminate\Http\Request;

class MetaController extends Controller
{


    public function getMetaProduct($carmodel): array{

        $carlist = Carmodel::where('id', $carmodel )->with('variant', 'brand', 'bodytype', 'transmission')->first();

        $vehicleTransmission = array();
        $vehicleEngine = array();
        $listVariant = array();
        $duplicateTransmission = array();
        $duplicateEngine = array();
        $x = 1;
        foreach ($carlist->variant as $variant) {

            $arrOtr[] = $variant->otr;
            $transmission = $variant->transmission->name;
            $engine = $variant->engine_volume;

            if( in_array($transmission, $duplicateTransmission) || $transmission == '' ) { //If in array, skip iteration
                //continue;
             } else {
                $vehicleTransmission[] = array(
                    "@type" => "QualitativeValue",
                    "name" => $transmission
                );
             }

             if( in_array($engine, $duplicateEngine) || $engine == '' ) { //If in array, skip iteration
                //continue;
             } else {

                $vehicleEngine[] = array(
                    "@type" => "EngineSpecification",
                    "name" =>   $engine . " cc"
                );
             }



            $listVariant[] = array(
                "@type" => "ListItem",
                "position" => $x,
                "item" => array(
                    "@type" => "Product",
                    "name" => $variant->name,
                    "description" => "Varian" . $variant->name,
                    "image" => "https://www.mediaoto.id",
                    "url" => "https://www.mediaoto.id",
                    "offers" => array(
                        "@type" => "Offer",
                        "priceCurrency" => "IDR",
                        "price" => $variant->otr,
                        "itemCondition" => "https://schema.org/NewCondition",
                        "availability" => "https://schema.org/InStock"
                    )
                )
            );
            $duplicateTransmission[] = $transmission;
            $duplicateEngine[] = $engine;
            $x++;
        }




        $product = array(
            "@context" => "http://schema.org",
            "@type" => ["Product", "Car"],
            "name" => $carlist->name,
            "brand" => array("@type" => "brand", "name" => $carlist->brand->brand),
            "model" => $carlist->name,
            "image" => "https://www.mediaoto.id", //$carlist->image,
            "url" =>  "https://www.mediaoto.id", //$carlist->url,
            "bodyType" => $carlist->bodytype->name,
            "description" => $carlist->description,
            "vehicleModelDate" => $carlist->updated_at,
            "itemCondition" => "https://schema.org/NewCondition",
            "availability" => "https://schema.org/InStock",
            "vehicleSeatingCapacity" => array(
                array(
                    "@type" => "QuantitativeValue",
                    "name" => $carlist->seat)
                ),
            "vehicleTransmission" =>$vehicleTransmission,
            "vehicleEngine" => $vehicleEngine,
            "fuelType" => array(
                        array(
                            "@type" => "QualitativeValue",
                            "name" => $carlist->fuel->name
                        )
                    ),
            "manufacturer" => array("@type" => "Organization", "name" =>  $carlist->brand->brand),
            "offers" =>
            array(
                "@type" => "AggregateOffer",
                "priceCurrency" => "IDR",
                "lowPrice" => min($arrOtr),
                "highPrice" => max($arrOtr),
                "offerCount" => 1,
                "priceValidUntil" => "2025-11-20"

            ),
            "aggregateRating" => array(
                "@type" => "AggregateRating",
                "ratingValue" => 5,
                "reviewCount" => 1
            )
        );


        $product = array(
            "@context" => "https://schema.org",
            "@type" => "Car",
            "name" => $carlist->name,
            "vehicleIdentificationNumber" => "1BXKF12ZXXJ000000",
            "image" => [
              "https://www.mediaoto.id"
            ],
            "url" => "https://www.mediaoto.id",
            "offers" => array (
              "@type" => "Offer",
              "availability" => "https://schema.org/InStock",
              "price" => min($arrOtr),
              "priceCurrency" => "IDR"
            ),
            "itemCondition" => "https://schema.org/NewCondition",
            "brand" => array (
              "@type" => "Brand",
              "name" =>  $carlist->brand->brand
            ),
            "model" => "Ram",
            "vehicleConfiguration" => "ST",
            "vehicleInteriorColor" => "White",
            "vehicleInteriorType" => "Standard",
            "vehicleModelDate" => "2023",
            "color" => "White",
            "bodyType" => $carlist->bodytype->name,
            "driveWheelConfiguration" => "https://schema.org/FourWheelDriveConfiguration",
            "vehicleEngine" => array(
              "@type" => "EngineSpecification",
              "fuelType" => $carlist->fuel->name
            ),
            "vehicleTransmission" => $carlist->transmission->name,
            "numberOfDoors" => 2,
            "vehicleSeatingCapacity" =>  $carlist->seat
        );

        $listItems = array(
            "@context" => "http://schema.org",
            "@type" => "ItemList",
            "name" => "Varian " . $carlist->name,
            "description" => "Daftar Varian " . $carlist->name,
            "itemListOrder" => "ItemListOrderDescending",
            "numberOfItems" => count($listVariant),
            "itemListElement" => array($listVariant)

        );
        $meta = array(
            "product" => $product,
            "listItems" => $listItems
        );
        return $meta;
    }
}
