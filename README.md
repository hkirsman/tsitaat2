# Tsitaat.com decoupled

## Project reference setup with Lando

    git clone git@github.com:hkirsman/tsitaat2.git
    cd tsitaat2
    lando start

### Save database dump to root folder of the project and import the database

    lando db-import YOUR-SQL-FILE-NAME.sql
    

## Errors during migration that need to checked

Migration failed with source plugin exception: SQLSTATE[42S02]: Base table
or view not found: 1146 Table 'drupal7.i18n_string' doesn't exist: SELECT 
b.bid AS bid, b.format AS format, b.body AS body, i18n.property AS property, 
lt.lid AS lid, lt.translation AS translation, lt.language AS language, b.info AS
title FROM {block_custom} b LEFT OUTER JOIN {i18n_string} i18n ON 
i18n.objectid = CAST(b.bid as CHAR(255)) LEFT OUTER JOIN {locales_target} lt ON 
lt.lid = i18n.lid WHERE (lt.lid IS NOT NULL) AND (i18n.type = :db_condition_placeholder_0)
ORDER BY b.bid ASC; Array ( [:db_condition_placeholder_0] => block ) 

comment_node_quote_author_portrait longer than 32 characters.. Something about attempting.


## About

Drupal 8 part of the project is built using https://github.com/drupal-composer/drupal-project
