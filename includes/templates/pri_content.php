<?php
    /*
     * Copyright (C) 2017 Mia Nordentoft, Anton S. Meiner, GitHub contributors
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
    
    echo headerPhoto('pri', 'uk_2011.jpg');
?>

<h1><?=LSTR['pages']['pri']['kio_estas_esperanto']['title']?></h1>
<div class="imageWrap">
     <div id="zamenhofStatuoBildo" class='wrapImage'>
          <img src="/img/zamenhof_statuo.jpg">
          <span><?=LSTR['pages']['pri']['kio_estas_esperanto']['bildo'] . '<br>' . imageCredit('zamenhof_statuo.jpg')?></span>
     </div>
     <p class="p"><?=implode('</p><p class="p">', LSTR['pages']['pri']['kio_estas_esperanto']['text'])?></p>
</div>

<h1><?=LSTR['pages']['pri']['nia_rolo']['title']?></h1>
<p class="p"><?=implode('</p><p class="p">', LSTR['pages']['pri']['nia_rolo']['text'])?></p>

<h1><?=LSTR['pages']['pri']['kiel_lerni']['title']?></h1>
<p class="p"><?=implode('</p><p class="p">', LSTR['pages']['pri']['kiel_lerni']['text'])?></p>
<div id="retajIloj">
     <div>
          <h2>Duolingo</h2>
          <div><a href="https://duolingo.com"><img src="/img/duolingo_gufo.png"></a></div>
          <p class="p small">&copy; duolingo.com</p>
          <p class="p"><?=implode('</p><p class="p">', LSTR['pages']['pri']['kiel_lerni']['duolingo'])?></p>
     </div>
     <div>
          <h2>Lernu</h2>
          <div><a href="https://lernu.net"><img src="/img/lernu.png"></a></div>
          <p class="p small">&copy; lernu.net</p>
          <p class="p"><?=implode('</p><p class="p">', LSTR['pages']['pri']['kiel_lerni']['lernu'])?></p>
     </div>
     <div>
          <h2><?=LSTR['pages']['pri']['kiel_lerni']['aliaj_title']?></h2>
          <p class="p"><?=implode('</p><p class="p">', LSTR['pages']['pri']['kiel_lerni']['aliaj'])?></p>
     </div>
</div>

<h1><?=LSTR['pages']['pri']['kial_alighi']['title']?></h1>
<p class="p"><?=implode('</p><p class="p">', LSTR['pages']['pri']['kial_alighi']['text'])?></p>

<h1><?=LSTR['pages']['pri']['kiel_uzi']['title']?></h1>
<p class="p"><?=implode('</p><p class="p">', LSTR['pages']['pri']['kiel_uzi']['text'])?></p>
