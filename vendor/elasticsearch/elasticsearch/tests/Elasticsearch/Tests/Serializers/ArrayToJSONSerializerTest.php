<?php
/**
 * User: zach
 * Date: 6/20/13
 * Time: 9:07 AM
 */

namespace Elasticsearch\Tests\Serializers;

use Elasticsearch\Serializers\ArrayToJSONSerializer;
use PHPUnit_Framework_TestCase;

/**
 * Class ArrayToJSONSerializerTest
 * @package Elasticsearch\Tests\Serializers
 */
class ArrayToJSONSerializerTest extends PHPUnit_Framework_TestCase
{
    public function testSerializeArray()
    {
        $serializer = new ArrayToJSONSerializer();
        $body = array('value' => 'field');

        $ret = $serializer->serialize($body);

        $body = json_encode($body);
        $this->assertEquals($body, $ret);
    }

    public function testSerializeString()
    {
        $serializer = new ArrayToJSONSerializer();
        $body = 'abc';

        $ret = $serializer->serialize($body);

        $this->assertEquals($body, $ret);
    }

    public function testDeserializeJSON()
    {
        $serializer = new ArrayToJSONSerializer();
        $body = '{"field":"value"}';

        $ret = $serializer->deserialize($body, array());

        $body = json_decode($body, true);
        $this->assertEquals($body, $ret);
    }
}
