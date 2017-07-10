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
?>

<div class="flex-col-2 flex-col-reverse">
     <div>
          <div id="kontaktiText">
               <?php
                    $contactText = implode('</p><p class="p">',LSTR['pages']['kontakti']['text']);
                    $contactText = str_replace('$1', "<script>document.write('<'+'a'+' '+'h'+'r'+'e'+'f'+'='+\"'\"+'&'+'#'+'1'+'0'+'9'+';'+'a'+'i'+'l'+'t'+'o'+'&'+'#'+'5'+'8'+';'+ 'd'+'e'+'&'+'#'+'1'+'0'+'6'+';'+'o'+'&'+'#'+'6'+'4'+';'+'%'+'6'+'4'+'%'+'6'+'&'+'#'+'5'+'3'+';'+'j'+ '%'+'6'+'F'+'&'+'#'+'4'+'6'+';'+'d'+'%'+'6'+'B'+\"'\"+'>'+'d'+'e'+'j'+'&'+'#'+'1'+'1'+'1'+';'+'&'+'#'+ '6'+'4'+';'+'d'+'e'+'&'+'#'+'1'+'0'+'6'+';'+'o'+'&'+'#'+'4'+'6'+';'+'d'+'&'+'#'+'1'+'0'+'7'+';'+'<'+ '/'+'a'+'>');</script>", $contactText);
                    $contactText = str_replace('$2', '<a href="/alighi">', $contactText);
                    $contactText = str_replace('$3', '</a>', $contactText);
               ?>
               <p class="p"><?=$contactText?></p>
               <ul>
                    <li class="li"><script>document.write('<'+'a'+' '+'h'+'r'+'e'+'f'+'='+"'"+'m'+'&'+'#'+'9'+'7'+';'+'i'+'l'+'t'+'o'+'&'+'#'+'5'+'8'+';'+'&'+'#'+'1'+'0'+'9'+';'+'i'+'%'+'6'+'&'+'#'+'4'+'9'+';'+'&'+'#'+'4'+'6'+';'+'n'+'&'+'#'+'3'+'7'+';'+'6'+'F'+'r'+'d'+'&'+'#'+'1'+'0'+'1'+';'+'n'+'t'+'o'+'&'+'#'+'1'+'0'+'2'+';'+'t'+'&'+'#'+'6'+'4'+';'+'d'+'&'+'#'+'1'+'0'+'1'+';'+'j'+'o'+'&'+'#'+'4'+'6'+';'+'d'+'%'+'&'+'#'+'5'+'4'+';'+'B'+"'"+'>'+'m'+'i'+'a'+'&'+'#'+'4'+'6'+';'+'&'+'#'+'1'+'1'+'0'+';'+'o'+'&'+'#'+'1'+'1'+'4'+';'+'&'+'#'+'1'+'0'+'0'+';'+'e'+'&'+'#'+'1'+'1'+'0'+';'+'t'+'o'+'f'+'t'+'&'+'#'+'6'+'4'+';'+'d'+'e'+'j'+'o'+'&'+'#'+'4'+'6'+';'+'d'+'k'+'<'+'/'+'a'+'>');</script></li>
                    <li class="li">(+45) 20 98 92 63</li>
                    <li class="li">Dana Esperantista Junulara Organizo<br>
                    c/o Mia Nordentoft<br>
                    Anker Jensens Vej 15, 1.t.v.<br>
                    8230 Åbyhøj</li>
               </ul>
          </div>
     </div>
     <div>
          <form method="post" action="/dankon_pro_kontakto">
               <div>
                    <div>
                         <label for="form_name"><?=LSTR['pages']['kontakti']['form']['name']?>*</label>
                         <input id="form_name" name="name" maxlength="100">
                    </div>
                    <div>
                         <label for="form_email"><?=LSTR['pages']['kontakti']['form']['email']?>*</label>
                         <input id="form_email" name="email" maxlength="100">
                    </div>
               </div>
               <div>
                    <div>
                         <label for="form_subject"><?=LSTR['pages']['kontakti']['form']['subject']?>*</label>
                         <input id="form_subject" name="subject" maxlength="200">
                    </div>
                    <div>
                         <label for="form_message"><?=LSTR['pages']['kontakti']['form']['message']?>*</label>
                         <textarea id="form_message" name="message" maxlength="4000"></textarea>
                    </div>
                    <div>
                         <div class="g-recaptcha" data-sitekey="6LczlSgUAAAAAHdaXdWPN2aFrWDAmaneGHEaGb2v"></div>
                    </div>
                    <div>
                         <input type="submit" value="<?=LSTR['pages']['kontakti']['form']['submit']?>">
                    </div>
               </div>
          </form>

          <p>* <?=LSTR['pages']['kontakti']['required']?></p>
     </div>
</div>
