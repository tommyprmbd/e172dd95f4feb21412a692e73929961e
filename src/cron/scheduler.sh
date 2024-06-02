#!/bin/bash

while true; do
    curl http://192.168.90.4/api/scheduler/send-email
    sleep 10
done