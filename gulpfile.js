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

const gulp = require('gulp');
const watch = require('gulp-watch');
const babel = require('gulp-babel');
const plumber = require('gulp-plumber');
const less = require('gulp-less');
const path = require('path');
const sourcemaps = require('gulp-sourcemaps');
const Prefix = require('less-plugin-autoprefix');
const prefix = new Prefix({ browsers: [ "last 2 versions" ] });
const compileJS = function (source) {''
    return source
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(babel())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('dist/js'));
};

const compileCSS = function (source) {
    return source
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(less({ paths: [path.join(__dirname, 'css')], plugins: [prefix] }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('dist/css'));
};

gulp.task('compile-js', function () {
    return compileJS(gulp.src(['src/js/**/*.js']));
});

gulp.task('compile-css', function () {
    return compileCSS(gulp.src(['src/css/**/*.less']));
});

gulp.task('compile', ['compile-js', 'compile-css']);

gulp.task('watch-compile', function () {
    compileJS(watch(['src/js/**/*.js']));
    compileCSS(watch(['src/css/**/*.less']));
});

gulp.task('default', ['compile', 'watch-compile']);
