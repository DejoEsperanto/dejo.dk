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

<div id="main" class="flex-col-2 flex-col-reverse">
     <div>
          <div id="alighiText">
               <p class="p"><?=implode('</p><p class="p">', LSTR['pages']['alighi']['text'])?></p>
          </div>
     </div>
     <div>
          <form method="post" action="/dankon_pro_aligho">
               <div>
                    <div>
                         <label for="form_firstname"><?=LSTR['pages']['alighi']['form']['firstname']?>*</label>
                         <input name="firstname" id="form_firstname" tabindex="1" maxlength="80" required>
                    </div>
                    <div>
                         <label for="form_lastname"><?=LSTR['pages']['alighi']['form']['lastname']?></label>
                         <input name="lastname" id="form_lastname" tabindex="2" maxlength="80">
                    </div>
               </div>
               <div>
                    <div>
                         <label for="form_birthday"><?=LSTR['pages']['alighi']['form']['birthday']?>*</label>
                         <?php
                              $max = new DateTime();
                              $min = new DateTime();
                              $min->modify('-30 years');
                         ?>
                         <input name="birthday" id="form_birthday" tabindex="3" type="date" max="<?=$max->format('Y-m-d')?>" min="<?=$min->format('Y') + 1?>-01-01" required>
                    </div>
               </div>
               <div>
                    <div>
                         <label for="form_address"><?=LSTR['pages']['alighi']['form']['address']?></label>
                         <input name="address" id="form_address" tabindex="4" maxlength="200">
                    </div>
                    <div>
                         <label for="form_country"><?=LSTR['pages']['alighi']['form']['country']?>*</label>
                         <select name="country" id="form_country" tabindex="5" maxlength="30" required>
                              <?php
                                   $defaultCountry = LSTR['pages']['alighi']['default_country'];
                                   foreach (LSTR['pages']['alighi']['countries'] as $country) {
                                        echo "<option value=\"$country\"";
                                        if ($country === $defaultCountry) {
                                             echo ' selected';
                                        }
                                        echo ">$country</option>";
                                   }
                              ?>
                         </select>
                    </div>
               </div>
               <div>
                    <div>
                         <label for="form_zipcode"><?=LSTR['pages']['alighi']['form']['zipcode']?></label>
                         <input id="form_zipcode" tabindex="6" name="zipcode" maxlength="20">
                    </div>
                    <div>
                         <label form="form_city"><?=LSTR['pages']['alighi']['form']['city']?></label>
                         <input id="form_city" name="city" tabindex="7" maxlength="50">
                    </div>
               </div>
               <div>
                    <div>
                         <label for="form_email"><?=LSTR['pages']['alighi']['form']['email']?>*</label>
                         <input name="email" id="form_email" tabindex="8" type="email" maxlength="200" required>
                    </div>
               </div>
               <div>
                    <div>
                         <label for="form_phone"><?=LSTR['pages']['alighi']['form']['phone']?></label>
                         <input name="phone" id="form_phone" tabindex="9" type="tel" maxlength="20">
                    </div>
               </div>
               <div>
                    <div class="checkbox">
                         <input name="individual" id="form_individual" tabindex="10" type="checkbox">
                         <label for="form_individual"><?=LSTR['pages']['alighi']['form']['individual']?></label>
                    </div>
               </div>
               <div id="final">
                    <div class="g-recaptcha" data-sitekey="6LczlSgUAAAAAHdaXdWPN2aFrWDAmaneGHEaGb2v"></div>
                    <div>
                         <input type="submit" tabindex="10" value="<?=LSTR['pages']['alighi']['form']['submit']?>">
                    </div>
               </div>
          </form>

          <p>* <?=LSTR['pages']['alighi']['required']?></p>
     </div>
</div>

<script>var defaultCountry = <?=json_encode($defaultCountry)?>;</script>
<script src="/js/zipcodes.js"></script>
<script src="/js/alighi.js"></script>
