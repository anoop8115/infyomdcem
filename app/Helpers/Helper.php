<?php

namespace App\Helpers;


class Helper
{

    static function getRandomBGColor()
    {
        $colors = ['#DDD6FE', '#FECACA', '#FED7AA', '#FDE68A', '#D9F99D', '#BBF7D0', '#A7F3D0
', '#99F6E4', '#A5F3FC', '#BAE6FD', '#C9DFFF', '#D9D6FE', '#FECACA', '#FED7AA', '#FDE68A', '#D9F99D', '#BBF7D0', '#A7F3D0'];
        $rand = rand(0, count($colors) - 1);
        return $colors[$rand];
    }

}
