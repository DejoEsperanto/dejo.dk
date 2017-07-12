/*
 * Copyright (C) 2017 Mia Nordentoft, Anton S. Meiner, dejo.dk contributors
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

/* UTIL */

const $ = function (el, parent = document) {
    return parent.querySelector(el);
};

const $$ = function (el, parent = document) {
    return parent.querySelectorAll(el);
};

/* Menu */
$$('#preMenu>div>ul>li').forEach(el => {
    el.addEventListener('click', e => {
        if (e.button !== 0)
            return;

        document.cookie = `lang=${el.innerText};path=/`;
        location.reload();
    });
});
const zamenhof = $('#zamenhofSherco');
let zamenhofReady = true;
$('#logo').addEventListener('mousedown', e => {
    if (!zamenhofReady || e.which !== 3 || !e.shiftKey || !e.ctrlKey) {
        return;
    }

    if (e.offsetX < 142 || e.offsetX > 172 || e.offsetY > 38) {
        return;
    }

    zamenhofReady = false;

    zamenhof.classList.add('active');

    setTimeout(() => {
        zamenhof.classList.remove('active');
        zamenhofReady = true;
    }, 3000);
});
