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
?>

<p><i><?=LSTR['pages']['privatvivo']['date']?></i></p>

<?php
     foreach (LSTR['pages']['privatvivo']['text'] as $section) {
          echo '<h1>' . $section['headline'] . '</h1>';

          foreach ($section['text'] as $text) {
               if (gettype($text) === 'string') {
                    $text = str_replace('$1', "<script>document.write('<'+'a'+' '+'h'+'r'+'e'+'f'+'='+\"'\"+'&'+'#'+'1'+'0'+'9'+';'+'a'+'i'+'l'+'t'+'o'+'&'+'#'+'5'+'8'+';'+ 'd'+'e'+'&'+'#'+'1'+'0'+'6'+';'+'o'+'&'+'#'+'6'+'4'+';'+'%'+'6'+'4'+'%'+'6'+'&'+'#'+'5'+'3'+';'+'j'+ '%'+'6'+'F'+'&'+'#'+'4'+'6'+';'+'d'+'%'+'6'+'B'+\"'\"+'>'+'d'+'e'+'j'+'&'+'#'+'1'+'1'+'1'+';'+'&'+'#'+ '6'+'4'+';'+'d'+'e'+'&'+'#'+'1'+'0'+'6'+';'+'o'+'&'+'#'+'4'+'6'+';'+'d'+'&'+'#'+'1'+'0'+'7'+';'+'<'+ '/'+'a'+'>');</script>", $text);
                    echo '<p class="p">' . $text . '</p>';
               } else {
                    echo '<ul class="ul">';
                    foreach ($text as $li) {
                         echo "<li>$li</li>";
                    }
                    echo '</ul>';
               }
          }
     }
?>
