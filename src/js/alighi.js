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

document.addEventListener('DOMContentLoaded', () => {
    const zipcodeInput = $('#form_zipcode'),
          cityInput    = $('#form_city'),
          countryInput = $('#form_country');

    const updateCity = function() {
        if (countryInput.value !== defaultCountry) {
            cityInput.value = '';
            return;
        }

        const zip = zipcodeInput.value;
        let city = '';

        if (zip >= 1000 && zip <= 1999) {
            if (zip <= 1499) {
                city = 'København K';
            } else if (zip <= 1799) {
                city = 'København V';
            } else if (zip <= 1999) {
                city = 'Frederiksberg C';
            }
        } else if (zipcodes[zip]) {
            city = zipcodes[zip];
        }

        cityInput.value = city;
    }

    zipcodeInput.addEventListener('input', updateCity);
    countryInput.addEventListener('change', updateCity);
});
