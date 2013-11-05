<?php
abstract class BasicHtmlElement
{
    private $id;
    private $class;
    private $attributes;

    public function __construct($id = null, $class = null, $attributes = array())
    {
        $this->id = $id;
        $this->class = $class;
        $this->attributes = $attributes;
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id = null) {
        $this->id = $id;
    }

    public function getClass() {
        return $this->class;
    }
    public function setClass($class = null) {
        $this->class = $class;
    }

    public function getAttributes() {
        return $this->attributes;
    }
    public function setAttributes($attributes = array()) {
        $this->attributes = $attributes;
    }

    // Includes the id and class attributes
    protected function allAttributesToString()
    {
        $attr = "";
        $attr .= ($this->id ? " id='{$this->id}'" : "");
        $attr .= ($this->class ? " class='{$this->class}'" : "");

        foreach ($this->attributes as $key => $value) {
            $attr .= " $key=\"{$value}\"";
        }

        return $attr;
    }

    // Needs to return a valid HTML5 string
    abstract public function __toString();
}

class Heading extends BasicHtmlElement
{   
    private $heading;
    private $level;

    public function __construct($heading = "", $level = 1, $id = null, $class = "", $attributes = array())
    {
        parent::__construct($id, $class, $attributes);

        $this->heading = $heading;
        $this->level = $level;
    }

    public function __toString()
    {
        $attr = $this->allAttributesToString();
        $html = "<h{$this->level}$attr>" . $this->heading . "</h{$this->level}>";
        return $html;
    }
}

class ListItem extends BasicHtmlElement
{
    private $value;

    public function __construct($value = "", $id = null, $class = "", $attributes = array())
    {
        parent::__construct($id, $class, $attributes);

        $this->value = $value;
    }

    public function __toString()
    {
        $attr = $this->allAttributesToString();
        $html = "<li$attr>" . $this->value . "</li>";
        return $html;
    }
}

class HtmlList extends BasicHtmlElement
{
    private $listitems;
    private $type;

    public function __construct($type = 'unordered', $id = null, $class = "", $attributes = array())
    {
        parent::__construct($id, $class, $attributes);

        $this->type = $type;
        $this->listitems = array();
    }

    public function addListItem($listitem = null)
    {
        $this->listitems[] = $listitem;
    }

    public function __toString()
    {
        $attr = $this->allAttributesToString();
        $tag = ($this->type == 'ordered' ? 'ol' : 'ul');

        $html = "<{$tag}$attr>\n";
        foreach ($this->listitems as $item) {
            $html .= "\t" . $item . "\n";
        }
        $html .= "</{$tag}>";

        return $html;
    }
}


interface IHtmlHelper
{
    public function getHeading($heading, $level, $id, $class, $attributes);

    public function createUnorderedList($id, $class, $attributes);
    public function createOrderedList($id, $class, $attributes);
    public function createListItem($value, $id, $class, $attributes);

    // Needs to be implemented
    public function getImage($src, $alt, $id, $class, $attributes);
    public function getAnchor($href, $text, $target, $id, $class, $attributes);
    public function getStylesheetLink($href, $id);
}

class HtmlHelper implements IHtmlHelper
{
    public function getHeading($heading = "", $level = 1, $id = null, $class = "", $attributes = array())
    {
        $heading = new Heading($heading, $level, $id, $class, $attributes);
        return $heading;
    }

    public function createListItem($value = "", $id = null, $class = "", $attributes = array())
    {
        return new ListItem($value, $id, $class, $attributes);
    }

    public function createUnorderedList($id = null, $class = "", $attributes = array())
    {
        return new HtmlList('unordered', $id, $class, $attributes);
    }

    public function createOrderedList($id = null, $class = "", $attributes = array())
    {
        return new HtmlList('ordered', $id, $class, $attributes);
    }
}

?>


<?php
$htmlhelper = new HtmlHelper();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <?php
        // These calls should not fail
        echo $htmlhelper->getStylesheetLink("mystyle.css");
    ?>
</head>
<body>

<?php

echo $htmlhelper->getHeading("Hello Universe", 1, null, 'blue');

$ulist = $htmlhelper->createOrderedList();
$ulist->addListItem($htmlhelper->createListItem("This is the first item"));
$ulist->addListItem($htmlhelper->createListItem("This is the second item", 'id_15', 'selected'));
echo "\n". $ulist->__toString() . "\n";

$olist = $htmlhelper->createUnorderedList();
$olist->addListItem($htmlhelper->createListItem("Item 0"));
$olist->addListItem($htmlhelper->createListItem("Item 1", 'id_25', 'selected'));
$olist->addListItem($htmlhelper->createListItem("Item 2"));
echo "\n". $olist->__toString() . "\n";

// These calls should not fail
$image = $htmlhelper->getImage("funny.jpg", 'Really funny image', null, "", array('height' => '200'));
echo $htmlhelper->getDiv($image);
echo $htmlhelper->getDiv($htmlhelper->getAnchor("http://php.net", "PHP Reference", "_blank"));
echo $htmlhelper->getSpan("This is text in a span");

?>
</body>
</html>