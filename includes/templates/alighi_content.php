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

<form method="post" action="/dankon_pro_aligho">
     <div>
          <div>
               <label><?=LSTR['pages']['alighi']['form']['firstname']?>*</label>
               <input name="firstname" tabindex="1" required>
          </div>
          <div>
               <label><?=LSTR['pages']['alighi']['form']['birthday']?>*</label>
               <?php
                    $max = new DateTime();
                    $min = new DateTime();
                    $min->modify('-30 years');
               ?>
               <input name="birthday" tabindex="3" type="date" max="<?=$max->format('Y-m-d')?>" min="<?=$min->format('Y') + 1?>-01-01" required>
          </div>
          <div>
               <label><?=LSTR['pages']['alighi']['form']['address']?></label>
               <input name="address" tabindex="4">
          </div>
          <div>
               <label><?=LSTR['pages']['alighi']['form']['zipcode']?></label>
               <input type="number" tabindex="6" step="1" min="0" max="9999" name="zipcode">
          </div>
          <div>
               <label><?=LSTR['pages']['alighi']['form']['email']?>*</label>
               <input name="email" tabindex="7" type="email" required>
          </div>
          <div>
               <label><?=LSTR['pages']['alighi']['form']['phone']?></label>
               <input name="phone" tabindex="8" type="tel">
          </div>
          <div class="checkbox">
               <input type="checkbox">
               <label><?=LSTR['pages']['alighi']['form']['individual']?></label>
          </div>
     </div>
     <div>
          <div>
               <label><?=LSTR['pages']['alighi']['form']['lastname']?></label>
               <input name="lastname" tabindex="2">
          </div>
          <div></div>
          <div>
               <label><?=LSTR['pages']['alighi']['form']['country']?>*</label>
               <select name="country" tabindex="5" required></select>
          </div>
          <div>
               <label><?=LSTR['pages']['alighi']['form']['city']?></label>
               <input id="city" disabled>
          </div>
          <div></div>
          <div></div>
          <div></div>
          <div>
               <input type="submit" tabindex="9" value="<?=LSTR['pages']['alighi']['form']['submit']?>">
          </div>
     </div>
</form>

<p>* <?=LSTR['pages']['alighi']['required']?></p>

<script src="/js/zipcodes.js"></script>
<script src="/js/alighi.js"></script>