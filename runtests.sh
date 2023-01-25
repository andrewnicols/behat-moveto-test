#!/bin/bash

if lsof -Pi :4444 -sTCP:LISTEN -t >/dev/null ; then
    echo -e "\033[32mSelenium is already running - good!\033[0m"
else
    echo -e "\033[92mSelenium is not running, have you forgotten to start docker?\033[0m"
    exit 1
fi

if [ $# -eq 0 ]; then
  echo -e "\033[96mRunning all tags in behat\033[0m"
  vendor/bin/behat --config=tests/behat.yml -f progress -o std
else
  echo -e "\033[96mRunning @$1 tags in behat\033[0m"
  vendor/bin/behat --config=tests/behat.yml -f progress -o std --tags $1
fi