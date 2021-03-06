<?php
    /*
     * Copyright (C) 2019 Mia Nordentoft, Anton S. Meiner, GitHub contributors
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

?>

<div id="news">

<?php
     foreach (LSTR['pages']['novajhoj']['articles'] as $article) {
          echo '<div>';
          echo '<a href="/novajhoj/' . $article['href'] . '" class="newsTitle"><b>' . $article['title'] . '</b></a>';
          echo '<i>' . $article['date'] . ', DEJO</i>';
          echo '<a href="/novajhoj/' . $article['href'] . '" class="newsImg"><img src="/img/' . $article['img'] . '"></a>';
          echo '</div>';
     }
?>

</div>
