var gulp = require( 'gulp' );
var fs = require('fs');

var cwdir = process.cwd();

var app_dependencies = {
        vendor_js: [
                // Your specific JS packages
        ],
        vendor_css: [
                // Your specific CSS packages
        ]
};

eval(fs.readFileSync('./vendor/mermetbt/biome/gulpfile.js')+'');
