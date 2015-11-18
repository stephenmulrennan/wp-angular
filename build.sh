#!/bin/bash

mkdir -p build
rm -rf build/**

echo "Building less file and uglifying" 

lessc less/style.less | uglifycss > build/style.css

echo "Uglifying Javascript"

mkdir -p build/js

uglifyjs2 js/jquery-2.1.4.js js/bootstrap.js js/angular.js js/angular-route.js js/nav.js js/app.js -c -m -o build/js/app.js

echo "Copying files to build directory"

cp *.php build/
cp -r php build/
cp -r images build/
cp -r templates build/
cp -r fonts build/
