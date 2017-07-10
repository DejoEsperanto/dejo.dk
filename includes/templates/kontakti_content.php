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
               <p class="p">Teksto</p>
          </div>
     </div>
     <div>
          <form method="post" action="/dankon_pro_kontakto">
               <div>
                    <div>
                         <label><?=LSTR['pages']['kontakti']['form']['name']?>*</label>
                         <input maxlength="100">
                    </div>
                    <div>
                         <label><?=LSTR['pages']['kontakti']['form']['email']?>*</label>
                         <input maxlength="100">
                    </div>
               </div>
               <div>
                    <div>
                         <label><?=LSTR['pages']['kontakti']['form']['subject']?>*</label>
                         <input maxlength="200">
                    </div>
                    <div>
                         <label><?=LSTR['pages']['kontakti']['form']['message']?>*</label>
                         <textarea maxlength="4000"></textarea>
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
