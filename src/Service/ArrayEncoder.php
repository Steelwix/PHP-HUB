<?php

namespace App\Service;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\CircularReferenceException;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ArrayEncoder
{
    public function encode($array)
    {
        try {
            $serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
            $encodedArray = $serializer->serialize($array, 'json');
        } catch (CircularReferenceException $e) {
            $encodedArray = $serializer->serialize($array, 'json', [
                ObjectNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object) {
                    return $object->getId();
                }
            ]);
        }
        return $encodedArray;
    }
}
