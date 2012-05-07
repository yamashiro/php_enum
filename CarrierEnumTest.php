<?php
require __DIR__ . '/CarrierEnum.php';

class CarrierEnumTest extends PHPUnit_Framework_TestCase {

    /** @test */
    public function valueOfのテスト() {
        //DBやcache、ファイルからとってきた値を valueOf するイメージ
        $this->assertSame(CarrierEnum::$au,
                          CarrierEnum::valueOf('au'));
    }

    /** @test */
    public function getNameのテスト() {
        //DBやcache、ファイルに書き込むときは getName
        $this->assertSame('softbank',
                          CarrierEnum::$softbank->getName());
    }

    /** @test */
    public function toStringも定義してあるから文字連結したりすると自動で() {
        $this->assertSame('hogedocomo',
                          'hoge'.CarrierEnum::$docomo);
    }

    /** @test */
    public function values() {
        //enum だから列挙できるよ！
        $values = CarrierEnum::values();
        $this->assertSame(4, count($values));
        $this->assertSame(CarrierEnum::$docomo, $values[0]);
    }
}