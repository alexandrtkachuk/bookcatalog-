<?php

function __autoload($class )
{
    include_once(LIBS.'/'.$class.'.php' );
}
