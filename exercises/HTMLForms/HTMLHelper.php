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

    public function getDiv($element, $id, $class, $attributes);
    public function getSpan($element, $id, $class, $attributes);
    public function getParagraph($element, $id, $class, $attributes);
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

    ///////////// STUDENTS

    public function getImage($src = "", $alt = "", $id = null, $class = "", $attributes = array())
    {
        $image = new Image($src, $alt, $id, $class, $attributes);
        return $image;
    }

    public function getAnchor($href = "", $text = "", $target = "_parent", $id = null, $class = "", $attributes = array())
    {
        $anchor = new Anchor($href, $text, $target, $id, $class, $attributes);
        return $anchor;
    }

    public function getStylesheetLink($href = "", $id = null)
    {
        $link = new HtmlLink("stylesheet", "text/css", $href, $id);
        return $link;
    }

    public function getDiv($element, $id = null, $class = "", $attributes = array())
    {
        $div = new BasicContainer($element, 'div', $id, $class, $attributes);
        return $div;
    }

    public function getSpan($element, $id = null, $class = "", $attributes = array())
    {
        $span = new BasicContainer($element, 'span', $id, $class, $attributes);
        return $span;
    }

    public function getParagraph($element, $id = null, $class = "", $attributes = array())
    {
        $p = new BasicContainer($element, 'p', $id, $class, $attributes);
        return $p;
    }

}




///////////// WHAT THE STUDENTS SHOULD DO

class Image extends BasicHtmlElement
{   
    private $src;
    private $alt;

    public function __construct($src = "", $alt = "", $id = null, $class = "", $attributes = array())
    {
        parent::__construct($id, $class, $attributes);

        $this->src = $src;
        $this->alt = $alt;
    }

    public function __toString()
    {
        $attr = $this->allAttributesToString();
        $attr .= ($this->alt ? " alt='{$this->alt}'" : "");
        $attr .= ($this->src ? " src='{$this->src}'" : "");
        $html = "<img$attr>";
        return $html;
    }
}

class Anchor extends BasicHtmlElement
{   
    private $href;
    private $target;
    private $text;

    public function __construct($href = "", $text = "", $target = "_parent", $id = null, $class = "", $attributes = array())
    {
        parent::__construct($id, $class, $attributes);

        $this->href = $href;
        $this->text = $text;
        $this->target = $target;
    }

    public function __toString()
    {
        $attr = $this->allAttributesToString();
        $attr .= ($this->href ? " href='{$this->href}'" : "");
        $attr .= ($this->target ? " target='{$this->target}'" : "");
        $html = "<a$attr>{$this->text}</a>";
        return $html;
    }
}

class HtmlLink extends BasicHtmlElement
{   
    private $rel;
    private $type;
    private $href;

    public function __construct($rel = "stylesheet", $type = "text/css", $href = "", $id = null)
    {
        parent::__construct($id);

        $this->rel = $rel;
        $this->type = $type;
        $this->href = $href;
    }

    public function __toString()
    {
        $attr = $this->allAttributesToString();
        $attr .= ($this->rel ? " rel='{$this->rel}'" : "");
        $attr .= ($this->type ? " type='{$this->type}'" : "");
        $attr .= ($this->href ? " href='{$this->href}'" : "");
        $html = "<link$attr>";
        return $html;
    }
}

class BasicContainer extends BasicHtmlElement
{   
    private $element;
    private $tag;

    public function __construct($element = "", $tag = "", $id = null, $class = "", $attributes = array())
    {
        parent::__construct($id, $class, $attributes);

        $this->element = $element;
        $this->tag = $tag;
    }

    public function __toString()
    {
        $attr = $this->allAttributesToString();
        $html = "<{$this->tag}$attr>" . $this->element . "</{$this->tag}>";
        return $html;
    }
}

?>