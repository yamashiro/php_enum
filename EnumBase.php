<?php
abstract class EnumBase {
    private $displayName;

    protected function __construct($displayName = '') {
        $this->displayName = $displayName;
        self::$enumValues[] = $this;
    }

    private static $enumValues = array();

    public static function values() {
        $values = array();
        $clazz = get_called_class();
        foreach (self::$enumValues as $enumValue) {
            if ($enumValue instanceof $clazz) {
                $values[] = $enumValue;
            }
        }
        return $values;
    }

    public function getDisplayName() {
        if( $this->displayName === ''){
            return $this->getName();
        }
        return $this->displayName;
    }

    public function getName() {
         $reflection = new ReflectionClass(get_class($this));
         $staticProperties = $reflection->getStaticProperties();
         foreach ($staticProperties as $name => $value) {
             if ($value === $this) {
                 return $name;
             }
         }
    }
    public static function valueOf($name) {
        $clazz = get_called_class();
        if (isset($clazz::$$name)) {
            return $clazz::$$name;
        }
        throw new Exception('そのような名前の enum は存在しません. name['.$name.'] $clazz['.$clazz.']');

    }

    public function __toString() {
        return $this->getName();
    }

}
