<?php
namespace Elastica\Test\Index;

use Elastica\Index\Recovery;
use Elastica\Test\Base as BaseTest;

class RecoveryTest extends BaseTest
{
    /**
     * @group functional
     */
    public function testGetSettings()
    {
        $indexName = 'test';

        $client = $this->_getClient();
        $index = $client->getIndex($indexName);
        $index->create([], true);
        $recovery = $index->getRecovery();
        $this->assertInstanceOf(Recovery::class, $recovery);

        $this->assertTrue($recovery->getResponse()->isOk());
    }
}
