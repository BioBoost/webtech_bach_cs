<?php
final class SomeFinalClass
{
    // ...
}

class SomeClass
{
    // ...

    // Cannot be overriden
    final public function someFinalFunction()
    {
        //...
    }
}
?>