#!/bin/sh
MODULE_NAME="school-admin"
MODULE_DIR_PATH="output/application/$MODULE_NAME/modules"
WEB_DIR_PATH="output/application/$MODULE_NAME/web"
CONSOLE_DIR_PATH="output/application/$MODULE_NAME/console"
rm -rf output
mkdir -p ${MODULE_DIR_PATH}
mkdir -p ${WEB_DIR_PATH}
mkdir -p ${CONSOLE_DIR_PATH}
cp -r actions apis commands controllers services components config constants models scripts Module.php ${MODULE_DIR_PATH}
cp -r console/* ${CONSOLE_DIR_PATH}
cp -r web/* ${WEB_DIR_PATH}
cd output
find ./ -name .git -exec rm -rf {} \;
tar cvzf ${MODULE_NAME}.tar.gz application
rm -rf application