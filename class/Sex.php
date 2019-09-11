<?php

namespace Mozesz\MozeszNamespace;

class Sex
{
    function maleFemale($sex, $female, $male)
    {
        if ($sex == 'k') {
            return $female;
        } else {
            return $male;
        }
    }
}
