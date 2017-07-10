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
                    
               </div>
               <div>
                    
               </div>
          </form>

          <p>* <?=LSTR['pages']['alighi']['required']?></p>
     </div>
</div>

<script>var defaultCountry = <?=json_encode($defaultCountry)?>;</script>
<script src="/js/zipcodes.js"></script>
<script src="/js/alighi.js"></script>
