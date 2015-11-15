var gulp = require( 'gulp' );
var fs = require('fs');

var cwdir = process.cwd();

eval(fs.readFileSync('./vendor/mermetbt/biome/gulpfile.js')+'');
