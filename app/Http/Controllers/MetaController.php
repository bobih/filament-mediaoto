<?php

namespace App\Http\Controllers;

use App\Models\Carmodel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MetaController extends Controller
{

    public function getMetaProduct($carmodel, $news): array
    {

        $carlist = Carmodel::where('id', $carmodel)->with('variant', 'brand', 'bodytype', 'transmission')->first();
        $tanggal = Carbon::parse($carlist->updated_at);
        $listVariant = array();

        $x = 1;
        foreach ($carlist->variant as $variant) {
            $arrOtr[] = $variant->otr;
            $listVariant[] = array(
                "@type" => "ListItem",
                "position" => $x,
                "item" => array(
                    "@type" => array("Product", "Car"),
                    "name" => $variant->brand->brand . ' ' . $variant->name,
                    "itemCondition" => "https://schema.org/NewCondition",
                    "vehicleIdentificationNumber" => "1BXKF23ZXXJ0000".$variant->id,
                    "vehicleModelDate" => Carbon::now()->year,
                    "bodyType" => $variant->bodyType->name,
                    "model" => $variant->brand->brand . ' ' . $variant->name,
                    "vehicleTransmission" =>  $variant->transmission->name,
                    "brand" => array (
                        "@type" => "Brand",
                        "name" => $variant->brand->brand
                    ),
                    "description" => "Varian" . $variant->name,
                    "image" => "https://www.mediaoto.id",
                    "url" => "https://www.mediaoto.id",
                    "offers" => array(
                        "@type" => "Offer",
                        "priceCurrency" => "IDR",
                        "price" => $variant->otr,
                        "priceValidUntil" => $tanggal->addMonths(3)->format('c'),
                        "itemCondition" => "https://schema.org/NewCondition",
                        "availability" => "https://schema.org/InStock",
                        "shippingDetails" => array(
                            "@type" => "OfferShippingDetails",
                            "shippingRate" => array(
                                "@type" => "MonetaryAmount",
                                "value" => "0",
                                "currency" => "IDR"
                            ),
                            "shippingDestination" => array(
                                array(
                                    "@type" => "DefinedRegion",
                                    "addressCountry" => "ID",
                                    "addressRegion" => array("JKT")
                                ),
                            ),
                            "deliveryTime" => array(
                                "@type" => "ShippingDeliveryTime",
                                "handlingTime" => array(
                                    "@type" => "QuantitativeValue",
                                    "minValue" => 0,
                                    "maxValue" => 1,
                                    "unitCode" => "DAY"
                                ),
                                "transitTime" => array(
                                    "@type" => "QuantitativeValue",
                                    "minValue" => 14,
                                    "maxValue" => 30,
                                    "unitCode" => "DAY"
                                ),
                            ),
                        ),
                        "hasMerchantReturnPolicy" => array(
                            "@type" => "MerchantReturnPolicy",
                            "applicableCountry" => "CH",
                            "returnPolicyCategory" => "https://schema.org/MerchantReturnFiniteReturnWindow",
                            "merchantReturnDays" => 90,
                            "returnMethod" => "https://schema.org/ReturnByMail",
                            "returnFees" => "https://schema.org/FreeReturn"
                        ),
                    ),
                    "review" => array(
                        "@type" => "Review",
                        "reviewRating" => array(
                            "@type" => "Rating",
                            "ratingValue" => $variant->rating,
                            "bestRating" => 5
                        ),
                        "author" => array(
                            "@type" => "Person",
                            "name" => $news->author->name
                        )
                    ),
                    "aggregateRating" => array(
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
            "@type" => array("Product", "Car"),
            "name" => $carlist->brand->brand . ' ' . $carlist->name,
            "brand" => array (
                "@type" => "Brand",
                "name" => $carlist->brand->brand
            ),
            "itemCondition" => "https://schema.org/NewCondition",
            "bodyType" => $carlist->bodytype->name,
            "vehicleIdentificationNumber" => "1BXKF12ZXXJ000000",
            "image" => [
                "https://www.mediaoto.id"
            ],
            "url" => "https://www.mediaoto.id",
            "offers" => array(
                "@type" => "Offer",
                "availability" => "https://schema.org/InStock",
                "price" => min($arrOtr),
                "priceCurrency" => "IDR",
                "shippingDetails" => array(
                    "@type" => "OfferShippingDetails",
                    "shippingRate" => array(
                        "@type" => "MonetaryAmount",
                        "value" => "0",
                        "currency" => "IDR"
                    ),
                    "shippingDestination" => array(
                        array(
                            "@type" => "DefinedRegion",
                            "addressCountry" => "ID",
                            "addressRegion" => array("JKT")
                        ),
                    ),
                    "deliveryTime" => array(
                        "@type" => "ShippingDeliveryTime",
                        "handlingTime" => array(
                            "@type" => "QuantitativeValue",
                            "minValue" => 0,
                            "maxValue" => 1,
                            "unitCode" => "DAY"
                        ),
                        "transitTime" => array(
                            "@type" => "QuantitativeValue",
                            "minValue" => 14,
                            "maxValue" => 30,
                            "unitCode" => "DAY"
                        ),
                    ),
                ),
                "hasMerchantReturnPolicy" => array(
                    "@type" => "MerchantReturnPolicy",
                    "applicableCountry" => "CH",
                    "returnPolicyCategory" => "https://schema.org/MerchantReturnFiniteReturnWindow",
                    "merchantReturnDays" => 90,
                    "returnMethod" => "https://schema.org/ReturnByMail",
                    "returnFees" => "https://schema.org/FreeReturn"
                ),
            ),
            "model" => $carlist->brand->brand . ' ' . $carlist->name,
            "numberOfDoors" => $carlist->door,
            "vehicleConfiguration" => "ST",
            "vehicleInteriorColor" => "White",
            "vehicleInteriorType" => "Standard",
            "vehicleModelDate" => $tanggal->format('Y'),
            "color" => "White",
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
            "name" => "Varian " . $carlist->brand->brand . ' ' . $carlist->name,
            "description" => "List Varian " . $carlist->brand->brand . ' ' . $carlist->name,
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
