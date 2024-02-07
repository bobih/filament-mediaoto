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
                        "price" => $variant->otr
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
            "vehicleSeatingCapacity" => array(
                array(
                    "@type" => "QuantitativeValue",
                    "name" => $carlist->seat . " seats")
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
                "offerCount" => 1
            ),
            "aggregateRating" => array(
                "@type" => "AggregateRating",
                "ratingValue" => 5,
                "reviewCount" => 1
            )
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
