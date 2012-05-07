<?php
require_once __DIR__ . '/EnumBase.php';
/** 数値をどうしてもDBとかキャッシュに保存したいとき　データ容量とかパフォーマンスの理由のとき　*/
class NumberedEnumBase extends EnumBase {

	private $number;

	protected function __construct($number, $displayName) {
		parent::__construct($displayName);
		$this->number = $number;
	}

    public function getNumber() {
        return $this->number;
    }

    public static function getByNumber($number) {
        foreach (self::values() as $value) {
            if ($value->getNumber() == $number) {
                return $value;
            }
        }
        throw new Exception('そのようなNumberの定数は存在しません：' . __CLASS__ . ', ' . $number);
    }

    public static function valueOf($nameOrNumber) {
        if (is_integer($nameOrNumber)) {
            return self::getByNumber($nameOrNumber);
        }
        return parent::valueOf($nameOrNumber);
    }

}
