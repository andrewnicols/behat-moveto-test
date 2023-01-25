# Behat Test

Behat test scaffold (baked on MacOS + Docker).

To operate the test, first `docker compose up` to raise the test environment, and then, `chmod +x ./runtests` and `./runtests`.

## The problem

This works on a very old version of Selenium/Chrome (as committed).  However, if you hike it to newer versions you will see that there are 'moveto' errors (deprecation) in the docker service logs.

To experience the problem, `docker compose down -v` and then change the selenium version in docker-compose.yml from 4.2 to 4.8 and execute the tests anew.  The failure log is:

```
--- Failed steps:

001 Scenario: I can hover over something to reveal a word # features/example.feature:4
      And I hover over the element ".hoverme"             # features/example.feature:6
        POST /session/b748d5a44e5981b648f9a29f9b53b110/moveto
        Build info: version: '4.8.0', revision: '267030adea'
        System info: os.name: 'Linux', os.arch: 'amd64', os.version: '5.15.49-linuxkit', java.version: '11.0.17'
        Driver info: driver.version: unknown (WebDriver\Exception\UnknownCommand)
```
