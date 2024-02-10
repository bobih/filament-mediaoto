<?php

namespace App\Http\Controllers;

use App\Models\Carmodel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MetaController extends Controller
{

    public function getMetaProduct($carmodel,$news): array{

        $carlist = Carmodel::where('id', $carmodel )->with('variant', 'brand', 'bodytype', 'transmission')->first();
        $tanggal = Carbon::parse($carlist->updated_at);
        $listVariant = array();

        $x = 1;
        foreach ($carlist->variant as $variant) {
            $arrOtr[] = $variant->otr;
            $listVariant[] = array(
                "@type" => "ListItem",
                "position" => $x,
                "item" => array(
                    "@type" => "Product",
                    "name" => $variant->brand->brand .' '. $variant->name,
                    "description" => "Varian" . $variant->name,
                    "image" => "https://www.mediaoto.id",
                    "url" => "https://www.mediaoto.id",
                    "offers" => array(
                        "@type" => "Offer",
                        "priceCurrency" => "IDR",
                        "price" => $variant->otr,
                        "priceValidUntil" => $tanggal->addMonths(3)->format('c'),
                        "itemCondition" => "https://schema.org/NewCondition",
                        "availability" => "https://schema.org/InStock"
                    ),
                    "review" => array(
                        "@type" => "Review",
                        "reviewRating" => array(
                          "@type" => "Rating",
                          "ratingValue" => $variant->rating,
                          "bestRating" => 5
                        ),
                        "author" => array (
                          "@type" => "Person",
                          "name" => $news->author->name
                        )
                    ),
                      "aggregateRating" => array (
                        "@type" => "AggregateRating",
                        "ratingValue" => $variant->rating,
                        "reviewCount" => 1
                ),
                )
            );

            $x++;
        }


        $product = array(
            "@context" => "https://schema.org",
            "@type" => "Car",
            "name" => $carlist->brand->brand .' '. $carlist->name,
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
            "model" => $carlist->brand->brand . ' ' . $carlist->name,
            "numberOfDoors" => $carlist->door,
            "vehicleConfiguration" => "ST",
            "vehicleInteriorColor" => "White",
            "vehicleInteriorType" => "Standard",
            "vehicleModelDate" => $tanggal->format('Y'),
            "color" => "White",
            "bodyType" => $carlist->bodytype->name,
            "driveWheelConfiguration" => "https://schema.org/FourWheelDriveConfiguration",
            "vehicleEngine" => array(
              "@type" => "EngineSpecification",
              "fuelType" => $carlist->fuel->name
            ),
            "vehicleTransmission" => $carlist->transmission->name,
            "vehicleSeatingCapacity" =>  $carlist->seat
        );

        $listItems = array(
            "@context" => "http://schema.org",
            "@type" => "ItemList",
            "name" => "Varian " .$carlist->brand->brand .' ' . $carlist->name,
            "description" => "List Varian " . $carlist->brand->brand . ' '. $carlist->name,
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
