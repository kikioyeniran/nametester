<?php

use PHPUnit\Framework\TestCase;
use App\NameValidator\Comparisons;

class NameComparisonTest extends TestCase
{
    /**
     * @dataProvider namesProvider
     */
    public function testCompleteMatchOfRows($a, $b, $expected){
        $comparison = new Comparisons();
        $comparison->setRecordFullName($a);
        $comparison->setNewFullName($b);

        $this->assertEquals($comparison->checkNames(), $expected);

        // $this->assertTrue($expected);
    }

    public function namesProvider() {
        return [
            ['IDOWU', 'IDOWU', true],
            ['IDOWU EBUNOLUWA', 'EBUNOLUWA IDOWU', true],
            ['IDOWU EBUNOLUWA', 'IDOWU EBUNOLUWA', true],
            ['IDOWU SARAH EBUNOLUWA', 'EBUNOLUWA IDOWU', true],
            ['IDOWU EBUNOLUWA SARAH', 'SARAH, EBUNOLUWA IDOWU', true],
            ['Agu Adline', 'AGU ADLINE', true],
            ['IDOWU EBUNOLUWA SARAH', 'James, Jaye', false]
            // ['IDOWU EBUNOLUWA SARAH', 'SARAH, EBUNOLUWA IDOWU', true]
        ];
    }

    // public function additionProvider()
    // {
    //     return [
    //         ['IDOWU', 'IDOWU', true],
    //         [0, 1, 1],
    //         [1, 0, 1],
    //         [1, 1, 3]
    //     ];
    // }

}