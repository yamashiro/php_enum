<?php
require_once __DIR__ . '/EnumBase.php';
class CarrierEnum extends EnumBase {
    static $docomo;
    static $au;
    static $softbank;
    static $willcom;

    private $otherOption1;
	protected function __construct($displayName, $otherOption1) {
	    parent::__construct($displayName);
		$this->otherOption1 = $otherOption1;
	}

	public static function ___init() {
		self::$docomo = new CarrierEnum('DoCoMo', 100);
		self::$au = new CarrierEnum('au', 50);
		self::$softbank = new CarrierEnum('softbank', 30);
		self::$willcom = new CarrierEnum('Willcom', 30);
	}

	public function getOtherOption1() {
	    return $this->otherOption1;
	}
}

CarrierEnum::___init();

