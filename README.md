SuluWebCrawlerBundle
=================

[![](https://travis-ci.org/sulu-cmf/SuluWebCrawlerBundle.png)](https://travis-ci.org/sulu-cmf/SuluWebCrawlerBundle)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sulu-cmf/SuluWebCrawlerBundle/badges/quality-score.png?s=a3423b0352ee282a77b7a73e5516ba26d2aea792)](https://scrutinizer-ci.com/g/sulu-cmf/SuluWebCrawlerBundle/)

This bundle is part of the [Sulu Content Management Framework](https://github.com/sulu-cmf/sulu-standard) (CMF) and licensed under the [MIT License](https://github.com/sulu-cmf/SuluWebsiteBundle/blob/develop/LICENSE).

The SuluWebCrawlerBundle integrate the [Arachnid Web Crawler](https://github.com/codeguy/arachnid) into the symfony world. It is sulu independent.

## Features

* Service which crawls all public resource locator of your Website
    * It extracts information about the page (e.g. broken links, title, ...)
    * If you has enabled the http cache it fill it up and your page will be fastened up
* SymfonyCacheWarmer enables the `app/console cache:clear` to run the crawling after delete cache
* Command to run the crawling from the console or a cron-job

## Requirements

* Symfony: 2.6.*
* See also the require section of [composer.json](https://github.com/sulu-cmf/SuluWebCrawlerBundle/blob/master/composer.json)
