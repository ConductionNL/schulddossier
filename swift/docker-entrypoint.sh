#!bin/bash

echo "Launch server"
/swift/bin/launch.sh &
sleep 15

echo "Register swift"
/swift/bin/register-swift-endpoint.sh http://swift:8080
sleep 5

echo "Register temp url key"
swift post -m "Temp-URL-Key:$TEMP_URL_KEY"
swift post schulddossier_dossier  -H 'X-Container-Meta-Access-Control-Allow-Origin: http://localhost'  -H 'X-Container-Meta-Access-Control-Max-Age:3600'  -H 'X-Container-Meta-Access-Control-Expose-Headers:X-Container-Meta-Access-Control-Allow-Origin'

echo "All set, sleeping forever"
swift stat schulddossier_dossier
/bin/sleep "3650d"