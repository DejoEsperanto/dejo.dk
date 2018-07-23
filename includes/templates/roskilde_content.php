<?php
    /*
     * Copyright (C) 2018 Mia Nordentoft, Anton S. Meiner, GitHub contributors
     *
     * This file is part of dejo.dk.
     *
     * dejo.dk is free software: you can redistribute it and/or modify
     * it under the terms of the GNU General Public License as published by
     * the Free Software Foundation, either version 3 of the License, or
     * (at your option) any later version.
     *
     * dejo.dk is distributed in the hope that it will be useful,
     * but WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
     * GNU General Public License for more details.
     *
     * You should have received a copy of the GNU General Public License
     * along with dejo.dk. If not, see <http://www.gnu.org/licenses/>.
     */
    
    echo headerPhoto('roskilde', 'roskilde.jpg');

    $text = LSTR['pages']['roskilde']['text'];
    $text = str_replace('$0', '<a href="https://dejo.dk">', $text);
    $text = str_replace('$1', '</a>', $text);
    $text = str_replace('$2', '<a href="', $text);
    $text = str_replace('$3', '">', $text);
    $text = str_replace('$4', '</a>', $text);
?>

<p class="p"><?=$text?></p>
