<?php

namespace Ease\TWB5;

class Col extends \Ease\Html\DivTag
{

    /**
     * Bunka CSS tabulky bootstrapu.
     *
     * @link  https://getbootstrap.com/docs/5.0/layout/grid/#grid-options
     *
     * @param int    $size       Velikost políčka 1 - 12
     * @param mixed  $content    Obsah políčka
     * @param string $target     Typ zařízení xs|sm|md|lg
     * @param array  $properties Další vlastnosti tagu
     */
    public function __construct($size = 0, $content = null, $target = '',
                                $properties = [])
    {
        if (array_key_exists('class', $properties)) {
            $addClass = $properties['class'];
        } else {
            $addClass = '';
        }
        $properties['class'] = 'col';
        if($target){
            $properties['class'] .= '-'.$target;
        }
        if($size){
            $properties['class'] .= '-'.strval($size);
        }
        parent::__construct($content, $properties);
        if (strlen($addClass)) {
            $this->addTagClass($addClass);
        }
    }
}
